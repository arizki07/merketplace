<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ListJasaModel;
use App\Models\BiodataModel;
use App\Models\UserModel;

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

    public function detailFotografi($id)
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
            'active' => 'fotografi',
            'jasa'  => $jasaData,
            'biodata'  => $biodata,
            'user'  => $user,
        ];

        return view('pages/pengguna/detail', $data);
    }
}
