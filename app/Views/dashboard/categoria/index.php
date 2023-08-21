<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h1>Listado de Categorias</h1>

    <a class="btn btn-warning" href="/dashboard/categoria/new">Agregar</a>
    <br>
    <table class="table" border="1">
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
            <th scope="row"><?= $cate['id']; ?></th>
            <td><?= $cate['titulo']; ?></td>
            <td>
                <a class="btn btn-warning" href="/dashboard/categoria/show/<?= $cate['id']; ?>">Show</a>
                <a class="btn btn-success" href="/dashboard/categoria/edit/<?= $cate['id']; ?>">Editar</a>
                <form action="/dashboard/categoria/delete/<?= $cate['id']; ?>" method="post">
                  <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
                
            </td>
        </tr>
    <?php } ?>
  </tbody>
</table>
    
    
</body>
</html>