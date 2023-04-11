<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Asignatura extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nombre'        => ['type' => 'varchar', 'constraint' => 255],
            'descripcion'   => ['type' => 'text', 'constraint' => true],
            'creditos'      => ['type' => 'int'],
            'horasSemana'   => ['type' => 'int'],
            'temario'       => ['type' => 'text'],
            'created_at'    => ['type' => 'timestamp', 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'    => ['type' => 'timestamp', 'null' => true],
            'deleted_at'    => ['type' => 'timestamp', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('asignaturas', true);
    }

    public function down()
    {
        $this->forge->dropTable('asignaturas', true);
    }
}
