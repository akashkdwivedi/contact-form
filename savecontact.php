<?php

error_reporting(E_ALL); ini_set('display_errors', 1); 


$to = "contact@ungender.in";
$subject = "New query on ungender.in";


// require 'libraries/PHPMailer-5.2.23/PHPMailerAutoload.php';
// $mail = new PHPMailer;


function clean_string($str) {
	return $str;
}

$name = clean_string($_POST['name']);
$phone = clean_string($_POST['phone']);
$email = clean_string($_POST['email']);
$msg = clean_string($_POST['message']);
$companyName = clean_string($_POST['company_name']);
$companySize = clean_string($_POST['company_size']);
$service = clean_string($_POST['service']);


$headers = "From: $email \r\n";
$headers .= "Reply-To: $email \r\n";
// $headers .= "Cc: someone@domain.com \r\n";
// $headers .= "Bcc: someoneelse@domain.com \r\n";

$body = "Hi \r\n";
$body .= "You have received a new query from ungender.in \r\n";
$body .= "Name: $name \r\n";
$body .= "Phone: $phone \r\n";
$body .= "Email: $email \r\n";
$body .= "Company Name: $companyName \r\n";
$body .= "Company Size: $companySize \r\n";
$body .= "Service: $service \r\n";
$body .= "Message: $msg \r\n";

die('{"mailed": false}');
mail($to,$subject,$body,$headers) or die('{"mailed": false}');
echo '{"mailed": true}';

