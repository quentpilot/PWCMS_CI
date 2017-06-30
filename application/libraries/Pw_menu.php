<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /******************************
    *
    * Pw_menu.php for PWCMS in 
    *
    * Made by Quentin Le Bian
    * Contact   <quentin.lebian@pilotaweb.fr>
    *
    * Started on  Wed Jun 28 07:30:00 2017 quentin
    * Last update Thu Jun 29 03:22:42 2017 quentin
    *
    ******************************/

class Pw_menu {

	/**
    * @Author       : quentpilot {Quentin Le Bian}
    * @Copyright    : MIT - Enjoy and code as you are
    * @Email        : quentin.lebian@pilotaweb.fr
    * @Web          : https://pilotaweb.fr
    * @Date         : 2017-06-28 07:30:00
    * @See          : Pw_menu class cms.pilotaweb.fr/doc/class/pw_menu
    **/

    protected $pw = NULL;
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
    protected $num_menus = 0;
    protected $view = true;
    protected $view_mode = NULL;
    public $view_file = NULL;
    public $path_view = NULL;
    public $path_view_last = NULL;
    public $path_view_child = NULL;
    public $path_view_child_first = NULL;
    public $path_view_child_last = NULL;
    public $menu_data = NULL;
    public $set = false;

    function __construct($template = 'admin_master')
    {
        $this->pw = &get_instance();
        $this->app = 1;
        $this->group = 1;
        $this->order_by = 'position';
        $this->where = array('items.status', 1);
        $this->view = false;
        $this->view_mode = 'auto';
        $this->template = $template;
        $this->path_view = "templates/$template/render/menu/".$this->view_file."/".$this->view_file;
        $this->path_view_last = "templates/$template/render/menu/".$this->view_file."/".$this->view_file."-last";
        $this->path_view_child_first = "templates/$template/render/menu/".$this->view_file."/".$this->view_file."-child-first";
        $this->path_view_child = "templates/$template/render/menu/".$this->view_file."/".$this->view_file."-child";
        $this->path_view_child_last = "templates/$template/render/menu/".$this->view_file."/".$this->view_file."-child-last";
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
            if (!($m = $this->get()))
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
        $categories = $this->pw->db->get('category');
        if (!$categories->num_rows())
            return false;
        $cats = $categories->result_array();
        $items = array();

        foreach ($data as $key)
        {
            if (($category = $this->get_item_table($cats, 'cat_id', $key['cat_id'])))
            {
                unset($category['name']);
                unset($category['status']);
                $tmp = array_merge($key, $category);
                array_push($items, $tmp);
            }
        }
        return $items;
    }

    protected function load_attributes($data = NULL)
    {
        $not_to_load = array('menu_data', 'set');
        $have_to_load = array('template');

        foreach ($data as $menu => $link)
        {
            foreach ($link as $key => $value) 
            {
                if (in_array($key, $not_to_load))
                    return false;
                if (property_exists('Pw_menu', $key))
                    $this->$menu = $link;
            }
        }
        return true;
    }

    public function get()
    {
        if (is_null($this->where) || is_null($this->order_by) || is_null($this->app))
            return false;
        if (!is_null($this->menu_data)) // && $this->check_menu_data())
            return $this->menu_data;
     
        $req = $this->pw->db->select()
                    ->from('items')
                    ->where($this->where)
                    ->join('items_category', 'items_category.item_id = items.id', 'inner')
                    ->join('items_style', 'items.id = items_style.item_id')
                    ->join('items_apps', 'items.id = items_apps.item_id')
                    ->join('items_groups', 'items.id = items_groups.item_id')
                    ->join('related_items', 'items.id = related_items.item_id')
                    ->order_by($this->order_by)
                    ->get();

        if (!($nb = $req->num_rows()))
            return false;
        $this->num_menus = $nb;

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
        $this->build_path();
        $menus = $this->menu_data;
        $string = '';

        foreach ($menus as $key => $menu)
        {
            $mid = $menu['id'];
            if ($this->is_parent($mid))
            {
                $string .= $this->build_path_file();
                $string .= '
                    <a href="#" class="menu-toggle">
                        <i class="material-icons">'. $menu['icon'] .'</i>
                        <span>'. $menu['title'] .'</span>
                    </a>
                ';
            }
            if ($this->is_child($mid))
            {
                if ($this->first_child($mid))
                    $string .= $this->build_path_file('child-first');
                    
                $string .= '
                    <li>
                        <a href="'. site_url($menu['url']) .'">'.$menu['title'].'</a>
                    </li>
                ';

                if ($this->next_child($menu))
                    $string .= $this->build_path_file('child-last');
            }

            if ($this->is_parent($menu['ritem_id']) && $this->next_child($menu))
                $string .= $this->build_path_file('last');
        }
        //return $this->pw->load->view('templates/'.$this->template.'/render/menu/'.$this->view_file.'/'.$this->view_file, $menus, true);
        //echo $string;
        return $string;
    }

