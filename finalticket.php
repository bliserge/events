<?PHP 
session_start();
include ("connection.php");
?>
<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Concert</title>
<?php require_once "bootstrap1.php";
$ticketid=$_GET['ticketid'];
 $ticket = mysqli_query($conn, "SELECT * FROM tickets,events,users WHERE events.ID=tickets.eventid AND tickets.firstownerid=users.id AND tickets.id=$ticketid");
 if (mysqli_num_rows($ticket) > 0) {
     // output data of each row
     while ($row = mysqli_fetch_array($ticket)) {
        $names=$row['names'];
        $email=$row['email'];
        $contacts=$row['contacts'];
        $event=$row['events'];
        $eventdesc=$row['description'];
        $place=$row['venue'];
        $hours=$row['duration'];
        $dates=$row['eventdate'];
        $total=$row['total'];
        $vips=$row['vipcapacity'];
        $normals=$row['normalcapacity'];
        $createdat=$row['createddates'];


         
     }
 }
?>

</head>
<body>
<center><div class="ticket" style="margin-top:170px;width:1200px; background:yellow; border-style: dotted dashed solid double;">
<table class="table">
<h2>Online Hosted Events Ticket Management System</h2>
    <thead>
        <tr>
            <th style="width:300px;"><i>Personal Identification</i></th>
            <th></th>
            <th></th>
            <th>Event Details</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><b><?php echo $names; ?></b></td>
            <td></td>
            <td></td>
            <td><?php echo $event." (".$eventdesc.")"; ?></td>
            <td><b>Total Paid</b><?php echo $total; ?>RWF</td>          

        </tr>
        <tr>
            <td><b><?php echo $email; ?></b></td>
            <td></td>
            <td></td>
            <td><?php echo $dates." |  at ".$hours; ?></td>
            <td><b>VIP:</b><?php echo $vips; ?></td>          

        </tr>
        <tr>
            <td><b><?php echo $contacts; ?></b></td>
            <td></td>
            <td></td>
            <td><?php echo $place; ?></td>

            <td><b>Normals:</b><?php echo $normals; ?></td>
        </tr>
        <tr>
            <td><img src="img/ticket.PNG" style="width:100px"></td>
            <td></td>
            <td></td>
            <td></td>

            <td><?php echo $createdat; ?><img src="img/qrcode.svg" style="width:100px"> </td>
        </tr>
    </tbody>
</table>

</div>
</center>

</body>
</html>
<center><button class="btn btn-primary" onclick="printContent()" style="margin-top:20px"><i class="fas fa-printer"></i> Print</button></center>
<script>
    function printContent() {
      window.print()
    }
  </script>