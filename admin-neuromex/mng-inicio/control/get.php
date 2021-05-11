<?php
	session_start();
	header('Content-Type: application/json');
	require_once '../../php/conexion.class.php';
	require_once '../../php/tabla.class.php';
	require_once '../model/users.class.php';

	$DB = new DBManager;
	$users = new Usuario($DB);

  $data = $users->getById($_GET['id']);
	echo json_encode($data);
?>
