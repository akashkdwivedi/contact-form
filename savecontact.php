<?php

error_reporting(E_ALL); ini_set('display_errors', 1); 

require_once('mailer.php');

$to = "contact@nativebyte.in";


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


$subject = "New query from $name on nativebyte.in";

$body = "Hi! <br/>\r\n";
$body .= "You have received a new query from nativebyte.in <br/> <br/> \r\n";
$body .= "<b>Name:</b> $name  <br/> \r\n";
$body .= "<b>Phone:</b> $phone  <br/> \r\n";
$body .= "<b>Email:</b> $email <br/> \r\n";
$body .= "<b>Company Name:</b> $companyName <br/> \r\n";
$body .= "<b>Company Size:</b> $companySize <br/> \r\n";
$body .= "<b>Service:</b> $service <br/> \r\n";
$body .= "<b>Message:</b> $msg <br/> \r\n";

if(sendMail($subject, $body)) {
    echo '{"mailed": true}';
}
else {
    echo '{"mailed": false}';
}

