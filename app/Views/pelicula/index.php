<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h1>Listado de Peliculas</h1>

    <a class="btn btn-warning" href="/pelicula/new">Agregar</a>
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
            <th scope="row"><?= $peli['id']; ?></th>
            <td><?= $peli['titulo']; ?></td>
            <td><?= $peli['descripcion']; ?></td>
            <td>
                <a class="btn btn-warning" href="/pelicula/show/<?= $peli['id']; ?>">Show</a>
                <a class="btn btn-success" href="/pelicula/edit/<?= $peli['id']; ?>">Editar</a>
                <form action="/pelicula/delete/<?= $peli['id']; ?>" method="post">
                  <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
                
            </td>
        </tr>
    <?php } ?>
  </tbody>
</table>
    



    
</body>
</html>