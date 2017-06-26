<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Adminuser_Model extends PW_Model {
	/**
		* @Author				: quentpilot {Quentin Le Bian}
		* @Email				: quentin.lebian@pilotaweb.fr
		* @Web					: https://pilotaweb.fr
		* @Date					: 2017-06-23 20:00:00
		* @See					: PW_Model class
	**/

	public function __construct()
	{
		parent::__construct();
	}

	public function checkSubscribe($form = NULL)
	{
		//debug($form);
		if (is_null($form))
			return false;

		// check each form data I want and then return an array formated for valid_subscribe() method
		if (!$this->isValidInviteToken($form['invite_token']))
			//return false;
			return 'invite_token';

		unset($form['submit']);
		unset($form['confirm_password']);
		unset($form['invite_token']);
		
		if (is_null($form['salt']))
			unset($form['salt']);

		$salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
		//$salt = 'default';
		$options = [
    			'cost' => 11,
    			'salt' => $salt
    	];
		$date = date('Y-m-d H:i:s');
		$form['password'] = password_hash($form['password'], PASSWORD_BCRYPT);
		$form['token'] = genereToken();
		$form['salt'] = NULL;
		$form['register_date'] = $date;
		return $form;
	}

	protected function isValidInviteToken($token = NULL)
	{
		if (is_null($token) && !is_null($_POST['invite_token']))
			$token == $_POST['invite_token'];
		elseif (is_null($token) && is_null($_POST['invite_token']))
			return false;
		$req = $this->db->select('invite_token')
						->where('id', 1)
						->get('cms_settings');
		if (!$req->num_rows())
			return false;
		foreach ($req->result() as $row)
		{
			if ($row->invite_token == $token)
				return true;
		}
		return false;
	}

	public function checkValidAccount($username = NULL, $token = NULL)
	{
		if (is_null($username) || is_null($token))
			return false;

		$req = $this->db->select()
						->like('username', $username)
						->get('users');
		if (!$req->num_rows())
			return false;

		$data = $req->result_array();
		$user = $data[0];
		
		foreach($user as $row)
		{
			if ($user['valid_email'] == 1 && is_null($user['token']))
				return 'valid';
			if ($user['token'] != $token)
				return 'token';
			$data = array(
				'set' => 1,
				'step' => 2,
				'user' => array('valid_email' => 1, 'token' => NULL),
				'where' => array('username' => $username)
			);
			return $data;
		}
		return false;
	}

	public function checkLogin($form = NULL)
	{
		//debug($form);
		if (is_null($form))
			return false;

		$req = $this->db->select()
						->like('username', $form['username'])
						->get('users');
		if ($req->num_rows() > 1)
			return 'hack';
		elseif (!$req->num_rows())
			return false;

		$data = $req->result_array();
		$user = $data[0];
		
		foreach($user as $row)
		{
			if ($user['valid_email'] == 0 && !is_null($user['token']))
				return 'valid';
			if (!password_verify($form['password'], $user['password']))
				return 'pass';
			$data = array(
				'set' => 1,
				'user' => array('status' => 1),
				'where' => array('username' => $user['username'])
			);
			return $data;
		}
		return false;
	}

	public function checkForgotPass($form = NULL)
	{
		//debug($form);
		if (is_null($form))
			return false;

		$req = $this->db->select()
						->like('email', $form['email'])
						->get('users');
		if (!$req->num_rows())
			return false;

		$data = $req->result_array();
		$user = $data[0];
		
		foreach($user as $row)
		{
			if ($user['valid_email'] == 0 && !is_null($user['token']))
				return 'valid';
			if ($user['max_forgot_pass'] <= 0)
				return 'max_pass';
			$data = array(
				'set' => 1,
				'user' => array('max_forgot_pass' => ($user['max_forgot_pass'] - 1)),
				'where' => array('email' => $user['email'])
			);
			return $data;
		}

		return false;
	}

	public function checkNewPass($form = NULL)
	{
		if (is_null($form))
			return false;

		if (!($user = $this->pw_database->get('users', array('username' => $form['username']))))
			return false;

		$data = array(
			'set' => 1,
			'user' => array('password' => password_hash($form['password'], PASSWORD_BCRYPT)),
			'where' => array('username' => $form['username'])
		);
		return $data;
	}
}