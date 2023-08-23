<?= $this->extend('layouts/web'); ?>
 
<?= $this->section('contenido')  ?> 

    <div class="mb-2">
            <label  class="form-label">Usuario</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $usuario->usuario;?>">
    </div>
        <br>
    <div class="mb-2">
            <label  class="form-label">Email</label>
            <input class="form-control" id="email" name="email" type="email" value="<?= $usuario->email; ?>">
    </div>
        <br>
        <br>
    <div class="mb-2">
            <label  class="form-label">Contraseña</label>
            <input class="form-control" id="contrasena" name="contrasena" type="password" value="<?= $usuario->contrasena; ?>">
    </div>
        <a href="/web/usuario" class="btn btn-primary">Regresar</a>        

<?= $this->endSection() ?>