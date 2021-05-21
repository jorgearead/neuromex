<?php
session_start();
header('Content-Type: text/html');

require_once '../../php/conexion.class.php';
require_once '../../php/tabla.class.php';
$DB = new DBManager;

require_once '../model/producto.class.php';
$PROD = new Producto($DB);

if ($_GET['id'] == "") {
  echo "0";
  die;
}

$CATS = $PROD->getCates($_GET['id']);
$RET = "";

if (count($CATS) == 0) {
  $RET = "0";
} else {
  $RET .= '<option value="">Seleccione Categoria</option>';
  foreach ($CATS as $C) {
    if ( isset( $_GET['val'] ) && $_GET['val'] == $C['pc_id'] ) {
      $RET .= '<option value="'.$C['pc_id'].'" selected>'.$C['pc_nombre'].'</option>';
    } else {
      $RET .= '<option value="'.$C['pc_id'].'">'.$C['pc_nombre'].'</option>';
    }
  }
}

echo $RET;

?>
