<?php
  session_start();
  header('Content-Type: application/json');

  require_once '../../php/conexion.class.php';
  require_once '../../php/tabla.class.php';
  require_once '../model/documento.class.php';

  $DB = new DBManager;
  $DOCS = new Documento($DB);

  $DOC = $DOCS->getByID($_GET['id']);

  echo json_encode($DOC);
?>
