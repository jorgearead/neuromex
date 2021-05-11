<?php
header('Content-Type: application/json');

require_once '../../php/conexion.class.php';
require_once '../../php/tabla.class.php';
$DB = new DBManager;

require_once '../model/categoria.class.php';
$CATES = new Categoria($DB);

$ID = $_GET['id'];
$CAT = $CATES->getById($ID);

if ($CAT['nivel'] == 2) {
	$PADRE = $CATES->getById($CAT['depende']);
	$CAT['depende2'] = $PADRE['depende'];
}

echo json_encode($CAT);

?>
