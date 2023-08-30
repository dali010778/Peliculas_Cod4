<?php

namespace App\Controllers\Dashboard;


use App\Controllers\BaseController;
use App\Models\CategoriaModel;
use App\Models\EtiquetaModel;


class Etiqueta extends BaseController
{
    
  
  
  public function index()
    {
       $etiquetaModel = new EtiquetaModel();

       $data = [
        'etiquetas' => $etiquetaModel->select('etiquetas.*,categorias.titulo as categorias')
        ->join('categorias','categorias.id = etiquetas.categoria_id')->find()
       ];

        return view('dashboard/etiqueta/index', $data);
    }

   
    public function new()
   {


    $categoriaModel = new CategoriaModel();

     return view('dashboard/etiqueta/new',[
      'etiqueta' => new EtiquetaModel(),
      'categorias'=>  $categoriaModel->find()
     ]);
   }

   public function show($id)
   {
     $etiquetaModel = new EtiquetaModel();
     $categoriaModel = new CategoriaModel();
    
      return view('dashboard/etiqueta/show',[
        'etiqueta' => $etiquetaModel->find($id),
        'categorias' =>$categoriaModel->find(),
      ]);
   }

   public function create()
   {

        $etiquetaModel = new EtiquetaModel();

        if( $this->validate('etiquetas')) {
            $etiquetaModel->insert([
            'titulo' => $this->request->getPost('titulo'),
            'categoria_id' => $this->request->getPost('categoria_id')
        ]);
      }else {
        session()->setFlashdata([
          'validation' => $this->validator
        ]);
        return redirect()->back()->withInput();
      }
        
        return redirect()->to('/dashboard/etiqueta')->with('mensaje','Registro creado de manera exitosa');  
   }

   public function edit($id)
   {
       $etiquetaModel = new EtiquetaModel();
       $categoriaModel = new CategoriaModel();

        return view('dashboard/etiqueta/edit', [
            'etiqueta' => $etiquetaModel->find($id),
            'categorias' =>$categoriaModel->find()
        ]);
   }
   

   public function update($id)
   {

        $etiquetaModel = new EtiquetaModel();
       

        if( $this->validate('etiquetas')) {
            $data = [
              'titulo' => $this->request->getPost('titulo'),
              'categoria_id' => $this->request->getPost('categoria_id')
             ];
            $etiquetaModel->update($id, $data);

        }else {
          session()->setFlashdata([
            'validation' => $this->validator
          ]);
          return redirect()->back()->withInput();
        }
        
      return redirect()->back()->with('mensaje','Registro modificado de manera exitosa');
    
   }
   

   public function delete($id)
   {
    $etiquetaModel = new EtiquetaModel();
    $etiquetaModel->delete($id);
    
    session()->setFlashData("mensaje","Etiqueta eliminada");
    
    return redirect()->to('/dashboard/etiqueta');

   }


  

 

 
}