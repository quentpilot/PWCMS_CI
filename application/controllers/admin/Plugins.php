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
		$this->load->model('admin/plugins_model');

		$plugins = array(
			'list' => $this->plugins_model->getPlugin(),
			'list_install' => $this->plugins_model->getPlugin()
		);

		$this->data['plugins_list'] = $this->load->view('admin/plugins/list', $plugins, TRUE);
		$this->data['plugins_list_install'] = $this->load->view('admin/plugins/list_install', NULL, TRUE);
		$this->data['plugins_list_download'] = $this->load->view('admin/plugins/list_download', NULL, TRUE);
		$this->data['plugins_settings'] = $this->load->view('admin/plugins/settings_form', NULL, TRUE);
		$this->render('admin/plugins/index');
	}

	public function install($plugin = NULL)
	{
		$this->load->model('admin/plugins_model');
		if (is_null($plugin))
			$this->session->set_flashdata('message','Problème lors de l\'installation du plugin');
		if (!$this->plugins_model->install($plugin))
			$this->session->set_flashdata('message','Problème lors de l\'installation du plugin');
		else
			$this->session->set_flashdata('message','Success lors de l\'installation du plugin');
	
		// load view
		$this->data['plugins_list'] = $this->load->view('admin/plugins/list', NULL, TRUE);
		$this->data['plugins_list_install'] = $this->load->view('admin/plugins/list_install', NULL, TRUE);
		$this->data['plugins_list_download'] = $this->load->view('admin/plugins/list_download', NULL, TRUE);
		$this->data['plugins_settings'] = $this->load->view('admin/plugins/settings_form', NULL, TRUE);
		//$this->render('admin/plugins/index');
		//redirect('admin/plugins');
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