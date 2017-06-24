<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class AdminUser extends PW_Controller {
	/**
		* @Author				: quentpilot {Quentin Le Bian}
		* @Email				: quentin.lebian@pilotaweb.fr
		* @Web					: https://pilotaweb.fr
		* @Date					: 2017-06-23 20:00:00
	**/

	public function __construct()
	{
		parent::__construct('admin_master');
	}

	public function index()
	{
		//print_r($this->router->routes);
		//$this->load->view('Welcome/welcome_message');
		$this->render('dashboard', 'admin_master');
	}

	public function login()
	{
		$this->render('login', 'admin_master');
	}
}