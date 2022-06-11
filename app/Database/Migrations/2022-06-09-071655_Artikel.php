<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Artikel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_posting' => [
                'type' => 'INT',
                'constraint' => 12,
                'auto_increment' => true
            ],
            'title' => [
                'type' => 'LONGTEXT',
            ],
            'description' => [
                'type' => 'LONGTEXT',
            ],
            'post_type' => [
                'type' => 'INT',
                'constraint' => 4,
            ],
            'user' => [
                'type' => 'INT',
                'constraint' => 12
            ]
        ]);
        $this->forge->addKey('id_posting', true);
        $this->forge->createTable('posting');
    }

    public function down()
    {
        //
    }
}
