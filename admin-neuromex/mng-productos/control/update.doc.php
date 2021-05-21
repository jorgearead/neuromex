<?php
  session_start();
  header('Content-Type: application/json');

  require_once '../../php/conexion.class.php';
  require_once '../../php/tabla.class.php';
  require_once '../model/documento.class.php';

  $DB = new DBManager;
  $DOCS = new Documento($DB);


  $LISTO = array('success'=>true,'title'=>'Exito!','msg'=>'Agregado correctamente.','class'=>'success','final'=>'llenarTabla();$("#ed-doc").modal("hide");');
  $ERRGN = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error, inténtelo más tarde.','class'=>'error');
  $ERRFI = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error al subir archivo: ','class'=>'error');

  $DIRDOC = '../../../docs/';
  $_DOC = array();

  $URL = $_POST['urlprod'];
  $ID = $_POST['id'];

  $_DOC['doc_nombre'] = $DOCS->SanitizarTexto( $_POST['nombre'] );
  $_DOC['doc_privado'] = ( isset($_POST['privado']) && $_POST['privado'] == 1 ) ? 1 : 0;


  if ( $_FILES['documento']['error'] == 0 ) {
    $URLFILE = $DOCS->makeURL($_POST['nombre']);
    $URLFILE .= $DOCS->getExtension($_FILES['documento']['name']);
    $DOC = "pillar-".$URL."-".$URLFILE;

    $SIZE =  $DOCS->formatBytes( $_FILES['documento']['size'] );
    move_uploaded_file($_FILES['documento']['tmp_name'],$DIRDOC.$DOC);

    $_DOC['doc_file'] = $DOC;
    $_DOC['doc_size'] = $SIZE;
  } else if ( $_FILES['documento']['error'] != 4 ) {
    $ERRFI['msg'] = $DOCS->getFileErrorMSG($_FILES['documento']['error']);
    echo json_encode( $ERRFI );
    exit;
  }

  if ( $DOCS->update( $_DOC, $ID ) ) {
    echo json_encode( $LISTO );
  } else {
    echo json_encode( $ERRGN );
  }

?>
