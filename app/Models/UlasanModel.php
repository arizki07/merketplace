<?php

namespace App\Models;

use CodeIgniter\Model;

class UlasanModel extends Model
{
    protected $table            = 'tb_ulasan';
    protected $primaryKey       = 'id_ulasan';
    protected $allowedFields    = [
        'user_id',
        'pesanan_id',
        'ulasan',
        'create_at',
    ];

    public function getUserByPesananId($pesanan_id)
    {
        return $this->select('tb_ulasan.*, tb_pemesanan.alamat_pemesanan, tb_jasa.nama_jasa')
            ->join('tb_pemesanan', 'tb_pemesanan.id_pemesanan = tb_ulasan.pesanan_id')
            ->where('tb_ulasan.pesanan_id', $pesanan_id)
            ->first();
    }
}
