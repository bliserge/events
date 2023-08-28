<?php
include ("connection.php");

$name=$_POST['name'];
$mail=$_POST['email'];
$password=$_POST['pwd1'];
$username=$_POST['username'];
$ages=$_POST['ages'];
$district=$_POST['district'];
$sector=$_POST['sector'];
$interest=$_POST['interest'];
$contact=$_POST['contact'];

$sql="INSERT INTO users(names,email,username,ages,residentialdistrict,residentialsector,interest,contacts,Password) 
        values ('$name','$mail','$username','$ages','$district','$sector','$interest','$contact','$password')";

if(mysqli_query($conn,$sql))
{
        $result = mysqli_query($conn, "SELECT id FROM users WHERE email = '$mail' AND contacts = '$contact' limit 1");
        $result = mysqli_fetch_assoc($result);
        $userId = $result['id'];
        $query = "INSERT INTO wallets(userId,amount) values ($userId,0)";
        mysqli_query($conn, $query);
        header("Location:Sign in.php");
}
else {
	header("Location:Signup.php?msg=Email ID already exist! Please try again");
}

?>