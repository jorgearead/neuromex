<?php
session_start();
  header('Content-Type: application/json');

require_once '../../php/conexion.class.php';
require_once '../../php/tabla.class.php';
$DB = new DBManager;

require_once '../model/categoria.class.php';
$CATES = new Categoria($DB);

$ID = $_POST['id'];
$PF = $_POST['pos'];

$hecho = array('success'=>true,'title'=>'Exito!','msg'=>'Actualizado correctamente.','class'=>'success',"final"=>"tabla.ajax.reload();tabla2.ajax.reload();tabla3.ajax.reload();$('#orden').modal('hide');");
$error = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error, inténtelo más tarde.','class'=>'error');
$nulo = array('success'=>true,'title'=>'Nada por hacer!','msg'=>'La posición no ha cambiado.','class'=>'info');

$P = $CATES->getById($ID);

if ($PF == $P['pc_orden'] ) {
  echo json_encode( $nulo );
  die;
} elseif ($PF < $P['pc_orden'] ) {
  $CATES->RecorrerLugarUP($PF , $P['pc_orden'], $P['pc_depende']);
} else {
  $CATES->RecorrerLugarDOWN($PF , $P['pc_orden'], $P['pc_depende']);
}

$_UPDT['pc_orden'] = $PF;
if ($CATES->update($_UPDT, $ID) ) echo json_encode( $hecho );
else echo json_encode( $error );

?>
