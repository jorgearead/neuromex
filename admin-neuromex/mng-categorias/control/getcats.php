<?php
session_start();
header('Content-Type: text/html');

require_once '../../php/conexion.class.php';
require_once '../../php/tabla.class.php';
$DB = new DBManager;

require_once '../model/categoria.class.php';
$CATES = new Categoria($DB);

$SQL = "SELECT * FROM tbl_producto_categorias WHERE pc_depende = {$_GET['id']} AND pc_nivel = {$_GET['ni']} ORDER BY pc_orden ASC";
$RES = $CATES->CONN->Consultar($SQL);

$RETURN = '<option value="0">Independiente</option>';
foreach ($RES as $R) {
	$RETURN .= '<option value="'.$R['pc_id'].'">'.$R['pc_nombre'].'</option>';
}

echo $RETURN;

?>
