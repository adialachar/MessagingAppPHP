<?php
	session_start();
?>


	<form action = "includes/signup.inc.php" method = "POST">
	<input type = "text" name = "first" placeholder = "First Name">
	<input type = "text" name = "last" placeholder = "Last Name">
	<input type = "text" name = "username" placeholder = "username">
	<input type = "text" name = "email" placeholder = "email">
	<input type = "password" name = "password" placeholder = "password">
	<button type = "submit" name = "submit"> Submit </button>
	</form>

	
