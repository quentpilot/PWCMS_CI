<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/******************************
    *
    * User.php for PWCMS in 
    *
    * Made by Quentin Le Bian
    * Contact   <quentin.lebian@pilotaweb.fr>
    *
    * Started on  Fri Jun 23 19:20:24 2017 quentin
    * Last update Thu Jun 29 03:22:42 2017 quentin
    *
    ******************************/
 
class User extends Public_Controller {
	/**
	* @Author		: quentpilot {Quentin Le Bian}
	* @Copyright    : MIT - Enjoy and code as you are
	* @Email		: quentin.lebian@pilotaweb.fr
	* @Web			: https://pilotaweb.fr
	* @Date			: 2017-06-23 19:20:24
	* @See			: Public_Controller class
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