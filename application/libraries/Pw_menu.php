  <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
   Pw_menu.php for PWCMS in 
   
   Made by Quentin Le Bian
   Login   <quentin.lebian@pilotaweb.fr>
   
   Started on  Wed Jun 28 07:30:42 2017 root
   Last update Thu Jun 29 23:21:40 2017 root
*/

class Pw_menu {

	/**
    * @Author       : quentpilot {Quentin Le Bian}
    * @Email        : quentin.lebian@pilotaweb.fr
    * @Web          : https://pilotaweb.fr
    * @Date         : 2017-06-28 07:30:42
    * @See          : PW_Controller class
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
        //parent::__construct();
        //debug($this->menu_data);
        $this->app = 1;
        $this->group = 1;
        $this->order_by = 'position';
        $this->where = array('items.status', 1);
        $this->view = false;
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
        //debug($this->menu_data);
        //echo 'hello';

        if (is_null($data))
        {
            if (!($m = $this->get()))
                return false;
            //debug($this->menu_data);
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
        //$this->menu_data = $data;
        
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
        $categories = $this->pw->db->get('category');
        if (!$categories->num_rows())
            return false;
        $cats = $categories->result_array();
        $items = array();
        $it = 0;
        foreach ($data as $key)
        {
            //debug ($key);
            if (($category = $this->get_item_table($cats, 'cat_id', $key['cat_id'])))
            {
                unset($category['name']);
                unset($category['status']);
                $tmp = array_merge($key, $category);
                array_push($items, $tmp);
                
                $it++;
            }
        }
        //debug ($items);
        $it = 1;
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
        //debug($menus);
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
        $done = array();
        $it = 0;
        //debug($menus);
        //debug($this->menu_data);
        /*foreach ($menus as $key => $menu)
        {
            debug($menu);
            echo '--';
        }*/

        foreach ($menus as $key => $menu)
        {
            //debug($menu);
            //debug($this->menu_data[0]);
            //echo '----';
            //echo count($menus['menus']);
            
            $mid = $menu['id'];
            $pos = $menu['position'];
            //if ($it <= (count($menus['menus']) / 2))
            
            
            //echo "menu $this->num_menus<br>";
            if ($this->is_parent($mid))
            {
                //echo $mid;
                //echo 'parent '.$menu['title'].'<br>';
                $string .= $this->path_view;
                //$string .= $this->pw->load->view('templates/'.$this->template.'/render/menu/'.$this->view_file.'/'.$this->view_file, $menus, true);
                //$string .= $this->pw->load->view($this->path_view, $menu, true);
            }
            if ($this->is_child($mid))
            {
                //echo 'child '.$menu['title'].'<br>';
                //$pos == 1
                if ($this->first_child($mid))
                    $string .= $this->path_view_child_first;
                $string .= $this->path_view_child;
                if ($this->next_child($menu))
                    $string .= $this->path_view_child_last;



                /*if ($pos == 1)
                    $string .= $this->pw->load->view($this->path_view_child_first, $menu, true);
                $string .= $this->pw->load->view($this->path_view_child, $menu, true);
                if ($this->next_child($mid))
                    $string .= $this->pw->load->view($this->path_view_child_last, $menu, true);*/
            }

            if ($this->is_parent($menu['ritem_id']) && $this->next_child($menu))
                $string .= $this->path_view_last;
                //$string .= $this->pw->load->view($this->path_view_last, $menu, true);
            
            //$string .= $this->pw->load->view($this->path_view, $menu, true);
            //$this->num_menus--;    
            
            //if ($this->as_child($mid))
                //$string .= $this->load->view($this->path_view, $menu, true);
            /*elseif ($this->is_child($mid))
            {
                if ($pos <= 1)
                    $string .= $this->load->view($this->path_view_child_first, $menu, true);
                $string .= $this->load->view($this->path_view_child, $menu, true);
                if (!$this->next_child($mid))
                    $string .= $this->load->view($this->path_view_child_last, $menu, true);
            }*/
            //if ($this->as_child($mid))
                //$string .= $this->load->view($this->path_view_last, $menu, true);
        

            $string_ = '
                    <li class="'. $menu['css_class'] .'">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">'. $menu['icon'] .'</i>
                            <span>'. $menu['title'] .'</span>
                        </a>
                    </li>
            ';
        
        }
        $string_ .= '<ul>
                    <li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">content_copy</i>
                            <span>title</span>
                        </a>
                    </li>
                </ul>
            ';

        //return $this->pw->load->view('templates/'.$this->template.'/render/menu/'.$this->view_file.'/'.$this->view_file, $menus, true);
        //echo $string;
        //echo $this->path_view;
            $path = __DIR__ . '/../views/'.$this->path_view.'.php';
            $path = __DIR__ . '/../views/'.'templates/'.$this->template.'/render/menu/'.$this->view_file.'/'.$this->view_file.'.php';
            /*if (file_exists($path))
                echo $string;*/
                //echo $this->pw->load->view($this->path_view, NULL, true);
                //echo __DIR__ . '/../views/'.$this->path_view.'.php';
        //echo $string;
        return $string;
    }

    protected function build_menu_()
    {
        $menu = array('menus' => $this->menu_data);
        return $this->load->view('templates/'.$this->template.'/render/menu/'.$this->view_file.'/'.$this->view_file, $menu, true);
    }

    protected function is_child($menu_id = 0)
    {
        $menus = $this->menu_data;
        foreach ($menus as $key => $menu)
        {
            //echo $menu['ritem_id'];
            if ($menu['item_id'] == $menu_id && $menu['ritem_id'] != 0)
            {
                //echo $menu['item_id'];
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

            //if ($menu['ritem_id'] == $menu_id && $menu['id'] != $menu_id)
            if ($menu['ritem_id'] == 0 && $menu['item_id'] == $menu_id)
            {
                //echo $menu_id;
                //debug($menu);
                return true;
            }
                //debug($menu);
                //return false;
        }
        return false;
    }

    protected function first_child($menu_id = 0)
    {
        $menus = $this->menu_data;
        $child = 0;
        $tmp = 0;
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
        $tmp = 0;
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

    protected function build_path()
    {
        $this->path_view = "templates/".$this->template."/render/menu/".$this->view_file."/".$this->view_file;
        $this->path_view = '<li class="active">
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">content_copy</i>
                <span>my menu</span>
            </a>
        ';

        $this->path_view_last = "templates/".$this->template."/render/menu/".$this->view_file."/".$this->view_file."-last";
        $this->path_view_last = '</li>';

        $this->path_view_child_first = "templates/".$this->template."/render/menu/".$this->view_file."/".$this->view_file."-child-first";
        $this->path_view_child_first = '<ul class="ml-menu">';


        $this->path_view_child = "templates/".$this->template."/render/menu/".$this->view_file."/".$this->view_file."-child";
        $this->path_view_child = '<li>
                <a href="admin">Classique</a>
            </li>
            ';

        $this->path_view_child_last = "templates/".$this->template."/render/menu/".$this->view_file."/".$this->view_file."-child-last";
        $this->path_view_child_last = '</ul>';
        return true;
    }
}