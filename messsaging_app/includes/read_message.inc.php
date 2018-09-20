<?php

	include_once 'dbh.inc.php';
	include_once 'messageClass.inc.php';
	session_start();

	$num_messages = $_SESSION['num_messages'];
	$num_messages *= 1;
	for($i = 0; $i < $num_messages; $i++){
		
		if(isset($_POST[$i])){
			
	
			$ID = $_SESSION['u_id'];
        		$sql = "SELECT * FROM unread_messages WHERE id2 = '$ID';";
			$result = mysqli_query($conn, $sql);
			$numRows = mysqli_num_rows($result);
			$messageArray = array();
			for($j = 0; $j < $numRows; $j++){
					
				$row = $result->fetch_assoc();
				
				if( $i == $j){
					$Message = new Message($row['sender'], $row['id1'], $row['id2'], $row['recipient'], $row['message']);	
				
					echo $Message->message; // display()

					$_SESSION['sender'] = $Message->sender;
					$_SESSION['senderID'] = $row['id1'];
					$_SESSION['rID'] =  $row['id2'];
					$_SESSION['recipient'] =  $row['recipient'];
					$_SESSION['message'] = $Message->message;
					header("Location: unread_to_read.inc.php");
					exit();

	
				}

	
			}











		}
		else{
			echo "False";
		}


	}



