<?php
$CA = $DATA->Categoria($_GET['categoria']);
$P = $DATA->Producto1($CA['cat_id']);
$SL = $DATA->SliderProducto($P['prod_id']);
$PS = $DATA->Productos($CA['cat_id'],$P['prod_id']);
?>
