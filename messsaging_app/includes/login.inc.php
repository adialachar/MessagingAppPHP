<?php



	if(isset($_POST['submit'])){
		session_start();
		include_once 'dbh.inc.php';
		include_once 'messageClass.inc.php';

		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if (empty($username) || empty($password)){

			header("Location: ../index.php?emptycredentials");
			exit();



		}

		else{

			$sql = "SELECT * FROM users  WHERE username = '$username'";
                        $result = mysqli_query($conn, $sql);
                        $resultCzech = mysqli_num_rows($result);

			 if($resultCzech < 1){


                                header("Location: ../index.php?credentials=error");
                                exit();

			}

			else{
			//	echo "HELLO";


				if($row = mysqli_fetch_assoc($result)){

                                        //De-hashing the password
                                        $hashedpwordCzech = password_verify($password, $row['password']);


                                        if ($hashedpwordCzech == false){

                                                header("Location: ../index.php?login=error");

                                                exit();




                                        }
                                        elseif($hashedpwordCzech == true){
						
                                                //login
                                                $_SESSION['u_id'] = $row['id'];
                                                $_SESSION['u_first'] = $row['first_name'];
                                                $_SESSION['u_last'] = $row['last_name'];
                                                $_SESSION['u_email'] = $row['email'];
                                                $_SESSION['u_username'] = $row['username'];

						$fName = $row['first_name'];
						$rID = $row['id'];
	

						$sql = "SELECT * FROM unread_messages where recipient = '$fName' AND id2 = '$rID';";
						$result = mysqli_query($conn, $sql);
						
						//$_SESSION['unread_messages'] = $result->fetch_assoc()['message'];
						$numRows =  mysqli_num_rows($result);
						//$messageArray = array();	
						if ($numRows > 0){
					
							$_SESSION['unread_messages'] = array();
							for($i = 0; $i < $numRows; $i++){
								$rawMessage = $result->fetch_assoc();		
								$Message = new Message($rawMessage['sender'], $rawMessage['id1'],$rawMessage['id2'], $rawMessage['recipient'], $rawMessage['message']);
								array_push($_SESSION['unread_messages'], $Message);


								//echo $messageArray[$i]->message;



							}
	
							//$_SESSION['unread_messages'] = $messageArray;
							echo "Accessing the session now: ";
							echo $_SESSION['unread_messages'][0]->message;
							echo $_SESSION['unread_messages'][1]->message;
							echo $_SESSION['unread_messages'][0]->hello();
						 }

						

                                               	header("Location: ../profile.php");
                                                exit();

                                        }




                                }




			}






		}





	}
