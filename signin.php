<?php
session_start();
include ('connection.php');
	$mail=$_POST['mai'];
	$password=$_POST['pwd'];
	$msg="";


	$result=mysqli_query( $conn, "SELECT * FROM users WHERE email='$mail' AND Password='$password' ");
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    	while($row = mysqli_fetch_assoc($result)) {

				$_SESSION["mail"] = $row['email'];
				$_SESSION["password"] = $row['Password'];
				$_SESSION["userid"] = $row['id'];
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (20*3660) ;
				/*echo "<script type='text/javascript'>alert('$message');</script>";
				header("Location: Inc(Signin).php");*/
			}
				setcookie('mail', $_POST['mai'], time()+3660);
	            setcookie('password', $_POST['pwd'], time()+3660);

				header('location: index.php');
			}
			else{
				$message = "Invalid Username or Password!";
				header("Location:Sign in.php?msg=Invalid Username or Password!");
			}
			
?>