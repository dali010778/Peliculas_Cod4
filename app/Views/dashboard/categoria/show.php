<?= $this->extend('layouts/dashboard'); ?>
 
<?= $this->section('contenido')  ?> 
    <div class="mb-2">
            <label  class="form-label">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $categoria->titulo;?>">
        </div>
        <br>
       <a href="/dashboard/categoria" class="btn btn-primary">Regresar</a>
<?= $this->endSection() ?>
