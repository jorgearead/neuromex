<!-- Menu header-->
<header id="header">
    <div class="container-fluid">

        <div id="logo" class="pull-left">
            <a href="<?= $URLORIGEN ?>home"><img src="<?= $URLORIGEN ?>img/logo-neuromex.png" alt="" title="" /></a>
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="<?php if ($URL == 'home') {
                                echo 'menu-active menu-item-active';
                            } ?>"><a href="<?= $URLORIGEN ?>home">Home</a></li>
                <li class="<?php if ($URL == 'tienda') {
                                echo 'menu-active menu-item-active';
                            } ?>"><a href="<?= $URLORIGEN ?>tienda">Tienda</a></li>

                <li class="<?php if ($URL == 'carrito') {
                                echo 'menu-active menu-item-active';
                            } ?>">
                    <a href="<?= $URLORIGEN ?>carrito">
                        <span class="badge badge-danger" id="num-prod">
                        </span>
                        Carrito
                    </a>
                </li>

                <li class="<?php if ($URL == 'finalizar-compra') {
                                echo 'menu-active menu-item-active';
                            } ?>" id="carrito"><a href="<?= $URLORIGEN ?>finalizar-compra">Finalizar compra</a></li>
                <li class="<?php if ($URL == 'laboratorio') {
                                echo 'menu-active menu-item-active';
                            } ?>"><a href="<?= $URLORIGEN ?>laboratorio">Laboratorio</a></li>
                <li class="<?php if ($URL == 'login' || $URL == 'membresias') {
                                echo 'menu-active menu-item-active';
                            } ?>" class="menu-has-children"><a href="">Miembro</a>
                    <ul>
                        <li><a href="<?= $URLORIGEN ?>login">Iniciar sesi&oacute;n</a></li>
                        <li><a href="<?= $URLORIGEN ?>membresias">Membresias</a></li>
                    </ul>
                </li>
                <li class="<?php if ($URL == 'contactanos') {
                                echo 'menu-active menu-item-active';
                            } ?>"><a href="<?= $URLORIGEN ?>contactanos">Contacto</a></li>
            </ul>
        </nav>
        <!-- #nav-menu-container -->
    </div>
</header>
<!-- Menu header-->