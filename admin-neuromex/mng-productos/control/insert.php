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

  $LISTO = array('success'=>true,'title'=>'Exito!','msg'=>'Agregado correctamente.','class'=>'success','final'=>'location.href="./"');
  $ERRGN = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error, inténtelo más tarde.','class'=>'error');
  $ERRFI = array('success'=>false,'title'=>'Error!','msg'=>'Ocurrió un error al subir archivo: ','class'=>'error');

  $DIRIMG = '../../../img/productos/';
  $DIRDOC = '../../../docs/';
  $_INS = array();

  $URL = $PRODUCTOS->makeURL( $_POST['nombre'] );

  $_INS['prod_name'] = $PRODUCTOS->SanitizarTexto( $_POST['nombre'] );
  $_INS['prod_desc'] = $_POST['contenido'];
  $_INS['prod_price'] = $_POST['precio'];
  $_INS['prod_offer_price'] = $_POST['oferta'];
  $_INS['prod_cat'] = array_pop($_POST['categoria']);
  $_INS['prod_trademark'] = $_POST['marca'];
  $_INS['prod_color'] = $_POST['color'];
  $_INS['prod_size'] = $_POST['tamano'];
  $_INS['prod_stock'] = $_POST['stock'];
  //$_INS['prod_status'] = $_POST['disponible'];//checkbox
  //$_INS['prod_rent'] = $_POST['renta'];//checkbox
  $_INS['prod_mem_price'] = $_POST['miembros'];
  $_INS['prod_url'] = $URL;
  //$_INS['prod_resumen'] = $PRODUCTOS->SanitizarTexto( $_POST['resumen'] );
  //$_INS['prod_video'] = str_replace("watch?v=","embed/",$_POST['video']);
  if($_POST['disponible'] != null){
    $_INS['prod_status'] = 1;
  }
  if($_POST['renta'] != null){
    $_INS['prod_rent'] = 1;
  }
  //Guardar imagen principal del producto
  if ( $_FILES['caracteristicas']['error'] == 0 ) {
    $IMG = "neuromex-".$URL.$PRODUCTOS->getExtension($_FILES['caracteristicas']['name']);
    move_uploaded_file($_FILES['caracteristicas']['tmp_name'],$DIRIMG.$IMG);
    $_INS['prod_img'] = $IMG;
  } else if ( $_FILES['caracteristicas']['error'] != 4 ) {
    $DB->Rollback();
    $ERRFI['msg'] = $PRODUCTOS->getFileErrorMSG($_FILES['caracteristicas']['error']);
    echo json_encode( $ERRFI );
    exit;
  }
/*
  if ( $_FILES['diagrama']['error'] == 0 ) {
    $IMG = "pillar-diagrama-".$URL.$PRODUCTOS->getExtension($_FILES['diagrama']['name']);
    move_uploaded_file($_FILES['diagrama']['tmp_name'],$DIRIMG.$IMG);
    $_INS['prod_diagrama'] = $IMG;
  } else if ( $_FILES['diagrama']['error'] != 4 ) {
    $DB->Rollback();
    $ERRFI['msg'] = $PRODUCTOS->getFileErrorMSG($_FILES['diagrama']['error']);
    echo json_encode( $ERRFI );
    exit;
  }*/

  if ( $PRODUCTOS->insert( $_INS ) ) {
    $ID = $DB->GetLastInsertID();
  } else {
    $DB->Rollback();
    echo json_encode( $ERRGN );
    exit;
  }

  foreach ($_FILES["slider"]['error'] as $i => $e) {
    $_SLI = array();
    if ( $e == 0 ) {
      $URLFILE = $SLIDER->makeURLFILE($_FILES['slider']['name'][$i]);
      $TITLE = $SLIDER->makeNombre($_FILES['slider']['name'][$i]);
      $IMG = "neuromex-".$URL."-".$URLFILE;
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
        $DOC = "neuromex-".$URL."-".$URLFILE;

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
