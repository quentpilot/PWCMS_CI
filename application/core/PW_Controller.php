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

  protected function css($path = NULL, $tag = 'head')
  {
    if ($path != NULL)
    {
      if ($tag == 'head')
        $this->data['head_link'] .= $path;
      elseif ($tag == 'body')
        $this->data['body_link'] .= $path;
      else
        return NULL;
    }
    return NULL;
  }

  protected function js($path = NULL, $tag = 'body')
  {
    if ($path != NULL)
    {
      if ($tag == 'head')
        $this->data['head_link'] .= $path;
      elseif ($tag == 'body')
        $this->data['body_link'] .= $path;
      else
        return NULL;
    }
    return NULL; 
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
    $this->data['current_user'] = $this->ion_auth->user()->row();
    $this->data['current_user_menu'] = '';
    if($this->ion_auth->in_group('admin'))
    {
      $this->data['current_user_menu'] = $this->load->view('templates/_parts/user_menu_admin.php', NULL, TRUE);
    }

    $this->data['page_title'] = 'PWCMS - Dashboard';
    $this->data['template_name'] = 'admin_master';
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
    $this->load->library('ion_auth');
    /*if (!$this->ion_auth->logged_in())
    {
      // redirect user to login page
      redirect('admin/user/login', 'refresh');
    }*/
    $this->data['current_user'] = $this->ion_auth->user()->row();
    $this->data['current_user_menu'] = $this->load->view('templates/_parts/user_menu_public.php', NULL, TRUE);
    $this->data['page_title'] = 'PWCMS - Welcome';
    $this->data['template_name'] = 'public_master';
  }

  protected function render($view = NULL, $template = 'public_master')
  {
    parent::render($view, $template);
  }
}