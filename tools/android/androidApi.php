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
		if($key == "polo"){
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
		// change parameter of this method 
		$ackn = $Polaris->registerAndroidUser($name , $mobile , $email ,$note,$event,$cost);
		if($ackn == 1){
			$response["success"] = 1;
		}else{
			$response["success"] = 0;
		}
	}
    echo json_encode($response);                         
// android=1&&name=pratik&&mobile=755&&email=pratik&&note=something&&event=11110000&&cost=15
?>

