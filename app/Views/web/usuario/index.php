<?= $this->extend('layouts/web'); ?>

<?= $this->section('header') ?>
    <h2>Listado de Usuarios </h2>
<?= $this->endSection() ?>

<?= $this->section('contenido')  ?>
  <a class="btn btn-warning" href="/web/usuario/new">Agregar</a>
  <br>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Usuario</th>
        <th scope="col">email</th>
        <th scope="col">contraseña</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($usuario as $usu){ ?>
          <tr>
              <th scope="row"><?= $usu->id; ?></th>
              <td><?= $usu->usuario; ?></td>
              <td><?= $usu->email; ?></td>
              <td><?= $usu->contrasena; ?></td>
              <td>
                  <a class="btn btn-warning" href="/web/usuario/show/<?= $usu->id; ?>">Show</a>
                  <a class="btn btn-success" href="/web/usuario/edit/<?= $usu->id; ?>">Editar</a>
                  <form action="/web/usuario/delete/<?= $usu->id; ?>" method="post">
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                  </form>
                  
              </td>
          </tr>
      <?php } ?>
    </tbody>
  </table>
<?= $this->endSection() ?>