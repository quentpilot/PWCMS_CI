<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	/******************************
    *
    * Admin.php for PWCMS in 
    *
    * Made by Quentin Le Bian
    * Contact   <quentin.lebian@pilotaweb.fr>
    *
    * Started on  Wed Jun 28 07:30:24 2017 quentin
    * Last update Thu Jun 29 03:22:42 2017 quentin
    *
    ******************************/

class Admin extends Admin_Controller {
	/**
	* @Author		: quentpilot {Quentin Le Bian}
	* @Copyright    : MIT - Enjoy and code as you are
	* @Email		: quentin.lebian@pilotaweb.fr
	* @Web			: https://pilotaweb.fr
	* @Date			: 2017-06-23 19:20:24
	* @See			: Admin_Controller class
	**/

	public function __construct()
	{
		// set parameters for '$render_path' var
		// used for render() method when calling view to application/views/templates/
		parent::__construct();
	}

	public function index()
	{
		$this->data['page_title'] = 'PWCMS - Dashboard';
		$this->data['module_title'] = 'Welcome to your dashboard';
		$this->render($this->data['render_path'] . 'dashboard');
		//$this->load->view($this->data['render_path'] . 'dashboard');
	}
}