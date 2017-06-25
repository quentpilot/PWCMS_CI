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
		// check if some for has been submited
		// rules are in application/config/development/form_validation.php file
		if ($this->form_validation->run('admin_subscription'))
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