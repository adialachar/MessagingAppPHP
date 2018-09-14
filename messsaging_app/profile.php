<?php

session_start();


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Profile Page</title>
  </head>
  <body>
    <h1>Welcome to the profile page <?php echo $_SESSION['u_first']; ?> </h1>
	<h1> Your ID is <?php echo $_SESSION['u_id'] ?> </h1>

	<form action = "includes/logout.inc.php" method = "POST">
	<button type = "submit" name = "submit"> Logout </button>
	</form>

	 <form action="includes/send_message.inc.php" method = "POST">
 	 <input type="text" name="rpf" placeholder = "Recipient First Name">
	 <input type = "text" name = "rpl" placeholder = "Recipient Last Name">
	 <input type = "text" name = "rID" placeholder = "Recipient ID">
	<textarea name="message" rows = "5" cols = "20" placeholder = "Enter Text Here"></textarea>

 	 <button type = "submit" name = "submit">Send Message </button>
	</form>

	HELLO?


	<h1> <?php echo $_SESSION['unread_messages']; ?> </h1>
	MELLO?	
	<h1> <?php if(empty($_SESSION['unread_messages'])){ echo "Its empty my guy"; } ?> </h1>

	BELLO?


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
