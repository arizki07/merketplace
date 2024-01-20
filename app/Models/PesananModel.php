<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table            = 'tb_pemesanan';
    protected $primaryKey       = 'id_pemesanan';
    protected $allowedFields    = [
        'user_id',
        'biodata_id',
        'jasa_id',
        'alamat_pemesanan',
        'tanggal_pelaksanaan',
        'no_telepon',
        'created_at',
    ];
}
