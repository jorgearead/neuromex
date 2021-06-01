<?php
	session_start();
	header('Content-Type: application/json');
	require_once '../../php/conexion.class.php';
	require_once '../../php/tabla.class.php';
	require_once '../model/miembros.class.php';

	$DB = new DBManager;
	$users = new Miembro($DB);

	$_valores = array();
	$hecho = array('success'=>true,'title'=>'Exito!','msg'=>'Información actualizada correctamente.','class'=>'success','final'=>'tabla.ajax.reload();$("#EdUs").modal("hide");');
	$error = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error, inténtelo más tarde.','class'=>'error');

	$_valores['name']	   = $_POST['name'];
	$_valores['mail'] 	   = $_POST['mail'];
	$_valores['pass'] 	   = md5($_POST['contra']);
    $_valores['lastname']  = $_POST['lastName'];
    $_valores['phone']     = $_POST['phone'];
    $_valores['classroom'] = $_POST['salon'];
    $_valores['horary']    = $_POST['horario'];
    $_valores['memb'] 	   = $_POST['mem'];

	if( $users->update($_valores,$_POST['id'])) echo json_encode($hecho);
	else echo json_encode($error);
?>