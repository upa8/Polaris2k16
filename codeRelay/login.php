<?php require_once("inc/header.inc.php");

	/*send user to index.php if he is logedin*/
	if(isset($_SESSION['id'])){
		header("Location: index.php");
		exit();
	}
?>
<div class="container">
	<div class="form-container">
		<p class="heading text-center">Login</p>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
			<div class="form-group">
				<input type="text" name="username" placeholder="Enter your Username" class="form-control">
			</div>
			<div class="form-group">
				<input type="password" name="password" placeholder="Enter your Password" class="form-control">
			</div>
			<input type="submit" value="Login" class="btn btn-primary" name="login">
		</form>
		<?php
			//login script
			if(isset($_POST['login'])){
				$username = trim(htmlspecialchars($_POST['username']));
				$password = trim(htmlspecialchars($_POST['password']));

				//if username or password is empty
				if(empty($username) || empty($password)){
					echo "<div class='alert alert-danger'>Fill in all the fields</div>";
					exit();
				}

				//check username and password match the db record
				$q = mysqli_query($con,"SELECT id FROM `user` WHERE username='$username' AND password='$password'");
				if(mysqli_num_rows($q) != 1){
					echo "<div class='alert alert-danger'>Invalid username or password</div>";
					exit();	
				}

				//fetch the if of the loggedin user start the session
				$row = mysqli_fetch_assoc($q);
				//set the session with loggedin user id
				$_SESSION['id'] = $row['id'];
				$_SESSION['username'] = $username;
				header("Location: index.php");
				exit();
			}
		?>
	</div>
</div>
<?php require_once("inc/footer.inc.php");?>