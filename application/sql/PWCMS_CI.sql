-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 14 Juin 2017 à 18:15
-- Version du serveur :  5.7.18-0ubuntu0.16.04.1
-- Version de PHP :  7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `PWCMS_CI`
--

-- --------------------------------------------------------

--
-- Structure de la table `apps`
--

CREATE TABLE `apps` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `apps`
--

INSERT INTO `apps` (`id`, `name`, `slug`, `status`) VALUES
(1, 'Admin', 'admin', 1),
(2, 'Public', 'public', 1),
(3, 'Dev', 'dev', 1);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `type`, `status`) VALUES
(1, 'Sample', 'sample', 'page', 1),
(2, 'Blog', 'blog', 'page', 1),
(3, 'Map', 'map', 'page', 1),
(4, 'Custom', 'custom', 'page', 1),
(5, 'Sample', 'sample', 'article', 1),
(6, 'Text', 'text', 'article', 1),
(7, 'Blog', 'blog', 'article', 1),
(8, 'Image', 'image', 'article', 1),
(9, 'Video', 'video', 'article', 1),
(10, 'Form', 'form', 'article', 1),
(11, 'Map', 'map', 'article', 1),
(12, 'Header', 'header', 'article', 1),
(13, 'Footer', 'footer', 'article', 1),
(14, 'Custom', 'custom', 'article', 1),
(15, 'Text', 'text', 'widget', 1),
(16, 'Image', 'image', 'widget', 1),
(17, 'Video', 'video', 'widget', 1),
(18, 'Icon', 'icon', 'widget', 1),
(19, 'Bloc', 'bloc', 'widget', 1),
(20, 'Bloc Text', 'bloc-text', 'widget', 1),
(21, 'Dropdown', 'dropdown', 'widget', 1),
(22, 'Carousel', 'carousel', 'widget', 1),
(23, 'Testimonial', 'testimonial', 'widget', 1),
(24, 'Alert', 'alert', 'widget', 1),
(25, 'Link', 'link', 'widget', 1),
(26, 'Button', 'button', 'widget', 1),
(27, 'Input', 'input', 'widget', 1),
(28, 'Link', 'link', 'menu', 1),
(29, 'Button', 'button', 'menu', 1),
(30, 'Dropdown', 'dropdown', 'menu', 1),
(31, 'Image', 'image', 'menu', 1),
(32, 'Shop', 'shop', 'article', 1);

-- --------------------------------------------------------

--
-- Structure de la table `cms_settings`
--

CREATE TABLE `cms_settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL DEFAULT 'My Web App',
  `site_url` varchar(255) DEFAULT NULL,
  `site_email` varchar(255) DEFAULT NULL,
  `display_order_by` varchar(255) NOT NULL DEFAULT 'position',
  `display_limit` int(11) NOT NULL DEFAULT '10',
  `date_format` varchar(255) NOT NULL DEFAULT 'Y-m-d H:i:s',
  `admin_template` varchar(255) NOT NULL DEFAULT 'admin_master',
  `public_template` varchar(255) NOT NULL DEFAULT 'public_master',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'visitors', 'General Visitor'),
(4, 'superuser', 'General Developer');

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT '/',
  `content` text NOT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  `url` varchar(255) DEFAULT '#',
  `target` varchar(255) NOT NULL DEFAULT '_self',
  `published` datetime NOT NULL,
  `edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `items_category`
--

CREATE TABLE `items_category` (
  `item_id` int(11) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `items_style`
--

CREATE TABLE `items_style` (
  `item_id` int(11) NOT NULL DEFAULT '0',
  `css_class` varchar(255) DEFAULT NULL,
  `js_class` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `plugins`
--

CREATE TABLE `plugins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `plugins_apps`
--

CREATE TABLE `plugins_apps` (
  `plugin_id` int(11) NOT NULL DEFAULT '0',
  `app_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `related_items`
--

CREATE TABLE `related_items` (
  `item_id` int(11) NOT NULL DEFAULT '0',
  `ritem_id` int(11) NOT NULL DEFAULT '0',
  `published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `templates`
--

CREATE TABLE `templates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `templates`
--

INSERT INTO `templates` (`id`, `name`, `slug`, `description`, `status`) VALUES
(1, 'Admin Master', 'admin_master', 'This template is an admin style to manage public items site', 1),
(2, 'Public Master', 'public_master', 'This template is a landing page style to present useful info about Web App', 1);

-- --------------------------------------------------------

--
-- Structure de la table `templates_apps`
--

CREATE TABLE `templates_apps` (
  `template_id` int(11) NOT NULL DEFAULT '0',
  `app_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `templates_apps`
--

INSERT INTO `templates_apps` (`template_id`, `app_id`, `status`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1497450717, 1, 'Admin', 'istrator', 'ADMIN', '06 49 59 56 16');

-- --------------------------------------------------------

--
-- Structure de la table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 4);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cms_settings`
--
ALTER TABLE `cms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `items_style`
--
ALTER TABLE `items_style`
  ADD PRIMARY KEY (`item_id`);

--
-- Index pour la table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plugins`
--
ALTER TABLE `plugins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plugins_apps`
--
ALTER TABLE `plugins_apps`
  ADD PRIMARY KEY (`plugin_id`);

--
-- Index pour la table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `templates_apps`
--
ALTER TABLE `templates_apps`
  ADD PRIMARY KEY (`template_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `apps`
--
ALTER TABLE `apps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `cms_settings`
--
ALTER TABLE `cms_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `plugins`
--
ALTER TABLE `plugins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
