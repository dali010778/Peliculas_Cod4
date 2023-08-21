<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('header') ?>
    <h2>Editar Categoria</h2>
<?= $this->endSection() ?>

<?= $this->section('contenido')  ?>
    
    <form action="/dashboard/categoria/update/<?= $categoria['id'] ?>" method="post">
       <?= view('dashboard/categoria/_form', ['op' => 'Actualizar']) ?>
    </form>
<?= $this->endSection() ?>