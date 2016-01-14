<?php 
	require_once('Notifications.php');

	$test = new Notifications();
	$message = 'hi this is tester';
	$mobileNumber = 7588948588;
	$subject = 'Polaris2k16 Notification';
	$emailAddress = 'pratikupacharya@gmail.com';
	$test->sendSms($mobileNumber , $message);
	$test->sendEmail($emailAddress , $message , $subject);
?>