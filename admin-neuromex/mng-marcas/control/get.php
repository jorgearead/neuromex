<?php
	header('Content-Type: application/json');

	require_once '../../php/conexion.class.php';
	require_once '../../php/tabla.class.php';
	$DB = new DBManager;

	require_once '../model/marca.class.php';
	$MARCA = new Marca($DB);

	$ID = $_GET['id'];
	$B = $MARCA->getById($_GET['id']);

  echo json_encode($B);

?>
