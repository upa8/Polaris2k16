<?php 
    include('_header.php'); 
?>
<br>

<div class="container"> 
      <div class="row">
        <div class="col-sm-4" ></div>
        <div class="col-sm-4" >
            
                <?php 
                    if ($login->passwordResetLinkIsValid() == true) 
                        { 
                ?>          <form class="form" method="post" action="password_reset.php" name="new_password_form">
                                    <div class="form-group">
                                        
                                        <input class="form-control" type='hidden' name='user_name' value='<?php echo $_GET['user_name']; ?>' />    
                                    
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control" type='hidden' name='user_password_reset_hash' value='<?php echo $_GET['verification_code']; ?>' />
                                    </div>
                                        <p>
                                            <label for="user_password_new"><?php echo WORDING_NEW_PASSWORD; ?></label>
                                           </p>
                                            <br>
                                    
                                    <div class="form-group">
                                        <input class="form-control" id="user_password_new" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />                                        
                                    </div>
                                        <p>          
                                            <label for="user_password_repeat"><?php echo WORDING_NEW_PASSWORD_REPEAT; ?></label>
                                        </p>
                                    <div class="form-group">
                                        <input class="form-control" id="user_password_repeat" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <input  class="btn btn-default" type="submit" name="submit_new_password" value="<?php echo WORDING_SUBMIT_NEW_PASSWORD; ?>" />

                                    </div>
                            </form>

            <!-- no data from a password-reset-mail has been provided, so we simply show the request-a-password-reset form -->
                    <?php
                     } else { ?>
                                 <form  class="form" method="post" action="password_reset.php" name="password_reset_form">
                                    <p>
                                        <label for="user_name"><?php echo WORDING_REQUEST_PASSWORD_RESET; ?></label>
                                    </p>
                                    <div class="form-group">
                                        <input class="form-control" id="user_name" type="text" name="user_name" required />

                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-default" type="submit" name="request_password_reset" value="<?php echo WORDING_RESET_PASSWORD; ?>" />
                                    </div>
                                    <br>
                                </form>
                        <?php } 
                    ?>
                    <a href="index.php"><?php echo WORDING_BACK_TO_LOGIN; ?></a>
                </div>
                <div class="col-sm-4" ></div>
            </div>
        </div>
<?php include('_footer.php'); ?>
