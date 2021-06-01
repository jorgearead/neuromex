<?php
	session_start();
	header('Content-Type: application/json');
	require_once '../../php/conexion.class.php';
	require_once '../../php/tabla.class.php';
	require_once '../model/miembros.class.php';

	$DB = new DBManager;
	$users = new Miembro($DB);

    $data = $users->getById($_GET['id']);
	echo json_encode($data);
?>