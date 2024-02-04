<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\BiodataModel;
use App\Models\GoogleModel;
use App\Models\ListjasaModel;
use App\Models\OtpModel;
use App\Models\PesananModel;
use App\Models\TransaksiModel;
use App\Models\UlasanModel;

class DashboardController extends BaseController
{
    protected $userModel;
    protected $biodataModel;
    protected $googleModel;
    protected $listjasaModel;
    protected $otpModel;
    protected $pesananModel;
    protected $transaksiModel;
    protected $ulasanModel;

    public function __construct()
    {
        // Load the models in the constructor
        $this->userModel = new UserModel();
        $this->biodataModel = new BiodataModel();
        $this->googleModel = new GoogleModel();
        $this->listjasaModel = new ListjasaModel();
        $this->otpModel = new OtpModel();
        $this->pesananModel = new PesananModel();
        $this->transaksiModel = new TransaksiModel();
        $this->ulasanModel = new UlasanModel();
    }

    public function index()
    {
        if (session('role') == 'Admin') {
            $userCount = $this->userModel->countAll();
            $biodataCount = $this->biodataModel->countAll();
            $biodata = $this->biodataModel->findAll();
            $penyediaCount = $this->biodataModel
                ->join('tbl_user', 'tbl_user.id_user = tb_biodata.user_id')
                ->where('tbl_user.role', 'Penyedia')
                ->countAllResults();

            $penggunaCount = $this->biodataModel
                ->join('tbl_user', 'tbl_user.id_user = tb_biodata.user_id')
                ->where('tbl_user.role', 'Pengguna')
                ->countAllResults();

            $googleCount = $this->googleModel->countAll();
            $listjasaCount = $this->listjasaModel->countAll();
            $jasa = $this->listjasaModel->findAll();
            $otpCount = $this->otpModel->countAll();
            $pesananCount = $this->pesananModel->countAll();
            $pesanan = $this->pesananModel->findAll();

            $transaksiCount = $this->transaksiModel->countAll();
            $transaksi = $this->transaksiModel->findAll();
            $successCount = $this->transaksiModel->where('status_pembayaran', 'Success')->countAllResults();
            $failedPendingCount = $this->transaksiModel
                ->whereIn('status_pembayaran', ['Failed', 'Pending'])
                ->countAllResults();

            $totalJumlahTransaksi = $this->transaksiModel->selectSum('jumlah_transaksi')->get()->getRow()->jumlah_transaksi;
            $formattedTotalJumlahTransaksi = 'Rp ' . number_format($totalJumlahTransaksi, 0, ',', '.');
            $ulasanCount = $this->ulasanModel->countAll();
            $ulasan = $this->ulasanModel->findAll();

            $data = [
                'title' => 'Dashboard',
                'active' => 'dashboard',
                'userCount' => $userCount,
                'biodataCount' => $biodataCount,
                'biodata' => $biodata,
                'penyediaCount' => $penyediaCount,
                'penggunaCount' => $penggunaCount,
                'googleCount' => $googleCount,
                'listjasaCount' => $listjasaCount,
                'jasa' => $jasa,
                'otpCount' => $otpCount,
                'pesananCount' => $pesananCount,
                'pesanan' => $pesanan,
                'transaksiCount' => $transaksiCount,
                'transaksi' => $transaksi,
                'successCount' => $successCount,
                'failedPendingCount' => $failedPendingCount,
                'ulasanCount' => $ulasanCount,
                'ulasan' => $ulasan,
                'formattedTotalJumlahTransaksi' => $formattedTotalJumlahTransaksi,
            ];
            return view('pages/dashboard', $data);
        } elseif (session('role') == 'Penyedia') {
            $userCount = $this->userModel->countAll();
            $biodataCount = $this->biodataModel->countAll();
            $biodata = $this->biodataModel->findAll();
            $penyediaCount = $this->biodataModel
                ->join('tbl_user', 'tbl_user.id_user = tb_biodata.user_id')
                ->where('tbl_user.role', 'Penyedia')
                ->countAllResults();

            $penggunaCount = $this->biodataModel
                ->join('tbl_user', 'tbl_user.id_user = tb_biodata.user_id')
                ->where('tbl_user.role', 'Pengguna')
                ->countAllResults();

            $googleCount = $this->googleModel->countAll();
            $listjasaCount = $this->listjasaModel->countAll();
            $jasa = $this->listjasaModel->findAll();
            $otpCount = $this->otpModel->countAll();
            $pesananCount = $this->pesananModel->countAll();
            $pesanan = $this->pesananModel->findAll();

            $transaksiCount = $this->transaksiModel->countAll();
            $transaksi = $this->transaksiModel->findAll();

            $user_id_biodata = session('user_id_biodata');
            $successCount = $this->transaksiModel
                ->where('user_id', $user_id_biodata)
                ->where('status_pembayaran', 'Success')
                ->countAllResults();

            $failedPendingCount = $this->transaksiModel
                ->where('user_id', $user_id_biodata)
                ->whereIn('status_pembayaran', ['Failed', 'Pending'])
                ->countAllResults();
            $totalJumlahTransaksi = $this->transaksiModel
                ->where('user_id', $user_id_biodata)
                ->selectSum('jumlah_transaksi')
                ->get()
                ->getRow()
                ->jumlah_transaksi;

            $formattedTotalJumlahTransaksi = 'Rp ' . number_format($totalJumlahTransaksi, 0, ',', '.');
            $ulasanCount = $this->ulasanModel->countAll();
            $ulasan = $this->ulasanModel->findAll();

            $data = [
                'title' => 'Dashboard',
                'active' => 'dashboard',
                'userCount' => $userCount,
                'biodataCount' => $biodataCount,
                'biodata' => $biodata,
                'penyediaCount' => $penyediaCount,
                'penggunaCount' => $penggunaCount,
                'googleCount' => $googleCount,
                'listjasaCount' => $listjasaCount,
                'jasa' => $jasa,
                'otpCount' => $otpCount,
                'pesananCount' => $pesananCount,
                'pesanan' => $pesanan,
                'transaksiCount' => $transaksiCount,
                'transaksi' => $transaksi,
                'successCount' => $successCount,
                'failedPendingCount' => $failedPendingCount,
                'ulasanCount' => $ulasanCount,
                'ulasan' => $ulasan,
                'formattedTotalJumlahTransaksi' => $formattedTotalJumlahTransaksi,
            ];
            return view('pages/dashboard', $data);
        } else {
            return view('pages/dashboard', $data);
        }
    }
}
