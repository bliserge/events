<?php
session_start();
include('includes/dbconnection.php');

$eventid = $_GET['eventid'];
$action = $_GET['action'];
if ($action == 'aprove') {
   $status = 1;
   $aprove = "UPDATE events SET status =:status WHERE ID=:eventid";
   $query = $dbh->prepare($aprove);
   $query->bindParam(':status', $status, PDO::PARAM_STR);
   $query->bindParam(':eventid', $eventid, PDO::PARAM_STR);
   $query->execute();
} elseif ($action == 'decline') {

   $status = 0;
   $decline = "UPDATE events SET status =:status WHERE ID=:eventid";
   $query = $dbh->prepare($decline);
   $query->bindParam(':status', $status, PDO::PARAM_STR);
   $query->bindParam(':eventid', $eventid, PDO::PARAM_STR);
   $query->execute();

}
elseif ($action == 'aprovepayment') {
   $pid=$_GET['paymentid'];
   $status = 1;
   $decline = "UPDATE payments SET trans_status =:status WHERE pid=:pid";
   $query = $dbh->prepare($decline);
   $query->bindParam(':status', $status, PDO::PARAM_STR);
   $query->bindParam(':pid', $pid, PDO::PARAM_STR);
   $query->execute();
   echo "<script>alert('Ticket aproved');window.location='approved_bookings.php'</script>";

}
 else {

   echo "<script>alert('No action');window.location=manage_event.php</script>";

}

echo "<script>alert('Event has been updated');window.location='manage_event.php'</script>";


?>