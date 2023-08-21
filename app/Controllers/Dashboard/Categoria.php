<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;

class Categoria extends BaseController
{
    public function index()
    {
       $categoriaModel = new CategoriaModel();


        return view('dashboard/categoria/index',[
            'categorias' => $categoriaModel->findAll()
        ]);
    }

    public function new()
    {
      return view('dashboard/categoria/new',[
       'categoria' => [
         'titulo' => ''
       ]
 
      ]);

    }

    
   public function create()
   {

        $categoriaModel = new CategoriaModel();

        $categoriaModel->insert([
            'titulo' => $this->request->getPost('titulo')
        ]);
        
        return redirect()->to('/dashboard/categoria');
        
   }

   public function show($id)
   {
     $categoriaModel = new CategoriaModel();

      return view('dashboard/categoria/show',[
        'categoria' => $categoriaModel->find($id)
      ]);
   }

   public function edit($id)
   {
       $categoriaModel = new CategoriaModel();
        return view('dashboard/categoria/edit', [
            'categoria' => $categoriaModel->find($id)
        ]);
   }

   
   public function update($id)
   {

        $categoriaModel = new CategoriaModel();

        $data = [
            'titulo' => $this->request->getPost('titulo')
         ];
        
        $categoriaModel->update($id, $data);

        return redirect()->to('/dashboard/categoria');
    
   }

   public function delete($id)
   {
    $categoriaModel = new CategoriaModel();
    $categoriaModel->delete($id);
    
    return redirect()->to('/dashboard/categoria');

   }
}
