<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends Public_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// on default view (default_controller)
		// redirect to custom page
		redirect('welcome');
		// or display some view
		// $this->render('public/dashboard');
	}
}
