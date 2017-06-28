<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Pw_menu extends PW_Controller {

	/**
    * @Author       : quentpilot {Quentin Le Bian}
    * @Email        : quentin.lebian@pilotaweb.fr
    * @Web          : https://pilotaweb.fr
    * @Date         : 2017-06-23 20:00:00
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

    function __construct()
    {
        $this->app = 1;
        $this->group = 1;
        $this->order_by = 'position';
        $this->where = array('items.status', 1);
        $this->view = false;
        $this->template = 'admin_master';
    }

    public function build($data = NULL)
    {
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
        $this->set = true;
        return true;
    }

    protected function build_values($data = NULL)
    {
        $menus = $this->load_categories($data);
        if (!$menus)
            return false;
        $this->menu_data = $menus;
        //$menus = $this->load_app();
        //$req = $this->db->select()
        //debug(get_instance());
        //$this->menu_data = 'coucou';
        return true;
    }

    public function get_item_table($data = NULL, $row = 'id', $value = NULL)
    {
        if (is_null($data) || is_null($value) || is_null($row))
            return false;

        //debug($data);

        foreach ($data as $menus)
        {
            //debug($menus);
            //echo $menus['name'];
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
        //return $cats;
        $items = array();
        foreach ($data as $key)
        {
            foreach ($key as $menu => $link)
            {
                if (($category = $this->get_item_table($cats, 'id', $key['cat_id'])))
                {
                    $key = array_merge($key, $category);
                    array_push($items, $key);
                }
            }
            return $items;
        }
        return false;
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
        // get menu item type
        /*if (!$this->set)
            return false;*/
     
        $req = $this->db->select()
                    ->from('items')
                    ->where($this->where)
                    ->join('items_category', 'items_category.item_id = items.id')
                    ->join('items_style', 'items.id = items_style.item_id')
                    ->join('items_apps', 'items.id = items_apps.item_id')
                    ->join('items_groups', 'items.id = items_groups.item_id')
                    ->order_by($this->order_by)
                    ->get();

        /*$req = $this->db->select()
                    ->from('items')
                    ->where('items.status', 1)
                    ->join('items_category', 'items_category.item_id = items.id')
                    ->join('items_style', 'items.id = items_style.item_id')
                    ->join('items_apps', 'items.id = items_apps.item_id')
                    ->join('items_groups', 'items.id = items_groups.item_id')
                    ->order_by('position DESC')
                    ->get();*/

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
        return $this->render_out('../render/menu/' . $this->view_file);
    }

}