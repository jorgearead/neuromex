<?php
header('Content-Type: text/html');

require_once "../php/conexion.class.php";
require_once "./services.class.php";

$DATA = new Servicios;
$BUSCAR = $DATA->SanitizarTexto($_GET['search']);

$MAQS = $DATA->BuscarMaquinaria($BUSCAR);
$PROS = $DATA->BuscarProducto($BUSCAR);
$URLBASE = "https://www.netweb.mx/daniel/mjb/";
$_RETURN = "<ul>";

if ( count($MAQS) == 0 && count($PROS) == 0 ) {
  echo "<h1>No se encontraron resultados</h1>";
}

if ( count($MAQS) != 0 ) {
  foreach ($MAQS as $M) {
    $_RETURN .= "<a href=\"{$URLBASE}/maquinaria\"><li>{$M['maq_nombre']}</li></a>";
  }
}

if ( count($PROS) != 0 ) {
  foreach ($PROS as $P) {
    $_RETURN .= "<a href=\"{$URLBASE}/producto/{$P['prod_url']}\"><li>{$P['prod_nombre']}</li></a>";
  }
}

$_RETURN .= "</ul>";

echo $_RETURN;

?>
