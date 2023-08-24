<?php
include("connection.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concert</title>
    <?php require_once "session.php"; ?>
    <?php require_once "bootstrap.php"; ?>
    <?php require_once "bootstrap1.php"; ?>
    <style>
        .login {

            margin: 0 auto;
            width: 340px;
        }

        body {

            background-image: url(img/music.png);
            background-size: cover;
            overflow: scroll;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: black;
        }

        .credit-card-box .panel-title {
            display: inline;
            font-weight: bold;
        }

        .credit-card-box .form-control.error {
            border-color: red;
            outline: 0;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
        }

        .credit-card-box label.error {
            font-weight: bold;
            color: red;
            padding: 2px 8px;
            margin-top: 2px;
        }

        .credit-card-box .payment-errors {
            font-weight: bold;
            color: red;
            padding: 2px 8px;
            margin-top: 2px;
        }

        .credit-card-box label {
            display: block;
        }

        /* The old "center div vertically" hack */
        .credit-card-box .display-table {
            display: table;
        }

        .credit-card-box .display-tr {
            display: table-row;
        }

        .credit-card-box .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 50%;
        }

        /* Just looks nicer */
        .credit-card-box .panel-heading img {
            min-width: 180px;
        }

        .footer {
            padding-top: 70px;
            padding-bottom: 0;
            background-color: transparent;
            color: #222;
            text-align: center;
        }

        .nav-bar {
            background-color: transparent;
        }

        .w-container {
            margin-left: auto;
            margin-right: auto;
            max-width: 940px;
        }

        #nav {
            background-color: transparent;
        }

        .logo {
            padding-top: 8px;
        }

        .w-nav {
            position: relative;
            background: #dddddd;
            z-index: 1000;
        }

        .w-nav-brand {
            position: relative;
            float: none;
            text-decoration: none;
            color: #333333;
        }

        .w-nav-overlay {
            position: absolute;
            overflow: hidden;
            display: none;
            top: 100%;
            left: 0;
            right: 0;
            width: 100%;
        }

        body {
            background-image: url(img/back5.png);
            background-size: cover;
            height: 100vh;
            background-position: 0px 0px, 50% 50%;
        }

        .content-wrapper {
            margin-top: 78px;
        }

        .w-container {
            margin-left: auto;
            margin-right: auto;
            max-width: 940px;
        }
    </style>

<body>
    <?php require_once "navbar.php"; ?>
    <?php
    $userid = $_SESSION['userid'];
    $ticketid=$_GET['ticketid'];
    $result = mysqli_query($conn, "SELECT * FROM users,tickets,events WHERE events.ID=tickets.eventid AND tickets.firstownerid=users.id AND tickets.id=$ticketid");
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $price=$row['resellprice'];
            $phone=$row['contacts'];
            $normals=$row['normalsits'];
            $vips=$row['vipsits'];   
            $regnames=$row['names'];
        }

        
        $userid = $_SESSION['userid'];
        $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $userid");
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $contacts=$row['contacts'];
                $names=$row['names'];
            }}
    
    }

  



            ?>
            <h1
                style="text-align: center; font-family: sans-serif; background: linear-gradient(to right,#E20D13, #F0E300, #A4C615, #4363AB,#BE4A94,#E30922);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                Proceed Checkout of reseller</h1>
            <div class="container" style="padding-top: 5%;">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">


                        <!-- CREDIT CARD FORM STARTS HERE -->
                        <div class="panel panel-default credit-card-box" style="width:400px">
                            <div class="panel-heading display-table">
                                <div class="row display-tr">
                                    <h3 class="panel-title display-td">Payment Details<br> (only MoMo pay) <label for="cardNumber" style="size:6px;"></label><?php echo $phone." ".$regnames; ?></label> </h3>
                                    <div class="display-td">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form role="form" method="POST" onsubmit="return checkForm(this);">
                                <input type="checkbox" required> Comfirm that you are sending the equivalent of total amount to the number to buy the ticket
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label for="cardNumber">I have Paid</label>
                                                <div class="input-group">
                                                    <input type="tel" class="form-control" name="cardNumber"
                                                        placeholder="Valid 4ne number" value="<?php echo $contacts; ?>"
                                                        id="num" autocomplete="" required autofocus />
                                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-7 col-md-7">
                                            <div class="form-group">
                                                <label for="cardExpiry"><span class="hidden-xs">Toal Amount</span> </label>
                                                <input type="tel" class="form-control" name="cardExpiry" placeholder="Totals" value="<?php echo $price; ?>"
                                                    required disabled />
                                            </div>
                                        </div>
                                        <div class="col-xs-5 col-md-5 pull-right">
                                            <div class="form-group">
                                                <label for="cardCVC">Nm | VIP</label>
                                                <input type="text" class="form-control" name="normal sits" id="cvc" ;
                                                    placeholder="Sits" ; autocomplete="off" ; value="<?php echo $normals;?> | <?php echo $vips; ?>" required disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label for="name">REGISTERES HOLDER NAME</label>
                                                <input type="text" class="form-control" name="cardname"
                                                    placeholder="Valid Card Holder Name" value="<?php echo $names; ?>" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <button class="btn btn-success btn-lg btn-block" type="submit" name="ckeck"
                                                style="background-color: #2675aed9;">Pay</button>
                                           
                                        </div>
                                    </div>
                                    <div class="row" style="display:none;">
                                        <div class="col-xs-12">
                                            <p class="payment-errors"></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- CREDIT CARD FORM ENDS HERE -->
                    </div>
                </div>
            </div>
        <?php 
    ?>
    <?php require_once "footer.php"; ?>
    <script type="text/javascript">
        function checkForm(form) {
            var n = (document.getElementById("num").value.length);
            var c = (document.getElementById("cvc").value.length);
            if (n == 10) {
              
            }
            else {
                alert("Enter valid Card Number");
                return false;
            }
        }
    </script>

</body>

<?php 
if(isset($_POST['ckeck']))
{
    $eventid=$_GET['eventid'];
    $vip=$_GET['vips'];
    $normal=$_GET['normals'];
    $total=$_GET['total'];
    $userid=$_SESSION['userid'];
    $events = mysqli_query($conn, "SELECT * FROM events WHERE ID = $eventid");
    if (mysqli_num_rows($events) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_array($events)) {
            $remainingnormals=$row['normalcapacity'];
            $remainingvips=$row['vipcapacity'];
        }
    }
    if($normal > $remainingnormals)
    {
        echo "<script>alert('Not enoughsits for normal Categories')</script>";

    }
    elseif($vip > $remainingvips)
    {
        echo "<script>alert('Not enoughsits for VIP Categories')</script>";

    }
    else{
      $saveticket = mysqli_query($conn, "INSERT INTO tickets(eventid,agentid,normalsits,vipsits,total,firstownerid,resellstatus,secondownerid,resellreason,resellprice,firstpaymentstatus,secondpaymentstatus) values ('$eventid','0','$normal','$vip','$total','$userid','0','0','','0','0','0')");
      if($saveticket = 1)
      {
        $ticketid= mysqli_insert_id($conn);
        $norm = $remainingnormals - $normal;
        $vi=$remainingvips - $vip;
        $update = mysqli_query($conn, "UPDATE events SET normalcapacity = '$norm', vipcapacity = '$vi' WHERE ID= '$eventid' ");
        if($update = 1)
        {
            echo "<script>window.location='success.php?ticketid=$ticketid'</script>";

        }

        echo"<script>alert('Ticket saved')</script>";

      }
      else
      {
        echo"<script>alert('failed to save ticket')</script>";

      }


    }

        



}
?>