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

  function __construct($template = 'master', $class_name = 'PW_Controller')
  {
    // load parent constructor
    parent::__construct();

    // set data attibutes which will be load to view file
    $this->data['page_title'] = 'PWCMS'; // main page title
    $this->data['head_link'] = ''; // CSS links to add between <head></head>
    $this->data['body_link'] = ''; // JS links to add between <body></body>
    $this->data['template'] = $template; // template folder name to load assets and views
    $this->data['controller_class'] = $class_name;
    $this->data['render_path'] = 'templates/'.$this->data['template'].'/'.$this->data['controller_class'] . '/';
  
    // load external classes by default
    $this->load->library('pw_database');
    $this->load->library('pw_mailer');
    $this->load->library('pw_user');
    $this->load->library('pw_form');
  }

  protected function render($view = NULL, $template = 'master')
  {
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