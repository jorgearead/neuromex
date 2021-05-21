<?php

session_start();
header('Content-Type: application/json');

require_once '../../php/conexion.class.php';
require_once '../../php/tabla.class.php';
require_once '../model/producto.class.php';

$DB = new DBManager;
$PRODUCTOS = new Producto($DB);

$P = $PRODUCTOS->getById($_GET['id']);
$SLIDER = $PRODUCTOS->getSlider($P['prod_id']);
$DOCS = $PRODUCTOS->getDocumentos($P['prod_id']);

$TABLADOCS ="";

foreach ($DOCS as $D) {
  $LOCK = ($D['doc_privado']) ? "fa-lock" : "fa-unlock";
  $OPC = '<i class="fa fa-pencil" data-id="'.$D['doc_id'].'"></i>&nbsp;&nbsp;<i class="fa fa-trash-o" data-id="'.$D['doc_id'].'"></i>';
  $TABLADOCS .= '
    <tr>
      <td><i class="fa '.$LOCK.'" style="font-size:25px"></i></td>
      <td><b>'.$D['doc_nombre'].'</b><br/>'.$D['doc_file'].'</td>
      <td>'.$D['doc_size'].'</td>
      <td>'.$OPC.'</td>
    </tr>';
}

$_RETURN = array (
  "producto" => $P,
  "docs" => $TABLADOCS,
  "preview" => array(),
  "config" => array(),
  "categorias" => array()
);

$_CATES = [];
$CAT = $P['prod_categoria'];
array_push($_CATES,$CAT);

while ( $CAT != 0 ) {
  $_CAT = $PRODUCTOS->getPadre($CAT);
  array_push($_CATES,$_CAT['pc_depende']);
  $CAT = $_CAT['pc_depende'];
}

array_pop($_CATES);
$_RETURN['categorias'] = array_reverse($_CATES);

foreach ( $SLIDER as $S ) {
  $_RETURN["preview"][] = "../../img/productos/".$S['ps_imagen'];
  $_RETURN["config"][] = array("caption"=>$S['ps_imagen'],"key"=>$S['ps_id']);
}

echo json_encode($_RETURN);

?>
