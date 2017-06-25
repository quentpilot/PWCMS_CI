<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends PW_Controller
{
  /**
    * @Author       : quentpilot {Quentin Le Bian}
    * @Email        : quentin.lebian@pilotaweb.fr
    * @Web          : https://pilotaweb.fr
    * @Date         : 2017-06-23 20:00:00
    * @See          : PW_Controller class
  **/

  function __construct()
  {
    parent::__construct();
    if (!$this->pw_user->isLoged())
    {
      // redirect user to login page
      redirect('admin/login', 'refresh');
    }
    $this->data['current_user'] = $this->ion_auth->user()->row();
    $this->data['current_user_menu'] = '';
    $this->data['template'] = 'admin_master';
    // replace ion_auth by my check
    if($this->pw_user->inGroup('admin'))
    {
      $this->data['navbar_menu'] = $this->load->view('templates/'.$this->data['template'].'/parts/navbar_menu.php', NULL, TRUE);
      $this->data['sidebar_menu'] = $this->load->view('templates/'.$this->data['template'].'/parts/sidebar_menu.php', NULL, TRUE);
    }

    $this->data['page_title'] = 'PWCMS - Dashboard';
    $this->data['template_name'] = 'admin_master';
  }

  protected function render($view = NULL, $template = 'admin_master')
  {
    parent::render($view, $template);
  }
}