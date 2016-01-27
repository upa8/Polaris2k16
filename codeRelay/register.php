<?php require_once("inc/header.inc.php");

	/*send user to index.php if he is logedin*/
	if(isset($_SESSION['id'])){
		header("Location: index.php");
		exit();
	}
?>
<div class="container">
	<div class="form-container">
		<p class="heading text-center">Register</p>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
			<div class="form-group">
				<input type="text" name="username" placeholder="Enter your Username" class="form-control" value="<?php echo @$username; ?>">
			</div>
			<div class="form-group">
				<input type="password" name="password" placeholder="Enter your Password" class="form-control" value="<?php echo @$password; ?>">
			</div>
			<input type="submit" value="Register" class="btn btn-primary" name="register">
		</form>
		<?php
			//login script
			if(isset($_POST['register'])){
				$username = trim(htmlspecialchars($_POST['username']));
				$password = trim(htmlspecialchars($_POST['password']));

				//if username or password is empty
				if(empty($username) || empty($password)){
					echo "<div class='alert alert-danger'>Fill in all the fields</div>";
					exit();
				}

				//check user is unique
				$unique = mysqli_query($con,"SELECT id FROM `user` WHERE username='$username'");
				if(mysqli_num_rows($unique) != 0){
					echo "<div class='alert alert-danger'>Username <strong>{$username}</strong> already registered.</div>";
					exit();
				}

				//check password length
				if(strlen($password) < 6){
					echo "<div class='alert alert-danger'>Password should be more the 6 characters</div>";
					exit();	
				}

				//insert into db
				$q = mysqli_query($con,"INSERT INTO `user` VALUES('','$username','$password')");

				if($q){
					echo "<div class='alert alert-success'>Registered</div>";
					$_SESSION['id'] = mysqli_insert_id($con);
					$_SESSION['username'] = $username;
					header("Location: index.php");
					exit();	
				}else{
					echo "<div class='alert alert-danger'>Failed to register user</div>";
					exit();
				}
			}
		?>
	</div>
</div>
<?php require_once("inc/footer.inc.php");?>