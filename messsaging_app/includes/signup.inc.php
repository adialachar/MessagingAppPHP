<?php

	session_start();

	if(isset($_POST['submit'])){

		include_once 'dbh.inc.php';



		$first = $_POST['first'];
		$last = $_POST['last'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];



		if (empty($first) || empty($last) || empty($username) || empty($password)){

			header("Location: ../signup.php?emptycredentials");
			exit();


		}

		else{

			echo "Connected BOi";
			
			$sql = "SELECT * FROM users WHERE username = '$username'";
			$result = mysqli_query($conn, $sql);
			$numRows = mysqli_num_rows($result);
			if($numRows > 0){

				echo $numRows;
			}
			else{

				$Pword = password_hash($password, PASSWORD_DEFAULT);
				$sql = "INSERT INTO users (first_name, last_name, username, email, password) VALUES ('$first', '$last', '$username' , '$email' , '$Pword');";
				mysqli_query($conn, $sql);
				header("Location: ../index.php?signup=success");
				exit();




			}



		}


	}


