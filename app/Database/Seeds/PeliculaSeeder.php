<?php

namespace App\Database\Seeds;

use App\Models\CategoriaModel;
use App\Models\PeliculaModel;
use CodeIgniter\Database\Seeder;

class PeliculaSeeder extends Seeder
{
    public function run()
    {
        $peliculaModel = new PeliculaModel();
        $categoriaModel = new CategoriaModel();

        $categorias = $categoriaModel->limit(7)->findAll();

    
        $peliculaModel->where('id >=',1)->delete();
        
       
        foreach ($categorias as $categoria) {
            for ($i=0; $i < 20 ; $i++) { 
                $peliculaModel->insert(
                    [
                        'titulo' => "Pelicula $i",
                        'categoria_id' => $categoria->id,
                        'descripcion' => "
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi laborum minima architecto hic odio, veniam accusantium enim id reprehenderit ratione, qui eius. Earum amet vero ipsa nulla cupiditate optio aliquid. $i"
                    ]
                );
            }
        }
    }
}
