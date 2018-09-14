<?php



	if(isset($_POST['submit'])){
		session_start();
		include_once 'dbh.inc.php';

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
				echo "HELLO";


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
						
						$_SESSION['unread_messages'] = $result->fetch_assoc()['message'];
						$numRows =  mysqli_num_rows($result);	
						/*if ($numRows > 0){
					

							for(int i = 0; i < $numRows; ++i){
								$rawMessage = $result->fetch_assoc()		
								$Message = Message(

							}
	

						 }*/

                                                header("Location: ../profile.php");
                                                exit();

                                        }




                                }




			}






		}





	}
