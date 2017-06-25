<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Pw_mailer extends PW_Controller {

	/**
    * @Author       : quentpilot {Quentin Le Bian}
    * @Email        : quentin.lebian@pilotaweb.fr
    * @Web          : https://pilotaweb.fr
    * @Date         : 2017-06-25 04:00:00
    * @See          : PW_Controller class
  **/

    protected $header = NULL;
    protected $type = NULL;
    protected $from = NULL;
    protected $from_name = NULL;
    protected $to = NULL;
    protected $cc = NULL;
    protected $bcc = NULL;
    protected $reply_to = NULL;
    protected $object = NULL;
    protected $message = NULL;
    protected $data = array();
    public $set = false;

	function __construct()
	{
		parent::__construct();
	}

    public function set($data = NULL)
    {
        if (is_null($data))
            return false;
        if (!$this->valid_data($data))
            return false;
        if (!$this->build_header())
            return false;
        if (!$this->build_message())
            return false;
        $this->set = true;
        return true;
    }

    public function send($data = NULL)
    {
        $destinataire = 'quentin.lebian@pilotaweb.fr';
        // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
        $expediteur = 'quent.ktm@gmail.com';
        $copie = 'adresse@fai.com';
        $copie_cachee = 'adresse@fai.com';
        $objet = 'Test'; // Objet du message
        $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
        $headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
        $headers .= 'From: "PW Admin"<'.$expediteur.'>'."\n"; // Expediteur
        $headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire
        //$headers .= 'Cc: '.$copie."\n"; // Copie Cc
        //$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc        
        $message = 'Un Bonjour de Developpez.com!';
        if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
            return true;
        return false;

        /*$this->load->library('email');

        $this->email->from('quent.ktm@gmail.com', 'Admin PWCMS');
        $this->email->to("quentin.lebian@pilotaweb.fr");
        $this->email->cc('another@another-example.com');
        $this->email->bcc('them@their-example.com');

        $this->email->subject('Valid account');
        $this->email->message('Hello man');
        //debug($this->email);
        if (!$this->email->send())
            return false;
        return true;*/

        /*if (!$this->set)
            return false;
        elseif (!is_null($data))
        {
            if (!$this->set($data))
                return false;
        }
        if (!$this->send_email_type())
        {
            echo 'mail type error';
            return false;
        }*/
        return false;
    }

    protected function valid_data($data = NULL)
    {
        if ($data == NULL)
            return false;
        $rows = array('object', 'message', 'from', 'to', 'reply_to', 'cc', 'bcc', 'type', 'from_name');
        $do_not_set = array('set', 'data', 'header');
        foreach ($data as $row => $value)
        {
            if (!in_array($row, $rows) || empty($value))
                return false;
            if (in_array($row, $do_not_set))
                return false;
            $this->$row = $value;
        }
        if (is_null($this->type))
            $this->type = 'html';
        if (is_null($this->from_name))
            $this->from_name = 'PWCMS Administration';
        return true;
    }

    protected function build_header()
    {
        $headers = '';
        $headers  .= 'MIME-Version: 1.0' . "\n"; // Version MIME
        if ($this->type == 'html')
            $headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type pour le format HTML
        if (!is_null($this->reply_to))
            $headers .= 'Reply-To: '.$this->from."\n"; // Mail de reponse
        
        $headers .= 'From: '.$this->from ."\n"; // Expediteur
        $headers .= 'Delivered-to: '.$this->to."\n"; // Destinataire
        
        if (!is_null($this->cc))
            $headers .= 'Cc: '.$this->cc."\n"; // Copie Cc
        if (!is_null($this->bcc))
            $headers .= 'Bcc: '.$this->bcc."\n\n"; // Copie cachée Bcc
    
        $headers .= "\r\n\r\n";
        $this->header = $headers;
        return true;
    }

    protected function build_message()
    {
        $message = '';
        if (is_null($this->message))
            return false;
        if ($this->type == 'html')
            $message .= '<div style="width: 100%; text-align: center; font-weight: bold">';
        $message .= $this->message;
        if ($this->type == 'html')
            $message .= '</div>';
        $this->message = $message;
        return true;
    }

    protected function send_email_type()
    {
        if (mail($this->to, $this->object, $this->message, $this->header))
            return true;
        return false;
    }

    /*protected function email_type_text()
    {
        $destinataire = $this->to;
        // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
        $expediteur = $this->from;
        $copie = NULL;
        $copie_cachee = NULL;
        $nom_expediteur = 'PWCMS Administration';

        if (!is_null($this->cc))
            $copie = $this->cc;
        if (!is_null($this->bcc))
            $copie_cachee = $this->bcc;
        if (!is_null($this->from_name))
            $nom_expediteur = $this->from;
        
        $objet = $this->object; // Objet du message
        $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
        
        if (!is_null($this->reply_to))
            $headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
        
        $headers .= 'From: "'.$nom_expediteur.'"<'.$expediteur.'>'."\n"; // Expediteur
        $headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire
        
        if (!is_null($copie))
            $headers .= 'Cc: '.$copie."\n"; // Copie Cc
        if (!is_null($copie_cachee))
            $headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc        
        $headers .= "\r\n\r\n";
        
        $message = $this->message;
        
        if (!mail($destinataire, $objet, $message, $headers)) // Envoi du message
            return false;
        return true;
    }
    protected function email_type_html()
    {
        $destinataire = $this->to;
        // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
        $expediteur = $this->from;
        $copie = NULL;
        $copie_cachee = NULL;
        $nom_expediteur = 'PWCMS Administration';

        if (!is_null($this->cc))
            $copie = $this->cc;
        if (!is_null($this->bcc))
            $copie_cachee = $this->bcc;
        if (!is_null($this->from_name))
            $nom_expediteur = $this->from;
        
        $objet = $this->object; // Objet du message
        $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
        $headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type pour le format HTML
        
        if (!is_null($this->reply_to))
            $headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
        
        $headers .= 'From: "'.$nom_expediteur.'"<'.$expediteur.'>'."\n"; // Expediteur
        $headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire
        
        if (!is_null($copie))
            $headers .= 'Cc: '.$copie."\n"; // Copie Cc
        if (!is_null($copie_cachee))
            $headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc        
        $headers .= "\r\n\r\n";

        $message = '<div style="width: 100%; text-align: center; font-weight: bold">';
        $message .= $this->message;
        $message .= '</div>';
        
        if (!mail($destinataire, $objet, $message, $headers)) // Envoi du message
            return false;
        return true;
    }*/
}