<div class="sufee-login d-flex align-content-center flex-wrap m-5 p-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form id="registro" class="shadow p-3 mb-5 bg-dark rounded">
          <div class="text-center">
            <img src="./img/favicon.png" alt="neuromex" width="20px">
          </div><hr>
          <div class="form-group">
            <label class="text-white">Nombre</label>
            <input name="nombre" type="text" class="form-control" placeholder="nombre" data-regla="letras" required>
          </div>
          <div class="form-group">
            <label class="text-white">Apellidos</label>
            <input name="apellidos" type="text" class="form-control" placeholder="apellidos" data-regla="letras" required>
          </div>
          <div class="form-group">
            <label class="text-white">Correo electronico</label>
            <input name="email" type="text" class="form-control" placeholder="Correo electronico" data-regla="correo" required>
          </div>
          <div class="form-group">
            <label class="text-white">Numero celular</label>
            <input name="number" type="" class="form-control" placeholder="5511223344" data-regla="telefono" required>
          </div>
          <div class="form-group">
            <label class="text-white">Contraseña</label>
            <input name="password" type="password" class="form-control" placeholder="****************" data-regla="password" required>
          </div>
          <div class="form-group">
            <label class="text-white">Horario</label>
            <input name="horario" type="text" class="form-control" placeholder="9:00 - 14:00" data-regla="texto" required>
          </div>
          <div class="form-group">
            <label class="text-white">Membresia</label>
            <select name="membresia" class="form-control">
                <option value="1" default>Basica</option>
            </select>
          </div>
          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30 mb-3" id="enviar">Crear cuenta</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>