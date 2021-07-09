<?php
header('Content-Type: text/plain');

require_once '../../php/conexion.class.php';
require_once '../../php/tabla.class.php';
$DB = new DBManager;

require_once '../model/cliente.class.php';
$CLIENTE = new Cliente($DB);

$_INS = array();
$_INS['name'] = $CLIENTE->SanitizarTexto( $_POST['nombre'] );
$_INS['lastname'] = $CLIENTE->SanitizarTexto( $_POST['apellidos'] );
$_INS['mail'] = $CLIENTE->SanitizarTexto( $_POST['email'] );
$_INS['pass'] = MD5($_POST['password']);

$_INS['verification'] = $CLIENTE->makeRandom();

if ( $CLIENTE->insert( $_INS ) ) {
  $_REPLACE = array(
    "nombre" => $_INS['name']." ".$_INS['lastname'],
    "enlace" => "localhost://neuro/verificar-cuenta/".$_INS['verification']
  );
  $HTML = file_get_contents("../templates/verificacion.html");

  foreach ($_REPLACE as $S => $R) {
    $HTML = str_replace($S,$R,$HTML);
  }

  $TO = $_INS['mail'];
  $ASUNTO = "Verificar cuenta Neuromex";

  // Para enviar un correo HTML, debe establecerse la cabecera Content-type
  $HEADS  = 'MIME-Version: 1.0' . "\r\n";
  $HEADS .= 'Content-type: text/html; charset=utf-8' . "\r\n";

  // HEADS adicionales
  $HEADS .= "To: {$_INS['name']} {$_INS['lastname']} <{$_INS['mail']}> \r\n";
  $HEADS .= 'From: Neuromex <no-reply@neuromex.com.mx>' . "\r\n";
  $HEADS .= 'Bcc: jorge.arellano@neuromex.com.mx' . "\r\n";

  // Enviarlo
  //mail($TO, $ASUNTO, $HTML, $HEADS);

  echo 1;
} else 0;
?>
