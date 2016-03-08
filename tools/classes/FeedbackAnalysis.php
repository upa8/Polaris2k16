<?php 
	require_once('../config/config.php');
	require_once('Polaris.php');

	$Polaris = new Polaris();
	$query = $Polaris->analysis();

	$q1_op1 = 0 ;
	$q1_op2 = 0 ;
	$q1_op3 = 0 ;
	$q1_op4 = 0 ;
	$q2_op1 = 0 ;
	$q2_op2 = 0 ;
	$q2_op3 = 0 ;
	$q2_op4 = 0 ;
	$q3_op1 = 0 ;
	$q3_op2 = 0 ;
	$q3_op3 = 0 ;
	$q3_op4 = 0 ;
	$q4_op1 = 0 ;
	$q4_op2 = 0 ;
	$q4_op3 = 0 ;
	$q4_op4 = 0 ;

	while($result = $query->fetchObject()){
		 $q1 = $result->quest1;
		 switch ($q1) {
		 	case '4':
		 		# code...
		 		$q1_op1 = $q1_op1 +1 ;
		 		break;
		 	case '3':
		 		# code...
		 		$q1_op2 = $q1_op2 +1 ;
		 		break;
		 	case '2':
		 		# code...
		 		$q1_op3 = $q1_op3 +1 ;
		 		break;
		 	case '1':
		 		# code...
		 		$q1_op4 = $q1_op4 +1 ;
		 		break;
		 	default:
		 		# code...
		 		break;
		 }
		 $q2 = $result->quest2;
		 switch ($q2) {
		 	case '4':
		 		# code...
		 		$q2_op1 = $q2_op1 +1 ;
		 		break;
		 	case '3':
		 		# code...
		 		$q2_op2 = $q2_op2 +1 ;
		 		break;
		 	case '2':
		 		# code...
		 		$q2_op3 = $q2_op3 +1 ;
		 		break;
		 	case '1':
		 		# code...
		 		$q2_op4 = $q2_op4 +1 ;
		 		break;
		 	default:
		 		# code...
		 		break;
		 }
		 $q3 = $result->quest3;
		 switch ($q3) {
		 	case '4':
		 		# code...
		 		$q3_op1 = $q3_op1 +1 ;
		 		break;
		 	case '3':
		 		# code...
		 		$q3_op2 = $q3_op2 +1 ;
		 		break;
		 	case '2':
		 		# code...
		 		$q3_op3 = $q3_op3 +1 ;
		 		break;
		 	case '1':
		 		# code...
		 		$q3_op4 = $q3_op4 +1 ;
		 		break;
		 	default:
		 		# code...
		 		break;
		 }
		 $q4 = $result->quest4;
		 switch ($q4) {
		 	case '4':
		 		# code...
		 		$q4_op1 = $q4_op1 +1 ;
		 		break;
		 	case '3':
		 		# code...
		 		$q4_op2 = $q4_op2 +1 ;
		 		break;
		 	case '2':
		 		# code...
		 		$q4_op3 = $q4_op3 +1 ;
		 		break;
		 	case '1':
		 		# code...
		 		$q4_op4 = $q4_op4 +1 ;
		 		break;
		 	default:
		 		# code...
		 		break;
		 }

	}		
	echo  $q1_op1 ;
	echo "<br>";
	echo  $q1_op2 ;
	echo "<br>";
	echo  $q1_op3 ;
	echo "<br>";
	echo  $q1_op4 ;
	echo "<br>";
	echo  $q2_op1 ;
	echo "<br>";
	echo  $q2_op2 ;
	echo "<br>";
	echo  $q2_op3 ;
	echo "<br>";
	echo  $q2_op4 ;
	echo "<br>";
	echo  $q3_op1 ;
	echo "<br>";
	echo  $q3_op2 ;
	echo "<br>";
	echo  $q3_op3 ;
	echo "<br>";
	echo  $q3_op4 ;
	echo "<br>";
	echo  $q4_op1 ;
	echo "<br>";
	echo  $q4_op2 ;
	echo "<br>";
	echo  $q4_op3 ;
	echo "<br>";
	echo  $q4_op4 ;
	echo "<br>";


?>