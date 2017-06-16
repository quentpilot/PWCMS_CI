<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plugins extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['plugins_list'] = $this->load->view('admin/plugins/list', NULL, TRUE);
		$this->data['plugins_list_install'] = $this->load->view('admin/plugins/list_install', NULL, TRUE);
		$this->data['plugins_list_download'] = $this->load->view('admin/plugins/list_download', NULL, TRUE);
		$this->data['plugins_settings'] = $this->load->view('admin/plugins/settings_form', NULL, TRUE);
		$this->render('admin/plugins/index');
	}

	public function install()
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