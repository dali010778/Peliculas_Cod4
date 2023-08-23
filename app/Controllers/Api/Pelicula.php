<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Pelicula extends ResourceController {

    protected $modelName ='App\Models\PeliculaModel';
    protected $format = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        return $this->respond($this->model->find($id));
    }

    public function create()
    {
        if( $this->validate('peliculas')) {
            $id = $this->model->insert([
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion')
        ]);
      }else {
       
        return $this->respond($this->validator->getErrors(),400);
      }

      return $this->respond($id);
    }

    public function update($id = null)
    {
        if( $this->validate('peliculas')) {
              $this->model->update($id, [
              'titulo' => $this->request->getRawInput()['titulo'],
              'descripcion' => $this->request->getRawInput()['descripcion']
             ]);

        }else {
            //Si queremos devolver un error especifico del titulo
            /*if($this->validator->getError('titulo')){
                return $this->respond($this->validator->getErrors('titulo'), 400);
            }

            //Si queremos devolver un error especifico de la descripcion
            if($this->validator->getError('descripcion')){
                return $this->respond($this->validator->getErrors('descripcion'), 400);
            }*/

            //Devolvemos la lista de los errores completo mas limpia menos complicaciones
            return $this->respond($this->validator->getErrors(), 400);
         
        }

        return $this->respond($id);
    }

    public function delete($id = null)
    {
        $this->model->delete($id);

        return $this->respond('Eliminado');
    } 

} 