<?php
    $PROD = $SERVS->getProdByURL($_GET['parametro']);
    $SLIDER = $SERVS->getSliderProducto($PROD['prod_id']);
    $DOCS = $SERVS->getDocumentos($PROD['prod_id']);
    $RELACIONADOS = $SERVS->getProdsRelacionados($PROD['prod_cat']);
?>