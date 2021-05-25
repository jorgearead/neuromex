<?php include "../php/header.php"; ?>

<link href="<?=$URLBASE?>vendors/fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css"/>
<style>
  .input-group .file-input{width: 94.89%;}
</style>

  <script>
    const id = <?=$_GET['id']?>;
  </script>

  <div class="content mt-3">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-md-12">

          <div class="card">
            <form action="./control/update.php" method="POST" data-confirmar="false" autocomplete="off">
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

                  <div class="col-md-5">

                    <div class="form-group">
                      <label class="required">Nombre</label>
                      <input type="hidden" name="id" required>
                      <input type="text" class="form-control" name="nombre" data-regla="numletras" data-msg="Ingresar un nombre de producto válido" required>
                    </div>
                    <div class="form-group">
                      <label class="required">Resumen</label>
                      <input type="text" class="form-control" name="resumen" data-regla="texto" data-msg="Ingresar un nombre de producto válido" required>
                    </div>
                    <!--div class="form-group">
                      <label>Video</label>&nbsp;&nbsp;<span class="badge badge-danger">URL de youtube</span>
                      <input type="text" class="form-control" name="video" data-regla="web" data-msg="Ingresar una URL de YouTube válida.">
                    </div-->
                    <div class="form-group">
                      <label class="required">Marca</label>
                      <select class="form-control" name="marca" required></select>
                    </div>
                    <div class="form-group">
                      <label class="required">Categor&iacute;a</label>
                      <select class="form-control" name="categoria[]" required></select>
                    </div>
                    <div class="form-group">
                      <label>Imagen principal del producto</label>&nbsp;
                      <label class="badge badge-success">Imagen</label>
                      <label class="badge badge-warning">250 x 200 px</label>
                      <input type="file" name="caracteristicas">
                    </div>
                    <!--div class="form-group">
                      <label>Diagrama de uso</label>&nbsp;
                      <label class="badge badge-success">Imagen</label>
                      <label class="badge badge-warning">1300 x 850 px</label>
                      <input type="file" name="diagrama">
                    </div-->
                  </div>

                  <div class="col-md-7">
                    <div class="form-group">
                      <label class="required">Contenido</label>
                      <textarea name="contenido" class="ckeditor" required></textarea>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <table class="table table-striped table-bordered align-middle" id="archivos">
                      <thead class="thead-dark text-center">
                        <th><i class="fa fa-shield"></i></th>
                        <th>Nombre</th>
                        <th>Tama&ntilde;o</th>
                        <th></th>
                      </thead>
                      <tbody></tbody>
                    </table>
                  </div>

                  <div class="col-md-6">
                    <div id="documentos">
                      <h4>
                        Nuevos Documentos
                        <button class="btn btn-info" type="button"><i class="fa fa-plus"></i>&nbsp;&nbsp;Agregar archivo</button>
                      </h4>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="required">Slider de imágenes</label>&nbsp;
                      <span class="badge badge-warning">720px x 720px</span>
                      <input type="file" name="slider[]" multiple>
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

  <div class="modal fade" id="ed-doc" tabindex="-1" role="dialog" aria-labelledby="ed-doc-Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ed-doc-Label">Editar Documento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="./control/update.doc.php" method="POST" data-confirmar="false" autocomplete="off">
          <div class="modal-body">
            <div class="form-group">
              <label class="required">Nombre</label>
              <input type="hidden" name="id" required>
              <input type="hidden" name="urlprod" required>
              <input type="text" class="form-control" name="nombre" data-regla="texto" data-msg="Revise el nombre del documento." required>
            </div>
            <div class="form-group">
              <label>
                <input type="checkbox" name="privado" value="1" />
                Archivo protegido
              </label>
            </div>
           <div class="form-group">
              <label>Documento</label>
              <input type="file" name="documento">
            </div>
         </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-secondary pull-right" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Cancelar</button>
            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i>&nbsp;&nbsp;Aceptar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="<?=$URLBASE?>vendors/ckeditor/ckeditor.js" type="text/javascript"></script>
  <script src="<?=$URLBASE?>vendors/fileinput/js/fileinput.js" type="text/javascript"></script>
  <script src="<?=$URLBASE?>vendors/fileinput/js/locales/es.js" type="text/javascript"></script>
  <script src="<?=$URLBASE?>js/formularios.js" type="text/javascript"></script>
  <script src="./js/editar.js" type="text/javascript"></script>

<?php include "../php/footer.php" ?>
