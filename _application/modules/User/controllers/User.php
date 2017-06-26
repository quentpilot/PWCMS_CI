<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class User extends Public_Controller {
	/**
		* @Author				: quentpilot {Quentin Le Bian}
		* @Email				: quentin.lebian@pilotaweb.fr
		* @Web					: https://pilotaweb.fr
		* @Date					: 2017-06-23 20:00:00
	**/

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->render('index');
		//print_r($this->router->routes);
		//$this->load->view('Welcome/welcome_message');
	}

	public function login()
	{
		//echo "Admin login";
		$this->render('login');
	}
}