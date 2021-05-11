<?php

session_start();
header('Content-Type: application/json');

require_once '../../php/conexion.class.php';
require_once '../../php/tabla.class.php';
require_once '../model/producto.class.php';
require_once '../model/productoslider.class.php';

$DB = new DBManager;
$PRODUCTOS = new Producto($DB);

$P = $PRODUCTOS->getById($_GET['id']);
$SLIDER = $PRODUCTOS->getSlider($_GET['id']);

$_RETURN = array (
  "p" => $P,
  "preview" => array(),
  "config" => array()
);

foreach ( $SLIDER as $S ) {
  $_RETURN["preview"][] = "../../img/productos/".$S['sp_imagen'];
  $_RETURN["config"][] = array("caption"=>$S['sp_imagen'],"key"=>$S['sp_id']);
}

echo json_encode($_RETURN);

?>
