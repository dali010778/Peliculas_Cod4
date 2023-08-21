<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<h2>Editar Categoria</h2>

    <?= view('partials/_session'); ?>
    
    <form action="/dashboard/categoria/update/<?= $categoria['id'] ?>" method="post">
       <?= view('dashboard/categoria/_form', ['op' => 'Actualizar']) ?>
    </form>
</body>
</html>