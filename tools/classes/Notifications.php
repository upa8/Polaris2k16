<?php

class Notifications
{

   	
    public function __construct()
    {
            
        

    }

    public function SendEmail($mailTo , $emailMessage , $subject){

    	$to = $mailTo;
		$siteName = "Polaris2k16.in";

		$name = "Pratik Upacharya";
		$mail = 'info@polaris2k16.in';
		$subject = $subject;
		$message = $emailMessage;

	
		$mailSub = $subject;

		
	//	$body .=  $subject ;
		$body .=  $message;

		$header = 'From: ' . $mail . "\r\n";
		$header .= 'Reply-To:  ' . $mail . "\r\n";
		$header .= 'X-Mailer: PHP/' . phpversion();

		mail($to, $mailSub, $body, $header);
	
    }

    public function sendSms( $moibileNumber , $textMessage){
    	$mobile = $moibileNumber;//7588948588;
	    $message = str_replace(' ', '%20', $textMessage)  ;//" Hi%20working%20sms%20api";
	    $url = "http://smslane.com/vendorsms/pushsms.aspx?user=Pratik_Upacharya&password=polaris123!&msisdn=91".$mobile."&sid=WEBSMS&msg=".$message."&fl=0";
	    //$this->messages[] = $url ;  
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url); 
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/6.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.7) Gecko/20050414 Firefox/1.0.3");
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
	    echo  $result = curl_exec ($ch); 
	    curl_close ($ch);
	}
}
