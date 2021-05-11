<?php
	session_start();
	header('Content-Type: application/json');

	require_once '../../php/conexion.class.php';
	require_once '../../php/tabla.class.php';
	require_once '../model/producto.class.php';
	require_once '../model/productoslider.class.php';

	$DB = new DBManager;
	$PRODUCTOS = new Producto($DB);
	$SLIDER = new ProductoSlider($DB);

	$DB->BeginTransaction();
	$ID = $_POST['id'];

	$LISTO = array('success'=>true,'title'=>'Exito!','msg'=>'Agregado correctamente.','class'=>'success','final'=>'location.href="./"');
	$ERRGN = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error, inténtelo más tarde.','class'=>'error');
	$ERRFI = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error al subir archivo: ','class'=>'error');

	$DIRIMG = '../../../img/productos/';
	$DIRPDF = '../../../pdf/productos/';
	$_UPD = array();

	$URL = $PRODUCTOS->makeURL( $_POST['nombre'] );

	$_UPD['prod_nombre']		= $PRODUCTOS->SanitizarTexto( $_POST['nombre'] );
	$_UPD['prod_contenido']	= $_POST['contenido'];
	$_UPD['prod_categoria']	= $_POST['categoria'];
	$_UPD['prod_url']				= $URL;

	if ( $_FILES['ficha']['error'] == 0 ) {
		$IMG = "mjb-".$URL.$PRODUCTOS->getExtension($_FILES['ficha']['name']);
		move_uploaded_file($_FILES['ficha']['tmp_name'],$DIRPDF.$IMG);
		$_UPD['prod_ficha'] = $IMG;
	} else if ( $_FILES['ficha']['error'] != 4 ) {
		$DB->Rollback();
		$ERRFI['msg'] = $PRODUCTOS->getFileErrorMSG($_FILES['ficha']['error']);
		echo json_encode( $ERRFI );
		exit;
	}

	foreach ($_FILES["slider"]['error'] as $i => $e) {
		$_SLI = array();
		if ( $e == 0 ) {
			$IMG = "mjb-".$URL."-".$SLIDER->makeURLFILE($_FILES['slider']['name'][$i]);
			move_uploaded_file($_FILES['slider']['tmp_name'][$i],$DIRIMG.$IMG);
			$_SLI['sp_imagen'] = $IMG;
			$_SLI['sp_producto'] = $ID;
			$SLIDER->insert( $_SLI );
		} else if ( $e != 4 ) {
			$DB->Rollback();
			$ERRFI['msg'] = $SLIDER->getFileErrorMSG($_FILES['slider']['error'][$i]);
			echo json_encode( $ERRFI );
			exit;
		}
	}

	if ( $PRODUCTOS->update( $_UPD, $ID ) ) {
		$DB->Commit();
		echo json_encode( $LISTO );
		exit;
	} else {
		$DB->Rollback();
		echo json_encode( $ERRGN );
		exit;
	}

?>
