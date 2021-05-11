<?php
	session_start();
	header('Content-Type: application/json');

	require_once '../../php/conexion.class.php';
	require_once '../../php/tabla.class.php';
	require_once '../model/slider.class.php';
	$DB = new DBManager;
	$SLIDER = new Slider($DB);

	$LISTO = array('success'=>true,'title'=>'Exito!','msg'=>'Agregado correctamente.','class'=>'success','final'=>'tabla.ajax.reload();');
	$ERROR = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error, inténtelo más tarde.','class'=>'warning');
	$ERRFI = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error al subir: ','class'=>'warning');

	$_INS = array();

	$DIRIMG = "../../../img/slider/";

	if (isset( $_POST['texto']) && $_POST['texto'] != "") $_INS['sli_texto'] = $SLIDER->SanitizarTexto($_POST['texto']);

	if ( $_FILES["desk"]['error'] == 0 ) {
		$IMG = "mjb_".$SLIDER->makeURLFILE($_FILES["desk"]['name']);
		move_uploaded_file($_FILES["desk"]['tmp_name'], $DIRIMG.$IMG);
		$_INS['sli_desk'] = $IMG;
	} else {
		$ERRFI['msg'] .= $SLIDER->getFileErrorMSG($_FILES["desk"]['error']);
		echo json_encode($ERRFI);
		exit;
	}

	if ( $_FILES["mobile"]['error'] == 0 ) {
		$IMG = "mjb_mobile_".$SLIDER->makeURLFILE($_FILES["mobile"]['name']);
		move_uploaded_file($_FILES["mobile"]['tmp_name'], $DIRIMG.$IMG);
		$_INS['sli_mobile'] = $IMG;
	} else {
		$ERRFI['msg'] .= $SLIDER->getFileErrorMSG($_FILES["mobile"]['error']);
		echo json_encode($ERRFI);
		exit;
	}

	if ( $SLIDER->insert( $_INS ) ) echo json_encode( $LISTO );
	else  echo json_encode( $ERROR );

?>
