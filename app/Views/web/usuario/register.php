<?= $this->extend('layouts/web'); ?>

<?= $this->section('header') ?>
    <h2>Listado de Usuarios </h2>
<?= $this->endSection() ?>

<?= $this->section('contenido')  ?>
<?= view('partials/_form_error') ?>

<form action="<?= route_to('usuario.register_post') ?>" method="post">

        <div class="mb-2">
            <label  class="form-label">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" >
        </div>
        <br>
        <div class="mb-2">
            <label  class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" >
        </div>
        <br>
        <div class="mb-2">
            <label  class="form-label">Contraseña</label>
            <input class="form-control" id="contrasena" name="contrasena" type="password" >
        </div>
        <br>
    
    <button class="btn btn-primary" type="submit">Enviar</button>
</form>



<?= $this->endSection() ?>