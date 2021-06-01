<?php
class Miembro extends Tabla {

	public function __construct($DB) {
		parent::__construct($DB);
		$this->TABLA = 'tbl_customer';
		$this->PRKEY = 'customer_id';
	}

}
?>
