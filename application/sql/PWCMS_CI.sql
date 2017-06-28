-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 28 Juin 2017 à 22:23
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
(3, 'Dev', 'dev', 1),
(4, 'Landing', 'landing', 1),
(5, 'Blog', 'blog', 1),
(6, 'Vitrine', 'vitrine', 1),
(7, 'Shop', 'shop', 1),
(8, 'Web App', 'app', 1),
(9, 'Portfolio', 'portfolio', 1),
(10, 'Book', 'book', 1),
(11, 'Music', 'music', 1),
(12, 'Gamming', 'gamming', 1),
(13, 'Sport', 'sport', 1),
(14, 'Youtuber', 'youtuber', 1),
(15, 'Press', 'press', 1),
(16, 'Artisan', 'artisan', 1),
(17, 'Forum', 'forum', 1),
(18, 'Custom', 'custom', 1);

-- --------------------------------------------------------

--
-- Structure de la table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `timer` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`cat_id`, `name`, `slug`, `type`, `status`) VALUES
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
(32, 'Shop', 'shop', 'article', 1),
(33, 'Application', 'app', 'users_groups', 1),
(34, 'Plugin', 'plugin', 'users_group', 1),
(35, 'Template', 'template', 'users_groups', 1);

-- --------------------------------------------------------

--
-- Structure de la table `cms_settings`
--

CREATE TABLE `cms_settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL DEFAULT 'My Web App',
  `site_url` varchar(255) DEFAULT NULL,
  `site_email` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `invite_token` varchar(255) NOT NULL DEFAULT 'pwadmin',
  `admin_subscribe_group` int(11) NOT NULL DEFAULT '3',
  `public_subscribe_group` int(11) NOT NULL DEFAULT '2',
  `max_forgot_pass` int(11) NOT NULL DEFAULT '3',
  `display_order_by` varchar(255) NOT NULL DEFAULT 'position',
  `display_limit` int(11) NOT NULL DEFAULT '10',
  `date_format` varchar(255) NOT NULL DEFAULT 'Y-m-d H:i:s',
  `easyweb` int(11) NOT NULL DEFAULT '0',
  `admin_template` varchar(255) NOT NULL DEFAULT 'admin_master',
  `public_template` varchar(255) NOT NULL DEFAULT 'public_master',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cms_settings`
--

INSERT INTO `cms_settings` (`id`, `site_name`, `site_url`, `site_email`, `contact_email`, `invite_token`, `admin_subscribe_group`, `public_subscribe_group`, `max_forgot_pass`, `display_order_by`, `display_limit`, `date_format`, `easyweb`, `admin_template`, `public_template`, `status`) VALUES
(1, 'My Web App', 'http://cms.pilotaweb.fr', 'hello@pilotaweb.fr', 'quentin.lebian@pilotaweb.fr', 'pwadmin', 4, 2, 3, 'position', 10, 'Y-m-d H:i:s', 0, 'admin_master', 'public_master', 1);

-- --------------------------------------------------------

--
-- Structure de la table `easyweb_settings`
--

CREATE TABLE `easyweb_settings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `template_id` int(11) NOT NULL DEFAULT '0',
  `app_id` int(11) NOT NULL DEFAULT '4',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `show_title` int(11) NOT NULL DEFAULT '1',
  `content` text NOT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  `url` varchar(255) DEFAULT '#',
  `target` varchar(255) NOT NULL DEFAULT '_self',
  `icon` varchar(255) NOT NULL DEFAULT 'content_copy',
  `published` datetime NOT NULL,
  `edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hits` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `items`
--

INSERT INTO `items` (`id`, `user_id`, `title`, `subtitle`, `slug`, `show_title`, `content`, `position`, `url`, `target`, `icon`, `published`, `edited`, `hits`, `status`) VALUES
(1, 0, 'menu test', NULL, 'menu-test', 1, '', 1, 'admin/index', '_self', 'content_copy', '2017-06-28 00:00:00', '2017-06-28 10:33:07', 0, 1),
(2, 0, 'menu test 2', NULL, 'menu-test', 1, '', 2, 'admin/index', '_self', 'content_copy', '2017-06-28 00:00:00', '2017-06-28 18:18:09', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `items_apps`
--

CREATE TABLE `items_apps` (
  `item_id` int(11) NOT NULL DEFAULT '0',
  `app_id` int(11) NOT NULL DEFAULT '2',
  `published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `items_apps`
--

INSERT INTO `items_apps` (`item_id`, `app_id`, `published`, `status`) VALUES
(1, 1, '2017-06-28 10:34:10', 1),
(2, 1, '2017-06-28 10:34:10', 1);

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

--
-- Contenu de la table `items_category`
--

INSERT INTO `items_category` (`item_id`, `cat_id`, `published`, `status`) VALUES
(1, 28, '2017-06-28 10:33:54', 1),
(2, 28, '2017-06-28 10:33:54', 1);

-- --------------------------------------------------------

--
-- Structure de la table `items_groups`
--

