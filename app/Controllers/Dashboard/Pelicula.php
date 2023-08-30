<?php

namespace App\Controllers\Dashboard;

use App\Models\PeliculaModel;
use App\Controllers\BaseController;
use App\Models\CategoriaModel;
use App\Models\EtiquetaModel;
use App\Models\EtiquetaPeliculaModel;
use App\Models\ImagenModel;
use App\Models\PeliculaImagenModel;

class Pelicula extends BaseController
{
    
  
  
  public function index()
    {
       $peliculaModel = new PeliculaModel();

       //$this->generar_imagen();

       //$this->asignar_imagen();
    

       $data = [
        'peliculas' => $peliculaModel->select('peliculas.id,peliculas.titulo,peliculas.descripcion,categorias.titulo as categorias')->join('categorias','categorias.id = peliculas.categoria_id')->find()
       ];

       //var_dump($data);

        return view('dashboard/pelicula/index', $data);
    }

   
    public function new()
   {

    //return redirect()->route('test'); //asi se redirecciona con rutas con nombre

    $categoriaModel = new CategoriaModel();

     return view('dashboard/pelicula/new',[
      'pelicula' => new PeliculaModel(),
      'categorias' => $categoriaModel->find()
     ]);
   }

   public function show($id)
   {
     $peliculaModel = new PeliculaModel();
     $categoriaModel = new CategoriaModel();

      return view('dashboard/pelicula/show',[
        'pelicula' => $peliculaModel->find($id),
        'categorias' =>$categoriaModel->find(),
        'imagenes' => $peliculaModel->getImagesById($id),
        'etiquetas' => $peliculaModel->getEtiquetasById($id)
      ]);
   }

   public function create()
   {

        $peliculaModel = new PeliculaModel();

        if( $this->validate('peliculas')) {
            $peliculaModel->insert([
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'categoria_id' => $this->request->getPost('categoria_id')
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
       $categoriaModel = new CategoriaModel();

        return view('dashboard/pelicula/edit', [
            'pelicula' => $peliculaModel->find($id),
            'categorias' =>$categoriaModel->find()
        ]);
   }
   

   public function update($id)
   {

        $peliculaModel = new PeliculaModel();
       

        if( $this->validate('peliculas')) {
            $data = [
              'titulo' => $this->request->getPost('titulo'),
             'descripcion' => $this->request->getPost('descripcion'),
             'categoria_id' => $this->request->getPost('categoria_id')
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

   public function etiqueta($id)
   {
      $categoriaModel = new CategoriaModel();
      $etiquetaModel = new EtiquetaModel();
      $peliculaModel = new PeliculaModel();

      $etiquetas = [];

      if ($this->request->getGet('categoria_id')){
        
        $etiquetas = $etiquetaModel
          ->where('categoria_id', $this->request->getGet('categoria_id'))
          ->findAll();

      }

      return view('dashboard/pelicula/etiquetas',[
        'pelicula' => $peliculaModel->find($id),
        'categorias' => $categoriaModel->findAll(),
        'categoria_id' => $this->request->getGet('categoria_id'),
        'etiquetas' => $etiquetas
      ]);

   }

   public function etiqueta_post($id)
   {
     $peliculaEtiquetaModel = new EtiquetaPeliculaModel();

     $etiquetaId = $this->request->getPost('etiqueta_id');
     $peliculaId = $id;

     $peliculaEtiqueta = $peliculaEtiquetaModel->where('etiqueta_id', $etiquetaId)
                          ->where('pelicula_id', $peliculaId)->first();

      if (!$peliculaEtiqueta) {
        $peliculaEtiquetaModel->insert([
          'pelicula_id' => $peliculaId,
          'etiqueta_id' => $etiquetaId
        ]);
      }

      return redirect()->back();
   }

   public function etiqueta_delete($id,$etiquetaId)
   {
     $peliculaEtiqueta = new EtiquetaPeliculaModel();
     $peliculaEtiqueta->where('etiqueta_id', $etiquetaId)
     ->where('pelicula_id', $id)->delete();
      echo '{"mensaje" :"Eliminado"}';

     //return redirect()->back()->with('mensaje', 'Etiqueta Eliminada');

   }

   private function generar_imagen()
   {

    $imagenModel = new ImagenModel();
    $imagenModel->insert([
      'imagen' => date('Y-m-d H:m:s'),
      'extension' => 'Pendiente',
      'data' => 'Pendiente'
    ]);

   }

   private function asignar_imagen()
   {
    $peliculaImagenModel = new PeliculaImagenModel();
    $peliculaImagenModel->insert([
      'imagen_id' => 5,
      'pelicula_id'=> 74
    ]);
    
   }
}