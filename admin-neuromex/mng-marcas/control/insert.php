<?php
	header('Content-Type: application/json');

	require_once '../../php/conexion.class.php';
	require_once '../../php/tabla.class.php';
	$DB = new DBManager;

	require_once '../model/marca.class.php';

	$MARCA = new Marca($DB);

	$LISTO = array('success'=>true,'title'=>'Exito!','msg'=>'Agregado correctamente.','class'=>'success','final'=>'location.href="./"');
	$ERRGN = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error, inténtelo más tarde.','class'=>'error');
	$ERRFI = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error al subir archivo: ','class'=>'error');

	$_INS = array();
	$DIR = "../../../img/marcas/";
	$URL = $MARCA->makeURL( $_POST['name'] );

	$_INS['name']	= $MARCA->SanitizarTexto( $_POST['name'] );
	$_INS['logo']	= $_POST['logo'];
	$_INS['orden']	= $MARCA->getNextPosition();
	$_INS['url'] 	= $URL;

	if ( $_FILES['logo']['error'] == 0 ) {
		$IMG = "pillar-".$URL."-".$MARCA->makeURLFILE($_FILES['logo']['name']);
		move_uploaded_file($_FILES['logo']['tmp_name'],$DIR.$IMG);
		$_INS['logo'] = $IMG;
	} else {
		$DB->Rollback();
		$ERRFI['msg'] = $MARCA->getFileErrorMSG($_FILES['name']['error']);
		echo json_encode( $ERRFI );
		exit;
	}

	if ( $MARCA->insert( $_INS ) ) echo json_encode( $LISTO );
	else echo json_encode( $ERRGN );

	exit;

?>
