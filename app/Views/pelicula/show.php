<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Pelicula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
 
       <div class="mb-2">
            <label  class="form-label">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $pelicula['titulo'];?>">
        </div>
        <br>
        <div class="mb-2">
            <label  class="form-label">Descripcion</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="2"><?= $pelicula['descripcion']; ?></textarea>
        </div>
</body>
</html>