<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('header') ?>
    <h2>Crear Etiqueta</h2>
<?= $this->endSection() ?>


<?= $this->section('contenido')  ?>  

<?= view('partials/_form_error'); ?>

    <form action="/dashboard/etiqueta/create" method="post">
    <?= view('dashboard/etiqueta/_form', ['op' => 'Crear']) ?>
    </form>
<?= $this->endSection() ?>