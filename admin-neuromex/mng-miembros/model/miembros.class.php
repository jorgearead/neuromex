<?php
class Miembro extends Tabla {

	public function __construct($DB) {
		parent::__construct($DB);
		$this->TABLA = 'tbl_customer';
		$this->PRKEY = 'customer_id';
	}
	public function makeRandom() {
		$CHARS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$CL = strlen($CHARS);
		$RAND = "";
		for ($i = 0; $i < 20; $i++) {
		  $RAND .= $CHARS[rand(0, $CL-1)];
		}
		return $RAND;
	  }
	
	  public function login($USER,$PASS) {
		$SQL = "SELECT * FROM tbl_customer WHERE mail = '{$USER}' AND pass = '{$PASS}'";
		$RET = $this->CONN->Consultar($SQL);
		return $RET;
	  }

}
?>
