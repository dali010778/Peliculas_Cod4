 <div class="mb-2">
    <label  class="form-label">Titulo</label>
    <input type="text" class="form-control" id="titulo" name="titulo" value="<?= old('titulo',$etiqueta->titulo);?>">
</div>
<br>
<div class="mb-2">
    <label for="categoria_id"  class="form-label">Categorias</label>
    <select name="categoria_id" id="categoria_id" class="form-select" >
            <option selected></option>
       <?php  foreach ($categorias as $categoria): ?>
            <option <?= $categoria->id !== old('categoria_id', $etiqueta->categoria_id) ?: 'selected' ?> value="<?= $categoria->id ?>"><?= $categoria->titulo ?></option>
        <?php endforeach ?>
    </select>
</div>
<br>

<button class="btn btn-primary" type="submit"><?= $op  ?></button>


       