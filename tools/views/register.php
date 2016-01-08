<?php include('_header.php'); ?>
<!-- show registration form, but only if we didn't submit already -->
<div class="row">
    <div class="col-sm-4" >
        <?php if (!$registration->registration_successful && !$registration->verification_successful) { ?>
        <form class="form-group" method="post" action="register.php" name="registerform">
            <p>
                <label for="user_name">Username</label>
            </p>
            <input class="form-control" id="user_name" type="text" pattern="[a-zA-Z0-9]{5,64}" name="user_name" placeholder="Enter Username" required />
            <br>
            <p>
                <label for="user_name_of_organization"><?php echo WORDING_REGISTRATION_NAME_OF_ORGANIZATION; ?></label>      
            </p>
            <input class="form-control" id="user_name_of_organization" type="text" name="user_name_of_organization" placeholder="Enter Organization Details" required  />
            <br>
            <p>
                <label for="user_contact_person"><?php echo WORDING_REGISTRATION_CONTACT_PERSON; ?></label>
            </p>
            <input class="form-control" id="user_contact_person" type="text" name="user_contact_person"  placeholder="Enter Contact Person" required  />
            <br>
            <p>
                <label for="user_designation_of_person"><?php echo WORDING_REGISTRATION_DESIGNATION; ?></label>
            </p>
            <input class="form-control" id="user_designation_of_person" type="text" name="user_designation_of_person"  placeholder="Enter Designation" required  />
    </div>
    <div class="col-sm-4" >
            
            <p>
                <label for="user_email"><?php echo WORDING_REGISTRATION_EMAIL; ?></label>
            </p>
            <input class="form-control" id="user_email" type="email" name="user_email" placeholder="Enter email address" required />
            <br>
            <p>
                <label for="user_password_new"><?php echo WORDING_REGISTRATION_PASSWORD; ?></label>
            </p>
            <input class="form-control" id="user_password_new" type="password" name="user_password_new" pattern=".{6,}"  placeholder="Enter password" required autocomplete="off" />
            <br>
            <p>
                <label for="user_password_repeat"><?php echo WORDING_REGISTRATION_PASSWORD_REPEAT; ?></label>
            </p>
            <input class="form-control" id="user_password_repeat" type="password" name="user_password_repeat" pattern=".{6,}"  placeholder="Repeat Password" required autocomplete="off" />
            <br>
            <p>
                <label for="user_phone_number"><?php echo WORDING_YOUR_PHONE_NUMBER; ?></label>
            </p>
            <input class="form-control" id="user_phone_number" type="tel" name="user_phone_number" pattern="[0-9]{10}" placeholder="Enter phone number" required  />    
      </div>
    <div class="col-sm-4" >
        <br>
        <br>
        <p>
                <label><?php echo WORDING_REGISTRATION_CAPTCHA; ?></label>
        </p>
        <img src="tools/showCaptcha.php" alt="captcha" />
            <br>
            <br>
            <input class="form-control" type="text" name="captcha" placeholder="Enter captcha" required />
            <br>
    </div>
</div>
<br>
<div class= "row">
    <div class="col-sm-12">
        <center>
              <input class="btn btn-default" type="submit" name="register" value="<?php echo WORDING_REGISTER; ?>" />
        </form>
        <?php 
                } 
        ?>
        <a href="index.php"><?php echo WORDING_BACK_TO_LOGIN; ?></a>
        </center>
    </div>
</div>
</div>
<?php include('_footer.php'); ?>