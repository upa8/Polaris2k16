<?php 
    include('_main_header.php'); 
?>
    
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
    
        <div class="row">
                <div class="col-sm-4" ></div>
                <div class="col-sm-4" >
                    <!-- clean separation of HTML and PHP -->
                    <h5><?php echo $_SESSION['user_name']; ?> <?php echo WORDING_EDIT_YOUR_CREDENTIALS; ?></h5>

                    <!-- edit form for username / this form uses HTML5 attributes, like "required" and type="email" 
                            <form class="form-group" method="post" action="edit.php" name="user_edit_form_name">
                                <label for="user_name"><?php echo WORDING_NEW_USERNAME; ?></label>
                                <input class="form-control" id="user_name" type="text" name="user_name" pattern="[a-zA-Z0-9]{2,64}" required /> (<?php echo WORDING_CURRENTLY; ?>: <?php echo $_SESSION['user_name']; ?>)
                                <input class="btn btn-default" type="submit" name="user_edit_submit_name" value="<?php echo WORDING_CHANGE_USERNAME; ?>" />
                            </form>
                    -->
                    <!-- edit form for user email / this form uses HTML5 attributes, like "required" and type="email" -->
                    <form method="post" action="edit.php" name="user_edit_form_email">
                        <label for="user_email"><?php echo WORDING_NEW_EMAIL; ?></label>
                        <input class="form-control" id="user_email" type="email" name="user_email" required /> (<?php echo WORDING_CURRENTLY; ?>: <?php echo $_SESSION['user_email']; ?>)
                        <input class="btn btn-default" type="submit" name="user_edit_submit_email" value="<?php echo WORDING_CHANGE_EMAIL; ?>" />
                    </form>
                    <!-- edit form for user's password / this form uses the HTML5 attribute "required" -->
                    <form method="post" action="edit.php" name="user_edit_form_password">
                        <label for="user_password_old"><?php echo WORDING_OLD_PASSWORD; ?></label>
                        <input class="form-control" id="user_password_old" type="password" name="user_password_old" autocomplete="off" />
                        <label for="user_password_new"><?php echo WORDING_NEW_PASSWORD; ?></label>
                        <input class="form-control" id="user_password_new" type="password" name="user_password_new" autocomplete="off" />
                        <label for="user_password_repeat"><?php echo WORDING_NEW_PASSWORD_REPEAT; ?></label>
                        <input class="form-control" id="user_password_repeat" type="password" name="user_password_repeat" autocomplete="off" />
                        <input class="btn btn-default" type="submit" name="user_edit_submit_password" value="<?php echo WORDING_CHANGE_PASSWORD; ?>" />
                    </form>
                    <!-- backlink -->
                    <a href="index.php"><?php echo WORDING_BACK_TO_LOGIN; ?></a>
                </div>
                <div class="col-sm-4" ></div>
        </div>

<?php include('_main_footer.php'); ?>
