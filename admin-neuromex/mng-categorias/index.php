<?php include "../php/header.php"; ?>

  <link href="<?=$URLBASE?>vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css" media="all" rel="stylesheet" type="text/css"/>
  <link href="<?=$URLBASE?>vendors/fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css"/>

  <div class="breadcrumbs">
    <div class="col-sm-4">
      <div class="page-header float-left">
        <div class="page-title">
          <h1>Categor&iacute;as de productos</h1>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <button type="button" class="btn btn-info btn-sm pull-right mt-2" data-toggle="modal" data-target="#nw-cat">
        <i class="fa fa-plus"></i>&nbsp;&nbsp;Nuevo
      </button>
    </div>
 </div>

  <div class="content mt-3">
    <div class="animated fadeIn">
      <div class="row">

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="card">
            <div class="card-header">
              <strong class="card-title">Nivel 1</strong>
            </div>
            <div class="card-body">
              <table id="resultados" class="table table-striped">
                <thead class="thead-dark text-center">
                  <tr>
                    <th>Orden</th>
                    <th>Categor&iacute;a</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table><hr>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="card">
            <div class="card-header">
              <strong class="card-title">Nivel 2</strong>
            </div>
            <div class="card-body">
              <table id="resultados2" class="table table-striped">
                <thead class="thead-dark text-center">
                  <tr>
                    <th>Orden</th>
                    <th>Categor&iacute;a</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table><hr>
            </div>
          </div>
        </div>

      <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="card">
            <div class="card-header">
              <strong class="card-title">Nivel 3</strong>
            </div>
            <div class="card-body">
              <table id="resultados3" class="table table-striped">
                <thead class="thead-dark text-center">
                  <tr>
                    <th>Orden</th>
                    <th>Categor&iacute;a</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table><hr>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="nw-cat" tabindex="-1" role="dialog" aria-labelledby="nw-cat-Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="nw-cat-Label">Nueva categor&iacute;a</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="./control/insert.php" method="POST" data-confirmar="false" autocomplete="off">
          <div class="modal-body">
            <div class="form-group">
              <label class="required">Nombre</label>
              <input type="text" class="form-control" name="nombre" data-regla="texto" data-msg="Revise el nombre de la categoría" required>
            </div>
            <div class="form-group">
              <label class="required">Categor&iacute;a</label>
              <select class="form-control" name="cat" id="ncat" required>
                <option value="0">Independiente</option>
              </select>
            </div>
            <div class="form-group">
              <label class="required">Subcategor&iacute;a</label>
              <select class="form-control" name="subcat" id="nscat" required>
                <option value="0">Independiente</option>
              </select>
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

  <div class="modal fade" id="ed-cat" tabindex="-1" role="dialog" aria-labelledby="ed-cat-Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ed-cat-Label">Editar Categoria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="./control/update.php" method="POST" data-confirmar="false" autocomplete="off">
          <div class="modal-body">
            <div class="form-group">
              <label class="required">Nombre</label>
              <input type="hidden" name="id" required>
              <input type="text" class="form-control" name="nombre" data-regla="texto" data-msg="Revise el nombre de la categoría" required>
            </div>
            <div class="form-group">
              <label class="required">Categor&iacute;a</label>
              <select class="form-control" name="cat" id="ecat" required>
                <option value="0">Independiente</option>
              </select>
            </div>
            <div class="form-group">
              <label class="required">Subcategor&iacute;a</label>
              <select class="form-control" name="subcat" id="escat" required>
                <option value="0">Independiente</option>
              </select>
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

  <div class="modal fade" id="orden" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ajustar orden</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="./control/orden.php" method="POST" data-fin="reload" data-tabla="tabla.ajax.reload()" data-extra="none">
          <div class="modal-body">
            <div class="form-group">
              <label>Posici&oacute;n</label>
              <input type="hidden" name="id" value="" required>
              <input type="number" class="form-control" name="pos" min="1" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Cancelar</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Aceptar</button>
          </div>
        </form>
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
