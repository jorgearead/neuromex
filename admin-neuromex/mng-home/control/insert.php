<?php
  session_start();
  header('Content-Type: application/json');

  require_once '../../php/conexion.class.php';
  require_once '../../php/tabla.class.php';
  require_once '../model/slider.class.php';
  $DB = new DBManager;
  $SLIDER = new Slider($DB);

  $LISTO = array('success'=>true,'title'=>'Exito!','msg'=>'Agregado correctamente.','class'=>'success','final'=>'tabla.ajax.reload();');
  $ERROR = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error, inténtelo más tarde.','class'=>'warning');
  $ERRFI = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error al subir imagen: ','class'=>'warning');

  $_INS = array();

  $DIRIMG = "../../../img/slider/";

  if (isset( $_POST['titulo']) && $_POST['titulo'] != "") $_INS['slider_titulo'] = $SLIDER->SanitizarTexto($_POST['titulo']);
  if (isset( $_POST['texto']) && $_POST['texto'] != "") $_INS['slider_texto'] = $SLIDER->SanitizarTexto($_POST['texto']);

  if ( $_FILES["imagen"]['error'] == 0 ) {
    $IMG = "neuromex-".$SLIDER->makeURLFILE($_FILES["imagen"]['name']);
    move_uploaded_file($_FILES["imagen"]['tmp_name'], $DIRIMG.$IMG);
    $_INS['slider_imagen'] = $IMG;
  } else {
    $ERRFI['msg'] .= $SLIDER->getFileErrorMSG($_FILES["imagen"]['error']);
    echo json_encode($ERRFI);
    exit;
  }

  if ( $SLIDER->insert( $_INS ) ) echo json_encode( $LISTO );
  else  echo json_encode( $ERROR );

?>
