<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PW_Controller extends MX_Controller
{
  /**
    * @Author       : quentpilot {Quentin Le Bian}
    * @Email        : quentin.lebian@pilotaweb.fr
    * @Web          : https://pilotaweb.fr
    * @Date         : 2017-06-23 20:00:00
    * @See          : MX_Controller & CI_Controller classes
  **/

  protected $data = array();

  function __construct($class_name = 'PW_Controller', $template = 'master')
  {
    // load parent constructor
    parent::__construct();

    // load external classes by default
    //$this->load->library('pw_database');
    $this->load->library('pw_mailer');
    $this->load->library('pw_user');
    $this->load->library('pw_form');
    $this->load->library('pw_menu');

    // set data attibutes which will be load to view file
    //$this->data['user_data'] = (!isset($_SESSION['user']) ? NULL : $_SESSION['user']);
    $this->data['user_data'] = isLoged();
    $this->data['page_title'] = 'PWCMS'; // main page title
    $this->data['module_title'] = $this->data['page_title']; // main module title
    $this->data['head_link'] = array(); // CSS links to add between <head></head>
    $this->data['body_link'] = array(); // JS links to add between <body></body>
    $this->data['tmp_template'] = $template; // template folder name to load assets and views
    $this->data['template'] = $this->getTemplate(); // template folder name to load assets and views
    $this->data['current_template'] = $this->getTemplate(); // template folder name to load assets and views
    $this->data['flash_alert'] = $this->showAlert();
    $this->data['form_error'] = $this->showError();
    $this->data['controller_class'] = $class_name;
    $this->data['render_path'] = 'templates/'.$this->data['template'].'/'.$this->data['controller_class'] . '/';
    $this->data['admin_navbar_menu'] = $this->pw_menu->build();
  }

  protected function render($view = NULL, $template = 'master')
  {
    /** load view
    **  if this->renter('some_view'), then load view from 'modules/some_module/views/'
    **  elseif this->renter($this->data['render_path'] . 'some_view'), then load view from 'views/templates/some_template/some_module/'
    **/
    if (!is_null($this->data['template']) && $template == 'master')
      $template = $this->data['template'];
    $this->data['template'] = $template;
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

  protected function render_out($view = NULL, $template = 'master')
  {
    /** load view
    **  if this->renter(some_view'), then load view from 'views/templates/some_template/some_module/'
    **/
    if (!is_null($this->data['template']) && $template == 'master')
      $template = $this->data['template'];
    $this->data['template'] = $template;
    if ($template == 'json' || $this->input->is_ajax_request())
    {
      header('Content-Type: application/json');
      echo json_encode($this->data);
    }
    else
    {
      $this->data['view_content'] = (is_null($view)) ? '' : $this->load->view($this->data['render_path'] . $view, $this->data, TRUE);
      $this->load->view('templates/' . $template, $this->data);
    }
  }

  protected function render_in($view = NULL, $template = 'master')
  {
    /** load view
    **  if this->renter('some_view'), then load view from 'modules/some_module/views/'
    **  elseif this->renter($this->data['render_path'] . 'some_view'), then load view from 'views/templates/some_template/some_module/'
    **/
    if (!is_null($this->data['template']) && $template == 'master')
      $template = $this->data['template'];
    $this->data['template'] = $template;
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

  protected function add_css($filename = NULL)
  {
    if (is_null($filename))
      return NULL;
    array_push($this->data['head_link'], $filename);
    return $this->data['head_link'];
  }

  protected function add_js($filename = NULL)
  {
    if (is_null($filename))
      return NULL;
    array_push($this->data['body_link'], $filename);
    return $this->data['body_link'];
  }

  protected function link_css($app = 'public')
  {
    $apps = array('public', 'admin');
    if (!in_array($app, $apps))
      return NULL;
    if (!count($this->data['head_link']))
      return NULL;
    $string = '';
    foreach ($this->data['head_link'] as $link) 
    {
      $url = base_url("assets/$app/".$this->data['template']."/$link");
      if (file_exists($url))
        $string .= '<link href="'.$url.'" rel="stylesheet" type="text/css" />';
    }
    return $string;
  }

  protected function link_js($app = 'public')
  {
    $apps = array('public', 'admin');
    if (!in_array($app, $apps))
      return NULL;
    if (!count($this->data['body_link']))
      return NULL;
    $string = '';
    foreach ($this->data['body_link'] as $link) 
    {
      $string .= '
                  <link href="<?= site_url("assets/'.$app.'/'.$this->data['template'].'/'.$link.'") ?>" 
                  rel="stylesheet" type="text/css" />
      ';
    }
    return $string;
  }

  protected function getTemplate($app = 'admin')
  {
    $apps = array('admin', 'public');
    if (!in_array($app, $apps))
      return 'admin_master';
    if ($this->data['tmp_template'] != 'master')
      return $this->data['tmp_template'];
    $col = $app . '_template';
    if (($data = $this->pw_database->get('cms_settings', array('id', 1), $col)))
      return $data[$col];
    return 'admin_master';
  }

  protected function showAlert()
  {
    if($this->session->flashdata('message'))
    {
      $color = $this->session->flashdata('class');
      $message = $this->session->flashdata('message');
      $string = '';
      $string .= '
              <div class="container-fluid">
                <div class="alert alert-'.$color.' alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                                    '.$message.'
                </div>
              </div>
      ';
      return $string;
    }
    return NULL;
  }

  protected function showError()
  {
      if($this->session->flashdata('message'))
      {

          $color = $this->session->flashdata('class');
          $message = $this->session->flashdata('message');
          $string = '';
          $string .= '
                <div class="container-fluid">
                  <div class="alert alert-'.$color.' alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                                      '.$message.'
                  </div>
                </div>
          ';
          return $string;
      }
  return NULL;
  }

  /*protected function _css($path = NULL, $tag = 'head')
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

  protected function _js($path = NULL, $tag = 'body')
  {
    if ($path != NULL)
    {
      if ($tag == 'head')
        $this->data['head_link'] .= $path;
      elseif ($tag == 'body')
        $this->data['body_link'] .= $path;
      else
        return NULL;
      return $this->load_js()
    }
    return NULL; 
  }*/

  /*protected function load_css()
  {
    return NULL; 
  }

  protected function load_js()
  {
    return NULL; 
  }*/

}