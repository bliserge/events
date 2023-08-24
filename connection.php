<?php 
$conn=mysqli_connect("localhost","root","","hostedevents");

if(!$conn)
{
    alert("Connection Failed" . mysqli_connect_error());
}
else{
    //echo "Connected to hosted events";
}
?>