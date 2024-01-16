<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePemesananTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pemesanan' => [
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
            'jasa_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'alamat_pemesanan' => [
                'type' => 'TEXT',
            ],
            'tanggal_pelaksanaan' => [
                'type' => 'DATE',
            ],
            'no_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id_pemesanan', true);
        // $this->forge->addForeignKey('user_id', 'tb_user', 'id_user', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('biodata_id', 'tb_biodata', 'id_biodata', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('jasa_id', 'tb_jasa', 'id_jasa', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_pemesanan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_pemesanan');
    }
}
