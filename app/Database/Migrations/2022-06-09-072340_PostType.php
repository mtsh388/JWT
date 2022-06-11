<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PostType extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_post_type' => [
                'type' => 'INT',
                'constraint' => 4,
                'auto_increment' => true
            ],
            'jenis' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ]
        ]);
        $this->forge->addKey('id_post_type', true);
        $this->forge->createTable('post_type');
    }

    public function down()
    {
        //
    }
}
