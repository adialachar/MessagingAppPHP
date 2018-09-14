<?php





	if(isset($_POST['submit'])){

		session_start();
		include_once 'dbh.inc.php';


		$message = $_POST['message'];

		$rID = $_POST['rID'];
		
		$rFirst = $_POST['rpf'];
	
		$rLast = $_POST['rpl'];
		
	
		echo $message;
		echo $rID;
		echo $rFirst;
		echo $rLast;
	
		if (empty($message) || empty($rFirst) || empty($rID) || empty($rLast)){

			header("Location: ../profile.php?empty");
			exit();


		}
		else{

			$senderID = $_SESSION['u_id'];
			$senderID *= 1;
			$rID *= 1;
			$sender = $_SESSION['u_first'];

			$sql = "INSERT INTO unread_messages (sender, recipient, id1, id2, message) VALUES ('$sender', '$rFirst', '$senderID', '$rID', '$message');";

			$result = mysqli_query($conn, $sql);
			echo $result;
			header("Location: ../profile.php?message=success");
			exit();
			echo "Inside the branch where everything goes down";


		}







	}
	else{



		echo "ELSE";


	}
