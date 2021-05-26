<?php
	header('Content-Type: application/json');

	require_once '../../php/conexion.class.php';
	require_once '../../php/tabla.class.php';
	$DB = new DBManager;

	require_once '../model/membresia.class.php';
	$MEMBRESIA = new Membresia($DB);

	$ID = $_GET['id'];
	$B = $MEMBRESIA->getById($_GET['id']);

  echo json_encode($B);

?>