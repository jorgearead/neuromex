<?php

session_start();
header('Content-Type: text/html');

require_once '../../php/conexion.class.php';
require_once '../../php/tabla.class.php';
require_once '../model/producto.class.php';

$DB = new DBManager;
$PRODUCTOS = new Producto($DB);

$DOCS = $PRODUCTOS->getDocumentos($_GET['id']);

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


echo $TABLADOCS;

?>
