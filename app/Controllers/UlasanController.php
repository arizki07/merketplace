<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\PesananModel;
use App\Models\UlasanModel;
use App\Models\ListJasaModel;

class UlasanController extends BaseController
{
    public function index()
    {
        $ulasanModel = new UlasanModel();
        $data['ulasans'] = $ulasanModel->findAll();

        // Fetch user data
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        // Fetch pesanan data
        $pesananModel = new PesananModel();
        $data['pesanans'] = $pesananModel->findAll();

        $jasaModel = new ListJasaModel();
        $data['jasaa'] = $jasaModel->findAll();

        $data = [
            'title' => 'Ulasan',
            'active' => 'ulasan',
            'ulasans' => $data['ulasans'],
            'users' => $data['users'],
            'pesanans' => $data['pesanans'],
            'jasa' => $data['jasaa'],
        ];

        if (session('role') == 'Admin') {
            return view('pages/admin/ulasan/index', $data);
        } elseif (session('role') == 'Penyedia') {
            return view('pages/penyedia/ulasan/index', $data);
        } else {
            return view('pages/admin/ulasan/index', $data);
        }
    }

    public function ulasan()
    {
        $ulasanModel = new UlasanModel();
        $data = [
            'user_id' => $this->request->getpost('user_id'),
            'pemesanan_id' => $this->request->getpost('pemesanan_id'),
            'ulasan' => $this->request->getpost('ulasan'),
        ];

        $check = $ulasanModel->where('user_id', $data['user_id'])->where('pemesanan_id', $data['pemesanan_id'])->first();

        if ($check) {
            return redirect()->to('shop/cart')->with('error-dua', 'Anda sudah mengisi ulasan ini!');
        }

        $ulasanModel->insert($data);

        session()->setFlashdata('success-dua', 'Ulasan berhasil ditambahkan!');
        return redirect()->to('shop/cart');
    }

    public function delete($id)
    {
        // Proses menghapus ulasan
        $ulasanModel = new UlasanModel();
        $ulasanModel->delete($id);

        return redirect()->to('admin/ulasan')->with('success', 'Ulasan berhasil dihapus');
    }
}