CREATE TABLE `items_groups` (
  `item_id` int(11) NOT NULL DEFAULT '0',
  `group_id` int(11) NOT NULL DEFAULT '1',
  `published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `items_groups`
--

INSERT INTO `items_groups` (`item_id`, `group_id`, `published`, `status`) VALUES
(1, 1, '2017-06-28 10:33:42', 1),
(2, 1, '2017-06-28 10:33:42', 1);

-- --------------------------------------------------------

--
-- Structure de la table `items_style`
--

CREATE TABLE `items_style` (
  `item_id` int(11) NOT NULL DEFAULT '0',
  `template_id` int(11) NOT NULL DEFAULT '2',
  `css_class` varchar(255) DEFAULT NULL,
  `js_class` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `items_style`
--

INSERT INTO `items_style` (`item_id`, `template_id`, `css_class`, `js_class`, `status`) VALUES
(1, 1, 'active', NULL, 1),
(2, 1, 'menu-ml', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `networks`
--

CREATE TABLE `networks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'fa fa-user',
  `url` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `_header` varchar(255) DEFAULT NULL,
  `_subject` varchar(255) DEFAULT NULL,
  `_message` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `plugins`
--

CREATE TABLE `plugins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT 'PilotaWeb',
  `description` varchar(255) DEFAULT 'Simple module for PWCMS',
  `icon` varchar(255) NOT NULL DEFAULT 'fa fa-plug',
  `position` int(11) NOT NULL DEFAULT '0',
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
-- Structure de la table `plugins_category`
--

CREATE TABLE `plugins_category` (
  `plugin_id` int(11) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `groupId` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `plugins_groups`
--

CREATE TABLE `plugins_groups` (
  `plugin_id` int(11) NOT NULL DEFAULT '0',
  `group_id` int(11) NOT NULL DEFAULT '1',
  `published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `related_groups`
--

CREATE TABLE `related_groups` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `group_id` int(11) NOT NULL DEFAULT '0',
  `published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `related_groups`
--

INSERT INTO `related_groups` (`id`, `user_id`, `group_id`, `published`, `status`) VALUES
(1, 4, 4, '2017-06-25 16:29:49', 1),
(2, 5, 4, '2017-06-25 16:33:14', 1),
(3, 6, 4, '2017-06-25 16:34:13', 1),
(4, 7, 4, '2017-06-25 16:35:01', 1),
(5, 8, 4, '2017-06-25 16:36:14', 1),
(6, 9, 4, '2017-06-25 16:36:36', 1),
(7, 10, 4, '2017-06-25 16:40:43', 1),
(8, 11, 4, '2017-06-25 16:41:39', 1),
(9, 12, 4, '2017-06-25 16:42:04', 1),
(10, 13, 4, '2017-06-25 16:45:14', 1),
(11, 14, 4, '2017-06-25 16:46:00', 1),
(12, 15, 4, '2017-06-25 16:47:34', 1),
(13, 16, 4, '2017-06-25 16:48:28', 1),
(14, 17, 4, '2017-06-25 16:56:29', 1),
(15, 18, 4, '2017-06-25 16:58:19', 1),
(16, 19, 4, '2017-06-25 17:04:27', 1),
(17, 20, 4, '2017-06-25 17:05:15', 1),
(18, 21, 4, '2017-06-25 17:07:07', 1),
(19, 22, 4, '2017-06-25 17:08:18', 1),
(20, 23, 4, '2017-06-25 17:13:29', 1),
(21, 24, 4, '2017-06-25 17:15:28', 1),
(22, 25, 4, '2017-06-25 17:16:02', 1),
(23, 26, 4, '2017-06-25 17:17:46', 1),
(24, 27, 4, '2017-06-25 17:20:11', 1),
(25, 28, 4, '2017-06-25 17:22:18', 1),
(26, 29, 4, '2017-06-25 17:23:49', 1),
(27, 30, 4, '2017-06-25 17:25:11', 1),
(28, 31, 4, '2017-06-25 17:29:14', 1),
(29, 32, 4, '2017-06-25 17:29:57', 1),
(30, 33, 4, '2017-06-25 19:09:22', 1),
(31, 34, 4, '2017-06-25 19:19:15', 1),
(32, 35, 4, '2017-06-25 19:22:22', 1),
(33, 36, 4, '2017-06-25 19:23:52', 1),
(34, 37, 4, '2017-06-25 19:26:49', 1),
(35, 38, 4, '2017-06-25 19:31:58', 1),
(36, 39, 4, '2017-06-25 19:46:25', 1),
(37, 40, 4, '2017-06-26 14:52:56', 1);

-- --------------------------------------------------------

--
-- Structure de la table `related_items`
--

CREATE TABLE `related_items` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL DEFAULT '0',
  `ritem_id` int(11) NOT NULL DEFAULT '0',
  `published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `related_users`
--

CREATE TABLE `related_users` (
  `id` int(11) NOT NULL,
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
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(20) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `valid_email` int(11) NOT NULL DEFAULT '0',
  `token` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `register_date` datetime NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remember_me` int(11) NOT NULL DEFAULT '0',
  `max_forgot_pass` int(11) NOT NULL DEFAULT '3',
  `profile_img` varchar(255) NOT NULL DEFAULT 'default_avatar.png',
  `navbar_color` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `salt`, `last_name`, `first_name`, `valid_email`, `token`, `city`, `country`, `phone`, `company`, `job`, `website`, `register_date`, `last_login`, `remember_me`, `max_forgot_pass`, `profile_img`, `navbar_color`, `status`) VALUES
(39, 'PilotaWeb', 'quentin.lebian@pilotaweb.fr', '$2y$10$vLa3nSHfDx2nOnKfslSXf.PFC0Y9iSry0qQa1Tm2Gr.Abf4A.5sOK', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-25 21:46:25', '2017-06-28 20:17:45', 0, 3, 'default_avatar.png', NULL, 0),
(40, 'quentpilot', 'quentin.lebian.pro@gmail.com', '$2y$10$7baN2gwLD6Av2aB8xsEMeOjVM.tfgJw9B9dp54Xvl9WHD.VwwW2/C', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-26 16:52:56', '2017-06-26 15:01:26', 0, 3, 'default_avatar.png', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users_groups`
--

CREATE TABLE `users_groups` (
  `level` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users_groups`
--

INSERT INTO `users_groups` (`level`, `name`, `alias`, `cat_id`, `status`) VALUES
(1, 'Visitor', 'visitor', 33, 1),
(2, 'Member', 'member', 33, 1),
(3, 'Moderator', 'modo', 33, 1),
(4, 'Administrator', 'admin', 33, 1),
(5, 'Developer', 'developer', 33, 1),
(8, 'Super User', 'superuser', 33, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users_networks`
--

CREATE TABLE `users_networks` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `network_id` int(11) NOT NULL DEFAULT '0',
  `url` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users_newsletter`
--

CREATE TABLE `users_newsletter` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `letter_id` int(11) NOT NULL DEFAULT '0',
  `published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `_groups`
--

CREATE TABLE `_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `_groups`
--

INSERT INTO `_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'visitors', 'General Visitor'),
(4, 'superuser', 'General Developer');

-- --------------------------------------------------------

--
-- Structure de la table `_login_attempts`
--

CREATE TABLE `_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `_users`
--

CREATE TABLE `_users` (
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
-- Contenu de la table `_users`
--

INSERT INTO `_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'PilotaWeb', '$2y$08$uVma3fynvImUnXYXnVtBIep75S3lyAUuhc3yngF4FcCkMGLKy3dRa', '', 'quentin.lebian@pilotaweb.fr', '', NULL, NULL, NULL, 1268889823, 1497708225, 1, 'Quentin', 'Le Bian', 'PilotaWeb', '06 49 59 56 16');

-- --------------------------------------------------------

--
-- Structure de la table `_users_groups`
--

CREATE TABLE `_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `_users_groups`
--

INSERT INTO `_users_groups` (`id`, `user_id`, `group_id`) VALUES
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
-- Index pour la table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index pour la table `cms_settings`
--
ALTER TABLE `cms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `easyweb_settings`
--
ALTER TABLE `easyweb_settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `items_apps`
--
ALTER TABLE `items_apps`
  ADD PRIMARY KEY (`item_id`);

--
-- Index pour la table `items_category`
--
ALTER TABLE `items_category`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `item_id` (`item_id`);

--
-- Index pour la table `items_groups`
--
ALTER TABLE `items_groups`
  ADD PRIMARY KEY (`item_id`);

--
-- Index pour la table `items_style`
--
ALTER TABLE `items_style`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `item_id` (`item_id`);

--
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
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
  ADD PRIMARY KEY (`plugin_id`),
  ADD UNIQUE KEY `plugin_id` (`plugin_id`);

--
-- Index pour la table `plugins_category`
--
ALTER TABLE `plugins_category`
  ADD PRIMARY KEY (`plugin_id`);

--
-- Index pour la table `plugins_groups`
--
ALTER TABLE `plugins_groups`
  ADD PRIMARY KEY (`plugin_id`);

--
-- Index pour la table `related_groups`
--
ALTER TABLE `related_groups`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `related_items`
--
ALTER TABLE `related_items`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `related_users`
--
ALTER TABLE `related_users`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`level`);

--
-- Index pour la table `users_networks`
--
ALTER TABLE `users_networks`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `users_newsletter`
--
ALTER TABLE `users_newsletter`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `_groups`
--
ALTER TABLE `_groups`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `_login_attempts`
--
ALTER TABLE `_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `_users`
--
ALTER TABLE `_users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `_users_groups`
--
ALTER TABLE `_users_groups`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `cms_settings`
--
ALTER TABLE `cms_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `easyweb_settings`
--
ALTER TABLE `easyweb_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `plugins`
--
ALTER TABLE `plugins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `related_groups`
--
ALTER TABLE `related_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT pour la table `related_items`
--
ALTER TABLE `related_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `related_users`
--
ALTER TABLE `related_users`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT pour la table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `_groups`
--
ALTER TABLE `_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `_login_attempts`
--
ALTER TABLE `_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `_users`
--
ALTER TABLE `_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `_users_groups`
--
ALTER TABLE `_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `_users_groups`
--
ALTER TABLE `_users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
