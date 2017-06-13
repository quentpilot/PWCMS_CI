<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?= $page_title;?></title>
<link href="<?= site_url('assets/admin/css/bootstrap.min.css') ?>" rel="stylesheet">
<?= $head_link ?>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= site_url('admin');?>"><?= $this->config->item('site_title') ?></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            Visitor <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo site_url('admin/groups'); ?>">Groups</a></li>
            <li><a href="<?php echo site_url('admin/users'); ?>">Users</a></li>
            <li><a href="<?php echo site_url('admin/user/profile') ?>">Profile page</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo site_url('admin/user/logout');?>">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
  <?php
    if($this->session->flashdata('message'))
    {
    ?>
      <div class="container" style="padding-top:40px;">
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
</nav>