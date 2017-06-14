<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Public_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->render('public/dashboard');
	}

	public function page($slug = '')
	{
		$this->render('public/dashboard');
	}

	public function article($slug = '')
	{
		$this->render('public/dashboard');
	}

	public function blog($slug = '')
	{
		$this->render('public/dashboard');
	}

	public function shop($slug = '')
	{
		$this->render('public/dashboard');
	}

	public function new($slug = '')
	{
		$this->render('public/dashboard');
	}

	public function edit($slug = '')
	{
		$this->render('public/dashboard');
	}

	public function delete($slug = '')
	{
		$this->render('public/dashboard');
	}
}
