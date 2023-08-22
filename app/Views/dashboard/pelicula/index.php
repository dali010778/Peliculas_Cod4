<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('header') ?>
    <h2>Listado de Peliculas</h2>
<?= $this->endSection() ?>
    

<?= $this->section('contenido')  ?>
    
    <a class="btn btn-warning" href="/dashboard/pelicula/new">Agregar</a>
    <a class="btn btn-warning" href="<?= route_to('test',2) ?>">Test</a>
    <br>
    <table class="table" border="1">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">titulo</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($peliculas as $peli){ ?>
            <tr>
                <th scope="row"><?= $peli->id; ?></th>
                <td><?= $peli->titulo; ?></td>
                <td><?= $peli->descripcion; ?></td>
                <td>
                    <a class="btn btn-warning" href="/dashboard/pelicula/show/<?= $peli->id; ?>">Show</a>
                    <a class="btn btn-success" href="/dashboard/pelicula/edit/<?= $peli->id; ?>">Editar</a>
                    <form action="/dashboard/pelicula/delete/<?= $peli->id; ?>" method="post">
                      <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                    
                </td>
            </tr>
        <?php } ?>
      </tbody>
    </table>
  
 <?= $this->endSection() ?>