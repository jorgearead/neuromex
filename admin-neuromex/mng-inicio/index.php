<?php include "../php/header.php" ?>
<link href="<?=$URLBASE?>vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css" media="all" rel="stylesheet" type="text/css"/>

  <div class="content mt-3">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="card">

            <div class="card-header">
              <strong class="card-title">Usuarios</strong>
              <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#NwUs">
                <i class="fa fa-plus"></i> Nuevo usuario
              </button>
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
    </div><!-- .animated -->
  </div><!-- .content -->

  <!-- Modal de agregar usuario -->
  <div class="modal fade" id="NwUs" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="mediumModalLabel">Agregar nuevo usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="./control/insert.php" method="POST" autocomplete="off" >
          <div class="modal-body">
            <div class="form-group">
              <label class="control-label mb-1">Nombre</label>
              <input name="name" type="text" class="form-control" placeholder="Usuario" onkeypress="return NumerosyLetras(event)" required>
            </div>
            <div class="form-group">
              <label class="control-label mb-1">Correo Electrónico</label>
              <input name="sesion" type="text" class="form-control" placeholder="Nombre" onkeypress="return ValCorreo(event)" required>
            </div>
            <div class="form-group">
              <label class="control-label mb-1">Contraseña</label>
              <input name="contra" type="password" class="form-control" placeholder="***************" required>
            </div>
          </div>
          <div class="modal-footer">
            <button id="btncncl1" type="reset" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
            <button id="btnsbmt1" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Aceptar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal de editar usuario -->
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
              <input name="name" id="edname"type="text" class="form-control" placeholder="Usuario" onkeypress="return NumerosyLetras(event)" required>
            </div>
            <div class="form-group">
              <label class="control-label mb-1">Correo Electrónico</label>
              <input name="sesion" id="edusname" type="text" class="form-control" placeholder="Nombre" onkeypress="return ValCorreo(event)" required>
            </div>
            <div class="form-group">
              <label class="control-label mb-1">Contraseña</label>
              <input name="contra" id="edcontra" type="password" class="form-control" placeholder="***************" required>
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
