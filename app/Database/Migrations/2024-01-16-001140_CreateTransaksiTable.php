<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransaksiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi' => [
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
            'jumlah_transaksi' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'metode_pembayaran' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'status_pembayaran' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id_transaksi', true);
        $this->forge->addForeignKey('user_id', 'tb_user', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('pemesanan_id', 'tb_pemesanan', 'id_pemesanan', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_transaksi');
    }
}
