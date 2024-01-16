<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BiodataController extends BaseController
{
    public function penyedia()
    {
        $data = [
            'title' => 'Penyedia Jasa',
            'active' => 'penyedia',
        ];
        return view('pages/admin/biodata/penyedia', $data);
    }

    public function pengguna()
    {
        $data = [
            'title' => 'Pengguna Jasa',
            'active' => 'pengguna',
        ];
        return view('pages/admin/biodata/pengguna', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add-Pengguna',
            'active' => 'pengguna',
        ];
        return view('pages/admin/biodata/crud/add-pengguna', $data);
    }
}
