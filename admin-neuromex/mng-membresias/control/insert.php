<?php
	header('Content-Type: application/json');

	require_once '../../php/conexion.class.php';
	require_once '../../php/tabla.class.php';
	$DB = new DBManager;

	require_once '../model/membresia.class.php';

	$MEMBRESIA = new Membresia($DB);

	$LISTO = array('success'=>true,'title'=>'Exito!','msg'=>'Agregado correctamente.','class'=>'success','final'=>'location.href="./"');
	$ERRGN = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error, inténtelo más tarde.','class'=>'error');
	$ERRFI = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error al subir archivo: ','class'=>'error');

	$_INS = array();
	$DIR = "../../../img/membresia/";

	$_INS['mem_name']	= $MEMBRESIA->SanitizarTexto( $_POST['name'] );
    $_INS['mem_desc']   = $_POST['descripcion'];
    $_INS['mem_status'] = $_POST['disponible'];
    $_INS['mem_price']  = $_POST['precio'];

	if ( $_FILES['logo']['error'] == 0 ) {
		$IMG = "neuromex-".$MEMBRESIA->makeURLFILE($_FILES['logo']['name']);
		move_uploaded_file($_FILES['logo']['tmp_name'],$DIR.$IMG);
		$_INS['mem_logo'] = $IMG;
	} else {
		$DB->Rollback();
		$ERRFI['msg'] = $MEMBRESIA->getFileErrorMSG($_FILES['name']['error']);
		echo json_encode( $ERRFI );
		exit;
	}

	if ( $MEMBRESIA->insert( $_INS ) ) echo json_encode( $LISTO );
	else echo json_encode( $ERRGN );

	exit;

?>
