<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TransaksiController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Transaksi',
            'active' => 'transaksi',
        ];
        return view('pages/admin/transaksi/index', $data);
    }
}
