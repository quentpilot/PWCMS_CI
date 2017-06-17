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
	protected $mode = NULL; // folder format of actu plugin to install (type 'pw' or 'application' => 'ci')
	protected $path = NULL; // main path access
	protected $source = NULL; // current source of plugin file
	protected $dest = NULL; // current destination of plugin file
	protected $folder = NULL; // plugin folder or slug
	protected $files = array(); // tab including all files to copy
	protected $dbcols = array(); // tab naming cols and values of each plugin to add into db
	protected $dbtable = NULL; // current database table to store plugin's data (if != 'plugins' table)
	protected $dbplugins = array(); // current plugins data from database (like from 'plugins' or a plugin slug)

	public function __construct()
	{
		parent::__construct();
		$this->mode = 'pw';
		$this->path = __DIR__ . '/../../../assets/content/plugins/';
		$this->source = __DIR__ . '/../../../assets/content/plugins/';
		$this->dest = __DIR__ . '/../../../application/';
		$this->dbtable = 'plugins';
		$this->dbplugins['plugins'] = array();
	}

	/*
	** manage plugin installation
	*/

	public function install($slug = NULL)
	{
		if ($slug === NULL)
			return false;
		
		$this->folder = (is_null($slug) ? $this->folder : $slug);
		
		if (!$this->checkFiles($this->folder))
			return false;
		if ($this->pluginExists($this->folder))
			return false;
		if ($this->run())
			return true;
		return false;
	}

	protected function checkFiles($slug = NULL, $getFiles = false)
	{
		if ($slug == NULL)
			return false;
		$this->path = $this->path . $slug;
		$path = $this->path;
		// check if plugin is downloaded
		if (!file_exists($path))
			return false;
		//debug(scandir($path));
		// check each main files like controllers, models, views, libs, sql
		if (!$this->pluginFileExists('controllers'))
			return false;
		if (!$this->pluginFileExists('models'))
			return false;
		if (!$this->pluginFileExists('views'))
			return false;
		return true;
	}

	protected function pluginFileExists($folder = NULL)
	{
		if (is_null($folder))
			return false;
		
		$path = $this->path . '/' . $folder;
		
		if (!file_exists($path))
			return false;
		//debug(scandir($path));
		$files = scandir($path);
		$it = 0;
		$out_files = array('.', '..');
		$get_files = array();
		
		foreach ($files as $file)
		{
			if (!in_array($file, $out_files))
			{
				array_push($get_files, $file);
				//debug($file);
			}
			$it++;
		}
		
		if (count($get_files) <= 0)
			return false;
		//debug($get_files);
		$this->files[$folder] = $get_files;
		return true;

	}

	protected function run()
	{
		if (empty($this->folder) || count($this->files) <= 0)
			return false;
		// copy all the plugin files in application/...

		if (!$this->installer('files'))
			return false;

		// then add plugin to database, and with his sql table if got
		return true;

	}

	protected function installer($type = 'files')
	{
		if ($type == 'files')
		{
			if (!count($this->files))
				return false;
			if (!$this->copyFiles())
				return false;
			return true;
		}
		elseif ($type == 'db')
		{
			return false;
		}
		return false;
	}

	protected function copyFiles()
	{
		if (empty($this->source) || empty($this->dest))
			return false;
		$it = 0;

		//debug($this->files);

		foreach ($this->files as $folder => $files)
		{
			if (!$this->copy($folder, $files))
				return false;
			$it++;
		}
		return true;
	}

	protected function copy($folder = NULL, $files = NULL)
	{
		if (is_null($folder) || is_null($files))
			return false;

		foreach ($files as $file)
		{
			$src = $this->path . '/' . $folder . '/' . $file;
			$dest = $this->dest . $folder . '/admin/plugins/' . $this->folder;
			$plugin_folder = $this->dest . $folder . '/admin/plugins/' . $this->folder;
			
			if (!file_exists($plugin_folder))
				mkdir($plugin_folder);
			if (file_exists($src) && file_exists($dest))
				{
					//chmod($dest, 0755);
					exec('cp -R ' . $src . ' ' . $dest);
					echo $dest . "\n";
				}
		}
		return true;
	}

	protected function clean($slug = '', $mode = NULL)
	{
		if (is_null($mode) && is_null($this->mode))
			return false;
		$this->mode = (is_null($mode) ? $this->mode : $mode);
		return $this->deletePluginFolder();
	}

	protected function deletePluginFolder()
	{
		if (is_null($this->mode) || is_null($this->folder) || is_null($this->path))
			return false;
		
		if ($this->mode == 'pw')
		{
			$src = $this->path;
			if (file_exists($src))
			{
				exec('rm -rf ' . $src);
				return true;
			}
			return false;
		}
		elseif ($this->mode == 'ci' || $this->mode == 'application')
		{
			$folders = array('controllers', 'models', 'views');
			foreach ($folders as $folder) 
			{
				$src = $this->dest . '/' . $folder . '/admin/plugins/' . $this->folder;
				if (file_exists($src))
					exec('rm -rf ' . $src);
			}
			return true;
		}
		return false;
	}

	/*
	** get plugin's data from database
	*/

	public function pluginExists($slug = NULL)
	{
		if (is_null($slug))
			return false;
		
		$this->load->database();
		$req = $this->db->select('slug')
				->where('slug', $slug)
				->get('plugins');
		
		if ($req->num_rows() > 0)
			return true;
		return false;
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

	protected function upgrade($slug = NULL)
	{
		return false;
	}

	/*
	** get data for views
	*/

	public function dbget($table = NULL, $cols = 'slug', $cond = array(), $order_by = 'id DESC')
	{
		if ($table == NULL || $cols == '' || $order_by == '')
			return false;
		$where_cond = $cond;
		if (empty($cond) || count($cond) <= 0 || $cond == NULL)
			$where_cond = array();
		
		$this->load->database();
		$req = $this->db->select($cols)
				->where($where_cond)
				->order_by($order_by)
				->get($table);
		
		if ($req->num_rows())
			return $req->result_array();
		return false;
	}

	public function getPlugin($table = 'plugins', $cols = 'slug', $cond = array(), $order_by = 'name')
	{
		if (!empty($this->dbplugins[$table]))
		{
			$plugins = $this->dbget($table, $cols, $cond, $order_by);
			if (!$plugins)
				return false;
			$this->dbplugins[$table] = $plugin;
			return $plugins;
		}
		else
			return $this->dbplugins[$table];
	}
}