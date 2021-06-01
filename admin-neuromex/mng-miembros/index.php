<?php include "../php/header.php" ?>
<link href="<?=$URLBASE?>vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css" media="all" rel="stylesheet" type="text/css"/>

  <div class="content mt-3">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="card">

            <div class="card-header">
              <strong class="card-title">Usuarios</strong>
            </div>

            <div class="card-body">
              <table id="tblusers" class="table table-striped table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="EdUs" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="mediumModalLabel">Editar información del usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="./control/update.php" method="POST" autocomplete="off">
          <div class="modal-body">
            <input type="hidden" name="id" id="edus" value="">
            <div class="form-group">
              <label class="control-label mb-1">Nombre</label>
              <input name="name" id="edname" type="text" class="form-control" placeholder="Nombre" data-regla="numletras" data-msg="Revise el nombre del usuario." required>
            </div>
            <div class="form-group">
              <label class="control-label mb-1">Apellidos</label>
              <input name="lastName" id="lastName" type="text" class="form-control" placeholder="Apellido" data-regla="numletras" data-msg="Revise el Apellido del usuario." required>
            </div>
            <div class="form-group">
              <label class="control-label mb-1">Correo Electr&oacute;nico</label>
              <input name="mail" id="edusname" type="email" class="form-control" data-regla="correo" data-msg="Revise la dirección de correo electrónico." required>
            </div>
            <div class="form-group">
                <label class="control-label mb-1">Tel&eacute;fono Celular</label>
                <input name="phone" id="phone" type="tel" class="form-control" data-regla="telefono" data-msg="Revise el numero telefonico." required>
            </div>
            <div class="form-group">
              <label class="control-label mb-1">Contraseña</label>
              <input name="contra" id="edcontra" type="password" class="form-control" placeholder="***************" data-msg="La contraseña debe medir al menos 8 caracteres y contener al menos: un número, una mayúscula, una minúscula y un símbolo @$!%*?&#=+-">
            </div>
            <div class="form-group">
              <label class="control-label mb-1">Edificio y sal&oacute;</label>
              <input name="salon" id="salon" type="text" class="form-control" placeholder="C0100 Edificio C" required>
            </div>
            <div class="form-group">
              <label class="control-label mb-1">Horario</label>
              <input name="horario" id="horario" type="text" class="form-control" data-regla="numletras" data-msg="Revise el Horario del usuario." required>
            </div>
            <div class="form-group">
              <label class="control-label mb-1">Tipo de Membresia</label>
              <input name="mem" id="mem" type="number" class="form-control" min="0" max="2" placeholder="Basica -> 1 Profesional -> 2" data-regla="entero" data-msg="Revise la membresia que sea 0, 1 o 2." required>
            </div>
          </div>
          <div class="modal-footer">
            <button id="btncncl2" type="reset" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
            <button id="btnsbmt2" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Aceptar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="<?=$URLBASE?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?=$URLBASE?>vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?=$URLBASE?>js/formularios.js"></script>
  <script src="./js/index.js"></script>

<?php include "../php/footer.php" ?>
