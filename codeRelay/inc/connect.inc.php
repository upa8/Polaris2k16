<?php
	$con = mysqli_connect("localhost","root","","polaris");
	//$con = mysqli_connect("localhost","polaris","polaris123!","polaris");
	if(mysqli_connect_errno()){
		echo mysqli_connect_error();
	}
?>
