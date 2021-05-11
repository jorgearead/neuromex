<?php include "../php/header.php"; ?>

<link href="<?=$URLBASE?>vendors/fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css"/>

  <div class="content mt-3">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-md-12">

          <div class="card">
            <form action="./control/insert.php" method="POST" data-confirmar="false" autocomplete="off">
              <div class="card-header">
                <strong class="card-title">Agregar Producto</strong>
                <button type="submit" class="btn btn-primary btn-sm pull-right">
                  <i class="fa fa-save"></i>&nbsp;Aceptar
                </button>
                <a href="./" class="btn btn-secondary btn-sm pull-right">
                  <i class="fa fa-times"></i>&nbsp;Cancelar
                </a>
              </div>
              <div class="card-body">
                <div class="row">

                  <div class="col-md-6">

                    <div class="form-group">
                      <label class="required">Nombre</label>
                      <input type="text" class="form-control" name="nombre" data-regla="numletras" data-msg="Ingresar un nombre de producto válido" required>
                    </div>
                    <div class="form-group">
                      <label class="required">Categor&iacute;a</label>
                      <select class="form-control" name="categoria" required>

                      </select>
                    </div>

                    <div class="form-group">
                      <label class="required">Contenido</label>
                      <textarea name="contenido" class="ckeditor" required></textarea>
                    </div>

                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Ficha t&eacute;cnica</label>&nbsp;
                      <span class="badge badge-danger">Documento PDF</span>
                      <input type="file" name="ficha">
                    </div>
                    <div class="form-group">
                      <label class="required">Slider de imágenes</label>&nbsp;
                      <span class="badge badge-warning">720px x 720px</span>
                      <input type="file" name="slider[]" multiple required>
                    </div>
                  </div>

                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div><!-- .animated -->
  </div><!-- .content -->

  <script src="<?=$URLBASE?>vendors/ckeditor/ckeditor.js" type="text/javascript"></script>
  <script src="<?=$URLBASE?>vendors/fileinput/js/fileinput.js" type="text/javascript"></script>
	<script src="<?=$URLBASE?>vendors/fileinput/js/locales/es.js" type="text/javascript"></script>
  <script src="<?=$URLBASE?>js/formularios.js" type="text/javascript"></script>
  <script src="./js/nuevo.js" type="text/javascript"></script>

<?php include "../php/footer.php" ?>
