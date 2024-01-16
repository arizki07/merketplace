<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => password_hash('Admin.123', PASSWORD_DEFAULT),
                'role' => 'admin',
            ],
            [
                'username' => 'Penyedia',
                'email' => 'penyedia@gmail.com',
                'password' => password_hash('penyedia', PASSWORD_DEFAULT),
                'role' => 'penyedia Jasa',
            ],
            [
                'username' => 'Pengguna',
                'email' => 'pengguna@gmail.com',
                'password' => password_hash('pengguna', PASSWORD_DEFAULT),
                'role' => 'pengguna jasa',
            ],

        ];

        $this->db->table('tbl_user')->insertBatch($data);
    }
}
