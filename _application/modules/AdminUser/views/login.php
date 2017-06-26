<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">PWCMS<b>Admin</b></a>
            <small>Connexion à l'espace d'administration de PWCMS</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Connectez-vous afin de gérer votre compte</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="remember" id="remember" class="filled-in chk-col-pink">
                            <label for="remember">Se souvenir de moi</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" name="submit" type="submit">Connexion</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign-up.html">S'inscrire !</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Mot de passe oublié ?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

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