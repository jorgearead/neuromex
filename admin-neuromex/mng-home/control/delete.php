<?php
session_start();
header('Content-Type: application/json');

require_once '../../php/conexion.class.php';
require_once '../../php/tabla.class.php';
require_once '../model/slider.class.php';
$DB = new DBManager;
$SLIDER = new Slider($DB);

$ID = $_GET['id'];
$hecho = array('success'=>true,'title'=>'Exito!','msg'=>'Eliminado correctamente.','class'=>'success');
$error = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error, inténtelo más tarde.','class'=>'error');

if ( $SLIDER->delete( $ID ) ) echo json_encode( $hecho );
else echo json_encode( $error );

?>
