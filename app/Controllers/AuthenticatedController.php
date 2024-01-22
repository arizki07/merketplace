<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\GoogleModel;
use App\Models\OtpModel;

class AuthenticatedController extends BaseController
{
    public function google()
    {
        $googleModel = new GoogleModel();
        $data = [
            'title' => 'Data Google',
            'active' => 'google',
            'google' => $googleModel->findAll(),
        ];

        return view('pages/admin/google/index', $data);
    }

    public function otp()
    {
        $otpModel = new OtpModel();
        $data = [
            'title' => 'Data OTP',
            'active' => 'otp',
            'otp' => $otpModel->findAll(),
        ];

        return view('pages/admin/google/otp', $data);
    }

    public function deleteGoogle($id)
    {
        $googleModel = new GoogleModel();
        $googleModel->delete($id);

        return redirect()->to('admin/google')->with('success', 'Data google berhasil di hapus');
    }

    public function deleteOtp($id)
    {
        $otpModel = new OtpModel();
        $otpModel->delete($id);

        return redirect()->to('admin/otp')->with('success', 'Data OTP berhasil di hapus');
    }
}
