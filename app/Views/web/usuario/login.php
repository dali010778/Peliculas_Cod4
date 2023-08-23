<?= $this->extend('layouts/web'); ?>

<?= $this->section('header') ?>
    <h2>Listado de Usuarios </h2>
<?= $this->endSection() ?>

<?= $this->section('contenido')  ?>
<?= view('partials/_form_error') ?>

<form action="<?= route_to('usuario.login_post') ?>" method="post">

    <div class="mb-2">
            <label  class="form-label">Email/Usuario</label>
            <input type="text" class="form-control" id="email" name="email" >
        </div>
        <br>
        <div class="mb-2">
            <label  class="form-label">Contraseña</label>
            <input class="form-control" id="contrasena" name="contrasena" type="password" >
        </div>
        <br>
    </div>
    <button class="btn btn-primary" type="submit">Enviar</button>
</form>



<?= $this->endSection() ?>