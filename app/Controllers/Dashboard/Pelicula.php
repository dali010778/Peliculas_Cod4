<?php

namespace App\Controllers\Dashboard;

use App\Models\PeliculaModel;
use App\Controllers\BaseController;

class Pelicula extends BaseController
{
    
  public function test($id)
  {
    echo 'test de '. $id;
  }
  
  public function index()
    {
       $peliculaModel = new PeliculaModel();


        return view('dashboard/pelicula/index',[
            'peliculas' => $peliculaModel->findAll()
        ]);
    }

   public function new()
   {

    //return redirect()->route('test'); //asi se redirecciona con rutas con nombre
     return view('dashboard/pelicula/new',[
      'pelicula' => [
        'titulo' => '',
        'descripcion' => ''
      ]

     ]);
   }

   public function show($id)
   {
     $peliculaModel = new PeliculaModel();

      return view('dashboard/pelicula/show',[
        'pelicula' => $peliculaModel->find($id)
      ]);
   }

   public function create()
   {

        $peliculaModel = new PeliculaModel();

        if( $this->validate('peliculas')) {
            $peliculaModel->insert([
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion')
        ]);
      }else {
        session()->setFlashdata([
          'validation' => $this->validator
        ]);
        return redirect()->back()->withInput();
      }
        
        return redirect()->to('/dashboard/pelicula')->with('mensaje','Registro creado de manera exitosa');  
   }

   public function edit($id)
   {
       $peliculaModel = new PeliculaModel();
        return view('dashboard/pelicula/edit', [
            'pelicula' => $peliculaModel->find($id)
        ]);
   }
   

   public function update($id)
   {

        $peliculaModel = new PeliculaModel();

        if( $this->validate('peliculas')) {
            $data = [
              'titulo' => $this->request->getPost('titulo'),
             'descripcion' => $this->request->getPost('descripcion')
             ];
            $peliculaModel->update($id, $data);

        }else {
          session()->setFlashdata([
            'validation' => $this->validator
          ]);
          return redirect()->back()->withInput();
        }
        
        //return redirect()->back()->with('mensaje','Registro modificado de manera exitosa'); //te redirecciona a la pagina anterior
      return redirect()->to('/dashboard/pelicula')->with('mensaje','Registro modificado de manera exitosa');
    
   }
   

   public function delete($id)
   {
    $peliculaModel = new PeliculaModel();
    $peliculaModel->delete($id);
    
    session()->setFlashData("mensaje","Película eliminada");
    
    return redirect()->to('/dashboard/pelicula');

   }
}