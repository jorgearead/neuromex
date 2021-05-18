<?php
class Marca extends Tabla {

	public function __construct($DB) {
		parent::__construct($DB);
		$this->TABLA = 'tbl_trademarck';
		$this->PRKEY = 'trademarck_id';
	}

	public function RecorrerLugarUP($INDICE, $ORIGEN){
		$SQL = "UPDATE {$this->TABLA} SET trademarck_orden = trademarck_orden+1 WHERE trademarck_orden >= {$INDICE} AND trademarck_orden <= {$ORIGEN} ";
		$RES = $this->CONN->Ejecutar($SQL);
		return $RES;
	}

	public function RecorrerLugarDOWN($INDICE, $ORIGEN){
		$SQL = "UPDATE {$this->TABLA} SET trademarck_orden = trademarck_orden+1 WHERE trademarck_orden >= {$INDICE} AND trademarck_orden <= {$ORIGEN}";
		$RES = $this->CONN->Ejecutar($SQL);
		return $RES;
	}

	public function RecorrerDelete($INDICE){
		$SQL = "UPDATE {$this->TABLA} SET trademarck_orden = trademarck_orden-1 WHERE trademarck_orden > {$INDICE}";
		$RES = $this->CONN->Ejecutar($SQL);
		return $RES;
	}

	public function getNextPosition(){
		$SQL = "SELECT trademarck_orden FROM {$this->TABLA} ORDER BY trademarck_orden DESC LIMIT 1";
		$data	= $this->CONN->Consultar($SQL);
		$NEXT = $data[0]['trademarck_orden']+1;
		return $NEXT;
	}

}
?>
