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

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login', 'refresh');
		//$this->render($this->data['render_path'].'logout');
	}

	public function subscribe()
	{
		// load related AdminUser model
		$this->load->model('adminuser_model');
		
		//$this->form_validation->set_rules('invite_token', "code d'invitation", 'callback_valid_invite_token');

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
			$user = $this->pw_user->valid_subscribe($check);
			$this->data['check'] = $check;
			$this->data['user'] = $user;
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
			//$this->pw_user->alert($msg_tab);
		}

		$this->data['subscribe_step'] = 1;
		$this->render($this->data['render_path'].'subscribe');
	}

	public function valid_invite_token($token)
	{
		if (!$this->adminuser_model->isValidInviteToken($token))
		{
			//$this->form_validation->set_message('valid_token', "Le {field} n'est pas reconnu.");
			return false;
		}
		return true;
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