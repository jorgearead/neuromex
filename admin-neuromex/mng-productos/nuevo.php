<?php include "../php/header.php"; ?>
<style>
  .input-group .file-input{width: 93.82%;}
</style>

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

                  <div class="col-md-5">

                    <div class="form-group">
                      <label class="required">Nombre</label>
                      <input type="text" class="form-control" name="nombre" data-regla="numletras" data-msg="Ingresar un nombre de producto válido" required>
                    </div>
                    <div class="form-group">
                      <label class="required">Precio</label>
                      <input type="text" class="form-control" name="precio" data-regla="decimal" data-msg="Ingresar un precio de producto válido" required>
                    </div>
                    <div class="form-group">
                      <label>Precio de oferta</label>
                      <input type="text" class="form-control" name="oferta" data-regla="decimal" data-msg="Ingresar un precio de producto válido">
                    </div>
                    <div class="form-group">
                      <label>Precio a miembros</label>
                      <input type="text" class="form-control" name="miembros" data-regla="decimal" data-msg="Ingresar un precio de producto válido">
                    </div>
                    <div class="form-group">
                      <label>Tamaño</label>
                      <input type="text" class="form-control" name="tamano" data-regla="numletras" data-msg="Ingresar un tamaño del producto válido">
                    </div>
                    <div class="form-group">
                      <label class="required">Color</label>
                      <input type="text" class="form-control" name="color" data-regla="letras" data-msg="Ingresar un color de producto válido" required>
                    </div>
                    <div class="form-group">
                      <label class="required">Piezas en stock</label>
                      <input type="number" class="form-control" name="stock" data-regla="entero" data-msg="Ingresar un numero entero valido" required>
                    </div>
                    <div class="form-group">
                      <!--label class="required w-50">Disponible al publico</label>
                      <input type="checkbox" class="form-control w-25" name="disponible" required-->
                      <div class="form-check form-switch">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Disponible al publico</label>
                        <select name="disponible" class="custom-select" id="inputGroupSelect02">
                            <option value="1">Disponible</option>
                            <option value="0">No disponible</option>
                        </select>
                      </div>
                      <div class="form-check form-switch">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Disponible para renta</label>
                        <select name="renta" class="custom-select" id="inputGroupSelect02">
                            <option value="1">Disponible</option>
                            <option value="0">No disponible</option>
                        </select>
                      </div>
                      
                    </div>
                    <!--div class="form-group">
                      <label class="required">Resumen</label>
                      <input type="text" class="form-control" name="resumen" data-regla="texto" data-msg="Ingresar un nombre de producto válido" required>
                    </div>
                    <div class="form-group">
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
                    <div id="documentos">
                      <h4>
                        Documentos
                        <button class="btn btn-info" type="button"><i class="fa fa-plus"></i>&nbsp;&nbsp;Agregar archivo</button>
                      </h4>
                    </div>
                  </div>

                  <div class="col-md-7">
                    <div class="form-group">
                      <label class="required">Descripci&oacute;n del producto</label>
                      <textarea name="contenido" class="ckeditor" required></textarea>
                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="required">Slider de imágenes</label>&nbsp;
                      <span class="badge badge-warning">250px x 200px</span>
                      <input type="file" name="slider[]" multiple required>
                    </div>
                  </div>

                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script src="<?=$URLBASE?>vendors/ckeditor/ckeditor.js" type="text/javascript"></script>
  <script src="<?=$URLBASE?>vendors/fileinput/js/fileinput.js" type="text/javascript"></script>
  <script src="<?=$URLBASE?>vendors/fileinput/js/locales/es.js" type="text/javascript"></script>
  <script src="<?=$URLBASE?>js/formularios.js" type="text/javascript"></script>
  <script src="./js/nuevo.js" type="text/javascript"></script>

<?php include "../php/footer.php" ?>
