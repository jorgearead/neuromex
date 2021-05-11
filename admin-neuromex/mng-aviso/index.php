<?php
include "../php/header.php";
$FILE = './model/aviso.html';
$DATA = file_get_contents($FILE);

?>

  <div class="content mt-3">
    <div class="animated fadeIn">
      <div class="row">

        <div class="col-md-12">
          <form action="./control/update.php" method="POST" data-confirmar="false">
            <div class="card">
              <div class="card-header">
                <strong class="card-title">Aviso de privacidad</strong>
                <button type="submit" class="btn btn-primary btn-sm pull-right">
                  <i class="fa fa-save"></i>&nbsp;&nbsp;Aceptar
                </button>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <textarea name="contenido" class="ckeditor" required><?=$DATA?></textarea>
                </div>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

  <script src="<?=$URLBASE?>vendors/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="<?=$URLBASE?>vendors/ckfinder/ckfinder.js" type="text/javascript"></script>
  <script src="../js/formularios.js" type="text/javascript"></script>
  <script src="./js/index.js" type="text/javascript"></script>

<?php include "../php/footer.php" ?>
