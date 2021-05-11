<?php
	session_start();
	header('Content-Type: text/html');

	require_once '../../php/conexion.class.php';
	require_once '../../php/tabla.class.php';
	$DB = new DBManager;

	require_once '../../mng-catalogo/model/categoria.class.php';
	$CATEGORIAS = new Categoria($DB);

  $CATS = $CATEGORIAS->getAll();
  $_RETURN = '<option disabled selected>Seleccione categoria</option>';
  foreach ($CATS as $C) {
    $_RETURN .= '<option value="'.$C['cat_id'].'">'.$C['cat_nombre'].'</option>';
  }

  echo $_RETURN;
	exit;

?>
