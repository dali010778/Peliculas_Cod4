<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class Usuario extends BaseController
{
    
    public function login()
    {
        echo view('web/usuario/login');
    }
    
    public function login_post()
    {
        $usuarioModel = new UsuarioModel();

        $email = $this->request->getPost('email');
        $contrasena = $this->request->getPost('contrasena');

        $usuario = $usuarioModel->select('id,usuario,email,contrasena,tipo')
        ->orWhere('email',$email)
        ->orWhere('usuario',$email)
        ->first();

        if(!$usuario){
            return redirect()->back()->with('mensaje','El usuario y/o contraseña son invalidos');
        }

        if($usuarioModel->contrasenaVerificar($contrasena, $usuario->contrasena)){
            unset($usuario->contrasena);
            session()->set('usuario',$usuario);

            return redirect()->to('/dashboard/categoria')->with('mensaje',"Bienvenid@ $usuario->usuario");
        }

        return redirect()->back()->with('mensaje','El usuario y/o contraseña son invalidos');
    }

    public function register()
    {
        echo view('web/usuario/register');
    }
    
    public function register_post()
    {
        $usuarioModel = new UsuarioModel();

        if( $this->validate('usuarios')) {
            $usuarioModel->insert([
            'usuario' => $this->request->getPost('usuario'),
            'email' => $this->request->getPost('email'),
            'contrasena' => $usuarioModel->contrasenaHash($this->request->getPost('contrasena'))
        ]);

        return redirect()->to(route_to('usuario.login'))->with('mensaje',"Usuario Registrado Exitosamente");
      }
      
      session()->setFlashdata([
        'validation' => $this->validator
      ]);
      
      return redirect()->back()->withInput();
      
            
    }
    
    public function logout()
    {
      session()->destroy();
      return redirect()->to(route_to('usuario.login'));
    }
    
    public function index()
    {
        $usuarioModel = new UsuarioModel();

        return view('web/usuario/index',[
            'usuario' => $usuarioModel->findAll()
        ]);
    }

   

   public function show($id)
   {
     $usuarioModel = new UsuarioModel();

      return view('web/usuario/show',[
        'usuario' => $usuarioModel->find($id)
      ]);
   }

  

   public function edit($id)
   {
       $usuarioModel = new UsuarioModel();
        return view('web/usuario/edit', [
            'usuario' => $usuarioModel->find($id)
        ]);
   }


   public function update($id)
   {

        $usuarioModel = new UsuarioModel();

        if( $this->validate('usuarios')) {
            $data = [
              'usuario' => $this->request->getPost('usuario'),
             'email' => $this->request->getPost('email'),
             'contrasena' => $this->request->getPost('contrasena')
             ];
            $usuarioModel->update($id, $data);

        }else {
          session()->setFlashdata([
            'validation' => $this->validator
          ]);
          return redirect()->back()->withInput();
        }
        
        //return redirect()->back()->with('mensaje','Registro modificado de manera exitosa'); //te redirecciona a la pagina anterior
      return redirect()->to('/web/usuario')->with('mensaje','Registro modificado de manera exitosa');
    
   }

   public function delete($id)
   {
    $usuarioModel = new UsuarioModel();
    $usuarioModel->delete($id);
    
    session()->setFlashData("mensaje","Usuario eliminado");
    
    return redirect()->to('/web/usuario');

   }
   
   
}
