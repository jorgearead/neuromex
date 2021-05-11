<?php
header('Content-Type: application/json');

require_once '../../php/conexion.class.php';
require_once '../../php/tabla.class.php';
$DB = new DBManager;

require_once '../model/categoria.class.php';
$CATES = new Categoria($DB);

$LISTO = array('success'=>true,'title'=>'Exito!','msg'=>'Agregado correctamente.','class'=>'success','final'=>'tabla.ajax.reload();tabla2.ajax.reload();tabla3.ajax.reload();$("#nw-cat").modal("hide");');
$ERRGN = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error, inténtelo más tarde.','class'=>'error');
$ERRFI = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error al subir archivo: ','class'=>'error');

$_INS = array();
$URL = $CATES->makeURL( $_POST['nombre'] );

$_INS['nombre']	= $CATES->SanitizarTexto( $_POST['nombre'] );
$_INS['url']		= $URL;

if ( $_POST['subcat'] != 0 ) {
	$_INS['depende'] = $_POST['subcat'];
	$_INS['nivel'] = 2;
} else if ( $_POST['cat'] != 0 ) {
	$_INS['depende'] = $_POST['cat'];
	$_INS['nivel'] = 1;
} else {
	$_INS['depende'] = $_POST['cat'];
	$_INS['nivel'] = 0;
}

$_INS['orden'] = $CATES->getNextPosition( $_INS['depende'] );

if ( $CATES->insert( $_INS ) ) echo json_encode( $LISTO );
else  echo json_encode( $ERRGN );

exit;

/*header('Content-Type: text/html');
require_once '../../php/conexion.class.php';
$DB = new DBManager;

require_once '../../php/tabla.class.php';
require_once '../model/categoria.class.php';
$CATES = new Categoria($DB);

echo "<ul>";
$CATES->procesar(2,1,0);
echo "</ul>";
*/
?>
