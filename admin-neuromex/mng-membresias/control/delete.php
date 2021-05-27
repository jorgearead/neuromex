<?php
	header('Content-Type: application/json');

	require_once '../../php/conexion.class.php';
	require_once '../../php/tabla.class.php';
	$DB = new DBManager;
	
	require_once '../model/membresia.class.php';

	$MEMBRESIA = new Membresia($DB);

	$ID = $_GET['id'];
	$C = $MEMBRESIA->getById($ID);
	$DIR = "../../../img/membresia/";

	$LISTO = array('success'=>true,'title'=>'¡Exito!','msg'=>'Eliminado correctamente.','class'=>'success');
	$ERRGN = array('success'=>false,'title'=>'¡Error!','msg'=>'Ocurrió un error, inténtelo más tarde.','class'=>'error');

  if ( $MEMBRESIA->delete( $ID ) ) {
		if ( file_exists($DIR.$C['mem_logo']) ) unlink($DIR.$C['mem_logo']);
		echo json_encode( $LISTO );
	} else echo json_encode( $ERRGN );

?>
