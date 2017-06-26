
<?php $this->load->view("templates/$template/parts/header") ?>


<!-- Admin Login Form -->


<body class="login-page">

<?php //debug($_POST) ?>

    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">PWCMS<b>Admin</b></a>
            <small>Inscription à l'espace d'administration de PWCMS</small>
        </div>

        <?php

          if($this->session->flashdata('message'))
          {
            $color = $this->session->flashdata('class');
          ?>
            <div class="container-fluid">
              <div class="alert alert-<?= $color ?> alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <p>
                    <?php echo $this->session->flashdata('message');?>
                </p>
              </div>
            </div>
            
          <?php
          }
        ?>

        <div class="card">
            <div class="body">
                <form id="form-subscribe" action="" method="POST" enctype="multipart/form-data">
                    <div class="msg">Inscrivez-vous afin de gérer votre compte</div>
                    <input type="hidden" id="step" name="step" value="<?= $subscribe_step ?>">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" id="username" name="username" 
                            placeholder="Nom d'utilisateur *" value="<?= set_value('username') ?>" required autofocus>
                        </div>
                    </div>

                    <?php if (!empty(form_error('username'))) : ?>
                        <div class="container-fluid">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <?= form_error('username') ?>
                          </div>
                        </div>
                    <?php endif ?>


                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">mail</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" id="email" name="email" 
                            placeholder="Adresse email *" value="<?= set_value('email') ?>" required>
                        </div>
                    </div>

                    <?php if (!empty(form_error('email'))) : ?>
                        <div class="container-fluid">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <?= form_error('email') ?>
                          </div>
                        </div>
                    <?php endif ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="password" name="password" 
                            placeholder="Mot de passe *" value="<?= set_value('password') ?>" required>
                        </div>
                    </div>

                    <?php if (!empty(form_error('password'))) : ?>
                        <div class="container-fluid">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <?= form_error('password') ?>
                          </div>
                        </div>
                    <?php endif ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" 
                            placeholder="Confirmez le mot de passe *" value="<?= set_value('confirm_password') ?>" required>
                        </div>
                    </div>

                    <?php if (!empty(form_error('confirm_password'))) : ?>
                        <div class="container-fluid">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <?= form_error('confirm_password') ?>
                          </div>
                        </div>
                    <?php endif ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">security</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" id="salt" name="salt" 
                            placeholder="Vous pouvez saler le hashage du mdp" maxlength="20" value="<?= set_value('salt') ?>">
                        </div>
                    </div>

                    <?php if (!empty(form_error('salt'))) : ?>
                        <div class="container-fluid">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <?= form_error('salt') ?>
                          </div>
                        </div>
                    <?php endif ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">verified_user</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="invite_token" name="invite_token" 
                            placeholder="Code d'invitation *" value="<?= set_value('invite_token') ?>" required>
                        </div>
                    </div>

                    <?php if (!empty(form_error('invite_token'))) : ?>
                        <div class="container-fluid">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <?= form_error('invite_token') ?>
                          </div>
                        </div>
                    <?php endif ?>

                    <div class="row">
                        <div class="col-xs-8 col-xs-offset-2">
                            <button class="btn btn-block bg-teal waves-effect" id="submit" name="submit" type="submit">S'inscrire</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="<?= site_url('admin/login') ?>">Se connecter</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="<?= site_url('admin/forgot-password') ?>">Mot de passe oublié ?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>





<!-- .Admin Login Form -->




<?php $this->load->view("templates/$template/parts/footer") ?>