<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin extends Admin_Controller {
	/**
		* @Author				: quentpilot {Quentin Le Bian}
		* @Email				: quentin.lebian@pilotaweb.fr
		* @Web					: https://pilotaweb.fr
		* @Date					: 2017-06-23 19:20:00
		* @See					: Admin_Controller class
	**/

	public function __construct()
	{
		// set parameters for '$render_path' var
		// used for render() method when calling view to application/views/templates/
		parent::__construct('admin_master', 'Admin');
	}

	public function index()
	{
		//print_r($this->router->routes);
		$this->data['page_title'] = 'PWCMS - Dashboard';
		$this->data['module_title'] = 'Welcome to your dashboard';
		$this->render($this->data['render_path'] . 'dashboard');
	}
}