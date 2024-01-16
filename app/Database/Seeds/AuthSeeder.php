<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'Administrator',
            'tanggal_lahir' => '2000-01-01',
            'email' => 'admin@gmail.com',
            'no_telepon' => '1234567890',
            'status' => '1',
            'alamat' => 'Cirebon',
            'password' => password_hash('Admin.123', PASSWORD_DEFAULT),
            'foto_profil' => 'admin.jpg',
        ];

        // Using Query Builder
        $this->db->table('tb_admin')->insert($data);
    }
}
