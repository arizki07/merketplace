<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'tbl_user';
    protected $primaryKey       = 'id_user';
    protected $allowedFields    = ['username', 'email', 'password', 'role', 'status'];

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function biodata()
    {
        return $this->hasOne(BiodataModel::class, 'user_id', 'id_user');
    }

    public function getUserById($id_user)
    {
        return $this->where('id_user', $id_user)->first();
    }
}