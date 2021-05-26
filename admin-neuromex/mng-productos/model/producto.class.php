<?php
class Producto extends Tabla {

  public function __construct($DB) {
    parent::__construct($DB);
    $this->TABLA = 'tbl_product';
    $this->PRKEY = 'prod_id';
  }

  public function getCategorias($ID) {
    $CATES = array();
    $SQL = "SELECT pc_depende, pc_nombre, pc_nivel FROM tbl_producto_categorias WHERE pc_id = {$ID} ";
    $CATR = $this->CONN->Consultar($SQL);
    $CAT = $CATR[0];
    if ( $CAT['pc_nivel'] == 0 ) {
      array_push($CATES,$CAT['pc_nombre']);
    } else {
      $CATES = $this->getCategorias($CAT['pc_depende']);
      array_push($CATES,$CAT['pc_nombre']);
    }
    return $CATES;
  }

  public function getDocumentos($ID) {
    $SQL = "SELECT * FROM tbl_documentos WHERE doc_producto = {$ID}";
    $RET = $this->CONN->Consultar($SQL);
    return $RET;
  }

  public function getCates($ID) {
    $SQL = "SELECT pc_id, pc_nombre FROM tbl_producto_categorias WHERE pc_depende = {$ID}";
    $CATES = $this->CONN->Consultar($SQL);
    return $CATES;
  }

  public function getMarcas() {
    $SQL = "SELECT trademarck_id, trademarck_name FROM tbl_trademarck ORDER BY trademarck_name ASC";
    $MARCAS = $this->CONN->Consultar($SQL);
    return $MARCAS;
  }

  public function getSlider($ID) {
    $SQL = "SELECT * FROM tbl_producto_slider WHERE ps_producto = {$ID} ";
    $SLIDER = $this->CONN->Consultar($SQL);
    return $SLIDER;
  }

  public function getPadre($P) {
    $SQL = "SELECT pc_id, pc_depende FROM tbl_producto_categorias WHERE pc_id = {$P} LIMIT 1 ";
    $CAT = $this->CONN->Consultar($SQL);
    return $CAT[0];
  }

}

/*------------------Tabla------------------*/
/*-------------prod_id---------------------*/
/*-------------prod_name-------------------*/
/*-------------prod_desc-------------------*/
/*-------------prod_price------------------*/
/*-------------prod_cat--------------------*/
/*-------------prod_img--------------------*/
/*-------------prod_trademark--------------*/
/*-------------prod_ranking----------------*/
/*-------------prod_color------------------*/
/*-------------prod_size-------------------*/
/*-------------prod_stock------------------*/
/*-------------prod_status-----------------*///Si el producto esta activo en la tienda
/*-------------prod_offer_price------------*///El precio de la oferta
/*-------------prod_rent-------------------*///Si el producto esta en renta
/*-------------prod_mem_price--------------*
/*------------------Tabla------------------*/
?>
