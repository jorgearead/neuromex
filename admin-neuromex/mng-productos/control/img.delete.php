<?php

require_once '../../php/conexion.class.php';
require_once '../../php/tabla.class.php';
require_once '../model/productoslider.class.php';

$DB = new DBManager;
$SLIDER = new ProductoSlider($DB);

$DIR = "../../../img/productos/";
$ID = $_POST['key'];

$S = $SLIDER->getById($ID);

if ( $SLIDER->delete($ID) ) {
  if ( file_exists($DIR.$S['ps_imagen']) ) unlink($DIR.$S['ps_imagen']);
  echo "1";
} else {
  echo "0";
}

?>
