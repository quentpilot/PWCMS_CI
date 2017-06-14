<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Public_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->render('public/dashboard');
	}

	public function login()
	{
		$this->render('public/dashboard');
	}

	public function subscribe()
	{
		$this->render('public/dashboard');
	}

	public function validAccount($username = '', $token = '')
	{
		$this->render('public/dashboard');
	}

	public function forgotPass()
	{
		$this->render('public/dashboard');
	}

	public function newPass($username = '', $token = '')
	{
		$this->render('public/dashboard');
	}

	public function logout()
	{
		$this->render('public/dashboard');
	}

	public function profile()
	{
		$this->render('public/dashboard');
	}
}
