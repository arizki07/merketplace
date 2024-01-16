<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdminTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'no_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'status' => [
                'type' => 'INT', 'constraint' => 1, 'default' => 0
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'role' => [
                'type' => 'ENUM',
                'constraint' => ['Admin'],
            ],
            'foto_profil' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id_admin', true);
        $this->forge->createTable('tb_admin');
    }

    public function down()
    {
        $this->forge->dropTable('tb_admin');
    }
}
