<?php
	error_reporting(0);
	if(isset($_POST['email']) and !empty($_POST['email'])){
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		  $email = $_POST['email']; 
		}
		else{
			echo "<div class='alert alert-danger alert-block fade in'><button type='button' class='close' data-dismiss='alert'>&times;</button><p>Please enter proper email</p></div>";
		}
	}else{
		echo "<div class='alert alert-danger alert-block fade in'><button type='button' class='close' data-dismiss='alert'>&times;</button><p>Please fill your email</p></div>";
	}
	if(isset($_POST['name']) and !empty($_POST['name'])){
		if (preg_match('/[a-zA-Z ]*/', $_POST['name'])) {
		  $name = $_POST['name']; 
		}
		else{
			echo "<div class='alert alert-danger alert-block fade in'><button type='button' class='close' data-dismiss='alert'>&times;</button><p>Please enter proper name</p></div>";
		}
	}else{
		echo "<div class='alert alert-danger alert-block fade in'><button type='button' class='close' data-dismiss='alert'>&times;</button><p>Please enter your name</p></div>";
	}
	if(isset($_POST['phone']) and !empty($_POST['phone'])){
		
		if (is_numeric($_POST['phone'])){
			if(strlen($_POST['phone']) == 10){
				$phone = $_POST['phone'];
			}else{
			echo "<div class='alert alert-danger alert-block fade in'><button type='button' class='close' data-dismiss='alert'>&times;</button><p>Please enter proper number</p></div>";
			} 
		}
		else{
			echo "<div class='alert alert-danger alert-block fade in'><button type='button' class='close' data-dismiss='alert'>&times;</button><p>Please enter proper number</p></div>";
		}
	}else{
		echo "<div class='alert alert-danger alert-block fade in'><button type='button' class='close' data-dismiss='alert'>&times;</button><p>Please enter your number</p></div>";
	}
	if(isset($_POST['msg']) and !empty($_POST['msg'])){
		$msg = $_POST['msg'];
	}
	else{
		echo "<div class='alert alert-danger alert-block fade in'><button type='button' class='close' data-dismiss='alert'>&times;</button><p>Please fill in details</p></div>";
	}
	if(isset($name) and !empty($name) and isset($phone) and !empty($phone) and isset($msg) and !empty($msg) and isset($email) and !empty($email)){
		$to = 'info@polaris2k16.in';
		$subject = 'Hire Us';
		$headers = 'From: '.$email;
		$body = 'Name: '.$name.' Phone No.: '.$phone.' Message: '.$msg;
		if(mail($to, $subject, $body, $headers)){
			echo "<div class='alert alert-success alert-block fade in'><button type='button' class='close' data-dismiss='alert'>&times;</button><p>Thank you</p></div>";
		}else{
			echo "<div class='alert alert-danger alert-block fade in'><button type='button' class='close' data-dismiss='alert'>&times;</button><p>We are having some problems</p></div>";		}
	}

?>