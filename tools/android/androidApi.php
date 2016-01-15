<?php 
	// Get the files 
	require_once('../config/config.php');
	require_once('../classes/Polaris.php');
	$Polaris = new Polaris();
	//echo $Polaris->getTotalEntries();
	$response = array();
	// Check todays key 
	// This is single array response
	if(isset($_GET['key'])){
		$key = $_GET['key'];


		if($key == "mario" || $key == "dave" || $key == "wolf" || $key == "contra" || $key == "roadrash" || $key == "matrix"
		  || $key == "fifa" || $key == "smackdown" || $key == "godofwar" || $key == "pacman" || $key == "pinball" || $key == "superman" || $key == "batman" ){
			$response["success"] = 1;
		}else{
			$response["success"] = 0;
		}
	}	
	// This is double array response 
	/*
		if(isset($_GET['doubleArrayResponse'])){
			$start = 5;
			while ( $start>0) {
				# code...
			$response['success'] = 1;
			$response['new'] = array();
			$new = array();
			$new["first"] = "first";
			$new["first"] = "second";
			array_push($response['new'], $new);
			//echo json_encode($response);	
			$start--;
			}		
		}
	*/
	// Following code is used for registering user from android 
	// It is a rest api 
	if(isset($_GET['android'])){
		$name = $_GET['name'];
		$mobile = $_GET['mobile'];
		$email = $_GET['email'];
		$note = $_GET['note'];
		$event = $_GET['event'];
		$cost = $_GET['cost'];
		$college = $_GET['college'];
		$admin = $_GET['id'];
		// change parameter of this method 
		$ackn = $Polaris->registerAndroidUser($name , $mobile , $email ,$note,$event,$cost , $college , $admin);
		if($ackn == 1){
		      $message = "You have been registered successfully in Polaris2k16";
              $subject = "Polaris2k16 Notifications";
              $Polaris->sendSms($mobile, $message);
              $Polaris->sendEmail($email , $message , $subject);  
                
			$response["success"] = 1;
		}else{
		
			$response["success"] = 0;
		}
	}
    echo json_encode($response);                         
// android=1&&name=pratik&&mobile=755&&email=pratik&&note=something&&event=01110000&&cost=15

/*
	Passwords : 

	1)mario
	2)dave
	3)wolf
	4)contra
	5)roadrash
	6)matrix
	7)fifa
	8)smackdown
	9)godofwar
	10)pacman
	11)pinball
	12)superman
	13)batman


*/

?>

