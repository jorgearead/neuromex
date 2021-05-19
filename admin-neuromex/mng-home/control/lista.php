<?php
session_start();
header('Content-Type: application/json');

require_once '../../php/conexion.class.php';
require_once '../../php/tabla.class.php';
$DB = new DBManager;

require_once '../model/slider.class.php';
$SLIDERS = new Slider($DB);

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

// Parametros de búsqueda
$WHERE .= "1";

$ORDER = " {$SORT} {$DIR} ";
$LIMIT = " {$START},{$ROWS} ";

//Total de registros en la tabla
$TR = $SLIDERS->getTotalRegistros();

//Total de registros filtrados
$TRF = $SLIDERS->getNumFiltrados($JOIN,$WHERE);

//Pagina de registros filtrados
$RESULTADOS = $SLIDERS->getPaginaFiltrados($JOIN,$WHERE,$ORDER,$LIMIT);

$DATA = array();
foreach ( $RESULTADOS as $R ) {

  $OPC = "";
  $OPC.= '<i class="fa fa-pencil" data-id="'.$R['slider_id'].'" data-titulo="'.$R['slider_titulo'].'" data-texto="'.$R['slider_texto'].'" data-imagen="'.$R['slider_imagen'].'"></i>&nbsp;&nbsp;';
  $OPC.= '<i class="fa fa-trash-o" data-id="'.$R['slider_id'].'"></i>';

  $DATA[] = array (
    "texto" => "<b>".$R['slider_titulo']."</b><p>".$R['slider_texto']."</p>",
    "imagen"  => '<img src="../../img/slider/'.$R['slider_imagen'].'" width="100px">',
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
