<?php

$config = array(

	'admin_subscription' => array(
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
					)
);