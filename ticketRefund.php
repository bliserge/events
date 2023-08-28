<?php
include("connection.php");
include 'pay_parse.php';
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
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $userid");
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {

            ?>
            <h1
                style="text-align: center; font-family: sans-serif; background: linear-gradient(to right,#E20D13, #F0E300, #A4C615, #4363AB,#BE4A94,#E30922);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                Comfirm Refund</h1>
            <div class="container" style="padding-top: 5%;">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">


                        <!-- CREDIT CARD FORM STARTS HERE -->
                        <div class="panel panel-default credit-card-box">
                            <div class="panel-heading display-table">
                                <div class="row display-tr">
                                    <h3 class="panel-title display-td">Refund Details</h3>
                                    <div class="display-td">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form role="form" method="POST" onsubmit="return checkForm(this);">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <input type="hidden" class="form-control" name="phonenumber"
                                                placeholder="Valid 4ne number" value="<?php echo $row['contacts']; ?>"
                                                id="num" autocomplete="" required autofocus />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 col-md-6">
                                            <div class="form-group">
                                                <label for="cardExpiry"><span class="hidden-xs">normal Tickets</span> </label>
                                                <input type="tel" class="form-control" name="total" placeholder="Totals" value="<?php echo $_GET['normals']; ?>"
                                                    required disabled/>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-md-6 pull-right">
                                            <div class="form-group">
                                                <label for="cardCVC">VIP tickets</label>
                                                <input type="text" class="form-control" name="normal sits" id="cvc" ;
                                                    placeholder="Sits" ; autocomplete="off" ; value="<?php echo $_GET['vips']; ?>" required disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label for="name">REGISTERES HOLDER NAME</label>
                                                <input type="text" class="form-control" name="holder"
                                                    placeholder="Valid Card Holder Name" value="<?php echo $row['names']; ?>" required disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <button class="btn btn-success btn-lg btn-block" type="submit" name="ckeck"
                                                style="background-color: #2675aed9;">Refund</button>
                                           
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
        <?php }
    } ?>
    <?php require_once "footer.php"; ?>
    <script type="text/javascript">
        function checkForm(form) {
            var n = (document.getElementById("num").value.length);
            var c = (document.getElementById("cvc").value.length);
            if (n == 10) {
              
            }
        }
    </script>

</body>

<?php 
if(isset($_POST['ckeck']))
{
    
    $ticketid=$_GET['ticketid'];
    $vip=$_GET['vips'];
    $normal=$_GET['normals'];
    $userid=$_SESSION['userid'];

    $events = mysqli_query($conn, "SELECT normalsits, vipsits, ticketprice, vipprice, eventid FROM `tickets` t JOIN `events` e ON t.eventid = e.ID WHERE t.id =  $ticketid limit 1");
    $events = mysqli_fetch_assoc($events);

    $balance = mysqli_query($conn, "SELECT amount,id FROM wallets WHERE userId = '$userid' limit 1");
    $balance = mysqli_fetch_assoc($balance);

    if($events['normalsits'] < $normal) {
        echo "<script>alert(\"You don't have those normal tickets\"); window.location='ticketRefund.php?normals=$normal&vips=$vip&eventid=$eventid&ticketid=$ticketid';</script>";
        exit();
    }
    if($events['vipsits'] < $vip) {
        echo "<script>alert(\"You don't have those VIP tickets\"); window.location='ticketRefund.php?normals=$normal&vips=$vip&eventid=$eventid&ticketid=$ticketid';</script>";
        exit();
    }
    
    $newNomSits = $events['normalsits'] - $normal;
    $newVipSits = $events['vipsits'] - $vip;

    $fund = ((($normal * $events['ticketprice'])*80)/100) + ((($vip * $events['vipprice'])*80)/100);

    $total = ($newNomSits * $events['ticketprice']) + ($newVipSits * $events['vipprice']);
    
    // echo "<script>alert($events);</script>";
    // var_dump($newVipSits);
    // exit();

    $updateTickets = mysqli_query($conn, "UPDATE `tickets` SET `normalsits`= $newNomSits, `vipsits`=$newVipSits, `total`=$total, `resellstatus` = 1 WHERE id = $ticketid ");
    $eventid=$events['eventid'];

    $updateEvents  = mysqli_query($conn, "UPDATE events SET normalcapacity = normalcapacity + '$normal', vipcapacity = vipcapacity + '$vip' WHERE ID= '$eventid' ");
  
    $updateWallet  = mysqli_query($conn, "UPDATE wallets SET amount = amount + '$fund' WHERE userId = '$userid' ");

    echo "<script>alert('Ticket Refunded successfully'); window.location='mytickets.php';</script>";
    exit();

}
?>