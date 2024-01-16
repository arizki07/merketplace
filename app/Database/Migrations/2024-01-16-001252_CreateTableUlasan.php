<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUlasan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ulasan' => [
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
            'ulasan' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id_ulasan', true);
        // $this->forge->addForeignKey('user_id', 'tb_user', 'id_user', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('pemesanan_id', 'tb_pemesanan', 'id_pemesanan', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_ulasan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_ulasan');
    }
}
