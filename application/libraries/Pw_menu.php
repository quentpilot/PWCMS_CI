<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Pw_menu extends PW_Controller {

	/**
    * @Author       : quentpilot {Quentin Le Bian}
    * @Email        : quentin.lebian@pilotaweb.fr
    * @Web          : https://pilotaweb.fr
    * @Date         : 2017-06-28 07:30:42
    * @See          : PW_Controller class
  **/

    protected $name = NULL;
    protected $title = NULL;
    protected $url = NULL;
    protected $icon = NULL;
    protected $position = NULL;
    protected $category = NULL;
    protected $group = NULL;
    protected $app = NULL;
    protected $template = NULL;
    protected $child = NULL;
    protected $active = NULL;
    protected $order_by = NULL;
    protected $where = NULL;
    protected $view = true;
    protected $view_file = NULL;
    public $menu_data = NULL;
    public $set = false;

    function __construct($template = 'admin_master')
    {
        $this->app = 1;
        $this->group = 1;
        $this->order_by = 'position';
        $this->where = array('items.status', 1);
        $this->view = false;
        $this->template = $template;
    }

    public function build($data = NULL, $view = false, $template = 'admin_master', $view_file = NULL)
    {
        if ($view && is_null($template) && is_null($view_file))
            return false;
        $this->view = $view;
        $this->templates = $template;
        $this->view_file = $view_file;
        if (is_null($data))
        {
            if (!$this->get())
                return false;
        }
        else
            $this->menu_data = $data;
        if (!$this->set($this->menu_data))
            return false;
        return $this->menu();
    }

    public function set($data = NULL)
    {
        if (is_null($data))
            return false;
        if (!$this->build_values($data))
            return false;
        /*if (!$this->check_values($data))
            return false;*/
        return true;
    }

    protected function build_values($data = NULL)
    {
        $menus = $this->load_categories($data);
        if (!$menus)
            return false;
        $this->menu_data = $menus;
        
        $set = $this->load_attributes($menus);
        if (!$set)
            return false;
        $this->set = true;
        //$this->menu_data = $set;
        return true;
    }

    public function get_item_table($data = NULL, $row = 'id', $value = NULL)
    {
        if (is_null($data) || is_null($value) || is_null($row))
            return false;

        foreach ($data as $menus)
        {
            if ($menus[$row] == $value)
                return $menus;
        }
        return false;
    }

    protected function load_categories($data = NULL)
    {

        $categories = $this->db->get('category');
        if (!$categories->num_rows())
            return false;
        $cats = $categories->result_array();
        $items = array();
        foreach ($data as $key)
        {
            if (($category = $this->get_item_table($cats, 'cat_id', $key['cat_id'])))
            {
                $key = array_merge($key, $category);
                array_push($items, $key);
            }
        }
        return $items;
    }

    protected function load_attributes($data = NULL)
    {
        $not_to_load = array('menu_data', 'set');
        $have_to_load = array('template');
        $tmp = array();
        foreach ($data as $menu => $link)
        {
            foreach ($link as $key => $value) 
            {
                //debug($key);
                if (in_array($key, $not_to_load))
                    return false;
                /*elseif (!in_array($key, $have_to_load) && is_null($this->template))
                    $menu['template'] = $this->template;*/
                    //return false;
                if (property_exists('Pw_menu', $key))
                    $this->$menu = $link;
                /*else
                    return false;*/
            }
            array_push($tmp, $menu);
        }
        return true;
    }

    protected function has_child()
    {
        return $this->menu_data;
    }

    protected function check_values($data = NULL)
    {
        $not_to_load = array('menu_data', 'set');
        foreach ($data as $menu => $link)
        {
            if (in_array($menu, $not_to_load))
                return false;
            if (property_exists('Pw_menu', $menu))
                $this->$menu = $link;
            else
                return false;
        }
        return true;
    }

    public function get()
    {
        if (is_null($this->where) || is_null($this->order_by) || is_null($this->app))
            return false;
        //if (!is_null($this->menu_data) && $this->check_menu_data())
        if (!is_null($this->menu_data))
            return $this->menu_data;
     
        $req = $this->db->select()
                    ->from('items')
                    ->where($this->where)
                    ->join('items_category', 'items_category.item_id = items.id', 'inner')
                    ->join('items_style', 'items.id = items_style.item_id')
                    ->join('items_apps', 'items.id = items_apps.item_id')
                    ->join('items_groups', 'items.id = items_groups.item_id')
                    ->order_by($this->order_by)
                    ->get();

        if (!$req->num_rows())
            return false;

        $menus = $req->result_array();
        $this->menu_data = $menus;
        return $menus;
    }

    protected function menu()
    {
        if ($this->set && !$this->view)
            return $this->menu_data;
        elseif ($this->view && !is_null($this->view_file) && !is_null($this->template))
            return $this->build_menu();
        return NULL;
    }

    protected function build_menu()
    {
        $menu = array('menus' => $this->menu_data);
        return $this->load->view('templates/'.$this->template.'/render/menu/'.$this->view_file, $menu, true);
    }

}