<?php



	session_start();

	if(empty($_SESSION['message'])){echo "It is empty my guy";}



	echo $_SESSION['sender'];
	echo"<br><br>";
	echo $_SESSION['message'];


	echo "<form action = 'profile.php' method = 'POST'>
		<button type = 'submit' name = 'submit'> Back </button>
	     </form>";
