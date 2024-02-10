<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BiodataModel;
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
            // $session->set('id_user', $selectedUser['id_user']);
            $session->set('role', $selectedUser['role']);
            $session->set('username', $admin ? $selectedUser['username'] : $selectedUser['username']);

            $session->setFlashdata('success', 'Login successful. Welcome, ' . $selectedUser['username'] . '!');

            switch ($selectedUser['role']) {
                case 'Admin':
                    return redirect()->to('admin/dashboard');
                    break;
                case 'Penyedia':
                    $userModel = new UserModel();
                    $biodataModel = new BiodataModel();

                    $userData = $userModel->getUserById($user['id_user']);

                    if (!empty($userData)) {
                        $biodataData = $biodataModel->getBiodataByUserId($user['id_user']);

                        if (!empty($biodataData)) {
                            $session->set('user_id', $biodataData['id_biodata']);
                            $session->set('user_id_biodata', $userData['id_user']);
                            $session->set('role', $userData['role']);
                            return redirect()->to('penyedia/dashboard');
                        } else {
                            $session->set('user_id_biodata', $userData['id_user']);
                            $session->set('nama', $userData['username']);
                            $session->set('email', $userData['email']);
                            $session->set('status', $userData['status']) ?? 0;
                            return redirect()->to('penyedia/profile/create');
                        }
                    } else {
                        return redirect()->to('login')->with('error', 'User tidak ditemukan.');
                    }
                    break;
                case 'Pengguna':
                    $userModel = new UserModel();
                    $biodataModel = new BiodataModel();

                    $userData = $userModel->getUserById($user['id_user']);

                    // if (!empty($userData)) {
                    $biodataData = $biodataModel->getBiodataByUserId($userData['id_user']);
                    $session->set('biodata_id', $biodataData['id_biodata'] ?? null);
                    // $session->set('user_id_biodata', $userData['id_user']);
                    $session->set('role', $userData['role']);
                    $session->set('user_id_biodata', $userData['id_user']);
                    $session->set('nama', $userData['username'] ?? null);
                    $session->set('no_telepon', $biodataData['no_telepon'] ?? null);
                    $session->set('tanggal_lahir', $biodataData['tanggal_lahir'] ?? date('Y-m-d'));
                    $session->set('alamat', $biodataData['alamat'] ?? null);
                    $session->set('nomor_ktp', $biodataData['nomor_ktp'] ?? null);
                    $session->set('foto_ktp', $biodataData['foto_ktp'] ?? null);
                    $session->set('email', $userData['email']);
                    $session->set('status', $userData['status']);

                    return redirect()->to('/');
                    // } else {
                    //     return redirect()->to('login')->with('error', 'User tidak ditemukan.');
                    // }
                    break;
                default:
                    return redirect()->to('/');
            }
        }

        $session = \Config\Services::session();
        $session->setFlashdata('error', 'Username dan Password Salah');
        return view('auth/login');
    }

    public function login_pengguna()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $id = $this->request->getPost('id_jasa');

        $userModel = new UserModel();
        $user = $userModel->getUserByEmail($email);

        if (empty($user)) {
            $session = \Config\Services::session();
            $session->setFlashdata('error-dua', 'Email tidak terdaftar!');
            return redirect()->to('shop/fotografi/detail/' . $id);
        }

        if ($user['role'] === 'Pengguna') {
            if (password_verify($password, $user['password'])) {

                $session = \Config\Services::session();
                $session->set('auth', true);
                $session->set('id_user', $user['id_user']);
                $session->set('email', $user['email']);
                $session->set('role', $user['role']);
                $session->set('username', $user['username']);

                $userModel = new UserModel();
                $biodataModel = new BiodataModel();

                $userData = $userModel->getUserById($user['id_user']);

                // if (!empty($userData)) {
                $biodataData = $biodataModel->getBiodataByUserId($userData['id_user']);
                $session->set('biodata_id', $biodataData['id_biodata'] ?? null);
                $session->set('user_id_biodata', $userData['id_user'] ?? null);
                $session->set('nama', $userData['username'] ?? null);
                $session->set('no_telepon', $biodataData['no_telepon'] ?? null);
                $session->set('tanggal_lahir', $biodataData['tanggal_lahir'] ?? date('Y-m-d'));
                $session->set('alamat', $biodataData['alamat'] ?? null);
                $session->set('nomor_ktp', $biodataData['nomor_ktp'] ?? null);
                $session->set('foto_ktp', $biodataData['foto_ktp'] ?? null);
                // $session->set('email', $userData['email']);
                $session->set('status', $userData['status']);

                $session->setFlashdata('success-dua', 'Berhasil!. Status anda sekarang sudah login.');
                return redirect()->to('shop/product/detail/' . $id);
            }

            $session = \Config\Services::session();
            $session->setFlashdata('error-dua', 'Email atau Password Salah!');
            return redirect()->to('shop/product/detail/' . $id);
        } else {
            $session = \Config\Services::session();
            $session->setFlashdata('error-dua', 'Login gagal. Email terdaftar di role lain.');
            return redirect()->to('shop/product/detail/' . $id);
        }
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
        return redirect()->to('/')->with('success', 'Anda berhasil logout');
    }
}
