<?php
session_start();
header('Content-Type: application/json');

require_once '../../php/conexion.class.php';
require_once '../../php/tabla.class.php';
$DB = new DBManager;

require_once '../model/producto.class.php';
$PRODUCTO = new Producto($DB);

// Parametros del cliente
$WHERE = "";
$JOIN = "";
$DRAW = $_GET['draw'];
$START = $_GET['start'];
$ROWS = $_GET['length'];
$ICOL = $_GET['order'][0]['column'];
$SORT = $_GET['columns'][$ICOL]['name'];
$DIR = $_GET['order'][0]['dir'];
$SEARCH = $_GET['search']['value'];

if ( $SEARCH != null && $SEARCH != "" ) {
  $WHERE .= " ( prod_name LIKE '{$SEARCH}%' OR prod_trademark LIKE '%{$SEARCH}%' ) ";
} else {
  $WHERE .= " 1 ";
}

//JOIN con categorias
$JOIN .= " INNER JOIN tbl_producto_categorias ON prod_cat = pc_id ";
$JOIN .= " INNER JOIN tbl_trademarck ON prod_trademark = trademarck_id ";

$ORDER = " {$SORT} {$DIR} ";
$LIMIT = " {$START},{$ROWS} ";

//Total de registros en la tabla
$TR = $PRODUCTO->getTotalRegistros();

//Total de registros filtrados
$TRF = $PRODUCTO->getNumFiltrados($JOIN,$WHERE);

//Pagina de registros filtrados
$RESULTADOS = $PRODUCTO->getPaginaFiltrados($JOIN,$WHERE,$ORDER,$LIMIT);

$DATA = array();
foreach ( $RESULTADOS as $R ) {

  //Construir categorias
  $CATS = $PRODUCTO->getCategorias($R['prod_cat']);

  $OPC = "";
  $OPC.= '<a href="./editar.php?id='.$R['prod_id'].'"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;';
  $OPC.= '<i class="fa fa-trash-o" data-id="'.$R['prod_id'].'"></i>';

  $DATA[] = array (
    "producto"  => $R['prod_name'],
    "categoria" => $CATES,
    "marca" => $R['trademarck_name'],
    "precio"  => $R['prod_price'],
    "oferta"  => $R['prod_offer_price'],
    "renta"  => $R['prod_rent'],
    "opciones"  => $OPC
  );

}

$_RETURN = array (
  "draw" => intval($DRAW),
  "iTotalRecords" => $TR,
  "iTotalDisplayRecords" => $TRF,
  "aaData" => $DATA
);

echo json_encode($_RETURN);
exit;
