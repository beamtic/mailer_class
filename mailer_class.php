<?php
   // New function to handle e-mail and mailing lists
   // Database stuff is likely going to be handled via dependency injection, alternativly we may use files when no db class is available...


class mailer_class {
  private $charset;
  private $db = false; // Database object
  private $fh = false; // File_handler object
  
  public function __construct($db=false, $fh=false) {
	if ($db != false) {
	  // If a database object was injected, rely on database for list subscribtions
	  $this->db = $db;
	}
	if ($fh != false) {
	  // Use external file handler object if available, otherwise use basic file handling
	  $this->fh = $fh;
	}
	// Settings
    $this->charset = 'UTF-8';
  }
  public function send_email() {
	$to = 'johny@example.com, sally@example.com';

	$subject = '';
	$message = ''; // text/html source

    $headers = array();	
	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=' . $this->charset;
	$headers[] = 'To: '; // Comma seperated, same order as in recipients ($to)
	$headers[] = 'From: ';
	// $headers[] = 'Cc: ';
	// $headers[] = 'Bcc: ';

	mail($to, $subject, $message, implode("\r\n", $headers));
  }
  public function list_subscribe($list_id) {

  }
  public function list_unsubscribe($list_id) {
	  
  }

}