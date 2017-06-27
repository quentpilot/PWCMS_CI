<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="card">
            <div class="header">
                <h2>
                    <?php //debug($check_form) ?>
                    Modifier le profil
                    <small>Administration</small>
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

                <div class="row">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="col-sm-6 col-md-3">
                            <div class="thumbnail">
                                <img src="<?= site_url('assets/admin/admin_master/images/image-gallery/thumb/thumb-1.jpg') ?>"
                                 alt="<?= $user_data['profile_img'] ?>">
                                <div class="col-sm-12 col-md-12">
                                    <input type="file" name="profile_img" id="profile_img"
                                           class="form-control btn btn-block bg-teal m-l-15 waves-effect">
                                </div>
                                <div class="caption">
                                    <h3>Image de profil</h3>
                                    <p>Gérer les photos de profil</p>
                                  
                                    <div class="col-sm-12 col-md-12">
                                    <button type="submit" name="submit_profile_image" id="submit_profile_image"
                                            class="btn bg-orange btn-block m-l-15 waves-effect"> Enregistrer l'image
                                    </button>
                                </div>

                                    <br><br>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                <input type="text" id="username" name="username" class="form-control input-lg" 
                                    value="<?= set_value('username', $user_data['username']) ?>">
                                    <label class="form-label">Nom d'utilisateur</label>
                                </div>
                            </div>
                            <?php if (!empty(form_error('username'))) : ?>
                                <div class="container-fluid">
                                    <div class="alert alert-warning alert-dismissible" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    <?= form_error('username') ?>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" id="email" name="email" class="form-control input-lg" 
                                    value="<?= set_value('email', $user_data['email']) ?>">
                                    <label class="form-label">Adresse e-mail</label>
                                </div>
                            </div>
                            <?php if (!empty(form_error('email'))) : ?>
                                <div class="container-fluid">
                                    <div class="alert alert-warning alert-dismissible" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    <?= form_error('email') ?>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                <input type="text" id="username" name="username" class="form-control input-lg" 
                                    value="<?= set_value('username', $user_data['username']) ?>">
                                    <label class="form-label">Nom d'utilisateur</label>
                                </div>
                            </div>
                            <?php if (!empty(form_error('username'))) : ?>
                                <div class="container-fluid">
                                    <div class="alert alert-warning alert-dismissible" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    <?= form_error('username') ?>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                <input type="text" id="username" name="username" class="form-control input-lg" 
                                    value="<?= set_value('username', $user_data['username']) ?>">
                                    <label class="form-label">Nom d'utilisateur</label>
                                </div>
                            </div>
                            <?php if (!empty(form_error('username'))) : ?>
                                <div class="container-fluid">
                                    <div class="alert alert-warning alert-dismissible" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    <?= form_error('username') ?>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>

                        <br>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" name="submit" id="submit" class="btn bg-teal btn-lg m-l-15 waves-effect">Sauvegarder</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>