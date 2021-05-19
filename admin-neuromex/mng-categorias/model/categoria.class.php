<?php
class Categoria extends Tabla {

  public function __construct($DB) {
    parent::__construct($DB);
    $this->TABLA = 'tbl_producto_categorias';
    $this->PRKEY = 'pc_id';
  }

  public function CheckChilds($ID) {
    $CHILDS = 0;
    $SQL = "SELECT COUNT(*) AS CHILDS FROM tbl_producto_categorias WHERE pc_depende = $ID";
    $HIJOS = $this->CONN->Consultar($SQL);
    $SQLP = "SELECT COUNT(*) AS CHILDS FROM tbl_product WHERE prod_categoria = $ID";
    $HIJOSP = $this->CONN->Consultar($SQL);
    $CHILDS = $HIJOS[0]['CHILDS'] + $HIJOSP[0]['CHILDS'];
    return $CHILDS;
  }

  public function RecorrerLugarUP($INDICE, $ORIGEN, $DEPENDE) {
    $SQL = "UPDATE {$this->TABLA} SET pc_orden = pc_orden+1 WHERE pc_orden >= {$INDICE}  AND pc_orden <= {$ORIGEN} AND pc_depende = {$DEPENDE}";
    $RES = $this->CONN->Ejecutar($SQL);
    return $RES;
  }

  public function RecorrerLugarDOWN($INDICE, $ORIGEN, $DEPENDE) {
    $SQL = "UPDATE {$this->TABLA} SET pc_orden = pc_orden-1 WHERE pc_orden <= {$INDICE} AND pc_orden >= {$ORIGEN} AND pc_depende = {$DEPENDE}";
    $RES = $this->CONN->Ejecutar($SQL);
    return $RES;
  }

  public function RecorrerDelete($INDICE, $DEPENDE) {
    $SQL = "UPDATE {$this->TABLA} SET pc_orden = pc_orden-1 WHERE pc_orden > {$INDICE} AND pc_depende = {$DEPENDE}";
    $RES = $this->CONN->Ejecutar($SQL);
    return $RES;
  }

  public function getNextPosition($DEPENDE){
    $SQL = "SELECT pc_orden FROM {$this->TABLA} WHERE pc_depende = {$DEPENDE} ORDER BY pc_orden DESC LIMIT 1";
    $data  = $this->CONN->Consultar($SQL);
    $NEXT = $data[0]['pc_orden']+1;
    return $NEXT;
  }
}
?>

