<?php

namespace App\Models;

use CodeIgniter\Model;

class EtiquetaPeliculaModel extends Model
{
    protected $table            = 'pelicula_etiquetas';
    protected $returnType       = 'object';
    protected $allowedFields    = ['pelicula_id','etiqueta_id'];

    
}
