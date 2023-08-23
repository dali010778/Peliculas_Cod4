<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['usuario','email','contrasena'];

    //para generar el un hash de contraseña

    public function contrasenaHash($contrasenaHash)
    {
        return password_hash($contrasenaHash, PASSWORD_DEFAULT);
    }

    //PARA VERIFICAR LA CONTRASEÑA EN TEXTO PLANO CON LA DE HASH

    public function contrasenaVerificar($contrasenaPlano,$contrasenaHash)
    {
         return password_verify ($contrasenaPlano,$contrasenaHash);
    }
}
