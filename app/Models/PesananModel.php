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

    // public function jasa()
    // {
    //     return $this->belongsTo(ListJasaModel::class, 'jasa_id', 'id_jasa');
    // }

    public function jasa()
    {
        return $this->join('tb_jasa', 'tb_jasa.id_jasa = tb_pemesanan.jasa_id')
            ->select('tb_pemesanan.*, tb_jasa.nama_jasa')
            ->get()
            ->getResult();
    }
}
