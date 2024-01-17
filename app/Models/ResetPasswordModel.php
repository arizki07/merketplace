<?php

namespace App\Models;

use CodeIgniter\Model;

class ResetPasswordModel extends Model
{
    protected $table = 'tb_reset_password';
    protected $primaryKey = 'id_reset_pass';
    protected $allowedFields = ['id_user', 'token', 'expires_at', 'created_at'];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    public function getResetDataByToken($token)
    {
        return $this->where('token', $token)
            ->first();
    }
}
