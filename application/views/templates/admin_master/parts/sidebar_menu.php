<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?= site_url('assets/admin/admin_master/images/user.png') ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
                    <div class="email">john.doe@example.com</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?= site_url('admin/profile/'.$_SESSION['user']['username'].'') ?>"><i class="material-icons">person</i>Mon profil</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?= site_url('admin/account') ?>"><i class="material-icons">group</i>Mon compte</a></li>
                            <li><a href="<?= site_url('admin/timeline') ?>"><i class="material-icons">shopping_cart</i>Ma timeline</a></li>
                            <li><a href="<?= site_url('admin/settings') ?>"><i class="material-icons">favorite</i>Mes paramètres</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?= site_url('admin/logout') ?>"><i class="material-icons">input</i>Me déconnecter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">content_copy</i>
                            <span>Tableaux de bord</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?= site_url('admin/dashboard') ?>">Classique</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/landing') ?>">Landing</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/vitrine') ?>">Vitrine</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/blog') ?>">Blog</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/shop') ?>">E-commerce</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/dashboard/settings') ?>">Paramètres</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">content_copy</i>
                            <span>Mon Contenu</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?= site_url('admin/items') ?>">Tous</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/items/page') ?>">Mes pages</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/items/menu') ?>">Mes menus</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/items/article') ?>">Mes articles</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/items/widget') ?>">Mes widgets</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/items/settings') ?>">Paramètres</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">content_copy</i>
                            <span>PilotAWeb</span>
                        </a>
                        <ul class="ml-menu">
                        	<li>
                                <a href="<?= site_url('admin/pilotaweb/$1') ?>">Site Actuel</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/pilotaweb/landing') ?>">Landing</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/pilotaweb/vitrine') ?>">Vitrine</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/pilotaweb/blog') ?>">Blog</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/pilotaweb/shop') ?>">E-commerce</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/pilotaweb/settings') ?>">Paramètres</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">content_copy</i>
                            <span>Utilisateurs</span>
                        </a>
                        <ul class="ml-menu">
                        	<li>
                                <a href="<?= site_url('admin/users') ?>">Tous</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/users/team') ?>">Team</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/users/connexion') ?>">Connexions</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/users/group') ?>">Groupes</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/users/settings') ?>">Paramètres</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">content_copy</i>
                            <span>Ma Messagerie</span>
                        </a>
                        <ul class="ml-menu">
                        	<li>
                                <a href="<?= site_url('admin/messenger/inbox') ?>">Boite de réception</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/messenger/sent') ?>">Messages envoyés</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/messenger/compose') ?>">Nouveau message</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/messenger/chat') ?>">Chat</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/messenger/settings') ?>">Paramètres</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">content_copy</i>
                            <span>Mes Outils</span>
                        </a>
                        <ul class="ml-menu">
                        	<li>
                                <a href="<?= site_url('admin/plugins') ?>">Installés</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/plugins/on') ?>">Actifs</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/plugins/download') ?>">Télécharger</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/plugins/more') ?>">Plus</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/templates/settings') ?>">Paramètres</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= site_url('admin/calendar') ?>">
                            <i class="material-icons">layers</i>
                            <span>Mon Planning</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">content_copy</i>
                            <span>Mes Templates</span>
                        </a>
                        <ul class="ml-menu">
                        	<li>
                                <a href="<?= site_url('admin/templates') ?>">Installés</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/templates/on') ?>">Actifs</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/templates/download') ?>">Télécharger</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/templates/more') ?>">Plus</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/templates/settings') ?>">Paramètres</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">content_copy</i>
                            <span>Mes Plugins</span>
                        </a>
                        <ul class="ml-menu">
                        	<li>
                                <a href="<?= site_url('admin/plugins') ?>">Installés</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/plugins/on') ?>">Actifs</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/plugins/download') ?>">Télécharger</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/plugins/more') ?>">Plus</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/plugins/settings') ?>">Paramètres</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">content_copy</i>
                            <span>Paramètres</span>
                        </a>
                        <ul class="ml-menu">
                        	<li>
                                <a href="<?= site_url('admin/settings') ?>">Tous</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/settings/site') ?>">Site</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/settings/cms') ?>">CMS</a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/settings/advanced') ?>">Avancés</a>
                            </li>
                        </ul>
                    </li>

                    
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>Documentation</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Démarrage rapide</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="<?= site_url('admin/doc/fasta') ?>">Vraiment rapide</a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('admin/doc/site') ?>">Site</a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('admin/doc/cms') ?>">CMS</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Qu'est-ce que PWCMS</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="<?= site_url('admin/doc/about') ?>">A propos</a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('admin/doc/who') ?>">C'est pour qui ?</a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('admin/doc/how') ?>">Comment ça marche ?</a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('admin/doc/clients') ?>">Coté Client</a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('admin/doc/admins') ?>">Coté Administrateur</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 <a href="https://pilotaweb.fr" target="_blank">PilotaWeb</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 0.1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>