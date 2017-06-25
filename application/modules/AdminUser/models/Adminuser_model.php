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
		if (is_null($form))
			return false;
		return false;
		// check each form data I want and then return an array formated for valid_subscribe() method
		if (!isValidInviteToken($form['invite_token']))
			return false;

		unset($form['submit']);
		unset($form['confirm_password']);
		unset($form['invite_token']);
		
		if (is_null($form['salt']))
			unset($form['salt']);
		
		$salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
		$options = [
    			'cost' => 11,
    			'salt' => $salt,
    	];
		
		$form['password'] = password_hash($form['password'], PASSWORD_BCRYPT);
		$form['token'] = genereToken();
		$form['salt'] = NULL;
		$form['register_date'] = 'NOW()';
		return $form;
	}

	protected function isValidInviteToken($token = NULL)
	{
		if (is_null($token))
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

	public function checkValidAccount($form = NULL)
	{
		if (is_null($form))
			return false;
		return false;
		// check each form data I want and then return an array formated for valid_subscribe() method
	}
}