<?php
require '../libraries/PHPMailer-5.2.23/PHPMailerAutoload.php';

function sendMail($subject, $body) {
	$mail = new PHPMailer;

	$to_email = 'akash@nativebyte.in';
	$smtp_host = 'smtp.zoho.com';
	$smtp_email = '';
	$smtp_pass = '';

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = $smtp_host;  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = $smtp_email;                 // SMTP username
	$mail->Password = $smtp_pass;                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom($smtp_email);
	$mail->addAddress($to_email);     // Add a recipient

	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $subject;
	$mail->Body    = $body;
	$mail->AltBody = $body;

	if(!$mail->send()) {
	    //echo 'Mailer Error: ' . $mail->ErrorInfo;
	    return false;
	} else {
	    return true;
	}

}