<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Users_Model extends PW_Model {
	/**
		* @Author				: quentpilot {Quentin Le Bian}
		* @Email				: quentin.lebian@pilotaweb.fr
		* @Web					: https://pilotaweb.fr
		* @Date					: 2017-06-23 20:00:00
		* @See					: PW_Model class
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