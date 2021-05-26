<?php
	header('Content-Type: application/json');

	require_once '../../php/conexion.class.php';
	require_once '../../php/tabla.class.php';
	$DB = new DBManager;

	require_once '../model/membresia.class.php';

	$MEMBRESIA = new Membresia($DB);

	$LISTO = array('success'=>true,'title'=>'Exito!','msg'=>'Actualizado correctamente.','class'=>'success','final'=>'location.href="./"');
	$ERRGN = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error, inténtelo más tarde.','class'=>'error');
	$ERRFI = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error al subir archivo: ','class'=>'error');

	$_UPD 		 = array();
	$DIR 		 = "../../../img/membresia/";
	$ID 		 = $_POST['id'];
    $_UPD['mem_name']	= $MEMBRESIA->SanitizarTexto( $_POST['name'] );
    $_UPD['mem_desc']   = $_POST['descripcion'];
    $_UPD['mem_status'] = $_POST['disponible'];
    $_UPD['mem_price']  = $_POST['precio'];

	if ( $_FILES['logo']['error'] == 0 ) {
		$IMG = "neuromex-".$URL."-".$MEMBRESIA->makeURLFILE($_FILES['logo']['name']);
		move_uploaded_file($_FILES['logo']['tmp_name'],$DIR.$IMG);
		$_UPD['trademarck_logo'] = $IMG;
	} else if ( $_FILES['logo']['error'] != 4 ) {
		$DB->Rollback();
		$ERRFI['msg'] = $MEMBRESIA->getFileErrorMSG($_FILES['logo']['error']);
		echo json_encode( $ERRFI );
		exit;
	}

	if ( $MEMBRESIA->update( $_UPD, $ID ) ) echo json_encode( $LISTO );
	else echo json_encode( $ERRGN );

	exit;

?>
