<div class="row contenido">
    <!--Producto-->
    <div class="col-12 infor text-center">
        <h1><?= $PROD['prod_name'] ?></h1>
    </div>
    <div class="col-12 col-sm-12 col-md-6">
        <div class="row p-5">
            <div class="col-12">
                <img src="<?= $URLORIGEN ?>img/productos/<?= $PROD['prod_img'] ?>" class="card-img-top" alt="<?= $PROD['prod_name'] ?>">
            </div>
        </div>
        <div class="row infor text-center">
            <!--div class="col-12">
                <h2></h2>
            </div-->
            <div class="col-12">
                <h3>&#36;
                    <?php
                    if ($PROD['prod_offer_price'] > 0) {
                        echo 'De <s>' . $PROD['prod_price'] . '</s> a ' . $PROD['prod_offer_price'];
                    } else {
                        echo $PROD['prod_price'];
                    } ?>
                </h3>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-6 text-center p-5">
        <div class="col-12 infor title">
            <p><?= $PROD['prod_desc'] ?></p>
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

</div>
<!--Imagenes de productos-->
<main id="main">
    <section id="clients" class="wow fadeInUp">
        <div class="container">
            <header class="section-header">
                <h3>Imagenes del producto</h3>
            </header>
            <div class="owl-carousel clients-carousel">
                <?php foreach ($SLIDER as $S) : ?>
                    <a href="<?= $URLORIGEN ?>img/productos/<?= $S['ps_imagen'] ?>" data-lightbox="portfolio" class="link-preview" title="Vista previa">
                        <img src="<?= $URLORIGEN ?>img/productos/<?= $S['ps_imagen'] ?>" alt="">
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>
<!--Imagenes de productos-->

<!--Archivos-->
<div class="row d-flex justify-content-center p-0 m-0">
    <div class="col-10">
        <div class="accordion" id="accordionExample">
            <div class="card bg-dark">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-block text-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <p class="texto-gen m-0 p-0">Documentos del producto</p>
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <center><?php if (empty($DOCS)) {
                                echo '<p class="texto-gen m-0 p-0">No hay documentos</p>';
                            } ?></center>
                    <?php foreach ($DOCS as $D) : ?>
                        <div class="card-body col-12">
                            <p class="texto-gen m-0 p-0"><?= $D['doc_nombre'] ?></p>
                            <span class="texto-gen"><?= $D['doc_file'] ?> ( <?= $D['doc_size'] ?> )</span>
                            <a href="<?= $URLORIGEN ?>docs/<?= $D['doc_file'] ?>" download><i class="fa fa-download"></i></a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Archivos-->