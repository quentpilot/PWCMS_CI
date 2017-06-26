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
		parent::__construct();
	}

	public function index()
	{
		//print_r($this->router->routes);
		$this->render('dashboard');
	}
}