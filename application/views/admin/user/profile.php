<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>GESTION DU PROFIL</h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Mes informations principales
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <label for="username">Nom d'utilisateur</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="username" name="username" class="form-control" placeholder=""
                                        value="<?= set_value('username', $user->username) ?>" disabled>
                                    </div>
                                </div>
                                <label for="email">Adresse email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" id="email" name="email" class="form-control" placeholder=""
                                        value="<?= set_value('email', $user->email) ?>" disabled>
                                    </div>
                                </div>

                                <br>
                                <button type="submit" class="btn btn-info btn-lg btn-block m-t-15 waves-effect">Mettre à jour</button>
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Informations complémentaires
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            
                                <label for="last_name">Nom </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="last_name" name="last_name" class="form-control" placeholder=""
                                        value="<?= set_value('last_name', $user->last_name) ?>">
                                    </div>
                                </div>
                                <label for="first_name">Prénom</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="first_name" name="first_name" class="form-control" placeholder=""
                                        value="<?= set_value('first_name', $user->first_name) ?>">
                                    </div>
                                </div>
                                <label for="phone">Téléphone</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder=""
                                        value="<?= set_value('phone', $user->phone) ?>">
                                    </div>
                                </div>
                                <label for="company">Société</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="company" name="company" class="form-control" placeholder=""
                                        value="<?= set_value('company', $user->company) ?>">
                                    </div>
                                </div>
                                <label for="password">Mot de passe</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" id="password" name="password" class="form-control" placeholder=""
                                        value="<?= set_value('password') ?>">
                                    </div>
                                </div>

                                <label for="password_confirm">Confirmation du mot de passe</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" id="password_confirm" name="password_confirm" class="form-control" placeholder="" value="<?= set_value('password_confirm') ?>">
                                    </div>
                                </div>

                                <br>
                                <button type="submit" class="btn btn-info btn-lg btn-block m-t-15 waves-effect">Mettre à jour</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

<!--<div class="container" style="margin-top:60px;">
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      <h1>Profile page</h1>
      <?php echo form_open('',array('class'=>'form-horizontal'));?>
        <div class="form-group">
          <?php
          echo form_label('First name','first_name');
          echo form_error('first_name');
          echo form_input('first_name',set_value('first_name',$user->first_name),'class="form-control"');
          ?>
        </div>
        <div class="form-group">
          <?php
          echo form_label('Last name','last_name');
          echo form_error('last_name');
          echo form_input('last_name',set_value('last_name',$user->last_name),'class="form-control"');
          ?>
        </div>
        <div class="form-group">
          <?php
          echo form_label('Company','company');
          echo form_error('company');
          echo form_input('company',set_value('company',$user->company),'class="form-control"');
          ?>
        </div>
        <div class="form-group">
          <?php
          echo form_label('Phone','phone');
          echo form_error('phone');
          echo form_input('phone',set_value('phone',$user->phone),'class="form-control"');
          ?>
        </div>
        <div class="form-group">
          <?php
          echo form_label('Username','username');
          echo form_error('username');
          echo form_input('username',set_value('username',$user->username),'class="form-control" readonly');
          ?>
        </div>
        <div class="form-group">
          <?php
          echo form_label('Email','email');
          echo form_error('email');
          echo form_input('email',set_value('email',$user->email),'class="form-control" readonly');
          ?>
        </div>
        <div class="form-group">
          <?php
          echo form_label('Change password','password');
          echo form_error('password');
          echo form_password('password','','class="form-control"');
          ?>
        </div>
        <div class="form-group">
          <?php
          echo form_label('Confirm changed password','password_confirm');
          echo form_error('password_confirm');
          echo form_password('password_confirm','','class="form-control"');
          ?>
        </div>
        <?php echo form_submit('submit', 'Save profile', 'class="btn btn-primary btn-lg btn-block"');?>
      <?php echo form_close();?>
    </div>
  </div>
</div>-->