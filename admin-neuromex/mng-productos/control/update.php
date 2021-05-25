<?php
  session_start();
  header('Content-Type: application/json');

  require_once '../../php/conexion.class.php';
  require_once '../../php/tabla.class.php';
  require_once '../model/documento.class.php';
  require_once '../model/producto.class.php';
  require_once '../model/productoslider.class.php';

  $DB = new DBManager;
  $PRODUCTOS = new Producto($DB);
  $SLIDER = new ProductoSlider($DB);
  $DOCS = new Documento($DB);

  $DB->BeginTransaction();

  $LISTO = array('success'=>true,'title'=>'Exito!','msg'=>'Actualizado correctamente.','class'=>'success','final'=>'location.href="./"');
  $ERRGN = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error, inténtelo más tarde.','class'=>'error');
  $ERRFI = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error al subir archivo: ','class'=>'error');

  $DIRIMG = '../../../img/productos/';
  $DIRDOC = '../../../docs/';
  $_UPD = array();

  $URL = $PRODUCTOS->makeURL( $_POST['nombre'] );
  $ID = $_POST['id'];

  $_UPD['prod_nombre'] = $PRODUCTOS->SanitizarTexto( $_POST['nombre'] );
  $_UPD['prod_resumen'] = $PRODUCTOS->SanitizarTexto( $_POST['resumen'] );
  $_UPD['prod_descripcion'] = $_POST['contenido'];
  //$_UPD['prod_video'] = str_replace("watch?v=","embed/",$_POST['video']);
  $_UPD['prod_marca'] = $_POST['marca'];
  $_UPD['prod_categoria'] = array_pop($_POST['categoria']);
  $_UPD['prod_url'] = $URL;

  //Guardar imagenes de caracteristicas y diagrama de uso
  if ( $_FILES['caracteristicas']['error'] == 0 ) {
    $IMG = "pillar-caracteristicas-".$URL.$PRODUCTOS->getExtension($_FILES['caracteristicas']['name']);
    move_uploaded_file($_FILES['caracteristicas']['tmp_name'],$DIRIMG.$IMG);
    $_UPD['prod_caracteristicas'] = $IMG;
  } else if ( $_FILES['caracteristicas']['error'] != 4 ) {
    $DB->Rollback();
    $ERRFI['msg'] = $PRODUCTOS->getFileErrorMSG($_FILES['caracteristicas']['error']);
    echo json_encode( $ERRFI );
    exit;
  }

  if ( $_FILES['diagrama']['error'] == 0 ) {
    $IMG = "pillar-diagrama-".$URL.$PRODUCTOS->getExtension($_FILES['diagrama']['name']);
    move_uploaded_file($_FILES['diagrama']['tmp_name'],$DIRIMG.$IMG);
    $_UPD['prod_diagrama'] = $IMG;
  } else if ( $_FILES['diagrama']['error'] != 4 ) {
    $DB->Rollback();
    $ERRFI['msg'] = $PRODUCTOS->getFileErrorMSG($_FILES['diagrama']['error']);
    echo json_encode( $ERRFI );
    exit;
  }

  if ( !$PRODUCTOS->update( $_UPD, $ID ) ) {
    $DB->Rollback();
    echo json_encode( $ERRGN );
    exit;
  }

  foreach ($_FILES["slider"]['error'] as $i => $e) {
    $_SLI = array();
    if ( $e == 0 ) {
      $URLFILE = $SLIDER->makeURLFILE($_FILES['slider']['name'][$i]);
      $TITLE = $SLIDER->makeNombre($_FILES['slider']['name'][$i]);
      $IMG = "pillar-".$URL."-".$URLFILE;
      move_uploaded_file($_FILES['slider']['tmp_name'][$i],$DIRIMG.$IMG);
      $_SLI['ps_imagen'] = $IMG;
      $_SLI['ps_title'] = $TITLE;
      $_SLI['ps_alt'] = $URLFILE;
      $_SLI['ps_producto'] = $ID;
      $SLIDER->insert( $_SLI );
    } else if ( $e != 4 ) {
      $DB->Rollback();
      $ERRFI['msg'] = $SLIDER->getFileErrorMSG($_FILES['slider']['error'][$i]);
      echo json_encode( $ERRFI );
      exit;
    }
  }

  if ( isset( $_FILES['files'] ) ) {
    foreach ($_FILES["files"]['error'] as $i => $e) {
      $_DOC = array();
      if ( $e == 0 ) {
        $URLFILE = $DOCS->makeURL($_POST['filename'][$i]);
        $URLFILE .= $DOCS->getExtension($_FILES['files']['name'][$i]);
        $DOC = "pillar-".$URL."-".$URLFILE;

        $SIZE =  $DOCS->formatBytes( $_FILES['files']['size'][$i] );
        move_uploaded_file($_FILES['files']['tmp_name'][$i],$DIRDOC.$DOC);

        $_DOC['doc_nombre'] = $DOCS->SanitizarTexto($_POST['filename'][$i]);
        $_DOC['doc_file'] = $DOC;
        $_DOC['doc_size'] = $SIZE;
        $_DOC['doc_privado'] = $_POST['privado'][$i];
        $_DOC['doc_producto'] = $ID;
        $DOCS->insert( $_DOC );
      } else if ( $e != 4 ) {
        $DB->Rollback();
        $ERRFI['msg'] = $DOCS->getFileErrorMSG($_FILES['files']['error'][$i]);
        echo json_encode( $ERRFI );
        exit;
      }
    }
  }


  $DB->Commit();
  echo json_encode( $LISTO );
  exit;

?>
