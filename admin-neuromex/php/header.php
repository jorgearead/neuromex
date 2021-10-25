<?php
session_start();
$URLBASE = 'http://localhost/neuromex/admin-neuromex/';
$icono = 'http://localhost/neuromex/img/favicon.png';
$logo = 'http://localhost/neuromex/img/logo.png';
if (empty($_SESSION['user'])) echo '<script>location.href="http://localhost/neuromex/";</script>';

$URL = $_SERVER["REQUEST_URI"];
$MOD = str_replace("/neuro/admin-neuromex/", "", $URL);
$MOD = preg_replace("/[a-z\-]+\.php$/", "", $MOD);
$MOD = preg_replace("/\/+$/", "", $MOD);
?>
<!doctype html>
<html class="no-js" lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrador Neuromex</title>
  <meta name="description" content="Administrador Neuromex">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?= $icono ?>">
  <link rel="stylesheet" href="<?= $URLBASE ?>vendors/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $URLBASE ?>vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= $URLBASE ?>vendors/themify-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= $URLBASE ?>vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?= $URLBASE ?>vendors/selectFX/css/cs-skin-elastic.css">
  <link rel="stylesheet" href="<?= $URLBASE ?>vendors/sweetalert/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="<?= $URLBASE ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= $URLBASE ?>assets/css/estilos.css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  <script>
    var url = '<?= $URLBASE ?>';
  </script>
  <script src="<?= $URLBASE ?>vendors/jquery/dist/jquery.min.js"></script>
  <script src="<?= $URLBASE ?>vendors/popper.js/dist/umd/popper.min.js"></script>
  <script src="<?= $URLBASE ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= $URLBASE ?>vendors/sweetalert/dist/sweetalert2.min.js"></script>
  <script src="<?= $URLBASE ?>js/functions.js"></script>
</head>

<body>

  <!-- Left Panel -->
  <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
      <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="./"><img src="<?= $logo ?>" alt="Logo"></a>
        <a class="navbar-brand hidden" href="./"><img src="<?= $logo ?>" alt="Logo"></a>
      </div>

      <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li <?php if ($MOD == "mng-inicio") : ?>class="active" <?php endif; ?>>
            <a href="<?= $URLBASE ?>mng-inicio"> <i class="menu-icon fa fa-users"></i>&nbsp;&nbsp;Usuarios</a>
          </li>

          <h3 class="menu-title">Contenido</h3>

          <li <?php if ($MOD == "mng-home") : ?>class="active" <?php endif; ?>>
            <a href="<?= $URLBASE ?>mng-home"><i class="menu-icon fa fa-home"></i>&nbsp;&nbsp;Home</a>
          </li>
          <li <?php if ($MOD == "mng-aviso") : ?>class="active" <?php endif; ?>>
            <a href="<?= $URLBASE ?>mng-aviso"><i class="menu-icon fa fa-copyright"></i>&nbsp;&nbsp;Aviso de privacidad</a>
          </li>
          <li <?php if ($MOD == "mng-marcas") : ?>class="active" <?php endif; ?>>
            <a href="<?= $URLBASE ?>mng-marcas"><i class="menu-icon fa fa-trademark"></i>&nbsp;&nbsp;Marcas</a>
          </li>
          <li <?php if ($MOD == "mng-categorias") : ?>class="active" <?php endif; ?>>
            <a href="<?= $URLBASE ?>mng-categorias"><i class="menu-icon fa fa-sitemap"></i>&nbsp;&nbsp;Categor&iacute;as de productos</a>
          </li>
          <li <?php if ($MOD == "mng-productos") : ?>class="active" <?php endif; ?>>
            <a href="<?= $URLBASE ?>mng-productos"><i class="menu-icon fa fa-shopping-cart"></i>&nbsp;&nbsp;Productos</a>
          </li>
          <li <?php if ($MOD == "mng-membresias") : ?>class="active" <?php endif; ?>>
            <a href="<?= $URLBASE ?>mng-membresias"><i class="menu-icon fa fa-id-card-o"></i>&nbsp;&nbsp;Membresias</a>
          </li>

          <h3 class="menu-title">Administraci&oacute;n</h3>

          <li <?php if ($MOD == "mng-miembros") : ?>class="active" <?php endif; ?>>
            <a href="<?= $URLBASE ?>mng-miembros"><i class="menu-icon fa fa-universal-access"></i>&nbsp;&nbsp;Miembros</a>
          </li>
          <li <?php if ($MOD == "mng-ventas") : ?>class="active" <?php endif; ?>>
            <a href="<?= $URLBASE ?>mng-ventas"><i class="menu-icon fa fa-bar-chart"></i>&nbsp;&nbsp;Ventas</a>
          </li>
          <li <?php if ($MOD == "mng-pedidos") : ?>class="active" <?php endif; ?>>
            <a href="<?= $URLBASE ?>mng-pedidos"><i class="menu-icon fa fa-shopping-basket"></i>&nbsp;&nbsp;Pedidos</a>
          </li>

        </ul>
      </div>
    </nav>
  </aside>
  <!-- Left Panel -->

  <!-- Right Panel -->
  <div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">
      <div class="header-menu">

        <div class="col-sm-7">
          <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
        </div>

        <div class="col-sm-5">
          <div class="user-area dropdown float-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="user-avatar rounded-circle" src="<?= $URLBASE ?>images/user.png" alt="User Avatar">
            </a>
            <div class="user-menu dropdown-menu">
              <a class="nav-link" href="<?= $URLBASE ?>php/salir.php"><i class="fa fa-power-off"></i> Cerrar sesi&oacute;n</a>
            </div>
          </div>
        </div>

      </div>
    </header>
    <!-- Header -->