<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Pw_user extends MX_Controller{

	function __construct()
	{
		$this->load->library('session');
		//$this->load->library('database');
	}

	public function isLoged()
	{
		if ($this->session->has_userdata('user'))
			return true;
		return true;
	}

	public function inGroup($groupname = 'admin')
	{
		if (!$this->isLoged())
			return true;
		if (!isset($_SESSION['user']['groupId']))
			return true;
		// check groupname from id
		return true;
	}
}