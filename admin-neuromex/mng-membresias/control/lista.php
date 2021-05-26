<?php
	session_start();
	header('Content-Type: application/json');

	require_once '../../php/conexion.class.php';
	require_once '../../php/tabla.class.php';
	$DB = new DBManager;

	require_once '../model/membresia.class.php';
	$MEMBRESIA = new Membresia($DB);


	// Parametros del cliente
	$WHERE 	= "";
	$JOIN 	= "";
	$DRAW 	= $_GET['draw'];
  	$START 	= $_GET['start'];
  	$ROWS 	= $_GET['length'];
  	$ICOL 	= $_GET['order'][0]['column'];
  	$SORT 	= $_GET['columns'][$ICOL]['name'];
  	$DIR 	= $_GET['order'][0]['dir'];
  	$SEARCH = $MEMBRESIA->SanitizarTexto($_GET['search']['value']);

	// Parametros de búsqueda
	$WHERE = " mem_name LIKE '%{$SEARCH}%' ";//ORDER BY order
	$ORDER = " {$SORT} {$DIR} ";
	$LIMIT = " {$START},{$ROWS} ";

	//Total de registros en la tabla
  	$TR = $MEMBRESIA->getTotalRegistros();

  //Total de registros filtrados
	$TRF = $MEMBRESIA->getNumFiltrados($JOIN,$WHERE);

	//Pagina de registros filtrados
	$RESULTADOS = $MEMBRESIA->getPaginaFiltrados($JOIN,$WHERE,$ORDER,$LIMIT);

	$DATA = array();
	foreach ( $RESULTADOS as $R ) {
		$OPC = "";
		$OPC.= '<a href="./editar.php?id='.$R['mem_id'].'"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;';
		$OPC.= '<i class="fa fa-trash-o del" data-id="'.$R['mem_id'].'"></i>';

    $DATA[] = array (
			"nombre"	=> $R['mem_name'],
			"descripcion"	=> $R['mem_desc'],
			"logo"	=> '<img src="../../img/membresia/'.$R['mem_logo'].'" width="200px">',
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
