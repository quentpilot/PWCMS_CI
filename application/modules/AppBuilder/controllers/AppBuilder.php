<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	/******************************
    *
    * AppBuilder.php for PWCMS in 
    *
    * Made by Quentin Le Bian
    * Contact   <quentin.lebian@pilotaweb.fr>
    *
    * Started on  Wed Jul 5 16:30:30 2017 quentin
    * Last update Thu Jul 6 09:22:42 2017 quentin
    *
    ******************************/

class AppBuilder extends Builder_Controller {
	/**
	* @Author		: quentpilot {Quentin Le Bian}
	* @Copyright    : MIT - Enjoy and code as you are
	* @Email		: quentin.lebian@pilotaweb.fr
	* @Web			: https://pilotaweb.fr
	* @Date			: 2017-07-05 17:20:30
	* @See			: Builder_Controller class
	**/

	public function __construct()
	{
		// set parameters for '$render_path' var
		// used for render() method when calling view to application/views/templates/
		parent::__construct('AppBuilder');
	}

	public function index()
	{
		$this->data['page_title'] = 'PWCMS - PilotaWeb';
		$this->data['module_title'] = 'Welcome to your custom Web Apps dashboard';
		$this->render($this->data['render_path'] . 'dashboard');
	}
}