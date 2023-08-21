<div class="mb-2">
            <label  class="form-label">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $pelicula['titulo'];?>">
        </div>
        <br>
        <div class="mb-2">
            <label  class="form-label">Descripcion</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="2"><?= $pelicula['descripcion']; ?></textarea>
</div>
        <button class="btn btn-primary" type="submit"><?= $op  ?></button>


       