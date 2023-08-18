<?php

namespace App\Controllers;

use App\Models\PeliculaModel;

class Pelicula extends BaseController
{
    public function index()
    {
       $peliculaModel = new PeliculaModel();


        return view('pelicula/index',[
            'peliculas' => $peliculaModel->findAll()
        ]);
    }

   public function new()
   {
     return view('pelicula/new',[
      'pelicula' => [
        'titulo' => '',
        'descripcion' => ''
      ]

     ]);
   }

   public function show($id)
   {
     $peliculaModel = new PeliculaModel();

      return view('pelicula/show',[
        'pelicula' => $peliculaModel->find($id)
      ]);
   }

   public function create()
   {

        $peliculaModel = new PeliculaModel();

        $peliculaModel->insert([
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion')
        ]);
        
        
   }

   public function edit($id)
   {
       $peliculaModel = new PeliculaModel();
        return view('pelicula/edit', [
            'pelicula' => $peliculaModel->find($id)
        ]);
   }
   

   public function update($id)
   {

        $peliculaModel = new PeliculaModel();

        $data = [
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion')
         ];
        
        $peliculaModel->update($id, $data);
    
   }
   

   public function delete($id)
   {
    $peliculaModel = new PeliculaModel();
    $peliculaModel->delete($id);
    
    echo "delete";

   }
}