<?php

namespace App\Models;

use CodeIgniter\Model;

class GoogleModel extends Model
{
    protected $table = 'tb_google';
    protected $primaryKey = 'id';
    protected $allowedFields = ['google_id', 'email', 'username', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
}
