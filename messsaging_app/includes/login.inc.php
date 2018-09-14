<?php



	if(isset($_POST['submit'])){

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
                                                $_SESSION['u_id'] = $row['user_id'];
                                                $_SESSION['u_first'] = $row['user_first'];
                                                $_SESSION['u_last'] = $row['user_last'];
                                                $_SESSION['u_email'] = $row['user_email'];
                                                $_SESSION['u_uid'] = $row['user_uid'];
                                                header("Location: ../profile.php");
                                                exit();

                                        }




                                }




			}






		}





	}
