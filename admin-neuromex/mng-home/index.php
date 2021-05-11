<?php include "../php/header.php"; ?>

  <link href="<?=$URLBASE?>vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css" media="all" rel="stylesheet" type="text/css"/>
  <link href="<?=$URLBASE?>vendors/fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css"/>

  <div class="content mt-3">
    <div class="animated fadeIn">

      <div class="row">

        <div class="col-md-7">
          <div class="card">
            <div class="card-header">
              <strong class="card-title">Sliders en Home</strong>
            </div>
            <div class="card-body">
              <table id="resultados" class="table table-striped table-bordered">
                <thead class="thead-dark text-center">
                  <tr>
                    <th>Texto</th>
                    <th>Escritorio</th>
                    <th>Mobile</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-md-5">
          <form id="nuevo" class="animated fadeIn" action="./control/insert.php" method="POST" data-confirmar="false" autocomplete="off">
            <div class="card">
              <div class="card-header">
                <strong class="card-title">Agregar al slider</strong>
              </div>
              <div class="card-body">

                <div class="form-group">
                  <label>Texto corto</label>
                  <span class="badge badge-warning">M&aacute;x. 200 caracteres</span>
                  <input type="text" class="form-control" name="texto" data-regla="texto" data-msg="Revise su texto">
                </div>

                <div class="form-group">
                  <label>Imagen para escritorio</label>&nbsp;&nbsp;
                  <span class="badge badge-warning">Medidas de 1920 x 600 px</span>
                  <input type="file" name="desk" required>
                </div>

                <div class="form-group">
                  <label>Imagen para m&oacute;viles</label>&nbsp;&nbsp;
                  <span class="badge badge-warning">Medidas de 400 x 615 px</span>
                  <input type="file" name="mobile" required>
                </div>

              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i>&nbsp;&nbsp;Guardar</button>
                <button type="reset" class="btn btn-secondary pull-right"><i class="fa fa-save"></i>&nbsp;&nbsp;Cancelar</button>
              </div>
            </div>
          </form>
          <form id="editar" class="animated fadeIn" action="./control/update.php" method="POST" data-confirmar="false" autocomplete="off" style="display:none">
            <div class="card">
              <div class="card-header">
                <strong class="card-title">Actualizar al slider</strong>
              </div>
              <div class="card-body">

                <input type="hidden" name="id" required>
                <div class="form-group">
                  <label>Texto corto</label>
                  <span class="badge badge-warning">M&aacute;x. 200 caracteres</span>
                  <input type="text" class="form-control" name="texto" data-regla="texto" data-msg="Revise su texto">
                </div>

                <div class="form-group">
                  <label>Imagen de slider</label>&nbsp;&nbsp;
                  <span class="badge badge-warning">Medidas de 1920 x 600 px</span>
                  <input type="file" name="desk">
                </div>
                <div class="form-group">
                  <label>Imagen de slider</label>&nbsp;&nbsp;
                  <span class="badge badge-warning">Medidas de 400 x 615 px</span>
                  <input type="file" name="mobile">
                </div>

              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i>&nbsp;&nbsp;Guardar</button>
                <button type="reset" class="btn btn-secondary pull-right"><i class="fa fa-save"></i>&nbsp;&nbsp;Cancelar</button>
              </div>
            </div>
          </form>
        </div>

      </div>

    </div>
  </div>


  <script src="<?=$URLBASE?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?=$URLBASE?>vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?=$URLBASE?>vendors/fileinput/js/fileinput.js" type="text/javascript"></script>
	<script src="<?=$URLBASE?>vendors/fileinput/js/locales/es.js" type="text/javascript"></script>
  <script src="<?=$URLBASE?>js/formularios.js"></script>
  <script src="./js/index.js"></script>

<?php include "../php/footer.php" ?>
