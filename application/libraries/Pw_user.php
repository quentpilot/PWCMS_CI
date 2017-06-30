<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/******************************
    *
    * Pw_user.php for PWCMS in 
    *
    * Made by Quentin Le Bian
    * Contact   <quentin.lebian@pilotaweb.fr>
    *
    * Started on  Fri Jun 23 20:00:18 2017 quentin
    * Last update Thu Jun 29 03:22:42 2017 quentin
    *
    ******************************/

class Pw_user extends PW_Controller {

	/**
    * @Author       : quentpilot {Quentin Le Bian}
    * @Email        : quentin.lebian@pilotaweb.fr
    * @Web          : https://pilotaweb.fr
    * @Date         : 2017-06-23 20:00:18
    * @See          : PW_Controller class
  **/

	function __construct()
	{
		parent::__construct();
	}

	public function isLoged()
	{
		if ($this->session->has_userdata('user'))
			return true;
		return false;
	}

	public function inGroup($groupname = 'admin')
	{
		if (!$this->isLoged())
			return true;
		if (!isset($_SESSION['user']['groupId']))
			return true;
		// check groupname from id
		return true;
	}

	public function getUser()
	{
		if ($this->session->has_userdata('user'))
			return $_SESSION['user'];
		return false;
	}

	public function valid_subscribe($form = NULL, $app = 'admin')
	{
		$step = array('1', '2');
		$apps = array('admin', 'public');
		//debug($form);
		if (is_null($form) || !in_array($form['step'], $step) || !in_array($app, $apps))
			return false;

		if ($form['step'] == 2)
		{
			if (!isset($form['user']) || !isset($form['where']))
				return false;
			// update user data to active account
			if ($this->pw_database->update($form['user'], $form['where'], 'users'))
				return true;
			return false;
		}
		unset($form['step']);

		// get cms settings to get default users groups rights to set following app
		$cms_settings = $this->pw_database->get('cms_settings', array('id', 1));

		// set default max password restore user can use
		$form['max_forgot_pass'] = $cms_settings['max_forgot_pass'];

		// insert new user data
		if (!($user_id = $this->pw_database->insert($form, 'users')))
		{
			echo 'insert error';
			return false;
		}

		if ($app == 'admin')
			$group_id = $cms_settings['admin_subscribe_group'];		
		elseif ($app == 'public')
			$group_id = $cms_settings['public_subscribe_group'];		
		
		// set related users groups
		$related_groups = array('user_id' => $user_id, 'group_id' => $group_id);
		
		// insert related groups
		if (!$this->pw_database->insert($related_groups, 'related_groups'))
			return false;
		
		// send email
		if (!$this->send_subscribe_email($form, $cms_settings['contact_email']))
			return false;
		return $user_id;
	}

	public function valid_login($form = NULL)
	{
		if (is_null($form) || !isset($form['set']))
			return false;
		if (!$this->pw_database->update($form['user'], $form['where'], 'users'))
			return false;
		$_SESSION['user'] = $this->pw_database->get('users', $form['where']);
		return true;
	}

	public function valid_forgot_pass($form = NULL)
	{
		if (is_null($form) || !isset($form['set']))
			return false;
		if (!$this->pw_database->update($form['user'], $form['where'], 'users'))
			return false;
		if (!($user = $this->pw_database->get('users', $form['where'])))
			return false;
		if (!($cms_settings = $this->pw_database->get('cms_settings', array('id', 1))))
			return false;
		$form['user'] = $user;
		$form['config'] = $cms_settings;
		if (!$this->send_forgot_pass_email($form))
			return false;
		return $form;
	}

	public function valid_new_pass($form = NULL)
	{
		if (is_null($form) || !isset($form['set']))
			return false;
		if (!$this->pw_database->update($form['user'], $form['where'], 'users'))
			return false;
		return true;
	}

	public function alert($data = NULL)
	{
		$type = array('flash', 'session');
		if (is_null($data) || !in_array($data['type'], $type))
			return false;

		$_SESSION['class'] = $data['class'];
		if ($data['type'] == 'flash')
		{
			unset($data['type']);
			$_SESSION['message'] = $data['message'];
			$this->session->set_flashdata('message', 'class');
			return true;
		}
		elseif ($data['type'] == 'session');
		{
			unset($data['type']);
			$_SESSION['message'] = $data['message'];
			$this->session->set_userdata(array('message', 'class'));
			return true;
		}
		return false;
	}

	protected function send_subscribe_email($form = NULL, $contact_email = NULL)
	{
		if (is_null($form) || is_null($contact_email))
			return false;

		// set email config message
		$message = 'Bonjour ' . $form['username'] . ",<br>";
		$message .= "Afin de valider votre compte, veuillez suivre le lien ci-dessous:<br>";
		$message .= '<a href="http://cms.pilotaweb.fr/admin/valid-account/'.$form['username'] . '/' . $form['token'] .'" class="btn">Valider l\'inscription</a><br>';
		
		$mail_data = array(
			'object' => "Validation inscription PWCMS",
			'from' => $contact_email,
			'to' => $form['email'],
			'reply_to' => $contact_email,
			'message' => $message
		);
		// set email info before to send
		if (!$this->pw_mailer->set($mail_data))
			return false;

		// send validation step email to user
		if (!$this->pw_mailer->send())
			return false;
		return true;
	}

	protected function send_forgot_pass_email($form = NULL)
	{
		if (is_null($form))
			return false;

		// set email config message
		$message = 'Bonjour ' . $form['user']['username'] . ",<br>";
		$message .= "Afin de créer un nouveau mot de passe, veuillez suivre le lien ci-dessous:<br>";
		$message .= '<a href="http://cms.pilotaweb.fr/admin/new-password/'.$form['user']['username'].'" class="btn">
		Nouveau mot de passe</a><br>';
		
		$mail_data = array(
			'object' => "Validation inscription PWCMS",
			'from' => $form['config']['contact_email'],
			'to' => $form['user']['email'],
			'reply_to' => $form['config']['contact_email'],
			'message' => $message
		);
		// set email info before to send
		if (!$this->pw_mailer->set($mail_data))
			return false;

		// send validation step email to user
		if (!$this->pw_mailer->send())
			return false;
		return true;
	}
}