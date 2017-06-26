<?php

$config = array(

	'admin_subscription' => array(
						array(
							'field' => 'username',
							'label' => "nom d'utilisateur", 
							'rules' => 'required|trim|min_length[6]|is_unique[users.username]',
							'errors' => array(
									'min_length' => "Le %s doit avoir au moins 6 caractères, sans espace.",
									'is_unique' => "Ce %s existe déjà. Veuillez en choisir un autre."
							)
						),
						array(
							'field' => 'email',
							'label' => "adresse email", 
							'rules' => 'required|trim|valid_email|is_unique[users.email]',
							'errors' => array(
									'valid_email' => "L'%s doit être dans un format valide.",
									'is_unique' => "Cette %s existe déjà. Veuillez en choisir une autre."
							)
						),
						array(
							'field' => 'password',
							'label' => "mot de passe", 
							'rules' => 'required|trim|min_length[8]|matches[confirm_password]',
							'errors' => array(
									'min_length' => "Le %s doit avoir au moins 8 caractères."
							)
						),
						array(
							'field' => 'confirm_password',
							'label' => "confirmation du mot de passe", 
							'rules' => 'required|trim|min_length[8]|matches[password]',
							'errors' => array(
									'min_length' => "La %s doit avoir au moins 8 caractères."
							)
						),
						array(
							'field' => 'salt',
							'label' => "methode de salage", 
							'rules' => 'trim|min_length[6]',
							'errors' => array(
									'min_length' => "La %s doit avoir au moins 6 caractères, sans espace."
							)
						),
						array(
							'field' => 'invite_token',
							'label' => "code d'invitation",
							'rules' => 'trim'
							//'rules' => array('vitoken', array($MX->adminuser_model, 'isValidInviteToken')),
							/*'rules' => array('vitoken', array($this->load->model('adminuser_model'), 'isValidInviteToken')),

							'errors' => array(
								'vitoken' => "Le code d'invitation n'est pas reconnu."
							)*/
						)
	),

	'admin_login' => array(
						array(
							'field' => 'username',
							'label' => "nom d'utilisateur", 
							'rules' => 'required|trim|min_length[6]',
							'errors' => array(
									'min_length' => "Le %s doit avoir au moins 6 caractères, sans espace.",
									'is_unique' => "Ce %s existe déjà. Veuillez en choisir un autre."
							)
						),
						array(
							'field' => 'password',
							'label' => "mot de passe", 
							'rules' => 'required|trim|min_length[8]',
							'errors' => array(
									'min_length' => "Le %s doit avoir au moins 8 caractères."
							)
						)
	),

	'admin_forgot_pass' => array(
						array(
							'field' => 'email',
							'label' => "adresse email", 
							'rules' => 'required|trim|valid_email',
							'errors' => array(
									'required' => "L'%s ne doit pas être vide.",
									'valid_email' => "Cette %s doit être dans un format valide."
							)
						)
	),

	'admin_new_pass' => array(
					array(
							'field' => 'password',
							'label' => "mot de passe", 
							'rules' => 'required|trim|min_length[8]|matches[confirm_password]',
							'errors' => array(
									'min_length' => "Le %s doit avoir au moins 8 caractères."
							)
						),
						array(
							'field' => 'confirm_password',
							'label' => "confirmation du mot de passe", 
							'rules' => 'required|trim|min_length[8]|matches[password]',
							'errors' => array(
									'min_length' => "La %s doit avoir au moins 8 caractères."
							)
						)
	)
	
);