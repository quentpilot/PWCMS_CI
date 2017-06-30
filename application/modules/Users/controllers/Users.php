<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/******************************
    *
    * Users.php for PWCMS in 
    *
    * Made by Quentin Le Bian
    * Contact   <quentin.lebian@pilotaweb.fr>
    *
    * Started on  Fri Jun 23 19:20:24 2017 quentin
    * Last update Thu Jun 29 03:22:42 2017 quentin
    *
    ******************************/
 
class Users extends Admin_Controller {
	/**
	* @Author		: quentpilot {Quentin Le Bian}
	* @Copyright    : MIT - Enjoy and code as you are
	* @Email		: quentin.lebian@pilotaweb.fr
	* @Web			: https://pilotaweb.fr
	* @Date			: 2017-06-23 19:20:24
	* @See			: Admin_Controller class
	**/

	public function __construct()
	{
		// set parameters for '$render_path' var
		// used for render() method when calling view to application/views/templates/
		parent::__construct('Users');
	}

	public function index()
	{
		//print_r($this->router->routes);
		$this->data['page_title'] = 'PWCMS - Dashboard';
		$this->data['module_title'] = 'Welcome to your dashboard';
		$this->render($this->data['render_path'] . 'dashboard');
	}

	public function viewAll()
	{
		$this->data['page_title'] = "PWCMS - Liste des utilisateurs";
		$this->data['module_title'] = "Liste des utilisateurs inscrits";

		$this->render($this->data['render_path'] . 'list-users');
	}

	public function viewTeam()
	{
		$this->data['page_title'] = "PWCMS - Liste des utilisateurs";
		$this->data['module_title'] = "Liste des utilisateurs inscrits";

		$this->render($this->data['render_path'] . 'list-users');
	}

	public function viewGroups()
	{
		$this->data['page_title'] = "PWCMS - Liste des utilisateurs";
		$this->data['module_title'] = "Liste des utilisateurs inscrits";

		$this->render($this->data['render_path'] . 'list-users');
	}

		public function viewFriends()
	{
		$this->data['page_title'] = "PWCMS - Liste des utilisateurs";
		$this->data['module_title'] = "Liste des utilisateurs inscrits";

		$this->render($this->data['render_path'] . 'list-users');
	}

		public function settings()
	{
		$this->data['page_title'] = "PWCMS - Liste des utilisateurs";
		$this->data['module_title'] = "Liste des utilisateurs inscrits";

		$this->render($this->data['render_path'] . 'list-users');
	}

	public function profile($username)
	{
		//print_r($this->router->routes);
		$this->data['page_title'] = "PWCMS - $username profile";
		$this->data['module_title'] = "<b>$username</b> profile";

		$this->render($this->data['render_path'] . 'profile');
	}

	public function editProfile($username)
	{
		//print_r($this->router->routes);
		$this->data['page_title'] = "PWCMS - Profil de $username";
		$this->data['module_title'] = "Gestion du profil de <b>$username</b>";
		$this->load->model('users_model');
		$msg_tab = array();
		
		if ($this->form_validation->run('admin_edit_profile'))
		{
			$form = $_POST;
			$errors_terms = array('username', 'email', 'image', 'invite');
			$check = false;
			$check = $this->users_model->checkEditProfile($form);
			$this->data['check_form'] = $check;
			if ($check && !in_array($check, $errors_terms))
			{
				$user = false;
				$user = $this->pw_form->update($check);
		
				if ($user)
				{
					// set flash message alert to advice user
					$msg_tab = array(
						'message' => "<b>Votre profil a été mis à jour !</b>",
						'class' => 'primary bg-teal text-center'
					);
				}
				else
				{
					//debug($_POST);
					$msg_tab = array(
						'message' => "<b>Un problème est apparu lors de la mise à jour des données</b>",
						'class' => 'warning text-center'
					);
				}
			}
			else
			{
				$msg_tab = array(
						'message' => "<b>Un problème est apparu lors de la verification des données</b>",
						'class' => 'warning text-center'
					);
			}
		}
		
		// set session flash alert message
		$this->session->set_flashdata($msg_tab);

		// build view
		$this->render($this->data['render_path'] . 'edit-profile');
		//$this->load->view($this->data['render_path'] . 'edit-profile');
	}
}