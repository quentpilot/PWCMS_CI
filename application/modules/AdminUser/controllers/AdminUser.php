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
		// load related AdminUser model
		$this->load->model('adminuser_model');
		
		// check if some for has been submited
		// rules are in application/config/development/form_validation.php file
		if ($this->form_validation->run('admin_login'))
		{
			// setting data to add for valid_login()
			$form = $_POST;
			// check if first step subscription like save user and send email
			$check = false;
			$user = false;
			$check = $this->adminuser_model->checkLogin($form);
			if (isset($check['set']))
				$user = $this->pw_user->valid_login($check);
			if ($check && isset($check['set']) && $user)
			{
				$username = $_POST['username'];
				// set flash message alert to advice user
				$msg_tab = array(
					'message' => "<h3><b>Heureux de vous revoir $username !</b></h3>",
					'class' => 'primary bg-teal text-center',
					'type' => 'flash'
				);
				$this->session->set_flashdata($msg_tab);
				redirect('admin/dashboard', 'refresh');
			}
			elseif ($check == 'valid')
			{
				// set flash message alert to advice user
				$msg_tab = array(
					'message' => "<b>Votre compte n'est pas activé.<br>
					 Veuillez suivre le lien reçu par email lors de votre inscription.</b>",
					'class' => 'danger',
					'type' => 'flash'
				);
			}
			elseif ($check == 'pass')
			{
				// set flash message alert to advice user
				$msg_tab = array(
					'message' => "<b>Le mot de passe est incorrect</b>",
					'class' => 'warning',
					'type' => 'flash'
				);
			}
			elseif ($check == 'hack')
			{
				$username = $_POST['username'];
				// set flash message alert to advice user
				$msg_tab = array(
					'message' => "<b>Un hack de la base de donnée a eu lieu. 
					 Plusieurs nom d'utilisateurs sont identiques à $username.<br>
					 Veuillez contacter l'administrateur du site.</b>",
					'class' => 'danger',
					'type' => 'flash'
				);
			}
			else
			{
				// set flash message alert to advice user
				$msg_tab = array(
					'message' => "<b>Une erreur s'est produite lors de la tentative de connexion.</b>",
					'class' => 'warning',
					'type' => 'flash'
				);
			}
			// set session flash alert message
			$this->session->set_flashdata($msg_tab);
		}

		$this->render($this->data['render_path'].'login');
	}

	public function logout()
	{
		// set update user data
		$data = array(
				'user' => array('status' => 0),
				'where' => array('username' => $_SESSION['user']['username'])
		);

		// update data 
		$this->pw_database->update($data['user'], $data['where'], 'users');

		// destroy session
		$this->session->sess_destroy();
		redirect('admin/login', 'refresh');
	}

	public function subscribe()
	{
		// load related AdminUser model
		$this->load->model('adminuser_model');

		// check if some for has been submited
		// rules are in application/config/development/form_validation.php file
		if ($this->form_validation->run('admin_subscription'))
		{
			// setting data to add for valid_subscribe()
			$form = $_POST;
			// check if first step subscription like save user and send email
			$check = false;
			$user = false;
			$check = $this->adminuser_model->checkSubscribe($form);
			if (isset($check))
				$user = $this->pw_user->valid_subscribe($check);
			if ($check && $check != 'invite_token' && $user)
			{
				// set flash message alert to advice user
				$msg_tab = array(
					'message' => "<b>Un email vous a été envoyé afin de valider l'inscription.</b>",
					'class' => 'success',
					'type' => 'flash'
				);
			}
			elseif ($check == 'invite_token')
			{
				$this->form_validation->set_message('invite_token', "Le code d'invitation n'est pas reconnu.");
				// set flash message alert to advice user
				$msg_tab = array(
					'message' => "<b>Le code d'invitation ne correspond pas.</b>",
					'class' => 'danger',
					'type' => 'flash'
				);
			}
			else
			{
				// set flash message alert to advice user
				$msg_tab = array(
					'message' => "<b>Une erreur s'est produite lors de la tentative d'inscription.</b>",
					'class' => 'warning',
					'type' => 'flash'
				);
			}
			// set session flash alert message
			$this->session->set_flashdata($msg_tab);
		}

		$this->data['subscribe_step'] = 1;
		$this->render($this->data['render_path'].'subscribe');
	}

	public function validAccount($username = NULL, $token = NULL)
	{
		if (is_null($username) || is_null($token))
			redirect('admin/login', 'refresh');

		// load related AdminUser model
		$this->load->model('adminuser_model');

		$check = false;
		$user = false;
		// check id username match, token too
		$check = $this->adminuser_model->checkValidAccount($username, $token);
		
		// update user valid_email to 1 and token to NULL
		if (isset($check['step']))
			$user = $this->pw_user->valid_subscribe($check);

		if ($check && $check != 'token' && $user)
		{
			// set flash message alert to advice user
			$msg_tab = array(
				'message' => "<b>Bienvenue $username !<br>votre compte a été validé avec succès.</b>",
				'class' => 'success text-center',
				'type' => 'flash'
			);
		}
		elseif ($check == 'token')
		{
			// set flash message alert to advice user
			$msg_tab = array(
				'message' => "<b>Le code de validation est incorrect.</b>",
				'class' => 'danger text-center',
				'type' => 'flash'
			);
		}
		elseif ($check == 'valid')
		{
			// set flash message alert to advice user
			$url = site_url('admin/login');
			$msg_tab = array(
				'message' => "<b>Votre compte est déjà validé. <br><a href=\"$url\">Se connecter</a></b>",
				'class' => 'primary bg-teal text-center',
				'type' => 'flash'
			);
		}
		else
		{
			// set flash message alert to advice user
			$msg_tab = array(
				'message' => "<b>Une erreur s'est produite lors de la tentative de validation d'inscription.</b>",
				'class' => 'warning text-center',
				'type' => 'flash'
			);
		}
		// set session flash alert message
		$this->session->set_flashdata($msg_tab);

		$this->data['subscribe_step'] = 2;
		$this->render($this->data['render_path'].'valid-account');

	}

	public function forgotPass()
	{
		// load related AdminUser model
		$this->load->model('adminuser_model');
		
		// check if some for has been submited
		// rules are in application/config/development/form_validation.php file
		if ($this->form_validation->run('admin_forgot_pass'))
		{
			$form = $_POST;
			// check if first step subscription like save user and send email
			$check = false;
			$user = false;
			$check = $this->adminuser_model->checkForgotPass($form);
			if (isset($check['set']))
				$user = $this->pw_user->valid_forgot_pass($check);
			if ($check && isset($check['set']) && $user)
			{
				$username = $user['user']['username'];
				// set flash message alert to advice user
				$msg_tab = array(
					'message' => "<b>Merci $username. Un email vous a été envoyé afin de réinitialiser votre mot de passe.</b>",
					'class' => 'primary bg-teal text-center',
					'type' => 'flash'
				);
			}
			elseif ($check == 'valid')
			{
				// set flash message alert to advice user
				$msg_tab = array(
					'message' => "<b>Votre compte n'est pas activé.<br>
					 Veuillez suivre le lien reçu par email lors de votre inscription.</b>",
					'class' => 'danger text-center',
					'type' => 'flash'
				);
			}
			elseif ($check == 'max_pass')
			{
				// set flash message alert to advice user
				$msg_tab = array(
					'message' => "<b>Vous avez atteint la limite de récupération de mot de passe<br>
					Veuillez contacter votre administrateur afin de remettre les compteurs à zero.</b>",
					'class' => 'warning text-center',
					'type' => 'flash'
				);
			}
			else
			{
				// set flash message alert to advice user
				$msg_tab = array(
					'message' => "<b>Une erreur s'est produite lors de la tentative de connexion.</b>",
					'class' => 'warning text-center',
					'type' => 'flash'
				);
			}
			// set session flash alert message
			$this->session->set_flashdata($msg_tab);
		}

		$this->render($this->data['render_path'].'forgot-password');
	}

	public function newPass($username = NULL)
	{
		if (is_null($username))
			redirect('admin/user', 'refresh');

		// load related AdminUser model
		$this->load->model('adminuser_model');

		// check if some for has been submited
		// rules are in application/config/development/form_validation.php file
		if ($this->form_validation->run('admin_new_pass'))
		{
			$form = $_POST;
			$check = false;
			$user = false;
			$check = $this->adminuser_model->checkNewPass($form);
			if (isset($check['set']))
				$user = $this->pw_user->valid_new_pass($check);
			if ($check && isset($check['set']) && $user)
			{
				// set flash message alert to advice user
				$msg_tab = array(
					'message' => "<b>Super $username. Votre nouveau mot de passe a été enregistré !</b>",
					'class' => 'primary bg-teal text-center',
					'type' => 'flash'
				);
			}
			elseif ($check == 'username')
			{
				// set flash message alert to advice user
				$msg_tab = array(
					'message' => "<b>Le lien n'est pas valide.<br>
					 Veuillez suivre le lien reçu par email lors de votre demande de mot de passe.</b>",
					'class' => 'danger text-center',
					'type' => 'flash'
				);
			}
			else
			{
				// set flash message alert to advice user
				$msg_tab = array(
					'message' => "<b>Une erreur s'est produite lors de l'enregistrement de votre mot de passe.</b>",
					'class' => 'warning text-center',
					'type' => 'flash'
				);
			}
			// set session flash alert message
			$this->session->set_flashdata($msg_tab);
		}

		$this->data['username'] = $username;
		$this->render($this->data['render_path'].'new-password');
	}

	public function profile($username = NULL)
	{
		$this->render($this->data['render_path'].'profile');
	}
}