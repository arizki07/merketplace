<?php

namespace App\Models;

use CodeIgniter\Model;

class UlasanModel extends Model
{
    protected $table            = 'tb_ulasan';
    protected $primaryKey       = 'id_ulasan';
    protected $allowedFields    = [
        'user_id',
        'pemesanan_id',
        'ulasan',
    ];

    public function getUserByPesananId($pemesanan_id)
    {
        return $this->select('tb_ulasan.*, tb_pemesanan.alamat_pemesanan, tb_jasa.nama_jasa, tbl_user.username')
            ->join('tb_pemesanan', 'tb_pemesanan.id_pemesanan = tb_ulasan.pemesanan_id')
            ->join('tb_jasa', 'tb_jasa.id_jasa = tb_pemesanan.jasa_id')
            ->join('tbl_user', 'tbl_user.id_user = tb_ulasan.user_id')
            ->where('tb_ulasan.pemesanan_id', $pemesanan_id)
            ->first();
    }
}
