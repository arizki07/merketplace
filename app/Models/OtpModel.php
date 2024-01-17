<?php

namespace App\Models;

use CodeIgniter\Model;

class OtpModel extends Model
{
    protected $table = 'tb_otp';
    protected $primaryKey = 'id_otp';
    protected $allowedFields = ['otp', 'email', 'created_at'];
}
