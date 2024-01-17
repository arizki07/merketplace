<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOtpTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_otp' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'otp' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id_otp');
        $this->forge->createTable('tb_otp');
    }

    public function down()
    {
        $this->forge->dropTable('tb_otp');
    }
}
