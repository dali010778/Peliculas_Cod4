    <?= $this->extend('layouts/dashboard'); ?>

  <?= $this->section('header') ?>
      <h2>Listado de categorias </h2>
  <?= $this->endSection() ?>
  
  <?= $this->section('contenido')  ?>
    <a class="btn btn-warning" href="/dashboard/categoria/new">Agregar</a>
    <br>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">titulo</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($categorias as $cate){ ?>
            <tr>
                <th scope="row"><?= $cate->id; ?></th>
                <td><?= $cate->titulo; ?></td>
                <td>
                    <a class="btn btn-warning" href="/dashboard/categoria/show/<?= $cate->id; ?>">Show</a>
                    <a class="btn btn-success" href="/dashboard/categoria/edit/<?= $cate->id; ?>">Editar</a>
                    <form action="/dashboard/categoria/delete/<?= $cate->id; ?>" method="post">
                      <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                    
                </td>
            </tr>
        <?php } ?>
      </tbody>
    </table>
  <?= $this->endSection() ?>
