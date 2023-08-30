<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('contenido')  ?>

    <form action="" method="post">
        <div class="mb-2">
            <label for="categoria_id"  class="form-label">Categorias</label>
            <select name="categoria_id" id="categoria_id" class="form-select" >
                    <option selected></option>
            <?php  foreach ($categorias as $categoria): ?>
                    <option <?= $categoria->id != $categoria_id ?: 'selected' ?> value="<?= $categoria->id ?>"><?= $categoria->titulo ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <br>
        <div class="mb-2">
            <label for="etiqueta_id"  class="form-label">Etiquetas</label>
            <select name="etiqueta_id" id="etiqueta_id" class="form-select" >
                    <option selected></option>
            <?php  foreach ($etiquetas as $etiqueta): ?>
                    <option  value="<?= $etiqueta->id ?>"><?= $etiqueta->titulo ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <br>
        <button id='enviar1' class="btn btn-primary" type="submit">Enviar</button>

    </form>

    <script>
        function disableButton(){
            if (document.querySelector('[name=etiqueta_id]').value == '') {
                document.querySelector("#enviar1").setAttribute('disabled','disabled')
            } else {
                document.querySelector("#enviar1").removeAttribute('disabled')
            }
        }

        document.querySelector('[name=categoria_id]').onchange = function(event){
            window.location.href = '<?= route_to('pelicula.etiquetas', $pelicula->id)?>?categoria_id='+this.value
        }

        document.querySelector('[name=etiqueta_id]').onchange = function(event){
            disableButton()
        }

        disableButton()
    </script>

<?= $this->endSection() ?>

       