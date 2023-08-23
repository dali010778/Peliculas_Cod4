<div class="mb-2">
            <label  class="form-label">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" value="<?= old('usuario',$usuario->usuario);?>">
        </div>
        <br>
        <div class="mb-2">
            <label  class="form-label">Email</label>
            <input class="form-control" id="email" name="email" type="email" value="<?= old('email',$usuario->email); ?>" >
        </div>
        <br>
        <div class="mb-2">
            <label  class="form-label">Contraseña</label>
            <input class="form-control" id="contrasena" name="contrasena" type="password" value="<?= old('contrasena',$usuario->contrasena); ?>" >
        </div>
</div>
        <button class="btn btn-primary" type="submit"><?= $op  ?></button>


       