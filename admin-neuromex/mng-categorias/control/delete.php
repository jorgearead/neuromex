<?php
header('Content-Type: application/json');

require_once '../../php/conexion.class.php';
require_once '../../php/tabla.class.php';
$DB = new DBManager;

require_once '../model/categoria.class.php';
$CATES = new Categoria($DB);

$ID = $_GET['id'];
$C = $CATES->getById($ID);

$LISTO = array('success'=>true,'title'=>'¡Exito!','msg'=>'Eliminado correctamente.','class'=>'success');
$ERRGN = array('success'=>false,'title'=>'¡Error!','msg'=>'Ocurrió un error, inténtelo más tarde.','class'=>'error');
$ERRCH = array('success'=>false,'title'=>'¡No se puede eliminar!','msg'=> $C['nombre'].' contiene productos o categorias existentes.','class'=>'warning');

$CHILDS = $CATES->CheckChilds($ID);
if ($CHILDS > 0) {
	echo json_encode( $ERRCH );
	exit;
}

if ( $CATES->delete( $ID ) ) {
	$CATES->RecorrerDelete($C['orden'],$C['depende']);
	echo json_encode( $LISTO );
} else echo json_encode( $ERRGN );

?>
