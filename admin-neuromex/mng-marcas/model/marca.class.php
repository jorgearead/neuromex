<?php
class Marca extends Tabla {

	public function __construct($DB) {
		parent::__construct($DB);
		$this->TABLA = 'tbl_marcas';
		$this->PRKEY = 'marca_id';
	}

	public function RecorrerLugarUP($INDICE, $ORIGEN){
		$SQL = "UPDATE {$this->TABLA} SET orden = orden+1 WHERE orden >= {$INDICE} AND orden <= {$ORIGEN} ";
		$RES = $this->CONN->Ejecutar($SQL);
		return $RES;
	}

	public function RecorrerLugarDOWN($INDICE, $ORIGEN){
		$SQL = "UPDATE {$this->TABLA} SET orden = orden+1 WHERE orden >= {$INDICE} AND orden <= {$ORIGEN}";
		$RES = $this->CONN->Ejecutar($SQL);
		return $RES;
	}

	public function RecorrerDelete($INDICE){
		$SQL = "UPDATE {$this->TABLA} SET orden = orden-1 WHERE orden > {$INDICE}";
		$RES = $this->CONN->Ejecutar($SQL);
		return $RES;
	}

	public function getNextPosition(){
		$SQL = "SELECT orden FROM {$this->TABLA} ORDER BY orden DESC LIMIT 1";
		$data	= $this->CONN->Consultar($SQL);
		$NEXT = $data[0]['orden']+1;
		return $NEXT;
	}

}
?>
