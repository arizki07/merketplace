<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table            = 'tb_admin';
    protected $primaryKey       = 'id_admin';
    protected $allowedFields    = ['username', 'tanggal_lahir', 'email', 'no_telepon', 'status', 'alamat', 'password', 'foto_profile'];

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
