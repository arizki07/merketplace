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
}
