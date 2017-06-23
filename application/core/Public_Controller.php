<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Public_Controller extends PW_Controller
{
  /**
    * @Author       : quentpilot {Quentin Le Bian}
    * @Email        : quentin.lebian@pilotaweb.fr
    * @Web          : https://pilotaweb.fr
    * @Date         : 2017-06-23 20:00:00
  **/
  function __construct()
  {
    parent::__construct();
    $this->load->library('ion_auth');
    /*if (!$this->ion_auth->logged_in())
    {
      // redirect user to login page
      redirect('admin/user/login', 'refresh');
    }*/
    $this->data['template'] = 'public_master';
    $this->data['current_user'] = $this->ion_auth->user()->row();
    $this->data['navbar_menu'] = $this->load->view('templates/'.$this->data['template'].'/parts/navbar_menu.php', NULL, TRUE);
    $this->data['sidebar_menu'] = '';
    $this->data['page_title'] = 'PWCMS - Welcome';
    $this->data['template_name'] = 'public_master';
  }

  protected function render($view = NULL, $template = 'public_master')
  {
    parent::render($view, $template);
  }
}