<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Index/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

		/* base admin routes */
$route['admin'] = 'Admin/index';
$route['admin/login'] = 'AdminUser/login';
$route['admin/logout'] = 'AdminUser/logout';
$route['admin/subscribe'] = 'AdminUser/subscribe';
$route['admin/valid-account/(:any)/(:any)'] = 'AdminUser/validAccount/$1/$2';
$route['admin/forgot-password'] = 'AdminUser/forgotPass';
$route['admin/new-password/(:any)'] = 'AdminUser/newPass/$1';

		/* base public routes */
//$route['index'] = 'Public/index';
$route['login'] = 'User/login';
$route['logout'] = 'User/logout';
$route['subscribe'] = 'User/subscribe';
$route['forgot-password'] = 'User/forgotPass';
$route['new-password'] = 'User/newPass';

		/* main CMS(origin) modules */

/* Admin module */
$route['admin/dashboard'] = 'Admin/index';

/*Public module */
$route['page/(:any)'] = 'Index/page/$1';
$route['article/(:any)'] = 'Index/showArticle/$1';
$route['articles'] = 'Index/listArticle';

/* Users module */
$route['admin/profile/(:any)'] = 'Users/profile/$1';
$route['admin/edit-profile/(:any)'] = 'Users/editProfile/$1';
$route['admin/timeline/(:any)'] = 'Users/timeline/$1';
$route['admin/account'] = 'Users/account';
$route['admin/users/all'] = 'Users/viewAll';
$route['admin/users/team'] = 'Users/viewTeam';
$route['admin/users/groups'] = 'Users/viewGroups';
$route['admin/users/connect'] = 'Users/viewFriends';
$route['admin/users/settings'] = 'Users/settings';
$route['admin/users/new'] = 'Users/new';
$route['admin/users/invite'] = 'Users/invite';
$route['admin/user/edit/(:any)'] = 'Users/edit/$1';
$route['admin/user/edit-password'] = 'Users/editPass/$1';
$route['admin/user/delete/(:any)'] = 'Users/delete/$1';

/*Comments module */
$route['article/(:any)/new-comment'] = 'Comments/new/$1';
$route['article/(:any)/edit-comment'] = 'Comments/edit/$1';
$route['article/(:any)/delete-comment/(:any)'] = 'Comments/delete/$2';

/* Shop module */
$route['admin/shop'] = 'Shop/index';

/* Blog module */
$route['admin/blog'] = 'Blog/index';

/* Settings module */
$route['admin/settings'] = 'Settings/index';

/* Items module */
$route['admin/items'] = 'Items/index';

/* Categories module */
$route['admin/categories'] = 'Categories/index';

/* Users module */
$route['admin/users'] = 'Users/index';

/* AppBuilder module */
$route['admin/pilotaweb'] = 'AppBuilder/index';

/* Builder modules */
$route['admin/pilotaweb/app/(:any)/(:any)'] = function($plugin = NULL, $controller = 'index')
{
	return ucfirst($plugin) . 'Builder/'. $controller;
};

/* LandingBuilder module */
//$route['admin/app/landing'] = 'LandingBuilder/index';

/* VitrineBuilder module */
//$route['admin/app/vitrine'] = 'VitrineBuilder/index';

/* BlogBuilder module */
//$route['admin/app/blog'] = 'BlogBuilder/index';



		/* main extern(plugin) modules */


		/* TESTS */

/*$route['admin/plugin/(:any)'] = function($plugin = NULL)
{
	return ucfirst($plugin) . '/index';
};*/
//$route['admin/plugin/(:any)'] = 'Plugin/run';

/* public routes */
$route['welcome'] = 'Welcome/index';
$route['inbox'] = 'Inbox/index';