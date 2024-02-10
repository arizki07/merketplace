<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ListJasaModel;
use App\Models\BiodataModel;
use App\Models\UserModel;
use App\Models\TransaksiModel;
use App\Models\PesananModel;

class ShopController extends BaseController
{
    public function fotografi()
    {
        $jasaModel = new ListJasaModel();
        $jasa = $jasaModel->findAll();

        $data = [
            'jasa' => $jasa,
            'title' => 'Layanan Fotografi',
            'active' => 'fotografi'
        ];

        return view('pages/pengguna/fotografi', $data);
    }

    public function videografi()
    {
        $jasaModel = new ListJasaModel();
        $jasa = $jasaModel->findAll();

        $data = [
            'jasa' => $jasa,
            'title' => 'Layanan Videografi',
            'active' => 'videografi'
        ];

        return view('pages/pengguna/videografi', $data);
    }

    public function detail($id)
    {
        $jasaModel = new ListJasaModel();
        $jasaData = $jasaModel->find($id);

        $biodataModel = new BiodataModel();
        $biodata = $biodataModel->findAll();

        // $session->set('session_jasa', $jasaData['id_jasa']);

        $userModel = new UserModel();
        $user = $userModel->findAll();

        $data = [
            'title' => 'Detail Jasa',
            'active' => 'videografi',
            'jasa'  => $jasaData,
            'biodata'  => $biodata,
            'user'  => $user,
        ];

        return view('pages/pengguna/detail', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Kontak Kami',
            'active' => 'contact'
        ];

        return view('pages/contact', $data);
    }

    public function cart()
    {
        $jasaModel = new ListJasaModel();
        $jasaData = $jasaModel->findAll();

        $biodataModel = new BiodataModel();
        $biodata = $biodataModel->findAll();

        $userModel = new UserModel();
        $user = $userModel->findAll();

        $transaksiModel = new TransaksiModel();
        $transaksi = $transaksiModel->findAll();

        $pesananModel = new PesananModel();
        $pesanan = $pesananModel->findAll();

        $data = [
            'title' => 'Hystori',
            'active' => 'cart',
            'jasa'  => $jasaData,
            'biodata'  => $biodata,
            'user'  => $user,
            'pesanan'  => $pesanan,
            'transaksi'  => $transaksi,
        ];

        return view('pages/pengguna/cart', $data);
    }
}
