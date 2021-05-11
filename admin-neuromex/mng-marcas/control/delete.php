<?php
	header('Content-Type: application/json');

	require_once '../../php/conexion.class.php';
	require_once '../../php/tabla.class.php';
	$DB = new DBManager;
	
	require_once '../model/marca.class.php';

	$MARCA = new Marca($DB);

	$ID = $_GET['id'];
	$C = $MARCA->getById($ID);
	$DIR = "../../../img/marcas/";

	$LISTO = array('success'=>true,'title'=>'¡Exito!','msg'=>'Eliminado correctamente.','class'=>'success');
	$ERRGN = array('success'=>false,'title'=>'¡Error!','msg'=>'Ocurrió un error, inténtelo más tarde.','class'=>'error');

  if ( $MARCA->delete( $ID ) ) {
		if ( file_exists($DIR.$C['logo']) ) unlink($DIR.$C['logo']);
		echo json_encode( $LISTO );
	} else echo json_encode( $ERRGN );

?>
