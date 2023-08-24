<!DOCTYPE html>
<html>
	<?php 
	include("connection.php");

	?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Concert</title>
	<?php require_once "bootstrap1.php"; ?>
	<style>
		a {
			color: #38acff;
		}

		.head {

			text-align: center;
		}

		.login {

			margin: 0 auto;
			width: 340px;
		}

		body {

			background-image: url(img/bruce2.jpg);
			background-size: cover;
			overflow: scroll;
			background-repeat: no-repeat;
			background-attachment: fixed;
			color: white;
		}
	</style>
</head>

<body>
	<div class="login" style="padding-top: 2%;">

		<!-- <form action="home1.php" style="border: 1px solid;"> -->
		<div class="head">
			<h1><b>Awesome!</b></h1>
		</div>
		<div class="bd1" style="text-align: center; padding: 14%;">
			<p style="padding-bottom: 10%;">Thank you for reserving your ticket. <br>Check your booking details from
				here</P>
			
			<p style="padding-bottom: 10%;">Once the payment is aproved you will download your ticket from here<br>
				<?php
				$ticketid = $_GET['ticketid'];
				$paymentid=$_GET['paymentid'];
				$events = mysqli_query($conn, "SELECT * FROM payments WHERE pid = $paymentid");
				if (mysqli_num_rows($events) > 0) {
					// output data of each row
					while ($row = mysqli_fetch_array($events)) {
						$status = $row['trans_status'];
				
				if ($status == 1) {
					?>
					<a href="finalticket.php?ticketid=<?php echo $_GET['ticketid']; ?>"> <button
							class="btn btn-primary">Acknowledge receipt</button></a>
					<?php

				}
			}
		}
				?>

				<a href="index.php"> <button class="btn btn-primary">Home</button></a>



		</div>
		<!-- </form> -->
	</div>


</body>

</html>