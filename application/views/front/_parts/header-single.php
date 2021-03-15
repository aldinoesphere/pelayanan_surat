<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo ambil_pengaturan('nama_website'); ?></title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- FontAwesome -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">

<!-- Stylesheet -->
<link rel="stylesheet" type="text/css"  href="<?php echo base_url('assets/dist/css/style-front.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dist/css/nivo-lightbox/nivo-lightbox.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dist/css/nivo-lightbox/default.css');?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css">
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation -->
    <nav id="menu" class="navbar navbar-default navbar-fixed-top">
      <div class="container"> 
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand page-scroll" href="#page-top"><img src="<?=base_url('assets/dist/img/logo.png')?>" style="width: 60%;"></a> 
        </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url('beranda/#page-top'); ?>" class="page-scroll">Beranda</a></li>
            <li><a href="<?php echo base_url('beranda/#blog'); ?>" class="page-scroll">Blog</a></li>
            <li><a href="<?php echo base_url('beranda/#sejarah'); ?>" class="page-scroll">Profil</a></li>
            <li><a href="<?php echo base_url('beranda/#gallery'); ?>" class="page-scroll">Gallery</a></li>
            <li><a href="<?php echo base_url('beranda/#pegawai'); ?>" class="page-scroll">Anggota</a></li>
            <li><a href="<?php echo base_url('beranda/#contact'); ?>" class="page-scroll">Contact</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse --> 
      </div>
    </nav>