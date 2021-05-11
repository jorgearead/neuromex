<?php
class ProductoSlider extends Tabla {

	public function __construct($DB) {
		parent::__construct($DB);
		$this->TABLA = 'tbl_slider_producto';
		$this->PRKEY = 'sp_id';
	}

}
?>
