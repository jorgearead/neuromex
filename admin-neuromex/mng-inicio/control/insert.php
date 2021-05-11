<?php
	header('Content-Type: application/json');
	session_start();
	require_once '../../php/conexion.class.php';
	require_once '../../php/tabla.class.php';
	require_once '../model/users.class.php';

	$DB = new DBManager;
	$users = new Usuario($DB);

	$_valores = array();
	$hecho = array('success'=>true,'title'=>'Exito!','msg'=>'Usuario agregado correctamente.','class'=>'success','final'=>'tabla.ajax.reload();$("#NwUs").modal("hide");');
	$error = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error, inténtelo más tarde.','class'=>'error');

	$_valores['user_name']	= $_POST['name'];
  $_valores['user_mail']	= $_POST['sesion'];
	$_valores['user_pass']	= md5($_POST['contra']);

	if ( $users->insert($_valores) ) echo json_encode($hecho);
	else echo json_encode($error);
?>
