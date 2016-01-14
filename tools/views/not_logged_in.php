<?php 
	include('_header.php'); 
?>
	<div class="row">
		<div class="col-sm-4" >
		</div>
		<div class="col-sm-4" >
			<form class="form" method="post" action="index.php" name="loginform">
				<div class="form-group">
				<p>	<label for="user_name"  ><?php echo WORDING_USERNAME; ?></label> </p>
					<input type="text" class="form-control" id="user_name"  name="user_name" placeholder="Username" required>
				</div>
				<div class="form-group">
					<p><label for="user_password" ><?php echo WORDING_PASSWORD; ?></label></p>
					<input  class="form-control" id="user_password" type="password" name="user_password" autocomplete="off"  placeholder="Password" required>
				</div>
				<div class="form-group">
					<div class="checkbox">
						<p><label>
							<input type="checkbox" id="user_rememberme" name="user_rememberme" value="1" > Remember me
						</label>
						</p>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default" name="login"><?php echo WORDING_LOGIN; ?></button>
				</div>
			</form>
		</div>
		<div class="col-sm-4" >
		</div>
	</div>
</div>
<?php 
	include('_footer.php'); 
?>
