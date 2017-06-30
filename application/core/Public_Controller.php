<?php defined('BASEPATH') OR exit('No direct script access allowed');

    /******************************
    *
    * Public_Controller.php for PWCMS in
    *
    * Made by Quentin Le Bian
    * Contact   <quentin.lebian@pilotaweb.fr>
    *
    * Started on  Fri Jun 23 20:00:18 2017 quentin
    * Last update Thu Jun 29 03:22:42 2017 quentin
    *
    ******************************/

class Public_Controller extends PW_Controller
{
    /**
    * @Author       : quentpilot {Quentin Le Bian}
    * @Copyright    : MIT - Enjoy and code as you are
    * @Email        : quentin.lebian@pilotaweb.fr
    * @Web          : https://pilotaweb.fr
    * @Date         : 2017-06-23 20:00:18
    * @See          : PW_Controller class
    **/

  function __construct($class_name = 'Index', $template = 'public_master')
  {
    parent::__construct($class_name, $template);
    $this->data['template'] = $this->getTemplate('public');
    $this->data['navbar_menu'] = $this->load->view('templates/'.$this->data['template'].'/parts/navbar_menu.php', NULL, TRUE);
    $this->data['sidebar_menu'] = '';
    $this->data['page_title'] = 'PWCMS - Welcome';
  }

  protected function render($view = NULL, $template = 'public_master')
  {
    parent::render($view, $template);
  }
}