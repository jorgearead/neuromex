<?php
session_start();
header('Content-Type: application/json');

require_once '../../php/conexion.class.php';
require_once '../../php/tabla.class.php';
$DB = new DBManager;

require_once '../model/categoria.class.php';
$CATES = new Categoria($DB);

// Parametros del cliente
$WHERE = "";
$JOIN = "";
$DRAW = $_GET['draw'];
$START = $_GET['start'];
$ROWS = $_GET['length'];
$ICOL = $_GET['order'][0]['column'];
$SORT = $_GET['columns'][$ICOL]['name'];
$DIR = $_GET['order'][0]['dir'];
$SEARCH = $CATES->SanitizarTexto($_GET['search']['value']);
$NIVEL = $_GET['nivel'];

// Parametros de búsqueda
$WHERE = " pc_nivel = {$NIVEL} ";
if ( isset($_GET['padre']) && $_GET['padre'] != 0 ) {
  $WHERE .= " AND pc_depende = {$_GET['padre']} ";
}
if ($SEARCH != null && $SEARCH != "") {
  $WHERE .= " AND pc_nombre LIKE '{$SEARCH}%' ";
}
$ORDER = " {$SORT} {$DIR} ";
$LIMIT = " {$START},{$ROWS} ";

//Total de registros en la tabla
$TR = $CATES->getTotalRegistros();

//Total de registros filtrados
$TRF = $CATES->getNumFiltrados($JOIN,$WHERE);

//Pagina de registros filtrados
$RESULTADOS = $CATES->getPaginaFiltrados($JOIN,$WHERE,$ORDER,$LIMIT);

$DATA = array();
foreach ( $RESULTADOS as $R ) {
  $OPC = "";

  if ( $NIVEL < 2 ) {
    $OPC .= '<i class="fa fa-list-ul" data-nivel="'.$NIVEL.'" data-id="'.$R['pc_id'].'"></i>&nbsp;&nbsp;';
  }

  $OPC.= '<i class="fa fa-pencil edit" data-id="'.$R['pc_id'].'"></i>&nbsp;&nbsp;';
  $OPC.= '<i class="fa fa-trash-o del" data-id="'.$R['pc_id'].'"></i>';

  $ORD = '<i class="fa fa-sort" data-id="'.$R['pc_id'].'" data-orden="'.$R['pc_orden'].'"></i>&nbsp;&nbsp;';
  $ORD .= $R['pc_orden'];

  $DATA[] = array (
    "orden" => $ORD,
    "nombre"  => $R['pc_nombre'],
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

?>
