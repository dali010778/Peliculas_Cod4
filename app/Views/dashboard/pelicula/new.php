<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('header') ?>
    <h2>Crear pelicula</h2>
<?= $this->endSection() ?>


<?= $this->section('contenido')  ?>   
    <form action="/dashboard/pelicula/create" method="post">
    <?= view('dashboard/pelicula/_form', ['op' => 'Crear']) ?>
    </form>
<?= $this->endSection() ?>