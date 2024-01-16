<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'  => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'role' => [
                'type' => 'ENUM',
                'constraint' => ['Admin', 'Pengguna Jasa', 'Penyedia Jasa'],
            ],
            'status' => [
                'type' => 'INT', 'constraint' => 1, 'default' => 0
            ],
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('tbl_user');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_user');
    }
}
