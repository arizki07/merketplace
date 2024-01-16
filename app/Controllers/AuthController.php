<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AdminModel;
use CodeIgniter\HTTP\ResponseInterface;

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
            if ($selectedUser['status'] == 1) {
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
                    case 'Penyedia Jasa':
                        return redirect()->to('penyedia/dashboard');
                        break;
                    case 'Pengguna Jasa':
                        return redirect()->to('pengguna/dashboard');
                        break;
                    default:
                        return redirect()->to('/');
                }
            } else {
                // Jika pengguna belum terverifikasi, kirimkan pesan flash
                $session = \Config\Services::session();
                $session->setFlashdata('error', 'Akun Anda belum terverifikasi oleh admin.');
                return redirect()->to('/login'); // Ganti dengan halaman login
            }
        }

        $session = \Config\Services::session();
        $session->setFlashdata('error', 'Username dan Password Salah');
        return view('auth/login');
    }

    public function register()
    {
        if ($this->request->getMethod() === 'post') {
            // Validasi input form, sesuaikan dengan kebutuhan Anda
            $validation = \Config\Services::validation();
            $validation->setRules([
                'username' => 'required|min_length[3]|max_length[255]',
                'email' => 'required|valid_email|is_unique[tbl_user.email]',
                'password' => 'required|min_length[6]',
                'role' => 'required',
            ]);

            if ($validation->withRequest($this->request)->run()) {
                // Jika validasi sukses, simpan data ke dalam database
                $userModel = new UserModel();

                $data = [
                    'username' => $this->request->getPost('username'),
                    'email' => $this->request->getPost('email'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    'role' => $this->request->getPost('role'),
                    'status' => 0, // Sesuaikan dengan kebutuhan Anda, mungkin perlu verifikasi admin
                ];

                $userModel->insert($data);

                // Tambahkan logika verifikasi atau kirim email verifikasi di sini

                // Redirect atau tampilkan pesan sukses
                return redirect()->to('/login')->with('success', 'Akun berhasil dibuat. Mohon menunggu verifikasi admin.');
            } else {
                // Jika validasi gagal, tampilkan pesan error
                return view('auth/register', ['validation' => $validation]);
            }
        }

        // Tampilkan halaman registrasi jika bukan metode POST
        return view('auth/register');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
