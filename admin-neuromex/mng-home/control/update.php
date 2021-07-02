<?php
  session_start();
  header('Content-Type: application/json');

  require_once '../../php/conexion.class.php';
  require_once '../../php/tabla.class.php';
  require_once '../model/slider.class.php';
  $DB = new DBManager;
  $SLIDER = new Slider($DB);

  $LISTO = array('success'=>true,'title'=>'Exito!','msg'=>'Actualizado correctamente.','class'=>'success','final'=>'tabla.ajax.reload();$("#editar").hide();$("#nuevo").show();');
  $ERROR = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error, inténtelo más tarde.','class'=>'warning');
  $ERRFI = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error al subir imagen: ','class'=>'warning');

  $_UPD = array();

  $DIRIMG = "../../../img/slider/";
  $ID = $_POST['id'];

  if (isset( $_POST['titulo']) && $_POST['titulo'] != "") $_UPD['slider_titulo'] = $SLIDER->SanitizarTexto($_POST['titulo']);
  if (isset( $_POST['texto']) && $_POST['texto'] != "") $_UPD['slider_texto'] = $SLIDER->SanitizarTexto($_POST['texto']);

  if (empty($_POST['hipervinculo'])){
    $LINK = "#";
  }else{
    $LINK = $SLIDER->SanitizarTexto($_POST['hipervinculo']);
  }

  $_UPD['slider_link'] = $LINK;

  if ( $_FILES["imagen"]['error'] == 0 ) {
    $IMG = "neuromex-".$SLIDER->makeURLFILE($_FILES["imagen"]['name']);
    move_uploaded_file($_FILES["imagen"]['tmp_name'], $DIRIMG.$IMG);
    $_UPD['slider_imagen'] = $IMG;
  } else if ($_FILES["imagen"]["error"] != 4){
    $ERRFI['msg'] .= $SLIDER->getFileErrorMSG($_FILES["imagen"]['error']);
    echo json_encode($ERRFI);
    exit;
  }

  if ( $SLIDER->update( $_UPD, $ID ) ) echo json_encode( $LISTO );
  else  echo json_encode( $ERROR );

?>
