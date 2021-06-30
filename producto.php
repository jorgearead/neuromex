<div class="row contenido">
    <!--Producto-->
    <div class="col-12 infor text-center">
        <h1><?=$PROD['prod_name']?></h1>
    </div>
    <div class="col-12 col-sm-12 col-md-6">
        <div class="row p-5">
            <div class="col-12">
                <img src="<?=$URLORIGEN?>img/productos/<?=$PROD['prod_img']?>" class="card-img-top" alt="<?=$PROD['prod_name']?>">
            </div>
        </div>
        <div class="row infor text-center">
            <!--div class="col-12">
                <h2></h2>
            </div-->
            <div class="col-12">
                <h3>$
                    <?php 
                        if($PROD['prod_offer_price']>0) {
                            echo 'De <s>'.$PROD['prod_price'].'</s> a '.$PROD['prod_offer_price'];
                        }else{
                            echo $PROD['prod_price'];
                    }?>
                </h3>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-6 text-center p-5">
        <div class="col-12 infor title">
            <p><?=$PROD['prod_desc']?></p>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-xl-6 input-group p-3">
                <div class="input-group-prepend">
                    <span class="input-group-text input-cant" id="basic-addon1">Cantidad</span>
                </div>
                <input type="number" name="cantidad" class="form-control" aria-label="cantidad" aria-describedby="basic-addon1" min=1>
            </div>
            <div class="col-12 col-md-6 col-xl-6">
                <button class="btn boton-producto">Agregar al carrito</button>
            </div>
        </div>
    </div>
    <!--Producto-->

    <!--Imagenes de productos-->
    <main id="main">
    </main>
    <!--Imagenes de productos-->

    <!--Archivos-->
    <div id="accordion" role="tablist" class="mb-5 col-12">
        <div class="card bg-dark">
            <div id="headingOne" role="tab" class="card-header">
                <h5 class="mb-0"><a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Características</a></h5>
            </div>
            <div id="collapseOne" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" class="collapse">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="" target="blank">
                            <img src="" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Archivos-->
</div>