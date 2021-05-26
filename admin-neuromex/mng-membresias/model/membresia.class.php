<?php
class Membresia extends Tabla{
    public function __construct($DB){
        parent::__construct($DB);
        $this->TABLA = 'tbl_membership';
        $this->PRKEY = 'mem_id';
    }
}

?>