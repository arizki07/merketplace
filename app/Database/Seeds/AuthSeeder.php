<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthSeeder extends Seeder
{
    public function run()
    {
        $adminData = [
            'username' => 'Administrator',
            'tanggal_lahir' => '2000-01-01',
            'email' => 'mosyahizuku@gmail.com',
            'no_telepon' => '1234567890',
            'status' => '1',
            'alamat' => 'Cirebon',
            'password' => password_hash('Admin.123', PASSWORD_DEFAULT),
            'foto_profil' => 'admin.jpg',
        ];

        $userData = [
            [
                'username' => 'pengguna@gmail.com',
                'email' => 'User Pengguna Jasa',
                'status' => 'Active',
                'role' => 'Pengguna',
                'password' => password_hash('Pengguna.123', PASSWORD_DEFAULT)
            ],
            [
                'username' => 'penyedia@gmail.com',
                'email' => 'User Penyedia Jasa',
                'status' => 'Active',
                'role' => 'Penyedia',
                'password' => password_hash('Penyedia.123', PASSWORD_DEFAULT)
            ],
        ];

        $this->db->table('tb_admin')->insertBatch($adminData);
        $this->db->table('tbl_user')->insertBatch($userData, true);
    }
}
