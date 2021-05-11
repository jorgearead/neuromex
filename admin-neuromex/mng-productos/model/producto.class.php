<?php
class Producto extends Tabla {

	public function __construct($DB) {
		parent::__construct($DB);
		$this->TABLA = 'tbl_producto';
		$this->PRKEY = 'prod_id';
	}

	public function getSlider($ID) {
		$SQL = "SELECT * FROM tbl_slider_producto WHERE sp_producto = {$ID}";
		$DATA = $this->CONN->Consultar($SQL);
		return $DATA;
	}

}
?>
