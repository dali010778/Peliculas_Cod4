<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PeliculaEtiquetas extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'pelicula_id' => [
                    'type'           => 'INT',
                    'constraint'     => 5, 
                    'unsigned'       => true
                ],
                'etiqueta_id' => [
                    'type'           => 'INT',
                    'constraint'     => 5, 
                    'unsigned'       => true
                ],
            ]
        );
        $this->forge->addForeignKey('pelicula_id', 'peliculas','id','CASCADE','CASCADE'); 
        $this->forge->addForeignKey('etiqueta_id', 'etiquetas','id','CASCADE','CASCADE'); 
        $this->forge->createTable('pelicula_etiquetas');
    }

    public function down()
    {
        $this->forge->dropTable('pelicula_etiquetas');
    }
}
