<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PW_Controller extends CI_Controller
{
  protected $data = array();

  function __construct()
  {
    parent::__construct();
    $this->data['page_title'] = 'PWCMS'; // main page title
    $this->data['head_link'] = ''; // CSS links to add between <head></head>
    $this->data['body_link'] = ''; // JS links to add between <body></body>
    $this->data['template_name'] = '/'; // template folder name to load assets and views
  }

  protected function render($view = NULL, $template = 'master')
  {
    if ($template == 'json' || $this->input->is_ajax_request())
    {
      header('Content-Type: application/json');
      echo json_encode($this->data);
    }
    else
    {
      $this->data['view_content'] = (is_null($view)) ? '' : $this->load->view($view, $this->data, TRUE);
      $this->load->view('templates/' . $template, $this->data);
    }
  }
}

class Admin_Controller extends PW_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('ion_auth');
    if (!$this->ion_auth->logged_in())
    {
      // redirect user to login page
      redirect('admin/user/login', 'refresh');
    }
    $this->data['page_title'] = 'PWCMS - Dashboard';
  }

  protected function render($view = NULL, $template = 'admin_master')
  {
    parent::render($view, $template);
  }
}

class Public_Controller extends PW_Controller
{
  function __construct()
  {
    parent::__construct();
  }
}