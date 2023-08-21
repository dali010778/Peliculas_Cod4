<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('header') ?>
    <h2>Editar pelicula</h2>
<?= $this->endSection() ?>

<?= $this->section('contenido')  ?>
    <form action="/dashboard/pelicula/update/<?= $pelicula['id'] ?>" method="post">
       <?= view('dashboard/pelicula/_form', ['op' => 'Actualizar']) ?>
    </form>
<?= $this->endSection() ?>