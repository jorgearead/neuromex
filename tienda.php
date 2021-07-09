<div class="row contenido" id="lista-productos">
    <div class="col-12 infor text-center">
        <h1>Tienda</h1>
    </div>
    <?php foreach($PRODUC as $P): ?>
        <?php if($P['prod_status']==1 ){?>
            <div class="col-12 col-sm-12 col-md-4 col-xl-4 p-5">

                <div class="producto">
                    <div class="row">
                        <img loading="lazy" src="<?=$URLORIGEN?>img/productos/<?=$P['prod_img']?>" class="card-img-top" alt="<?=$P['prod_name']?>">
                    </div>
                    <div class="row infor text-center justify-content-around">
                        <div class="col-12">
                            <h5><?=$P['prod_name']?><br>
                            <p>
                            <?php if($P['prod_offer_price']>0) {
                                echo 'De <s>'.$P['prod_price'].'</s> a '.$P['prod_offer_price'];
                            }else{
                                echo $P['prod_price'];
                            }?>
                            </p>
                            </h5>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-xl-5">
                            <a href="#" class="btn boton-producto ion-ios-cart agregar-carrito" data-id="<?=$P['prod_id']?>"></a>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-xl-7">
                            <a href="<?=$URLORIGEN?>producto/<?=$P['prod_url']?>">
                                <button class="btn boton-producto">Ver m&aacute;s</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?> 
    <?php endforeach; ?>                   
</div>