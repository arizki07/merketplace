<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHasilTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_hasil' => [
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
            'pemesanan_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'hasil_foto' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id_hasil', true);
        // $this->forge->addForeignKey('user_id', 'tb_user', 'id_user', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('pemesanan_id', 'tb_pemesanan', 'id_pemesanan', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_hasil');
    }

    public function down()
    {
        $this->forge->dropTable('tb_hasil');
    }
}
