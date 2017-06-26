
<?php $this->load->view("templates/$template/parts/header") ?>


<!-- Admin Login Form -->


<body class="login-page">

<?php //debug($_POST) ?>

    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">PWCMS<b>Admin</b></a>
            <small>Validation de l'inscription à l'espace d'administration de PWCMS</small>
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

    </div>


<!-- .Admin Login Form -->


<?php $this->load->view("templates/$template/parts/footer") ?>