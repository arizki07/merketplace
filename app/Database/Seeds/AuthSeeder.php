<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthSeeder extends Seeder
{
    public function run()
    {
        $adminData = [
            [
                'username' => 'Administrator',
                'tanggal_lahir' => '2000-01-01',
                'email' => 'webcrafser@gmail.com',
                'no_telepon' => '1234567890',
                'status' => '1',
                'alamat' => 'Cirebon',
                'password' => password_hash('Admin.123', PASSWORD_DEFAULT),
                'foto_profil' => 'admin.jpg',
            ],
        ];

        // $userData = [
        //     [
        //         'username' => 'M Aldi Ajah',
        //         'email' => 'ajaa0457@gmail.com',
        //         'status' => '0',
        //         'role' => 'Pengguna',
        //         'password' => password_hash('Pengguna.123', PASSWORD_DEFAULT)
        //     ],
        //     [
        //         'username' => 'Riko Simanjuntak',
        //         'email' => 'mosyahicenter@gmail.com',
        //         'status' => '0',
        //         'role' => 'Penyedia',
        //         'password' => password_hash('Penyedia.123', PASSWORD_DEFAULT)
        //     ],
        // ];

        $this->db->table('tb_admin')->insertBatch($adminData);
        // $this->db->table('tbl_user')->insertBatch($userData, true);

        $user = [
            [
                'username' => 'provider1',
                'email' => 'provider1@example.com',
                'password' => password_hash('Penyedia.123', PASSWORD_DEFAULT),
                'role' => 'Penyedia',
                'status' => 'active'
            ],
        ];
        $this->db->table('tbl_user')->insertBatch($user);
    }
}
