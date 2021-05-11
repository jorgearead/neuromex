<?php

require_once '../../php/conexion.class.php';
require_once '../../php/tabla.class.php';
require_once '../model/maquinariaslider.class.php';

$DB = new DBManager;
$SLIDER = new MaquinariaSlider($DB);

$DIR = "../../../img/maquinaria/";
$ID = $_POST['key'];

$S = $SLIDER->getById($ID);

if ( $SLIDER->delete($ID) ) {
  if ( file_exists($DIR.$S['sm_imagen']) ) unlink($DIR.$S['sm_imagen']);
  echo "1";
} else {
  echo "0";
}

?>
