<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class LandingController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Jasa Fotografi',
            'active' => 'home'
        ];
        return view('pages/landing-pages', $data);
    }
}
