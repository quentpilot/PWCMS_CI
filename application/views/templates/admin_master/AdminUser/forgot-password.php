<!-- load template header view -->
<?php $this->load->view("templates/$template/parts/header") ?>


<!-- Admin Login Form -->


<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">PWCMS<b>Admin</b></a>
            <small>Recupération du mot de passe d'administration de PWCMS</small>
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
                <form id="sign_in" action="" method="POST">
                    <div class="msg">Entrez votre adresse email afin de créer un nouveau mot de passe</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" id="email" name="email" 
                            placeholder="Adresse Email" value="<?= set_value('email') ?>" required autofocus>
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

                    <div class="row">
                        <div class="col-xs-8 col-lg-offset-2">
                            <button class="btn btn-block bg-pink waves-effect" name="submit" type="submit">Envoyer</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="<?= site_url('admin/subscribe') ?>">S'inscrire !</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="<?= site_url('admin/login') ?>">Se connecter</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


<!-- .Admin Login Form -->

<!-- load template footer view -->
<?php $this->load->view("templates/$template/parts/footer") ?>







<!--<div class="row">
  <div class="col-lg-4 col-lg-offset-4">
    <h1>Login</h1>
    <?php echo $this->session->flashdata('message');?>
    <?php echo form_open('',array('class'=>'form-horizontal'));?>
      <div class="form-group">
        <?php echo form_label('Username','username');?>
        <?php echo form_error('username');?>
        <?php echo form_input('username','','class="form-control"');?>
      </div>
      <div class="form-group">
        <?php echo form_label('Password','password');?>
        <?php echo form_error('password');?>
        <?php echo form_password('password','','class="form-control"');?>
      </div>
      <div class="form-group">
        <label>
          <?php echo form_checkbox('remember','1',FALSE);?> Remember me
        </label>
      </div>
      <?php echo form_submit('submit', 'Log in', 'class="btn btn-primary btn-lg btn-block"');?>
    <?php echo form_close();?>
  </div>
</div>-->