<?php

namespace App\Models;

use CodeIgniter\Model;

class BiodataModel extends Model
{
    protected $table = 'tb_biodata';
    protected $primaryKey = 'id_biodata';

    protected $allowedFields = [
        'user_id',
        'no_telepon',
        'nama_lengkap',
        'tanggal_lahir',
        'alamat',
        'nomor_ktp',
        'foto_ktp',
    ];

    public function getBiodataWithUser($user_id)
    {
        return $this->select('tb_biodata.*, tbl_user.username,  tbl_user.status, tbl_user.email, tbl_user.role')
            ->join('tbl_user', 'tbl_user.id_user = tb_biodata.user_id')
            ->where('tb_biodata.user_id', $user_id)
            ->first();
    }

    public function getBiodataByUserId($id_user)
    {
        return $this->where('user_id', $id_user)->first();
    }
}
