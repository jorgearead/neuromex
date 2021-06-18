<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php require_once "./config.php" ?>
	<?php require_once "./google_seo.php" ?>
</head>

<body>
	<div id="preloader"></div>
	<?php require_once 'header.php'; ?>
	<?php require_once $INTERNA; ?>
	<?php require_once 'footer.php' ?>



	<!-- JavaScript Libraries -->
    <script src="<?=$URLORIGEN?>lib/jquery/jquery.min.js"></script>
    <script src="<?=$URLORIGEN?>lib/jquery/jquery-migrate.min.js"></script>
    <script src="<?=$URLORIGEN?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=$URLORIGEN?>lib/easing/easing.min.js"></script>
    <script src="<?=$URLORIGEN?>lib/superfish/hoverIntent.js"></script>
    <script src="<?=$URLORIGEN?>lib/superfish/superfish.min.js"></script>
    <script src="<?=$URLORIGEN?>lib/wow/wow.min.js"></script>
    <script src="<?=$URLORIGEN?>lib/waypoints/waypoints.min.js"></script>
    <script src="<?=$URLORIGEN?>lib/counterup/counterup.min.js"></script>
    <script src="<?=$URLORIGEN?>lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?=$URLORIGEN?>lib/isotope/isotope.pkgd.min.js"></script>
    <script src="<?=$URLORIGEN?>lib/lightbox/js/lightbox.min.js"></script>
    <script src="<?=$URLORIGEN?>lib/touchSwipe/jquery.touchSwipe.min.js"></script>
    <script src="<?=$URLORIGEN?>js/main.js"></script>
	<!-- Javascript files-->
	<script src="<?=$URLORIGEN?>vendor/jquery/jquery.min.js"></script>
	<?php if (file_exists("./js/{$URL}.js")) : ?>
	<?php endif; ?>
</body>

</html>