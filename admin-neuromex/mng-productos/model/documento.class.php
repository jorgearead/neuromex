<?php

class Documento extends Tabla {

  public function __construct($DB) {
    parent::__construct($DB);
    $this->TABLA = 'tbl_documentos';
    $this->PRKEY = 'doc_id';
  }


  public function formatBytes($bytes) {
    $RET = number_format($bytes / 1024, 3);
    return $RET." Kb";
  }

}
?>
