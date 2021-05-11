<?php
$P = $DATA->Producto($_GET['producto']);
$CA = $DATA->Catalogo($P['prod_categoria']);
$SL = $DATA->SliderProducto($P['prod_id']);
$PS = $DATA->Productos($P['prod_categoria'],$P['prod_id']);
?>
