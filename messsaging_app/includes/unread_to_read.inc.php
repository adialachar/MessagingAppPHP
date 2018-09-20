
<?php 

session_start();

	if(isset($_POST['submit'])){

		include_once 'dbh.inc.php';
		//1. Keep the data
		$sender = $_SESSION['sender'];
		$senderID = $_SESSION['senderID'];
		$rID = $_SESSION['rID'];
		$recipient = $_SESSION['recipient'];
		$message = $_SESSION['message'];


		echo "IF";

		//$sqlDEL = "DELETE FROM unread_messages WHERE sender = '$sender' AND id1 = '$senderID' AND id2 = '$rID' AND recipient = '$recipient' AND message = '$message';";

		//$sqlINS = "INSERT INTO read_messages(sender, id1, id2, recipient, message) VALUES ('$sender','$senderID', '$rID', '$recipient', '$message');";

		//$resultDEL = mysqli_query($conn, $sqlDEL);
		//$resultINS = mysqli_query($conn, $sqlINS);
		
		//header("Location: ../view_message.php");
		//exit();






	}
	else{

		include_once 'dbh.inc.php';
                //1. Keep the data
                $sender = $_SESSION['sender'];
                $senderID = $_SESSION['senderID'];
                $rID = $_SESSION['rID'];
                $recipient = $_SESSION['recipient'];
                $message = $_SESSION['message'];

		
                echo "ELSE";
		echo $message;

                //$sqlDEL = "DELETE FROM unread_messages WHERE sender = '$sender' AND id1 = '$senderID' AND id2 = '$rID' AND recipient = '$recipient' AND message = '$message';";

                $sqlINS = "INSERT INTO read_messages(sender, id1, id2, recipient, message) VALUES ('$sender','$senderID', '$rID', '$recipient', '$message');";

                //$resultDEL = mysqli_query($conn, $sqlDEL);
                $resultINS = mysqli_query($conn, $sqlINS);
		$_SESSION['sender'] = $sender;
                header("Location: ../view_message.php");
                exit();






	}
		

