<?php require_once("inc/header.inc.php");
	/*send the user to login.php if he is not loggedin*/
	if(!isset($_SESSION['id'])){
		header("Location: login.php");
		exit();
	}else{
		$user_id = $_SESSION['id'];
	}
?>
	<div class="container">
		<!-- list all the online test -->
		<div class="col-sm-9">
			<h2 class="text-center">CodeRelay</h2>
			<?php
				//fetch all the test
				$q = mysqli_query($con,"SELECT * FROM `test`");
				while($row = mysqli_fetch_assoc($q)){
					$test_name = $row['name'];
					$test_id = $row['id'];
					echo "<div class='col-sm-6'>
							<div class='thumbnail text-center'>
								<h2>{$test_name}</h2>
								<a href='test.php?id={$test_id}' class='btn btn-primary btn-block'>Take Test</a>
							</div>
						</div>";
				}
			?>
		</div>
		<div class="col-sm-3">
			<h2 class="text-center">Welcome <?php echo $_SESSION['username']; ?></h2>
			<?php
				//Fetch total marks and marks obtained
				$q = mysqli_query($con,"SELECT * FROM `test_taken` WHERE user_id='$user_id'");
				if(mysqli_num_rows($q) == 0){
					echo "You have Not taken any test yet";
				}else{
					//display the score
					$total_marks = 0;
					$marks_obtained = 0;
					while($score = mysqli_fetch_assoc($q)){
						$total_marks += $score['total'];
						$marks_obtained += $score['marks_obtain'];
					}
					echo "<p>You got <strong>{$marks_obtained} Out Of {$total_marks}</strong></p>";
				}
			?>
		</div>
	</div>
<?php require_once("inc/footer.inc.php"); ?>