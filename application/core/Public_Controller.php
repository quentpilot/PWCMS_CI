<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Public_Controller extends PW_Controller
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
    $this->data['template'] = 'public_master';
    $this->data['current_user'] = $this->ion_auth->user()->row();
    $this->data['navbar_menu'] = $this->load->view('templates/'.$this->data['template'].'/parts/navbar_menu.php', NULL, TRUE);
    $this->data['sidebar_menu'] = '';
    $this->data['page_title'] = 'PWCMS - Welcome';
    $this->data['template'] = 'public_master';
  }

  protected function render($view = NULL, $template = 'public_master')
  {
    parent::render($view, $template);
  }
}