<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJasaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jasa' => [
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
            'biodata_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'nama_jasa' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'jenis_jasa' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'harga_jasa' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'jumlah_foto' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'lokasi' => [
                'type' => 'TEXT',
            ],
            'no_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'testimoni_foto' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id_jasa', true);
        // $this->forge->addForeignKey('user_id', 'tb_user', 'id_user', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('biodata_id', 'tb_biodata', 'id_biodata', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_jasa');
    }

    public function down()
    {
        $this->forge->dropTable('tb_jasa');
    }
}
