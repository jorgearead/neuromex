<?php
class ProductoSlider extends Tabla {

  public function __construct($DB) {
    parent::__construct($DB);
    $this->TABLA = 'tbl_producto_slider';
    $this->PRKEY = 'ps_id';
  }

}
?>
