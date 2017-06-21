<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin extends MX_Controller {
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-02-21 08:31:25
	**/
	public function index()
	{
		echo "Admin part";
		//print_r($this->router->routes);
		//$this->load->view('Welcome/welcome_message');
	}
}