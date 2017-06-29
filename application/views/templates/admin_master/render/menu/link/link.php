
<?php //echo $menus ?>

<!--<?php foreach ($menus as $key => $menu) : ?>-->
        
    <li class="<?= $menu['css_class'] ?>">
        <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons"><?= $menu['icon'] ?></i>
            <span><?= $menu['title'] ?></span>
        </a>

        <!--<li class="<?= $css_class ?>">
        <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons"><?= $icon ?></i>
            <span><?= $title ?></span>
        </a>-->

<!--<?php endforeach ?>-->

<!--<li class="active">
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
</li>-->