<?php
class Slider extends Tabla {

	public function __construct($DB) {
		parent::__construct($DB);
		$this->TABLA = 'tbl_slider';
		$this->PRKEY = 'sli_id';
	}

}
?>
