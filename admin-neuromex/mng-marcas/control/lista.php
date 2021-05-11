<?php
	session_start();
	header('Content-Type: application/json');

	require_once '../../php/conexion.class.php';
	require_once '../../php/tabla.class.php';
	$DB = new DBManager;

	require_once '../model/marca.class.php';
	$MARCA = new Marca($DB);


	// Parametros del cliente
	$WHERE 	= "";
	$JOIN 	= "";
	$DRAW 	= $_GET['draw'];
  	$START 	= $_GET['start'];
  	$ROWS 	= $_GET['length'];
  	$ICOL 	= $_GET['order'][0]['column'];
  	$SORT 	= $_GET['columns'][$ICOL]['name'];
  	$DIR 	= $_GET['order'][0]['dir'];
  	$SEARCH = $MARCA->SanitizarTexto($_GET['search']['value']);

	// Parametros de búsqueda
	$WHERE = " name LIKE '%{$SEARCH}%' ";//ORDER BY order
	$ORDER = " {$SORT} {$DIR} ";
	$LIMIT = " {$START},{$ROWS} ";

	//Total de registros en la tabla
  	$TR = $MARCA->getTotalRegistros();

  //Total de registros filtrados
	$TRF = $MARCA->getNumFiltrados($JOIN,$WHERE);

	//Pagina de registros filtrados
	$RESULTADOS = $MARCA->getPaginaFiltrados($JOIN,$WHERE,$ORDER,$LIMIT);

	$DATA = array();
	foreach ( $RESULTADOS as $R ) {
		if(!empty($R['logo'])){
			$img = $R['logo'];
		}else{
			$img = "img_relleno.png";
		}
		$OPC = "";
		$OPC.= '<a href="./editar.php?id='.$R['marca_id'].'"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;';
		$OPC.= '<i class="fa fa-trash-o del" data-id="'.$R['marca_id'].'"></i>';

    $DATA[] = array (
			"marca"	=> $R['name'],
			"orden"	=> $R['orden'],
			"logo"	=> '<img src="../../img/marcas/'.$img.'" width="200px">',
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
