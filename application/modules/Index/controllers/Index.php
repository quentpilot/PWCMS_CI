<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Index extends Public_Controller {
	/**
		* @Author				: quentpilot {Quentin Le Bian}
		* @Email				: quentin.lebian@pilotaweb.fr
		* @Web					: https://pilotaweb.fr
		* @Date					: 2017-06-23 20:00:00
	**/

	public function __construct()
	{
		parent::__construct('Index');
	}

	public function index()
	{
		$this->render($this->data['render_path']. 'index');
		//print_r($this->router->routes);
		//$this->load->view('Welcome/welcome_message');
	}

	public function login()
	{
		//echo "Admin login";
		$this->render('login');
	}
}