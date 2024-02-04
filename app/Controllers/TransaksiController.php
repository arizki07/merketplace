<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\PesananModel;
use App\Models\TransaksiModel;

class TransaksiController extends BaseController
{
    public function index()
    {
        $transaksiModel = new TransaksiModel();
        $data['transaksis'] = $transaksiModel->findAll();

        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        $pesananModel = new PesananModel();
        $data['pesanans'] = $pesananModel->findAll();

        $data = [
            'title' => 'Transaksi',
            'active' => 'transaksi',
            'transaksis' => $data['transaksis'],
            'users' => $data['users'],
            'pesanans' => $data['pesanans'],
        ];

        if (session('role') == 'Admin') {
            return view('pages/admin/transaksi/index', $data);
        } elseif (session('role') == 'Penyedia') {
            return view('pages/penyedia/transaksi/index', $data);
        } else {
            return view('pages/pengguna/transaksi/index', $data);
        }
    }

    public function delete($id)
    {
        $transaksiModel = new TransaksiModel();
        $transaksiModel->delete($id);

        return redirect()->to('admin/transaksi')->with('success', 'Data transaksi berhasil di delete');
    }
}
