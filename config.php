<?php
//Este archivo es el que se encarga de mandar a llamar tanto a las vistas(home,nosotros,etc.)

$URLORIGEN = "http://localhost/neuro/";
//$URLORIGEN = "http://prueba.neuromex.com.mx/";

$TITLE = "";

$URL = (isset($_GET['url'])) ? $_GET['url'] : "home";

$INTERNA = (file_exists("$URL.php")) ? "./$URL.php" : "./404.php";

require_once 'function/services.class.php';
  $SERVS = new Servicios;

switch ($URL) {
    case 'home':
        $TITLE = "Neuromex";
        break;
    case 'tienda':
        $TITLE = "Tienda Neuromex";
        break;
    case 'carrito':
        $TITLE = "Carrito de compras";
        break;
    case 'finalizar-compra':
        $TITLE = "Finalizar compra";
        break;
    case 'laboratorio':
        $TITLE = "Laboratorio";
        break;
    case 'membresias':
        $TITLE = "Membresia";
        break;
    case 'contacto':
        $TITLE = "Contacto";
        break;
    case 'login':
        $TITLE = "Iniciar sesion";
        break;
    case 'crear-cuenta':
        $TITLE = "Crear cuenta";
        break;
    case 'cuenta-verificada':
        $TITLE = "Cuenta Verificada";
        break;
    default:
        $TITLE = "Neuromex";
        break;
}

if (file_exists("./function/{$INTERNA}")) {
    require_once "./function/{$INTERNA}";
}
