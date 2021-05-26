<?php include "../php/header.php"; ?>

  <link href="<?=$URLBASE?>vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css" media="all" rel="stylesheet" type="text/css"/>

  <div class="content mt-3">
    <div class="animated fadeIn">
      <div class="card">
        <div class="card-header">
          <strong class="card-title">Membresias</strong>
          <a class="btn btn-info btn-sm pull-right" href="./nuevo.php">
            <i class="fa fa-plus"></i> Nuevo
          </a>
        </div>
        <div class="card-body">
          <table id="resultados" class="table table-striped">
            <thead class="thead-dark text-center">
              <tr>
                <th>Nombre</th>
                <th>Descripci&oacute;n</th>
                <th>Logo</th>
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

  <script src="<?=$URLBASE?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?=$URLBASE?>vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="./js/index.js"></script>

<?php include "../php/footer.php" ?>
