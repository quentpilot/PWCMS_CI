<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Pw_mailer extends PW_Controller {

	/**
    * @Author       : quentpilot {Quentin Le Bian}
    * @Email        : quentin.lebian@pilotaweb.fr
    * @Web          : https://pilotaweb.fr
    * @Date         : 2017-06-25 04:00:00
    * @See          : PW_Controller class
  **/

    protected $header = NULL; // full email header built as string
    protected $type = NULL;  // email type : 'html' or 'text'
    protected $from = NULL; // email sender
    protected $from_name = NULL; // name of email sender
    protected $to = NULL; // email receiver
    protected $cc = NULL; // email copy to copy
    protected $bcc = NULL; // email to copy annonymous
    protected $receipt = NULL; // see receive email status (acknowledgement of receipt)
    protected $reply_to = NULL; // reply to an email address
    protected $object = NULL; // email subject
    protected $message = NULL; // email message content
    protected $data = array(); // scratch data received as array (form data or else)
    public $set = false; // booleen to know if each of the mandatory datas are set

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
        if (!$this->set)
            return false;
        elseif (!is_null($data))
        {
            if (!$this->set($data))
                return false;
        }
        if (!$this->send_email_type())
            return false;
        return true;
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

    protected function send_email_type()
    {
        if (mail($this->to, $this->object, $this->message, $this->header))
            return true;
        return false;
    }

    protected function build_header()
    {
        $headers = '';
        $headers  .= 'MIME-Version: 1.0' . "\n"; // Version MIME
        if ($this->type == 'html')
            $headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type pour le format HTML
        if (!is_null($this->reply_to))
            $headers .= 'Reply-To: '.$this->from."\n"; // Mail de reponse
        
        $headers .= 'From: "'.$this->from_name.'" <'. $this->from .'>'."\n"; // Expediteur
        $headers .= 'Delivered-to: '.$this->to."\n"; // Destinataire
        
        if (!is_null($this->receipt))
            $headers .= "Disposition-Notification-To:" . $this->receipt . ""; // c'est ici que l'on ajoute la directive
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
            $message .= '<div style="width: 100%; text-align: center;">';
        $message .= $this->message;
        if ($this->type == 'html')
            $message .= '</div>';
        $this->message = $message;
        return true;
    }
}