<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Pw_database extends MX_Controller {

	/**
    * @Author       : quentpilot {Quentin Le Bian}
    * @Email        : quentin.lebian@pilotaweb.fr
    * @Web          : https://pilotaweb.fr
    * @Date         : 2017-06-24 02:22:00
    * @See          : PW_Controller class
  **/

	function __construct()
	{
		//parent::__construct();
        
	}

    public function count($table = NULL, $where = NULL, $order_by = 'id')
    {
        if (is_null($table) || is_null($where) || is_null($order_by))
            return false;
        $req = $this->db->select()
                        ->where($where)
                        ->order_by($order_by)
                        ->get($table);

        return $req->num_row();
    }

    public function get($table = NULL, $where = NULL, $cols = '', $order_by = 'id', $limit = NULL, $class = false)
    {
        if (is_null($table) || is_null($where) || is_null($order_by))
            return false;
        if (is_null($limit))
        {
            $req = $this->db->select($cols)
                        ->where($where)
                        ->order_by($order_by)
                        ->get($table);
        }
        else
        {
            $req = $this->db->select($cols)
                        ->where($where)
                        ->order_by($order_by)
                        ->limit($limit)
                        ->get($table);
        }
        if (!$req->num_rows())
            return false;

        if ($class)
            $data = $req->result();
        elseif (!$class)
            $data = $req->result_array();
        return $data[0];
    }

    public function insert($data = NULL, $table = NULL)
    {
        if (is_null($data) || is_null($table))
            return false;
        $req = $this->db->insert($table, $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function update($data = NULL, $where = NULL, $table = NULL)
    {
        if (is_null($data) || is_null($table) || is_null($where))
            return false;
        $req = $this->db->where($where)
                        ->update($table, $data);
        return true;
    }

    public function delete($where = NULL, $table = NULL)
    {
        if (is_null($where) || is_null($table))
            return false;
        $req = $this->db->where($where)
                        ->delete($table);
        return true;
    }

    public function query($sql = NULL, $class = false)
    {
        if (is_null($sql))
            return false;
        $req = $this->db->query($sql);

        if ($class)
            return $req->result();
        elseif (!$class)
            return $req->result_array();
        return false;
    }
}