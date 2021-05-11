<?php
	session_start();
	require_once '../../php/conexion.class.php';
	require_once '../../php/tabla.class.php';
	require_once '../model/users.class.php';

	$DB = new DBManager;
	$users = new Usuario($DB);

  $data = $users->getAll();
  $nodo = array('data' => array());

	foreach ($data as $value) {

		$options 	= '<span>';
		$options .= '<i title="Editar usuario" class="fa fa-pencil pre_edit-sm" onclick="editar('.$value['user_id'].');"></i>&nbsp;&nbsp;';
		$options .= '<i title="Eliminar usuario" class="fa fa-trash-o pre_erase-sm pre_eraseFN" data-pro="'.$value['user_id'].'"></i>';
		$options .= '</span>';

    $nodo['data'][] = array(
			$value['email'],
			$value['name'] ,
			$options
		);

	}
	echo json_encode($nodo);
?>
