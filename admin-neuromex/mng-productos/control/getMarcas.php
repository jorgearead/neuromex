<?php
session_start();
header('Content-Type: text/html');

require_once '../../php/conexion.class.php';
require_once '../../php/tabla.class.php';
$DB = new DBManager;

require_once '../model/producto.class.php';
$PROD = new Producto($DB);

$MARCAS = $PROD->getMarcas();
$RET = "";

$RET .= '<option value="">Seleccione Marca</option>';
foreach ($MARCAS as $C) {
  $RET .= '<option value="'.$C['trademarck_id'].'">'.$C['trademarck_name'].'</option>';
}

echo $RET;

?>
