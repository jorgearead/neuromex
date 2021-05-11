<?php include "../php/header.php"; ?>

  <link href="<?=$URLBASE?>vendors/fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css"/>
  <link href="<?=$URLBASE?>vendors/datepicker/css/bootstrap-datepicker.min.css" media="all" rel="stylesheet" type="text/css"/>
  <script type="text/javascript">
    var id = <?=$_GET['id']?>;
  </script>
  <div class="content mt-3">
    <div class="animated fadeIn">
      <form action="./control/update.php" method="POST" autocomplete="off">
        <div class="card">

          <div class="card-header">
            <strong class="card-title">Marcas</strong>
          </div>

          <div class="card-body">
            <div class="row">

              <div class="col-md-12">
                <div class="form-group">
                  <label class="required">Marca</label>
                  <input type="hidden" name="id" required>
                  <input type="text" class="form-control" name="name" data-regla="texto" data-msg="Revise el nombre de la marca" required>
                </div>
                <div class="form-group">
                  <label class="required">Orden en el menu</label>
                  <input type="number" name="orden" required>
                </div>
                <div class="form-group">
                  <label class="required">Logo de la marca</label>
                  <span class="badge badge-warning">400px x 400px</span>
                  <input type="file" name="logo">
                </div>
              </div>
              <!--div class="col-md-9">
                <div class="form-group">
                  <textarea name="contenido" class="ckeditor"></textarea>
                </div>
              </div-->

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
  <script src="./js/editar.js"></script>

<?php include "../php/footer.php" ?>
