<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Department extends Migration
{
   public function up()
    {
    $this->forge->addField([
            'id'=>['type'=>'int',
            'auto_increment'=>true,
            'unsigned'=>true,
        ],
        'departName'=>['type'=>'varchar','constraint'=>'40'];
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('departments');
    }
    public function down()
    {
      $this->forge->dropTable('departments');
    }
}
