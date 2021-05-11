<?php
	session_start();
	header('Content-Type: application/json');
	require_once '../../php/conexion.class.php';
	require_once '../../php/tabla.class.php';
	require_once '../model/users.class.php';

	$DB = new DBManager;
	$users = new Usuario($DB);

	$id = $_GET['id'];
	$users->delete($id);

?>
