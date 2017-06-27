<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="all,follow">
<!-- Google fonts - Open Sans-->
<title><?= $page_title;?></title>
<!-- custom bootsrap -->
<link href="<?= site_url('assets/public/public_master/css/bootstrap.min.css') ?>" rel="stylesheet">
<!-- Google fonts - Open Sans-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800,400italic">
<!-- Stroke 7 font by Pixeden (http://www.pixeden.com/icon-fonts/stroke-7-icon-font-set)-->
<link rel="stylesheet" href="<?= site_url('assets/public/public_master/css/pe-icon-7-stroke.css') ?>">
<link rel="stylesheet" href="<?= site_url('assets/public/public_master/css/helper.css') ?>">
<!-- theme stylesheet-->
<link rel="stylesheet" href="<?= site_url('assets/public/public_master/css/style.default.css') ?>" id="theme-stylesheet">
<!-- owl carousel-->
<link rel="stylesheet" href="<?= site_url('assets/public/public_master/css/owl.carousel.css') ?>">
<link rel="stylesheet" href="<?= site_url('assets/public/public_master/css/owl.theme.css') ?>">
<!-- plugins-->
<link rel="stylesheet" href="<?= site_url('assets/public/public_master/css/simpletextrotator.css') ?>">
<!-- Custom stylesheet - for your changes-->
<link rel="stylesheet" href="<?= site_url('assets/public/public_master/css/custom.css') ?>">
<!-- Favicon-->
<link rel="shortcut icon" href="<?= site_url('assets/public/public_master/favicon.png') ?>">
<!-- Tweaks for older IEs--><!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

<!-- custom css or js links -->
<?php //$this->link_css() ?>

</head>

<body data-spy="scroll" data-target="#navigation" data-offset="120">
  <div id="all">

    <!-- navbar menu -->
    <?= $navbar_menu ?>

    <!-- display alert message (events) -->
    <?php
      if($this->session->flashdata('message'))
      {
      ?>
        <div class="container">
          <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <?php echo $this->session->flashdata('message');?>
          </div>
        </div>
      <?php
      }
    ?>