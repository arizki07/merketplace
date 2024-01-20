<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AdminModel;
use App\Models\GoogleModel;
use CodeIgniter\HTTP\ResponseInterface;
use Google_Client;

class AuthController extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }


    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $adminModel = new AdminModel();
        $userModel = new UserModel();

        // Cek apakah pengguna ada di tabel admin
        $admin = $adminModel->getUserByEmail($email);

        // Jika pengguna tidak ada di tabel admin, cek di tabel user
        if (!$admin) {
            $user = $userModel->getUserByEmail($email);
        }

        // Pilih pengguna berdasarkan tabel
        $selectedUser = $admin ? $admin : $user;

        if ($selectedUser && password_verify($password, $selectedUser['password'])) {
            // Hanya izinkan login jika pengguna sudah terverifikasi
            $session = \Config\Services::session();
            $session->set('auth', true);
            $session->set('email', $selectedUser['email']);
            $session->set('role', $selectedUser['role']);
            $session->set('username', $admin ? $selectedUser['username'] : $selectedUser['username']);

            $session->setFlashdata('success', 'Login successful. Welcome, ' . $selectedUser['username'] . '!');

            switch ($selectedUser['role']) {
                case 'Admin':
                    return redirect()->to('admin/dashboard');
                    break;
                case 'Penyedia':
                    return redirect()->to('penyedia/dashboard');
                    break;
                case 'Pengguna':
                    return redirect()->to('pengguna/dashboard');
                    break;
                default:
                    return redirect()->to('/');
            }
        }

        $session = \Config\Services::session();
        $session->setFlashdata('error', 'Username dan Password Salah');
        return view('auth/login');
    }


    private function initializeGoogleClient()
    {
        $client = new Google_Client();
        $client->setClientId('26584391220-sacp7mudlviacrn21rcg5hmu4pvs4cgu.apps.googleusercontent.com');
        $client->setClientSecret('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');
        $client->setRedirectUri(base_url('google/callback'));
        $client->addScope('email');
        $client->addScope('profile');
        return $client;
    }


    public function loginGoogle()
    {
        $client = $this->initializeGoogleClient();
        $authUrl = $client->createAuthUrl();
        return redirect()->to($authUrl);
    }


    public function googleCallback()
    {
        $client = $this->initializeGoogleClient();
        $code = $this->request->getGet('code');

        if ($code) {
            $token = $client->fetchAccessTokenWithAuthCode($code);
            if (!isset($token['error'])) {
                $oauth2Service = new \Google_Service_Oauth2($client);
                $userInfo = $oauth2Service->userinfo->get();

                $googleModel = new \App\Models\GoogleModel();
                $existingUser = $googleModel->where('google_id', $userInfo->getId())->first();

                if (!$existingUser) {
                    $userData = [
                        'google_id' => $userInfo->getId(),
                        'email' => $userInfo->getEmail(),
                        'name' => $userInfo->getName(),
                    ];
                    $googleModel->insert($userData);
                }
                $session = session();
                $session->set('auth', true);
                $alertMessage = "Selamat datang, " . $userInfo['name'] . "!";
                return redirect()->to('pengguna/dashboard')->with('logSuccess', $alertMessage);
            } else {

                return redirect()->to('login')->with('error', 'Gagal mengotentikasi dengan Google.');
            }
        } else {
            return redirect()->to('login')->with('error', 'Kode otorisasi tidak ditemukan.');
        }
    }


    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
