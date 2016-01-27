<?php
	require_once("inc/header.inc.php");
	/*send the user to login.php if he is not loggedin*/
	if(!isset($_SESSION['id'])){
		header("Location: login.php");
		exit();
	}else{
		/*store the loggedin id in a variable*/
		$user_id = $_SESSION['id'];
	}

	/*TEST id is not set OR TEST id is empty*/
	if(!isset($_GET['id']) || empty($_GET['id'])){
		header("Location: 404.php");
		exit();
	}

	/*store TEST ID in a variable*/
	$test_id = trim(htmlspecialchars($_GET['id']));

	/*check TEST ID is valid and exits in the database*/
	$testQ = mysqli_query($con,"SELECT * FROM `test` WHERE id='$test_id'");
	/*Invalid TEST ID*/
	if(mysqli_num_rows($testQ) != 1){
		echo "<h2 class='text-center'>Invalid Test ID</h2>";
		exit();
	}

	//store all the test information
	$test = mysqli_fetch_assoc($testQ);
	$test_name = $test['name'];
	$test_marks = $test['marks'];
?>
<div class="container">
	<?php
		/*check user has takken the test or not */
		$test_taken = mysqli_query($con,"SELECT * FROM `test_taken` WHERE test_id='$test_id' AND user_id='$user_id'");
		//means user has not taken this task
		if(mysqli_num_rows($test_taken) != 0){
			echo "<h2 class='align-center'>You have taken this test</h2>";
			//show the marks scored
			$testtaken = mysqli_fetch_assoc($test_taken);
			echo "<h3>You Scored <span>".$testtaken['marks_obtain']." Out Of ".$testtaken['total']."</span></h3>";
			
			exit();
		}
	?>
	<h2 class="text-center"><?php echo $test_name;?> - <span><?php echo $test_marks; ?> Marks</span></h2>
	<form action="test_result.php" method="post">
	<?php
		//display all the questions
		$questions = mysqli_query($con,"SELECT * FROM `test_question` WHERE test_id='$test_id' ORDER BY rand()");
		$i = 1;
		while($row = mysqli_fetch_assoc($questions)){
			$id = $row['id'];
			echo "<div class='thumbnail'>
			<p>{$i}-: ".$row['question']."</p>
				<div class='radio'>
  					<label><input checked type='radio' name='{$id}' value='1'> ".htmlspecialchars($row['option1'])."</label>
				</div>
				<div class='radio'>
  					<label><input type='radio' name='{$id}' value='2'> ".htmlspecialchars($row['option2'])."</label>
				</div>
				<div class='radio'>
  					<label><input type='radio' name='{$id}' value='3'> ".htmlspecialchars($row['option3'])."</label>
				</div>
				<div class='radio'>
  					<label><input type='radio' name='{$id}' value='4'> ".htmlspecialchars($row['option4'])."</label>
				</div>
			</div>";
			$i++;
		}
	?>
	<input type="hidden" name="test_id" value='<?php echo $test_id; ?>'>
	<input type="submit" value="submit" class='btn btn-primary'>
	</form>
	<br>
	<br>
</div>
<?php
	require_once("inc/footer.inc.php");
?>