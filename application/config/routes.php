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
$route['default_controller'] = 'User/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

		/* admin routes */
$route['admin'] = 'Admin/index';
$route['admin/dashboard'] = 'Admin/index';
$route['admin/login'] = 'AdminUser/login';
$route['admin/logout'] = 'AdminUser/logout';
$route['admin/subscribe'] = 'AdminUser/subscribe';
$route['admin/forgot-password'] = 'AdminUser/forgotPass';
$route['admin/new-password'] = 'AdminUser/newPass';

		/* public routes */
$route['index'] = 'Index';
$route['login'] = 'User/login';
$route['logout'] = 'User/logout';
$route['subscribe'] = 'User/subscribe';
$route['forgot-password'] = 'User/forgotPass';
$route['new-password'] = 'User/newPass';
$route['page/(:any)'] = 'Public/page/$1';
$route['article/(:any)'] = 'Public/showArticle/$1';
$route['articles'] = 'Public/listArticle';
$route['article/(:any)/new-comment'] = 'Comments/new/$1';
$route['article/(:any)/edit-comment'] = 'Comments/edit/$1';
$route['article/(:any)/new-comment/(:any)'] = 'Comments/delete/$2';


		/* main CMS modules */


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



		/* main extern modules */


		/* TESTS */

/*$route['admin/plugin/(:any)'] = function($plugin = NULL)
{
	return ucfirst($plugin) . '/index';
};*/
//$route['admin/plugin/(:any)'] = 'Plugin/run';

/* public routes */
$route['welcome'] = 'Welcome/index';
$route['inbox'] = 'Inbox/index';