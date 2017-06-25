<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Pw_user extends PW_Controller {

	/**
    * @Author       : quentpilot {Quentin Le Bian}
    * @Email        : quentin.lebian@pilotaweb.fr
    * @Web          : https://pilotaweb.fr
    * @Date         : 2017-06-23 20:00:00
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

	public function valid_subscribe($form = NULL, $app = 'admin')
	{
		$step = array('1', '2');
		$apps = array('admin', 'public');

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
		// insert new user data
		if (!($user_id = $this->pw_database->insert('users', $form)))
			return false;
		
		// get cms settings to get default users groups rights to set following app
		$cms_settings = $this->pw_database->get('cms_settings', array('id', 1));

		if ($app == 'admin')
			$group_id = $cms_settings['admin_subscribe_group'];		
		elseif ($app == 'public')
			$group_id = $cms_settings['public_subscribe_group'];		
		
		// set related users groups
		$related_groups = array('user_id' => $user_id, 'group_id' => $group_id);
		
		// insert related groups
		if (!$this->pw_database->insert('related_groups', $related_groups))
			return false;
		
		// send email
		$this->send_subscribe_email($form, $cms_settings['contact_email']);
		return $user_id;
	}

	protected function send_subscribe_email($form = NULL, $contact_email = NULL)
	{
		if (is_null($form) || is_null($contact_email))
			return false;
		// set email config message
		$message = 'Bonjour ' . $form['username'] . ",\r\n";
		$message .= "Afin de valider votre compte, veuillez suivre le lien ci-dessous:\r\n";
		$message .= '<a href="http://cms.pilotaweb.fr/admin/valid-account/'.$form['username'] . '/' . $form['token'] .'"></a>'."\r\n";
		
		$mail_data = array(
			'object' => "Validation de l'inscription - PWCMS",
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
			$this->session->set_flashdata(array('message', 'class'));
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
}