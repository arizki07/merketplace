<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\PesananModel;
use App\Models\UlasanModel;

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

        $data = [
            'title' => 'Ulasan',
            'active' => 'ulasan',
            'ulasans' => $data['ulasans'],
            'users' => $data['users'],
            'pesanans' => $data['pesanans'],
        ];

        return view('pages/admin/ulasan/index', $data);
    }

    public function delete($id)
    {
        // Proses menghapus ulasan
        $ulasanModel = new UlasanModel();
        $ulasanModel->delete($id);

        return redirect()->to('admin/ulasan')->with('success', 'Ulasan berhasil dihapus');
    }
}
