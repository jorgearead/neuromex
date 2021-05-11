<?php include "../php/header.php"; ?>

  <link href="<?=$URLBASE?>vendors/fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css"/>
  <link href="<?=$URLBASE?>vendors/datepicker/css/bootstrap-datepicker.min.css" media="all" rel="stylesheet" type="text/css"/>

  <div class="content mt-3">
    <div class="animated fadeIn">
      <form action="./control/insert.php" method="POST" autocomplete="off">
        <div class="card">

          <div class="card-header">
            <strong class="card-title">Agregar Marca</strong>
          </div>

          <div class="card-body">
            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label class="required">Marca</label>
                  <input type="text" class="form-control" name="name" data-regla="texto" data-msg="Revise el nombre de la marca" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="w-100">Orden en el menu</label>
                  <input class="form-control w-100" type="number" name="orden">
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label class="required">Logo</label>
                  <span class="badge badge-warning">400px x 400px</span>
                  <input type="file" name="logo" required>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary pull-right">
              <i class="fa fa-save"></i> Guardar
            </button>
            <a href="./" class="btn btn-secondary pull-right">
              <i class="fa fa-times"></i> Cancelar
            </a>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script src="<?=$URLBASE?>vendors/datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="<?=$URLBASE?>vendors/datepicker/locales/bootstrap-datepicker.es.min.js"></script>
  <script src="<?=$URLBASE?>vendors/ckeditor/ckeditor.js" type="text/javascript"></script>
  <script src="<?=$URLBASE?>vendors/ckfinder/ckfinder.js" type="text/javascript"></script>
	<script src="<?=$URLBASE?>vendors/fileinput/js/fileinput.js" type="text/javascript"></script>
	<script src="<?=$URLBASE?>vendors/fileinput/js/locales/es.js" type="text/javascript"></script>
  <script src="<?=$URLBASE?>js/formularios.js"></script>
  <script src="./js/nuevo.js"></script>

<?php include "../php/footer.php" ?>
