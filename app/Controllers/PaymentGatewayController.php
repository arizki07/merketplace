<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Midtrans\Config as MidtransConfig;
use App\Models\ListJasaModel;
use App\Models\BiodataModel;
use App\Models\PesananModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class PaymentGatewayController extends BaseController
{
    public function index($orderId)
    {
        MidtransConfig::$serverKey = config('Midtrans')->serverKey;
        MidtransConfig::$clientKey = config('Midtrans')->clientKey;
        MidtransConfig::$isProduction = false;

        $alamatPemesanan = $this->request->getPost('alamat_pemesanan');
        $tanggalPelaksanaan = $this->request->getPost('tanggal_pelaksanaan');

        $validationRules = [
            'alamat_pemesanan' => 'required|max_length[255]',
            'tanggal_pelaksanaan' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $listJasaModel = new ListJasaModel();
        $jasaModel = $listJasaModel->where('id_jasa', $orderId)->first();

        if (!$jasaModel) {
            return view('errors/not_found');
        }

        $biodataModel = new BiodataModel();
        $biodataData = $biodataModel->where('id_biodata', $jasaModel['biodata_id'])->first();

        $userModel = new UserModel();
        $userData = $userModel->getUserByEmail($biodataData['user_id']);

        $firstName = $biodataData['nama_lengkap'] ?? 'Guest';
        // $email = $userData['email'] ?? 'default@example.com';

        // $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        // if ($email === false) {
        //     $email = 'default@example.com';
        // }

        $order_id = time();

        $transaction = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => $jasaModel['harga_jasa'],
            ],
            'customer_details' => [
                'first_name' => $firstName,
                'email' => session('email'),
                'phone' => $biodataData['no_telepon'],
            ],
            'finish_redirect_url' => base_url('admin/payment/update-status'),
        ];

        $midtrans = new \Midtrans\Snap();
        $snapToken = $midtrans->getSnapToken($transaction);

        $pesananModel = new PesananModel();
        $pesananData = [
            'user_id' => $biodataData['user_id'],
            'biodata_id' => $biodataData['id_biodata'],
            'jasa_id' => $jasaModel['id_jasa'],
            'alamat_pemesanan' => $alamatPemesanan,
            'tanggal_pelaksanaan' => $tanggalPelaksanaan,
            'no_telepon' => $biodataData['no_telepon'],
            'create_at' => date('Y-m-d H:i:s'),
        ];
        $pesananModel->insert($pesananData);

        $transaksiModel = new TransaksiModel();
        $transaksiData = [
            'user_id' => $biodataData['user_id'],
            'order_id' => $order_id,
            'pemesanan_id' => $pesananModel->insertID(),
            'jumlah_transaksi' => $jasaModel['harga_jasa'],
            'metode_pembayaran' => 'Midtrans',
            'status_pembayaran' => 'Pending',
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $transaksiModel->insert($transaksiData);

        $data = [
            'snapToken' => $snapToken,
            'jasaModel' => $jasaModel,
            'title' => 'Payment',
            'active' => 'detail',
        ];

        return view('pages/admin/payment/payment', $data);
    }



    public function updateStatus($orderId)
    {
        $status = $this->request->getPost('status');
        $paymentMethod = $this->request->getPost('payment_method');

        if (empty($status) || empty($orderId)) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Invalid request']);
        }

        $transaksiModel = new TransaksiModel();
        $transaksiModel->where('order_id', $orderId)->set([
            'status_pembayaran' => $status,
            'metode_pembayaran' => strtoupper($paymentMethod)
        ])->update();


        return redirect()->to(base_url('admin/detail'))->with('success', 'Pembayaran berhasil!');
    }



    public function index_pengguna($orderId)
    {
        MidtransConfig::$serverKey = config('Midtrans')->serverKey;
        MidtransConfig::$clientKey = config('Midtrans')->clientKey;
        MidtransConfig::$isProduction = false;

        // Validasi Data Input
        $validationRules = [
            'alamat_pemesanan' => 'required|max_length[255]',
            'tanggal_pelaksanaan' => 'required',
            'nama_lengkap' => 'required|max_length[255]',
            'no_telepon' => 'required|max_length[15]|min_length[11]',
            'tanggal_lahir' => 'required|valid_date',
            'nomor_ktp' => 'required|max_length[16]|min_length[16]',
            'alamat' => 'required|max_length[255]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $biodataData = [];
        $userData = [];

        $listJasaModel = new ListJasaModel();
        $jasaModel = $listJasaModel->where('id_jasa', $orderId)->first();

        if (!$jasaModel) {
            return view('errors/not_found');
        }

        $biodataModel = new BiodataModel();
        $existingBiodata = $biodataModel->where('user_id', session('user_id_biodata'))->first();

        $userModel = new UserModel();

        if (!$existingBiodata) {
            $fotoKtpFile = $this->request->getFile('foto_ktp');

            if ($fotoKtpFile->isValid() && !$fotoKtpFile->hasMoved()) {
                $newName = $fotoKtpFile->getRandomName();
                $fotoKtpFile->move('assets/upload/ktp', $newName);

                $biodataData = [
                    'user_id' => session('user_id_biodata'),
                    'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                    'no_telepon' => $this->request->getPost('no_telepon'),
                    'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                    'nomor_ktp' => $this->request->getPost('nomor_ktp'),
                    'alamat' => $this->request->getPost('alamat'),
                    'foto_ktp' => $newName,
                ];

                $biodataModel->insert($biodataData);
                session()->set('biodata_id', $biodataModel->getInsertID());
                session()->set('no_telepon', $biodataData['no_telepon']);
                session()->set('tanggal_lahir', $biodataData['tanggal_lahir']);
                session()->set('alamat', $biodataData['alamat']);
                session()->set('nomor_ktp', $biodataData['nomor_ktp']);
                session()->set('foto_ktp', $biodataData['foto_ktp']);
            } else {
                return redirect()->back()->withInput()->with('errors', ['Foto KTP tidak valid']);
            }
        }

        $biodataData = $existingBiodata;

        $order_id = time();

        $transaction = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => $jasaModel['harga_jasa'],
            ],
            'customer_details' => [
                'first_name' => session('username'),
                'email' => session('email'),
                'phone' => $biodataData['no_telepon'] ?? $this->request->getPost('no_telepon'),
            ],
            'finish_redirect_url' => base_url('shop/payment/update-status'),
        ];

        $midtrans = new \Midtrans\Snap();
        $snapToken = $midtrans->getSnapToken($transaction);

        $pesananModel = new PesananModel();
        $pesananData = [
            'user_id' => session('user_id_biodata'),
            'biodata_id' => session('biodata_id'),
            'jasa_id' => $jasaModel['id_jasa'],
            'alamat_pemesanan' => $this->request->getPost('alamat_pemesanan'),
            'tanggal_pelaksanaan' => $this->request->getPost('tanggal_pelaksanaan'),
            'no_telepon' => $biodataData['no_telepon'] ?? $this->request->getPost('no_telepon'),
            // 'created_at' => date('Y-m-d H:i:s'),
        ];
        $pesananModel->insert($pesananData);

        $transaksiModel = new TransaksiModel();
        $transaksiData = [
            'user_id' => session('user_id_biodata'),
            'order_id' => $order_id,
            'pemesanan_id' => $pesananModel->insertID(),
            'jumlah_transaksi' => $jasaModel['harga_jasa'],
            'metode_pembayaran' => 'Midtrans',
            'status_pembayaran' => 'Pending',
            // 'created_at' => date('Y-m-d H:i:s'),
        ];
        $transaksiModel->insert($transaksiData);

        $data = [
            'snapToken' => $snapToken,
            'jasaModel' => $jasaModel,
            'title' => 'Payment',
            'active' => 'payment',
        ];

        return view('pages/pengguna/payment', $data);
    }



    public function payment_pengguna($orderId)
    {
        $status = $this->request->getPost('status');
        $paymentMethod = $this->request->getPost('payment_method');

        if (empty($status) || empty($orderId)) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Invalid request']);
        }

        $transaksiModel = new TransaksiModel();
        $transaksiModel->where('order_id', $orderId)->set([
            'status_pembayaran' => $status,
            'metode_pembayaran' => strtoupper($paymentMethod)
        ])->update();

        // return view('pages/pengguna/payment-success');
        return redirect()->to(base_url('shop/payment/berhasil'));
    }


    public function payment_berhasil()
    {
        return view('pages/pengguna/success');
    }
}
