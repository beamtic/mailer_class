<?php
   // New function to handle e-mail and mailing lists
   // Database stuff is likely going to be handled via dependency injection, alternativly we may use files when no db class is available...


class mailer_class {
	
  public function __construct() {
	  
  }
  public function send_email() {
	$to = 'johny@example.com, sally@example.com';

	$subject = '';

	$message = '';

	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=UTF-8';

	$headers[] = 'To: ';
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