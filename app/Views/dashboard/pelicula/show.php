<?= $this->extend('layouts/dashboard'); ?>
 
<?= $this->section('contenido')  ?> 

    <div class="mb-2">
            <label  class="form-label">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $pelicula->titulo;?>">
    </div>
        <br>
        <div class="mb-2">
                <label for="categoria_id"  class="form-label">Categorias</label>
                <select name="categoria_id" id="categoria_id" class="form-select" >
                        <option selected></option>
                        <?php  foreach ($categorias as $categoria): ?>
                              <option <?= $categoria->id !== old('categoria_id', $pelicula->categoria_id) ?: 'selected' ?> value="<?= $categoria->id ?>"><?= $categoria->titulo ?></option>
                        <?php endforeach ?>
                </select>
        </div>
        <br>
    <div class="mb-2">
            <label  class="form-label">Descripcion</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="2"><?= $pelicula->descripcion; ?></textarea>
    </div>

    <h3>Imagenes</h3>
    <div class="mb-2">
        <ul>
          <?php foreach ($imagenes as $imagen) : ?>
          
            <li><?= $imagen->imagen ?></li>
          <?php endforeach ?>
        </ul>
    </div>
    <br>
    <h3>Etiquetas</h3>
    <div class="mb-2">
        <ul>
          <?php foreach ($etiquetas as $etiqueta) : ?>
            <!-- <form action="<?= route_to('pelicula.etiqueta_delete', $pelicula->id, $etiqueta->id) ?>" method="post"> -->
                <button data-url='<?= route_to('pelicula.etiqueta_delete', $pelicula->id, $etiqueta->id) ?>' class="delete_Etiqueta" type="submit"><?= $etiqueta->titulo ?></button>
            <!-- </form> -->
          <?php endforeach ?>
        </ul>
    </div>
        <br>
        <a href="/dashboard/pelicula" class="btn btn-primary">Regresar</a>

        <script>
           document.querySelectorAll('.delete_Etiqueta').forEach((b) => {
                b.onclick = function (event) {
                        fetch(this.getAttribute('data-url'), {
                                method: 'POST'
                        }).then(res => res.json())
                        .then(res => {
                                window.location.reload()
                        })
                }
           })
                
        </script>

<?= $this->endSection() ?>