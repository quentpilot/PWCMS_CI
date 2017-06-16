<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plugins extends PW_Controller
{
	protected $folder = NULL;
	protected $source = NULL;
	protected $destination = NULL;
	protected $files = array();

	public function __construct()
	{
		parent::__construct();
	}

	public function install()
	{
		return false;
	}

	public function checkFiles()
	{
		return false;
	}

	public function add()
	{
		return false;
	}

	public function edit()
	{
		return false;
	}

	public function delete()
	{
		return false;
	}

	public function active()
	{
		return false;
	}
}