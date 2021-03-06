<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Plugins model
*
* Author:  Quentin Le Bian
* 		   quentin.lebian@pilotaweb.fr
*	  	   @benedmunds
*
*
* Location: http://github.com/quentpilot/PWCMS_CI
*
* Created:  15.06.2017
*
* Description:  
* Original Author name has been kept but that does not mean that the method has not been modified.
*
* Requirements: PHP5 or above
*
*/

class Plugins_model extends CI_Model
{
	protected $path = NULL; // main path access
	protected $source = NULL; // current source of plugin file
	protected $dest = NULL; // current destination of plugin file
	protected $folder = NULL; // plugin folder or slug
	protected $files = array(); // tab including all files to copy
	protected $dbcols = array(); // tab naming cols and values of each plugin to add into db
	protected $dbtable = NULL; // current database table to store plugin's data (if != 'plugins' table)

	public function __construct()
	{
		parent::__construct();
		$this->path = 'assets/content/plugins/';
		$this->source = 'assets/content/plugins/';
		$this->dest = 'application/';
		$this->dbtable = 'plugins';
	}

	protected function install($slug = NULL)
	{
		if ($slug === NULL && $this->folder === NULL)
			return false;
		$this->folder = (empty($slug) ? $this->folder : $slug);
		elseif (!$this->checkFiles($this->folder))
			return false;
		if ($this->run())
			return true;
		return false;

	}

	protected function checkFiles($slug = '', $getFiles = false)
	{
		
	}

	protected function run()
	{
		if (empty($this->folder) || empty($this->files))
			return false;
		// copy all the plugin files in application/...
		// add plugin to database, and with his sql table if got
		return false;

	}

	protected function clean($slug = '')
	{
		
	}

	protected function add()
	{
		if (empty($this->dbcols) || empty($this->dbtable))
			return false;
		$this->load->database();
		$this->db->set($this->dbcols);
		$this->db->insert($this->dbtable);
		return true;
	}

	protected function edit()
	{
		if (empty($this->dbcols) || empty($this->dbtable))
			return false;
		$this->load->database();
		$this->db->set($this->dbcols);
		$this->db->update($this->dbtable);
		return true;
	}

	protected function delete($id = 0)
	{
		if ($id == 0 || empty($this->dbtable))
			return false;
		$this->load->database();
		$this->db->set('id', $id);
		$this->db->delete($this->dbtable);
		return true;
	}

	protected function active($status = true)
	{
		if (empty($this->dbtable))
			return false;
		$this->load->database();
		$this->db->set('status', $status);
		$this->db->update($this->dbtable);
		return true;
	}
}