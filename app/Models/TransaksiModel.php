<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table            = 'tb_transaksi';
    protected $primaryKey       = 'id_transaksi';
    protected $allowedFields    = [
        'user_id',
        'pemesanan_id',
        'jumlah_transaksi',
        'metode_pembayaran',
        'status_pembayaran',
        'create_at',
    ];
}