    protected function build_menu_()
    {
        $menu = array('menus' => $this->menu_data);
        return $this->pw->load->view('templates/'.$this->template.'/render/menu/'.$this->view_file.'/'.$this->view_file, $menu, true);
    }

    protected function is_child($menu_id = 0)
    {
        $menus = $this->menu_data;
        foreach ($menus as $key => $menu)
        {
            if ($menu['item_id'] == $menu_id && $menu['ritem_id'] != 0)
            {
                return true;
            }
        }
        return false;
    }

    protected function is_parent($menu_id = 0)
    {
        $menus = $this->menu_data;
        foreach ($menus as $key => $menu)
        {
            if ($menu['ritem_id'] == 0 && $menu['item_id'] == $menu_id)
                return true;
        }
        return false;
    }

    protected function first_child($menu_id = 0)
    {
        $menus = $this->menu_data;
        $child = 0;

        foreach ($menus as $key => $menu)
        {
            if ($menu['ritem_id'] != 0)
            {
                if ($menu['item_id'] == $menu_id && $child)
                    return false;
                $child++;
            }
        }
        return true;
    }

    protected function next_child($data = 0)
    {
        $menus = $this->menu_data;
        $child = 0;

        foreach ($menus as $key => $menu)
        {
            if ($menu['ritem_id'] != 0)
            {
                $child++;
                if ($menu['item_id'] == $data['id'] && $child >= $data['position'])
                    return true;
            }
            else
                $child = 0;
        }
        return false;
    }

    protected function build_path_file($part = NULL)
    {
        if ($this->view_mode == 'man')
            return $this->build_path_view($part);
        elseif ($this->view_mode == 'auto')
        {
            $ext = $part;
            if (!is_null($part))
                $ext = "-$part";
            $path = __DIR__ . '/../views/'.$this->path_view.$ext.'.php';
            $view = $this->view_file;
            if (file_exists($path))
                $view = file_get_contents($path);
            return $view;
        }
        return NULL;
    }

    protected function build_path_view($part = NULL)
    {
        $ext = $part;
        if (!is_null($part))
            $ext = "_$part";
        $view = 'path_view' . $ext;
        if (property_exists('Pw_menu', $view))
            return $this->$view;
        return NULL;
    }

    protected function build_path()
    {
        $this->path_view = "templates/".$this->template."/render/menu/".$this->view_file."/".$this->view_file;
        /*$this->path_view = '<li class="active">
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">content_copy</i>
                <span>my menu</span>
            </a>
        ';*/

        $this->path_view_last = "templates/".$this->template."/render/menu/".$this->view_file."/".$this->view_file."-last";
        //$this->path_view_last = '</li>';

        $this->path_view_child_first = "templates/".$this->template."/render/menu/".$this->view_file."/".$this->view_file."-child-first";
        //$this->path_view_child_first = '<ul class="ml-menu">';


        $this->path_view_child = "templates/".$this->template."/render/menu/".$this->view_file."/".$this->view_file."-child";
        /*$this->path_view_child = '<li>
                <a href="admin">Classique</a>
            </li>
            ';*/

        $this->path_view_child_last = "templates/".$this->template."/render/menu/".$this->view_file."/".$this->view_file."-child-last";
        //$this->path_view_child_last = '</ul>';
        return true;
    }
}