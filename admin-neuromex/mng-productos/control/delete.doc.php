<?php
  session_start();

  require_once '../../php/conexion.class.php';
  require_once '../../php/tabla.class.php';
  require_once '../model/documento.class.php';

  $DB = new DBManager;

  $DOCS = new Documento($DB);

  $ID = $_GET['id'];
  $D = $DOCS->getById($ID);
  $DIR = "../../../docs/";

  $LISTO = array('success'=>true,'title'=>'¡Exito!','msg'=>'Eliminado correctamente.','class'=>'success');
  $ERRGN = array('success'=>false,'title'=>'¡Error!','msg'=>'Ocurrió un error, inténtelo más tarde.','class'=>'error');

  if ( $DOCS->delete( $ID ) ) {
    if ( file_exists($DIR.$D['doc_file']) ) unlink($DIR.$D['doc_file']);
    echo json_encode( $LISTO );
  } else echo json_encode( $ERRGN );

?>
