<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/******************************
    *
    * Users_model.php for PWCMS in 
    *
    * Made by Quentin Le Bian
    * Contact   <quentin.lebian@pilotaweb.fr>
    *
    * Started on  Fri Jun 23 19:20:18 2017 quentin
    * Last update Thu Jun 29 03:22:42 2017 quentin
    *
    ******************************/
 
class Users_Model extends PW_Model {
	/**
	* @Author		: quentpilot {Quentin Le Bian}
	* @Copyright    : MIT - Enjoy and code as you are
	* @Email		: quentin.lebian@pilotaweb.fr
	* @Web			: https://pilotaweb.fr
	* @Date			: 2017-06-23 19:20:18
	* @See			: PW_Model class
	**/

	public function __construct()
	{
		parent::__construct();
	}

	public function checkEditProfile($form = NULL)
	{
		return false;
	}
}