    <!-- Slider -->
    <section id="intro">
        <div class="intro-container">
            <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

                <ol class="carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">
                    <?php foreach ($SLIDER as $S): ?>
                        <div class="carousel-item <?php if($S['slider_id']==1){ ?>active<?php } ?>">
                            <div class="carousel-background">
                                <img loading="lazy" src="<?=$URLORIGEN?>img/slider/<?=$S['slider_imagen']?>" alt="neuromex">
                            </div>
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2><?=$S['slider_titulo']?></h2>
                                    <p><?=$S['slider_texto']?></p>
                                    <a href="#" class="btn-get-started scrollto">Ver m&aacute;s</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div>
    </section>
    <!-- Slider -->
    <!-- Contenido principal -->
    <main id="main">
        <!-- Categorias de productos -->
        <section id="portfolio" class="section-bg">
            <div class="container">
                <header class="section-header">
                    <h3 class="section-title">Marcas</h3>
                </header>

                <div class="row">
                    <div class="col-lg-12">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">Todas</li>
                            <?php foreach ($TRADEMARCK as $M): ?>
                                <li data-filter=".<?=$M['trademarck_name']?>"><?=$M['trademarck_name']?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container">
                    <?php foreach ($TRADEMARCK as $M): ?>
                        <div class="col-lg-4 col-md-6 portfolio-item <?=$M['trademarck_name']?> wow fadeInUp">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img loading="lazy" src="<?=$URLORIGEN?>img/marcas/<?=$M['trademarck_logo']?>" class="img-fluid" alt="neuromex_<?=$M['trademarck_logo']?>">
                                    <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                                </figure>

                                <div class="portfolio-info">
                                    <h4><a href="<?=$M['trademarck_url']?>"><?=$M['trademarck_name']?></a></h4>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

            </div>
        </section>

        <section id="call-to-action" class="wow fadeIn">
            <div class="container text-center">
                <h3>Visita nuestra tienda</h3>
                <p>Encontaras todo el material necesario para poder crear tus proyectos.</p>
                <a class="cta-btn" href="tienda.php">Ir a tienda</a>
            </div>
        </section>
        <!-- Categorias de productos -->

        <!-- Laboratorio -->
        <section id="about" style='background: url("./img/about/neuromex.png") center top no-repeat fixed;'>
            <div class="container">

                <header class="section-header">
                    <h3>Laboratorio</h3>
                    <p>En nuestro laboratorio podras aprender de Iot con la ultima teconologia utilizada en el mercado.</p>
                </header>

                <div class="row about-cols">

                    <div class="col-md-4 wow fadeInUp">
                        <div class="about-col">
                            <div class="img">
                                <img src="img/about/neuromex.png" alt="" class="img-fluid">
                                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
                            </div>
                            <h2 class="title"><a href="#">Misi&oacute;n</a></h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="about-col">
                            <div class="img">
                                <img src="img/about/neuromex.png" alt="" class="img-fluid">
                                <div class="icon"><i class="ion-ios-list-outline"></i></div>
                            </div>
                            <h2 class="title"><a href="#">Tiempo</a></h2>
                            <p>
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="about-col">
                            <div class="img">
                                <img src="img/about/neuromex.png" alt="" class="img-fluid">
                                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
                            </div>
                            <h2 class="title"><a href="#">Visi&oacute;n</a></h2>
                            <p>
                                Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit, sed quia magni dolores eos qui ratione voluptatem sequi nesciunt Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.
                            </p>
                        </div>
                    </div>

                </div>

                <div class="container text-center">
                    <a class="cta-btn boton" href="#">Ver m&aacute;s</a>
                </div>

            </div>
        </section>
        <hr class="text-white" />
        <!-- Laboratorio -->

        <!-- Membresias -->
        <section id="about">
            <div class="container">

                <header class="section-header wow fadeInUp">
                    <h3>Membresias</h3>
                </header>
                <div class="row about-cols d-flex justify-content-center">
                    <?php foreach ($MEMBERSHIP as $MEM): ?>
                        <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="about-col">
                                <div class="img">
                                    <img loading="lazy" src="<?=$URLORIGEN?>img/membresia/<?=$MEM['mem_logo']?>" alt="neuromex" class="img-fluid">
                                    <div class="icon"><i class="ion-card"></i></div>
                                </div>
                                <h2 class="title"><a href="#"><?=$MEM['mem_name']?></a></h2>
                                <p><?=$MEM['mem_desc']?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
                <div class="container text-center">
                    <a class="cta-btn boton" href="membresias">Ver m&aacute;s informaci&oacute;n</a>
                </div>

            </div>
        </section>
        <section id="call-to-action" class="wow fadeIn">
            <div class="container text-center">
                <h3>Ventajas de una membreisa </h3>
                <p>Podras tener acceso a un panel administrador de compras y ademas podras acceder a contenido exclusivo.</p>
                <a class="cta-btn" href="membresias">Conocer m&aacute;s sobre la membresia</a>
            </div>
        </section>
        <!-- Membresias -->

    </main>
    <!-- Contenido principal -->