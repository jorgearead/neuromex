<?php
	session_start();
	header('Content-Type: text/html');

	require_once '../../php/conexion.class.php';
	require_once '../../php/tabla.class.php';
	$DB = new DBManager;

	require_once '../../mng-catalogo/model/categoria.class.php';
	$CATEGORIAS = new Categoria($DB);

  $CATS = $CATEGORIAS->getAll();
  $_RETURN = '<li data-id="0" class="active">Todas</li>';
  foreach ($CATS as $C) {
    $_RETURN .= '<li data-id="'.$C['cat_id'].'">'.$C['cat_nombre'].'</li>';
  }

  echo $_RETURN;
	exit;

?>
