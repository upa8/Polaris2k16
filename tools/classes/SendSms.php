<?php 
    $mobile = 7588948588;
    $message =" Hi%20working%20on%20smsapi";
    
    $url = "http://smslane.com/vendorsms/pushsms.aspx?user=Pratik_Upacharya&password=polaris123!&msisdn=91".trim($mobile)."&sid=WEBSMS&msg=".trim($message)."&fl=0";
   // $url ="http://smslane.com/vendorsms/pushsms.aspx?user=Pratik_Upacharya&password=polaris123!&msisdn=917588948588&sid=WEBSMS&msg=server&fl=0";
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
?>


