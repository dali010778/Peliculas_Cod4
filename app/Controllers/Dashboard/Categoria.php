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

        if( $this->validate('categorias')) {
            $categoriaModel->insert([
              'titulo' => $this->request->getPost('titulo')
            ]);
        }else {
            session()->setFlashdata([
              'validation' => $this->validator
            ]);
            return redirect()->back()->withInput();
        }
          
        
        return redirect()->to('/dashboard/categoria')->with('mensaje','Registro creado de manera exitosa');
        
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

        if( $this->validate('categorias')) {
            $data = [
              'titulo' => $this->request->getPost('titulo')
            ];
            $categoriaModel->update($id, $data);
        }else {
            session()->setFlashdata([
              'validation' => $this->validator
            ]);
            return redirect()->back()->withInput();
        }

        //return redirect()->back()->with('mensaje','Registro modificado de manera exitosa');
        return redirect()->to('/dashboard/categoria')->with('mensaje','Registro modificado de manera exitosa');
    
   }

   public function delete($id)
   {
    $categoriaModel = new CategoriaModel();
    $categoriaModel->delete($id);
    
    return redirect()->to('/dashboard/categoria')->with('mensaje','Registro Eliminado de manera exitosa');

   }
}
