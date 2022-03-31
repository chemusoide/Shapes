<?php

    if (defined("SECURITY_CONSTANT")) {

        $bodyId = "userFile";
        $pageTitle = "User File";
        $action = "index.php?controller=user&amp;";
        
        if ( isset($user) ) {
        	
        	$pageTitle = $pageTitle . " :: " . $user->getUserName();
        	$action = $action . "option=modification";
        	
        } else {
        	
        	$pageTitle = $pageTitle . " :: NEW";
        	$action = $action . "option=creation";
        	
        }

        require_once(SKEL_DIR . "/cabecera.php");
        
        require_once(SKEL_DIR . "/headStart.php");
        
?>

		<!-- Validaciones JQuery -->
		<script type="text/javascript">
		/* <![CDATA[ */
		function validateForm(f) {

    		if ( $('#user_name').val() == "" ) {
        		alert("The 'Name' field cannot be empty");
        		$('#user_name').focus();
        		return false;
    		}

    		if ( !valitePassword() )
        		return false;

    		return confirm("Are you sure?");

        }

        function validatePassword() {

        	if ( $('#user_password').val() == "" ) {
        		alert("The 'Password' field cannot be empty");
        		$('#user_password').focus();
        		return false;
    		}

        	if ( $('#user_password').val().length < 6 ) {
        		alert("The 'Password' field must be at least be 6 characters");
        		$('#user_password').focus();
        		return false;
    		}

        	if ( $('#user_password').val() != $('#user_password_confirm').val() ) {
        		alert("The 'Password' field does not match the 'Confirm password' field");
        		$('#user_password').focus();
        		return false;
    		}

    		return true;

        }

        <?php if ( isset($user) ) { ?>
        function confirmDelete() {

			return confirm("Are you sure you want to delete the user '<?php echo $user->getUserName() ?>'?");
			
        }
        <?php } ?>
                 
        /* ]]> */
		</script>

<?php
        
        require_once(SKEL_DIR . "/headEnd.php");
        
        require_once(SKEL_DIR . "/bodyStart.php");
        
        require_once(SKEL_DIR . "/menu.php");

?>
        <h1><?php echo $pageTitle ?></h1>
        
        <div id="userFile">
        
        	<p><a href="index.php?controller=user&amp;option=list"><img alt="Back to user list" src="img/users_32x32.png"/> Back to user list</a></p>
        
        	<form class="ficha" method="post" action="<?php echo $action ?>" onsubmit="return validateForm(this)">
        		<fieldset>
        			<legend>Form to create/edit user</legend>
        			<p>
        				<label for="user_name">User name:</label>
        				<input type="text" name="user_name" id="user_name" value="<?php if ( isset($user) ) { echo $user->getUserName(); } ?>" />
    				</p>
    				<?php if ( isset($user) ) { ?>
    				<input type="hidden" name="user_id" value="<?php echo $user->getUserId() ?>" />
    				<?php } else { ?>
    				<p>
        				<label for="user_password">Password:</label>
        				<input type="password" name="user_password" id="user_password" />
    				</p>
    				<p>
        				<label for="user_password_confirm">Confirm password:</label>
        				<input type="password" name="user_password_confirm" id="user_password_confirm" />
    				</p>
    				<?php } ?>
    				<p>
    					<?php if ( isset($user) ) { ?>
    					<input type="submit" value="Modify user and password" />
    					<?php } else { ?>
    					<input type="submit" value="Create user" />
    					<?php } ?>
					</p>
        		</fieldset>
        	</form>
        	
        	<?php if ( isset($user) ) { ?>
        	<form class="ficha" method="post" action="index.php?controller=user&amp;option=changePassword" onsubmit="return validarPassword() && confirm('Are you sure?')">
        		<fieldset>
        			<legend>Change password</legend>
        			<input type="hidden" name="user_id" value="<?php echo $user->getUserId() ?>" />
        			<p>
        				<label for="user_password">Password:</label>
        				<input type="password" name="user_password" id="user_password" />
    				</p>
    				<p>
        				<label for="user_password_confirm">Confirm password:</label>
        				<input type="password" name="user_password_confirm" id="user_password_confirm" />
    				</p>
    				<p>
        				<input type="submit" value="Change password" />
    				</p>
        		</fieldset>
        	</form>
        	
        	<form class="file" method="post" action="index.php?controller=user&amp;option=delete" onsubmit="return confirmDelete()">
        		<fieldset>
        			<legend>Delete user</legend>
        			<input type="hidden" name="user_id" value="<?php echo $user->getUserId() ?>" />
        			<p>
        				<input type="submit" value="Delete user" />
    				</p>
        		</fieldset>
        	</form>
        	<?php } ?>
        	
        	<p><a href="index.php?controller=user&amp;option=list"><img alt="Back to user list" src="img/users_32x32.png"/> Back to user list</a></p>
        
        </div>
<?php
        
        require_once(SKEL_DIR . "/bodyEnd.php");
        
        require_once(SKEL_DIR . "/pie.php");

    }

?>
