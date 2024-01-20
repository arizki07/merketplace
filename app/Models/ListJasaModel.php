<?php

namespace App\Models;

use CodeIgniter\Model;

class ListJasaModel extends Model
{
    protected $table            = 'tb_jasa';
    protected $primaryKey       = 'id_jasa';
    protected $allowedFields    = [
        'user_id',
        'biodata_id',
        'nama_jasa',
        'jenis_jasa',
        'harga_jasa',
        'jumlah_foto',
        'lokasi',
        'no_telepon',
        'testimoni_foto',
        'created_at',
    ];
}
