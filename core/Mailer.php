<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';
require dirname(dirname(__FILE__)). '/helpers/Constants.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Dissable secure checks
// https://security.google.com/settings/security/activity?hl=en&pli=1
// https://www.google.com/settings/u/1/security/lesssecureapps
class Mailer {
	public function sendMail($from, $to, $name, $subject, $bodyHTML, $body) {
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->SMTPDebug  = 1;  
		$mail->SMTPSecure = "ssl";
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;
		$mail->SMTPAuth = true;
		$mail->Username = USERNAME;
		$mail->Password = PASSWORD;
		$mail->setFrom($from, 'Movies Page');
		$mail->addAddress($to, $name);
		$mail->Subject = $subject;
		$mail->msgHTML($bodyHTML);
		$mail->AltBody = $body;
		$mail->send();
		header("Location: homepage.php?sent_mail=true");
	}
}