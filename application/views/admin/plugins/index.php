    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>PLUGINS MANAGER</h2>
            </div>

            <!-- Tabs With Icon Title -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Gestion des plugins
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
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home" data-toggle="tab">
                                        <i class="material-icons">extension</i> Mes plugins
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#install" data-toggle="tab">
                                        <i class="material-icons">save</i> Installer
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#download" data-toggle="tab">
                                        <i class="material-icons">file_download</i> Télécharger
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#settings" data-toggle="tab">
                                        <i class="material-icons">settings</i> Paramètres
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                	
                                	<?= $plugins_list ?>

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="install">

                                	<?= $plugins_list_install ?>

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="download">

                                	<?= $plugins_list_download ?>

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="settings">

                                	<?= $plugins_settings ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Tabs With Icon Title -->
        </div>
    </section>