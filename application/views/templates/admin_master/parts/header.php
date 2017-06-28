<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?= $page_title ?></title>

<link rel="icon" href="<?= site_url('assets/admin/admin_master/favicon.ico') ?>" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

<!-- Bootstrap Core Css -->
<link href="<?= site_url('assets/admin/admin_master/plugins/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="<?= site_url('assets/admin/admin_master/plugins/node-waves/waves.css') ?>" rel="stylesheet" />

<!-- Animation Css -->
<link href="<?= site_url('assets/admin/admin_master/plugins/animate-css/animate.css') ?>" rel="stylesheet" />

<!-- Morris Chart Css-->
<link href="<?= site_url('assets/admin/admin_master/plugins/morrisjs/morris.css') ?>" rel="stylesheet" />

<!-- Custom Css -->
<link href="<?= site_url('assets/admin/admin_master/css/style.css') ?>" rel="stylesheet">

<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="<?= site_url('assets/admin/admin_master/css/themes/all-themes.css') ?>" rel="stylesheet" />

<!-- JQuery DataTable Css -->
<link href="<?= site_url('assets/admin/admin_master/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') ?>" rel="stylesheet">

<!-- Custom Css -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<?php //$this->link_css() ?>

</head>

<?php
  if($this->pw_user->isLoged()) {
?>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Veuillez patienter...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->

<!-- display alert message (events) -->

<?php } ?>