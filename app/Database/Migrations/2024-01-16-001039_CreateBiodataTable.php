<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBiodataTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_biodata' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'no_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'nomor_ktp' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'foto_ktp' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id_biodata', true);
        $this->forge->addForeignKey('user_id', 'tb_user', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_biodata');
    }

    public function down()
    {
        $this->forge->dropTable('tb_biodata');
    }
}
