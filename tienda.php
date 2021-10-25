<div class="row contenido" id="lista-productos">
    <div class="col-12 infor text-center">
        <h1>Tienda</h1>
    </div>
    <?php foreach ($PRODUC as $P) : ?>
        <?php if ($P['prod_status'] == 1) { ?>
            <div class="col-12 col-sm-12 col-md-3 col-xl-3 p-5">

                <div class="producto">
                    <div class="row">
                        <img loading="lazy" src="<?= $URLORIGEN ?>img/productos/<?= $P['prod_img'] ?>" class="card-img-top" alt="<?= $P['prod_name'] ?>">
                    </div>
                    <div class="row infor text-center justify-content-around">
                        <div class="col-12">
                            <h5><?= $P['prod_name'] ?><br>
                                <p>
                                    <?php if ($P['prod_offer_price'] > 0) {
                                        echo 'De <s>&#36;' . $P['prod_price'] . '</s> a &#36;' . $P['prod_offer_price'];
                                    } else {
                                        echo '&#36;' . $P['prod_price'];
                                    } ?>
                                </p>
                            </h5>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-xl-5">
                            <form action="carrito.php" method="post">
                                <!--input type="hidden" name="nombre" value="<?= $P['prod_name'] ?>"-->
                                <input type="hidden" name="producto" value="<?= $P['prod_id'] ?>">
                                <!--input type="hidden" name="img" value="<?= $URLORIGEN ?>img/productos/<?= $P['prod_img'] ?>">
                                <input type="hidden" name="costo" value=-->
                                <button class="btn boton-producto ion-ios-cart agregar-carrito"></button>
                            </form>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-xl-7">
                            <a href="<?= $URLORIGEN ?>producto/<?= $P['prod_url'] ?>">
                                <button class="btn boton-producto">Ver</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php endforeach; ?>
</div>