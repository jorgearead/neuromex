<?php
	session_start();

	require_once '../../php/conexion.class.php';
	require_once '../../php/tabla.class.php';
	require_once '../model/producto.class.php';
	require_once '../model/productoslider.class.php';

	$PRODUCTOS = new Producto($DB);
	$SLIDER = new ProductoSlider($DB);

	$ID = $_GET['id'];
	$C = $PRODUCTOS->getById($ID);
	$SL = $PRODUCTOS->getSlider($ID);
	$DIR = "../../../img/productos/";

	$LISTO = array('success'=>true,'title'=>'¡Exito!','msg'=>'Eliminado correctamente.','class'=>'success');
	$ERRGN = array('success'=>false,'title'=>'¡Error!','msg'=>'Ocurrió un error, inténtelo más tarde.','class'=>'error');

  if ( $PRODUCTOS->delete( $ID ) ) {
		foreach ($SL as $S) {
			$SLIDER->delete($S['sp_id']);
			if ( file_exists($DIR.$S['sp_imagen']) ) unlink($DIR.$S['sp_imagen']);
		}
		echo json_encode( $LISTO );
	} else echo json_encode( $ERRGN );

?>
