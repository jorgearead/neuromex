<?php
	session_start();
	header('Content-Type: application/json');

	require_once '../../php/conexion.class.php';
	require_once '../../php/tabla.class.php';
	require_once '../model/slider.class.php';
	$DB = new DBManager;
	$SLIDER = new Slider($DB);

	$LISTO = array('success'=>true,'title'=>'Exito!','msg'=>'Actualizado correctamente.','class'=>'success','final'=>'tabla.ajax.reload();$("#editar").hide();$("#nuevo").show();');
	$ERROR = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error, inténtelo más tarde.','class'=>'warning');
	$ERRFI = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error al subir: ','class'=>'warning');

	$_UPD = array();

	$DIRIMG = "../../../img/slider/";
	$ID = $_POST['id'];

	if (isset( $_POST['texto']) && $_POST['texto'] != "") $_UPD['sli_texto'] = $SLIDER->SanitizarTexto($_POST['texto']);

	if ( $_FILES["desk"]['error'] == 0 ) {
		$IMG = "mjb_".$SLIDER->makeURLFILE($_FILES["desk"]['name']);
		move_uploaded_file($_FILES["desk"]['tmp_name'], $DIRIMG.$IMG);
		$_UPD['sli_desk'] = $IMG;
	} else if ( $_FILES["desk"]['error'] != 4 ) {
		$ERRFI['msg'] .= $SLIDER->getFileErrorMSG($_FILES["desk"]['error']);
		echo json_encode($ERRFI);
		exit;
	}

	if ( $_FILES["mobile"]['error'] == 0 ) {
		$IMG = "mjb_mobile_".$SLIDER->makeURLFILE($_FILES["mobile"]['name']);
		move_uploaded_file($_FILES["mobile"]['tmp_name'], $DIRIMG.$IMG);
		$_UPD['sli_mobile'] = $IMG;
	} else if ( $_FILES["mobile"]['error'] != 4 ) {
		$ERRFI['msg'] .= $SLIDER->getFileErrorMSG($_FILES["mobile"]['error']);
		echo json_encode($ERRFI);
		exit;
	}


	if ( $SLIDER->update( $_UPD, $ID ) ) echo json_encode( $LISTO );
	else  echo json_encode( $ERROR );

?>
