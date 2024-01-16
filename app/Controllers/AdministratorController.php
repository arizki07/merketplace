<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class AdministratorController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data = [
            'title' => 'Administrator',
            'active' => 'administrator',
            'users' => $userModel->findAll(), // Ambil semua data pengguna dari model
        ];

        return view('pages/admin/administrator/index', $data);
    }


    public function verifyUser($userId)
    {
        // Anda perlu menambahkan logika keamanan di sini, seperti memastikan hanya admin yang dapat mengakses fungsi ini

        $userModel = new UserModel();
        $userModel->update($userId, ['status' => 1]); // Status diubah menjadi terverifikasi

        // Tampilkan pesan sukses atau redirect ke halaman pengelolaan pengguna
        $session = \Config\Services::session();
        $session->setFlashdata('success', 'Pengguna berhasil diverifikasi.');
        return redirect()->to('admin/administrator');
    }
}
