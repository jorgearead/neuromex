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
		$OPC.= '<i class="fa fa-pencil" data-id="'.$R['sli_id'].'" data-text="'.$R['sli_texto'].'" data-desk="'.$R['sli_desk'].'" data-mobi="'.$R['sli_mobile'].'"></i>&nbsp;&nbsp;';
		$OPC.= '<i class="fa fa-trash-o" data-id="'.$R['sli_id'].'"></i>';

    $DATA[] = array (
			"texto" => $R['sli_texto'],
			"desk"	=> '<img src="../../img/slider/'.$R['sli_desk'].'" width="100px">',
			"mobile"	=> '<img src="../../img/slider/'.$R['sli_mobile'].'" width="50px">',
			"opciones"	=> $OPC
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
