<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class AdminUser extends PW_Controller {
	/**
		* @Author				: quentpilot {Quentin Le Bian}
		* @Email				: quentin.lebian@pilotaweb.fr
		* @Web					: https://pilotaweb.fr
		* @Date					: 2017-06-23 20:00:00
		* @See					: PW_Controller class
	**/

	public function __construct()
	{
		parent::__construct('admin_master', 'AdminUser');
	}

	public function index()
	{
		$this->render($this->data['render_path'].'dashboard');
	}

	public function login()
	{
		$this->render($this->data['render_path'].'login');
	}

	public function subscribe()
	{
		$rules = array(
					array(
						'field' => 'username',
						'label' => "Nom d'utilisateur", 
						'rules' => 'required|trim|min_length[6]|is_unique[users.username]',
						'errors' => array(
								'min_length' => "Le %s doit avoir au moins 6 caractères, sans espace.",
								'is_unique' => "Ce %s existe déjà. Veuillez en choisir un autre."
						)
					),
					array(
						'field' => 'email',
						'label' => "Adresse email", 
						'rules' => 'required|trim|valid_email|is_unique[users.email]',
						'errors' => array(
								'valid_email' => "L'%s doit être dans un format valide.",
								'is_unique' => "Cette %s existe déjà. Veuillez en choisir une autre."
						)
					),
					array(
						'field' => 'password',
						'label' => "Mot de passe", 
						'rules' => 'required|trim|min_length[8]|matches[confirm_password]',
						'errors' => array(
								'min_length' => "Le %s doit avoir au moins 8 caractères."
						)
					),
					array(
						'field' => 'confirm_password',
						'label' => "Confirmation du mot de passe", 
						'rules' => 'required|trim|min_length[8]|matches[password]',
						'errors' => array(
								'min_length' => "La %s doit avoir au moins 8 caractères."
						)
					),
					array(
						'field' => 'salt',
						'label' => "Methode de salage", 
						'rules' => 'trim|min_length[6]',
						'errors' => array(
								'min_length' => "La %s doit avoir au moins 6 caractères, sans espace."
						)
					),
					array(
						'field' => 'invite_token',
						'label' => "Code d'invitation", 
						'rules' => 'trim'
					)
				);

		$this->form_validation->set_rules($rules);

		// check if some for has been submited
		if ($this->form_validation->run())
		{
			$this->load->model('adminuser_model');
			// setting data to add for valid_subscribe()
			$form = $_POST;
			// check if first step subscription like save user and send email
			if (($check = $this->adminuser_model->checkSubscribe($form)) && ($user = $this->pw_user->valid_subscribe($check)))
			{
				// set flash message alert to advice user
				$msg_tab = array(
					'message' => "Un email vous a été envoyé afin de valider l'inscription.",
					'class' => 'success',
					'type' => 'flash'
				);
			}
			else
			{
				// set flash message alert to advice user
				$msg_tab = array(
					'message' => "Une erreur s'est produite lors de la tentative d'inscription.",
					'class' => 'warning',
					'type' => 'flash'
				);
			}
			// set session flash alert message
			$this->pw_user->alert($msg_tab);
		}

		$this->data['subscribe_step'] = 1;
		$this->render($this->data['render_path'].'subscribe');
	}

	public function logout()
	{
		$this->render($this->data['render_path'].'logout');
	}

	public function validAccount($username = NULL, $token = NULL)
	{
		$this->render($this->data['render_path'].'valid-account');
	}

	public function forgotPass()
	{
		$this->render($this->data['render_path'].'forgot-password');
	}

	public function newPass($username = NULL)
	{
		$this->render($this->data['render_path'].'new-password');
	}

	public function profile($username = NULL)
	{
		$this->render($this->data['render_path'].'profile');
	}
}