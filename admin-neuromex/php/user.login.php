<?php
	session_start();
	// $res = post_captcha($_POST['g-recaptcha-response']);
	require_once 'conexion.class.php';
	require_once 'tabla.class.php';
	require_once '../mng-inicio/model/users.class.php';

	$DB = new DBManager;
	$users = new Usuario($DB);

	$user = $_POST['email'];
	$pass = md5($_POST['password']);
	//$pass = $_POST['password'];
	$login = $users->login( $user, $pass );

	if( count($login) == 0 ) {
		$_return['success'] = false;
		$_return['msg'] = 'La informacion es incorrecta.';
		echo json_encode($_return);
		die();
	} else {
		$_SESSION['login'] 	= true;
		$_SESSION['id']     = $login[0]['user_id'];
		$_SESSION['user'] 	= $login[0]['name'];
		$_SESSION['email'] 	= $login[0]['email'];

		$_return['success'] = true;
		$_return['msg'] = 'Bienvenido';
		echo json_encode($_return);
		die();
	}

	function v_email( $email ) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) return true;
		else return false;
	}

?>
