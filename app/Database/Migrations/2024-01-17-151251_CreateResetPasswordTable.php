<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateResetPasswordTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_reset_pass' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'token' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'expires_at' => [
                'type' => 'DATETIME',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id_reset_pass', true);
        // $this->forge->addForeignKey('user_id', 'tb_user', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_reset_password');
    }

    public function down()
    {
        $this->forge->dropTable('tb_reset_password');
    }
}
