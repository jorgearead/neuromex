<?php
class Usuario extends Tabla {

	public function __construct($DB) {
		parent::__construct($DB);
		$this->TABLA = 'tbl_user';
		$this->PRKEY = 'user_id';
	}

	public function login ($user, $password) {
		$sql = "SELECT * FROM {$this->TABLA} WHERE email = \"%s\" AND pass = \"%s\"";
		$sql = sprintf($sql,$user,$password);
		$data	=$this->CONN->Consultar($sql);
		return $data;
	}

}
?>
