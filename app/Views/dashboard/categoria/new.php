<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('header') ?>
    <h2>Crear Categoria</h2>
<?= $this->endSection() ?>
    
<?= $this->section('contenido')  ?>
    <form action="/dashboard/categoria/create" method="post">
    <?= view('dashboard/categoria/_form', ['op' => 'Crear']) ?>
    </form>
<?= $this->endSection() ?>