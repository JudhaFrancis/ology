<!doctype html>
<html lang="en">
	<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
	  <link rel="apple-touch-icon" sizes="57x57" href="assets\theme\img\Untitled design.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets\theme\img\Untitled design.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets\theme\img\Untitled design.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets\theme\img\Untitled design.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets\theme\img\Untitled design.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets\theme\img\Untitled design.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets\theme\img\Untitled design.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets\theme\img\Untitled design.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets\theme\img\Untitled design.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets\theme\img\Untitled design.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets\theme\img\Untitled design.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets\theme\img\Untitled design.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets\theme\img\Untitled design.png">
		<title><?= $title ?> - Ology Girls</title>
		<!-- Bootstrap CSS -->
		 
		<link href="<?= base_url() ?>assets/front/css/bootstrap.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/front/vendors/linericon/style.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/front/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/front/vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/front/vendors/lightbox/simpleLightbox.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/front/vendors/nice-select/css/nice-select.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/front/vendors/animate-css/animate.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/front/vendors/jquery-ui/jquery-ui.css" rel="stylesheet">
		<!-- main css -->
		<link href="<?= base_url() ?>assets/front/css/style.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
	</head>
	<body>
        
		<!--================ Navigation ================-->
		<?php $this->load->view('front/layouts/_navbar') ?>
		<!--================ End of Navigation ================-->
			
		<!--================ Content =================-->
		<?php $this->load->view('front/pages/' . $page) ?>
		<!--================ End Content =================-->
        
		<!--================ start footer Area  =================-->	
		<?php $this->load->view('front/layouts/_footer') ?>
		<!--================ End footer Area  =================-->
          
      <!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src=" <?= base_url() ?>assets/front/js/jquery-3.2.1.min.js"></script>
		<script src=" <?= base_url() ?>assets/front/js/popper.js"></script>
		<script src=" <?= base_url() ?>assets/front/js/bootstrap.min.js"></script>
		<script src=" <?= base_url() ?>assets/front/js/stellar.js"></script>
		<script src=" <?= base_url() ?>assets/front/vendors/lightbox/simpleLightbox.min.js"></script>
		<script src=" <?= base_url() ?>assets/front/vendors/nice-select/js/jquery.nice-select.min.js"></script>
		<script src=" <?= base_url() ?>assets/front/vendors/isotope/imagesloaded.pkgd.min.js"></script>
		<script src=" <?= base_url() ?>assets/front/vendors/isotope/isotope-min.js"></script>
		<script src=" <?= base_url() ?>assets/front/vendors/owl-carousel/owl.carousel.min.js"></script>
		<script src=" <?= base_url() ?>assets/front/vendors/jquery-ui/jquery-ui.js"></script>
		<script src=" <?= base_url() ?>assets/front/js/jquery.ajaxchimp.min.js"></script>
		<script src=" <?= base_url() ?>assets/front/js/mail-script.js"></script>
		<script src=" <?= base_url() ?>assets/front/js/theme.js"></script>
   </body>
</html>