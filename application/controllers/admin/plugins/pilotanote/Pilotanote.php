<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pilotanote extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->render('admin/dashboard');
	}
}
