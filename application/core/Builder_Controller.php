<?php defined('BASEPATH') OR exit('No direct script access allowed');

    /******************************
    *
    * Builder_Controller.php for PWCMS in
    *
    * Made by Quentin Le Bian
    * Contact   <quentin.lebian@pilotaweb.fr>
    *
    * Started on  Wed Jul 05 17:12:24 2017 quentin
    * Last update Thu Jul 06 03:22:42 2017 quentin
    *
    ******************************/

class Builder_Controller extends Admin_Controller
{
    /**
    * @Author       : quentpilot {Quentin Le Bian}
    * @Copyright    : MIT - Enjoy and code as you are
    * @Email        : quentin.lebian@pilotaweb.fr
    * @Web          : https://pilotaweb.fr
    * @Date         : 2017-07-05 17:12:24
    * @See          : PW_Controller class
    **/

  function __construct($class_name = 'Builder', $template = 'admin_master')
  {
    parent::__construct($class_name, $template);
    
    if (!$this->pw_user->isLoged())
    {
      // redirect user to login page
      redirect('admin/login', 'refresh');
    }

    $this->data['current_user_menu'] = '';
    $this->data['template'] = $template;
    $this->data['controller_class'] = $class_name;
    $this->data['render_path'] = 'templates/'.$this->data['template'].'/'.$this->data['controller_class'] . '/';
    $this->data['admin_sidebar_menu'] = $this->pw_menu->build(NULL, true, $this->data['template'], 'link'); // dynamic admin sidebar menu
    $this->data['navbar_menu'] = $this->load->view('templates/'.$this->data['template'].'/parts/navbar_menu.php', NULL, TRUE);
    $this->data['sidebar_menu'] = $this->load->view('templates/'.$this->data['template'].'/parts/sidebar_menu.php', array('admin_sidebar_menu' => $this->data['admin_sidebar_menu']), TRUE);
    $this->data['page_title'] = 'PWCMS - PilotaWeb';
    $this->data['template_name'] = 'admin_master';

  }

  protected function render($view = NULL, $template = 'admin_master')
  {
    parent::render($view, $template);
  }
}