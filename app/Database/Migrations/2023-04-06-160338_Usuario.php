<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Usuario extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'rol'           => ['type' => 'varchar', 'constraint' => 20],
            'codigo'        => ['type' => 'varchar', 'constraint' => 20, 'unique' => true, 'null' => true],
            'nombre'        => ['type' => 'varchar', 'constraint' => 50],
            'apaterno'      => ['type' => 'varchar', 'constraint' => 50],
            'amaterno'      => ['type' => 'varchar', 'constraint' => 50],
            'email'         => ['type' => 'varchar', 'constraint' => 100, 'unique' => true],
            'password'      => ['type' => 'varchar', 'constraint' => 255],
            'foto'          => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'sexo'          => ['type' => 'enum', 'constraint' => ['Hombre', 'Mujer'], 'default' => 'Mujer'],
            'created_at'    => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'    => ['type' => 'timestamp', 'null' => true],
            'deleted_at'    => ['type' => 'timestamp', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('usuarios', true);
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('usuarios', true);
    }
}
