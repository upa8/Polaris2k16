<?php

$to = 'info@polaris2k16.in';
$siteName = "Polaris2k16";

$name = "Pratik";//$_POST['fname'];
$mail = 'pratikupacharya@gmail.com';//$_POST['email'];
$subject = "Subject";//$_POST['subj'];
$message = "Message";//$_POST['mssg'];

if (isset($name) && isset($mail) && isset($message)) {
	

	$mailSub = '[Contact] [' . $siteName . '] '.$subject;

	$body = 'Sender Name: ' . $name . "\n\n";
	$body .= 'Sender Mail: ' . $mail . "\n\n";
	$body .= 'Message Subject: ' . $subject . "\n\n";
	$body .= 'Message: ' . $message;

	$header = 'From: ' . $mail . "\r\n";
	$header .= 'Reply-To:  ' . $mail . "\r\n";
	$header .= 'X-Mailer: PHP/' . phpversion();

	echo mail($to, $mailSub, $body, $header);
}else{
	echo '0';
}


?>