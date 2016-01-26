<?php 
	require_once('../config/config.php');
	require_once('Notifications.php');
	require_once('Polaris.php');


	$test = new Notifications();
	$Polaris = new Polaris();



	//$message = "Reporting time for android workshop is 27jan 8am,Venue- Accenture Lab ,Requirement- Laptop(optional),datacable,android phone";
	//$mobileNumber = 7588948588;
	//$subject = 'Polaris2k16 Notification';
	//$emailAddress = 'pratikupacharya@gmail.com';
	//$test->sendSms($mobileNumber , $message);
	//$test->sendEmail($emailAddress , $message , $subject);
	$messageDataStudents = $Polaris->sendMessageQueries();
	$count = 0 ;
	$phoneString =  
	while(($result = $messageDataStudents->fetchObject()) ){
		//echo $result->ename;
		$mobile = $result->emobile;
		$len = strlen($mobile);
		if($len == 10){
			//$message = "Reporting time for android workshop is 27jan 8am,Venue- Accenture Lab ,Requirement- Laptop(optional),datacable,android phone";
			//$test->sendSms($mobile , $message);


		}else{
			echo $result->ename ;
		}
	}			
?>

<!-- 
1) Android message 
$message = "Reporting time for android workshop is 27jan 8am,Venue- Accenture Lab ,Requirement- Laptop(optional),datacable,android phone";
2)  	

-->