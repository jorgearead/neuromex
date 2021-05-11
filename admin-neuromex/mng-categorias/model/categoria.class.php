<?php
class Categoria extends Tabla {

	public function __construct($DB) {
		parent::__construct($DB);
		$this->TABLA = 'tbl_producto_categorias';
		$this->PRKEY = 'pc_id';
	}

	public function CheckChilds($ID) {
		$CHILDS = 0;
		$SQL = "SELECT COUNT(*) AS CHILDS FROM tbl_producto_categorias WHERE depende = $ID";
		$HIJOS = $this->CONN->Consultar($SQL);
		$SQLP = "SELECT COUNT(*) AS CHILDS FROM tbl_productos WHERE categoria = $ID";
		$HIJOSP = $this->CONN->Consultar($SQL);
		$CHILDS = $HIJOS[0]['CHILDS'] + $HIJOSP[0]['CHILDS'];
		return $CHILDS;
	}

	public function RecorrerLugarUP($INDICE, $ORIGEN, $DEPENDE) {
		$SQL = "UPDATE {$this->TABLA} SET orden = orden+1 WHERE orden >= {$INDICE}  AND orden <= {$ORIGEN} AND depende = {$DEPENDE}";
		$RES = $this->CONN->Ejecutar($SQL);
		return $RES;
	}

	public function RecorrerLugarDOWN($INDICE, $ORIGEN, $DEPENDE) {
		$SQL = "UPDATE {$this->TABLA} SET orden = orden-1 WHERE orden <= {$INDICE} AND orden >= {$ORIGEN} AND depende = {$DEPENDE}";
		$RES = $this->CONN->Ejecutar($SQL);
		return $RES;
	}

	public function RecorrerDelete($INDICE, $DEPENDE) {
		$SQL = "UPDATE {$this->TABLA} SET orden = orden-1 WHERE orden > {$INDICE} AND depende = {$DEPENDE}";
		$RES = $this->CONN->Ejecutar($SQL);
		return $RES;
	}

	public function getNextPosition($DEPENDE){
		$SQL = "SELECT orden FROM {$this->TABLA} WHERE depende = {$DEPENDE} ORDER BY orden DESC LIMIT 1";
		$data	= $this->CONN->Consultar($SQL);
		$NEXT = $data[0]['orden']+1;
		return $NEXT;
	}

	function procesar ($P,$L,$ID) {
		$SELECT= "SELECT * FROM tbl_menu WHERE id_depen = %d AND level = %d";
		$SQL = sprintf($SELECT,$P,$L);
		$RES = $this->CONN->Consultar($SQL);
		$LEVEL = $L+1;

		foreach ($RES as $O => $R) {
			echo "<li>";
			print_r($R);
			echo "<br/>";
			$_INS = array();
			$_INS['nombre'] = $this->SanitizarTexto($R['cat_name']);
			$_INS['url'] = $this->makeURL($_INS['nombre']);
			$_INS['orden'] = $O+1;
			$_INS['nivel'] = $L-1;
			$_INS['depende'] = $ID;
			print_r($_INS);
			$this->insert($_INS);

			$IDS = $this->CONN->GetLastInsertID();
			$PADRE = $R['menu_id'];
			if ($LEVEL <= 3) {
				echo "<ul>";
				$this->procesar($PADRE,$LEVEL,$IDS);
				echo "</ul>";
			}
			echo "</li>";
		}
	}

}
?>
