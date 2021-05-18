<?php
	header('Content-Type: application/json');

	require_once '../../php/conexion.class.php';
	require_once '../../php/tabla.class.php';
	$DB = new DBManager;

	require_once '../model/marca.class.php';

	$MARCA = new Marca($DB);

	$LISTO = array('success'=>true,'title'=>'Exito!','msg'=>'Actualizado correctamente.','class'=>'success','final'=>'location.href="./"');
	$ERRGN = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error, inténtelo más tarde.','class'=>'error');
	$ERRFI = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error al subir archivo: ','class'=>'error');

	$_UPD 		 = array();
	$DIR 		 = "../../../img/marcas/";
	$ID 		 = $_POST['id'];
	$URL 		 = $MARCA->makeURL( $_POST['name'] );
	$_UPD['trademarck_url'] = $URL;
	$_UPD['trademarck_name']= $MARCA->SanitizarTexto( $_POST['name'] );

	$P = $MARCA->getById($ID);
	$PF	= $_POST['orden'];

	if ($PF == $P['trademarck_orden'] ) {
		echo json_encode( $nulo );
		die;
	  } elseif ($PF < $P['trademarck_orden'] ) {
		$MARCA->RecorrerLugarUP($PF , $P['trademarck_orden']);
	  } else {
		$MARCA->RecorrerLugarDOWN($PF , $P['trademarck_orden']);
	  }
	$_UPD['trademarck_orden'] = $PF;

	if ( $_FILES['logo']['error'] == 0 ) {
		$IMG = "neuromex-".$URL."-".$MARCA->makeURLFILE($_FILES['logo']['name']);
		move_uploaded_file($_FILES['logo']['tmp_name'],$DIR.$IMG);
		$_UPD['trademarck_logo'] = $IMG;
	} else if ( $_FILES['logo']['error'] != 4 ) {
		$DB->Rollback();
		$ERRFI['msg'] = $MARCA->getFileErrorMSG($_FILES['logo']['error']);
		echo json_encode( $ERRFI );
		exit;
	}

	if ( $MARCA->update( $_UPD, $ID ) ) echo json_encode( $LISTO );
	else echo json_encode( $ERRGN );

	exit;

?>
