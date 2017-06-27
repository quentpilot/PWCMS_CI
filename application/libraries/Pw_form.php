<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Pw_form {

	/**
    * @Author       : quentpilot {Quentin Le Bian}
    * @Email        : quentin.lebian@pilotaweb.fr
    * @Web          : https://pilotaweb.fr
    * @Date         : 2017-06-23 20:00:00
    * @See          : PW_Controller class
  **/

    public $fields = NULL;
    public $where = NULL;
    public $table = NULL;
    public $database = NULL;
    public $set = false;

	function __construct()
	{
        $this->database = 'default';
	}

    public function set($form = NULL)
    {
        if (is_null($form))
            return false;
        foreach ($form as $row => $data)
        {
            if (property_exists('Pw_form', $row))
                $this->$row = $data;
            else
                return false;
        }
        $this->set = true;
        return true;

    }

    public function update($form = NULL)
    {
        if ((is_null($form)) || (!$this->set))
            return false;
        $this->load->database();
        $req = $this->db->set($this->fields)
                        ->where($this->where)
                        ->update($this->table);
        if (!$req)
            return false;
        return false;
    }
}