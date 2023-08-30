<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('header') ?>
    <h2>Listado de Etiquetas</h2>
<?= $this->endSection() ?>
    

<?= $this->section('contenido')  ?>
    
    <a class="btn btn-warning" href="/dashboard/pelicula/new">Agregar</a>
  
    <br>
    <table class="table" border="1">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">titulo</th>
          <th scope="col">Categoria</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($etiquetas as $etiqueta){ ?>
            <tr>
                <th scope="row"><?= $etiqueta->id; ?></th>
                <td><?= $etiqueta->titulo; ?></td>
                <td><?= $etiqueta->categorias; ?></td>
                <td>
                    <a class="btn btn-warning" href="/dashboard/etiqueta/show/<?= $etiqueta->id; ?>">Show</a>
                    <a class="btn btn-success" href="/dashboard/etiqueta/edit/<?= $etiqueta->id; ?>">Editar</a>
                    <form action="/dashboard/etiqueta/delete/<?= $etiqueta->id; ?>" method="post">
                      <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                    
                </td>
            </tr>
        <?php } ?>
      </tbody>
    </table>
  
 <?= $this->endSection() ?>