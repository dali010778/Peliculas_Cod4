<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('header') ?>
    <h2>Editar Etiquetas</h2>
<?= $this->endSection() ?>

<?= $this->section('contenido')  ?>

<?= view('partials/_form_error'); ?>
    
    <form action="/dashboard/etiqueta/update/<?= $etiqueta->id ?>" method="post">
       <?= view('dashboard/etiqueta/_form', ['op' => 'Actualizar']) ?>
    </form>
<?= $this->endSection() ?>