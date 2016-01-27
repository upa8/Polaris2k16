<?php
	require_once("inc/header.inc.php");
	/*send the user to login.php if he is not loggedin*/
	if(!isset($_SESSION['id'])){
		header("Location: login.php");
		exit();
	}else{
		$user_id = $_SESSION['id'];
	}



	if (isset($_POST['test_id'])) {
		$test_id = $_POST['test_id'];

		/*check TEST ID is valid and exits in the database*/
		$testQ = mysqli_query($con,"SELECT * FROM `test` WHERE id='$test_id'");
		/*Invalid TEST ID*/
		if(mysqli_num_rows($testQ) != 1){
			echo "<h2 class='text-center'>Invalid Test ID</h2>";
			exit();
		}
		//get the total marks of the TEST
		$row = mysqli_fetch_assoc($testQ);
		$total_marks = $row['marks'];

		//fetch all the question with the test id
		$test_question = mysqli_query($con,"SELECT * FROM `test_question` WHERE test_id='$test_id'");

		//get the marks for one question
		$number_of_question = mysqli_num_rows($test_question);
		$each_marks = $total_marks / $number_of_question;

		$right_answers = 0;
		$wrong_answers = 0;
		$marks_obtained = 0;

		while ($question = mysqli_fetch_assoc($test_question)) {
			$question_id = $question['id'];
			$answer = $question['answer'];
			
			//check answer is right or wrong
			if($_POST[$question_id] == $answer){
				//add the right ans marks
				$marks_obtained += $each_marks;
				//mark one more answer as write
				$right_answers++;
			}else{
				$wrong_answers++;
			}

		}
		
		//insert into database
		$insert = mysqli_query($con,"INSERT INTO `test_taken` VALUES('','$test_id','$user_id','$total_marks','$marks_obtained')");

		header("Location: test.php?id={$test_id}");
		exit();
	}
?>