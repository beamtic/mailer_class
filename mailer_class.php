<?php
   // New function to handle e-mail and mailing lists
   // Database stuff is likely going to be handled via dependency injection, alternativly we may use files when no db class is available...


class mailer_class {
  private $db = false; // Database object
  private $fh = false; // File_handler object
  public $from_email = 'mailer_class@example.com';
  public $from_name = 'John';
  public $content_type = 'text/html';
  public $charset = 'UTF-8';
  
  public function __construct($db=false, $fh=false) {
	if ($db != false) {
	  // If a database object was injected, rely on database for list subscribtions
	  $this->db = $db;
	}
	if ($fh != false) {
	  // Use external file handler object if available, otherwise use basic file handling
	  $this->fh = $fh;
	}
  }
  public function send_email($msg_subject='N/A', $msg_body='', $recipients) {
      
    $from = $this->from_name.'<'.$this->from_email.'>';
    $to = $this->comma_this_shit($recipients);

    $subject = $msg_subject;
	$message = $msg_body; // text/html source

    $headers = array();	
	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: '.$content_type.'; charset=' . $this->charset;
	$headers[] = 'To: ' . $to; // Comma seperated list of names and emails I.e. John <john@example.com>, smith <smith@example.com>
	$headers[] = 'From: ' . $from;
	// $headers[] = 'Cc: ';
	// $headers[] = 'Bcc: ';

	mail($to, $subject, $message, implode("\r\n", $headers));
  }
  public function list_subscribe($list_id) {

  }
  public function list_unsubscribe($list_id) {
	  
  }
  private function comma_this_shit($input_array) {
      $comma_seperated = '';
      foreach ($input_array as &$value) {
          $comma_seperated .= $value[0] . '<'. $value[1].'>,';
      }
      return rtrim($comma_seperated, ",");
  }

}