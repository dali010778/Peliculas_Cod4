<?= $this->extend('layouts/web'); ?>

<?= $this->section('header') ?>
    <h2>Editar Usuario</h2>
<?= $this->endSection() ?>

<?= $this->section('contenido')  ?>

<?= view('partials/_form_error'); ?>
    
    <form action="/web/usuario/update/<?= $usuario->id ?>" method="post">
       <?= view('web/usuario/_form', ['op' => 'Actualizar']) ?>
    </form>
<?= $this->endSection() ?>