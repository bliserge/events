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
                Proceed Checkout</h1>
            <div class="container" style="padding-top: 5%;">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">


                        <!-- CREDIT CARD FORM STARTS HERE -->
                        <div class="panel panel-default credit-card-box">
                            <div class="panel-heading display-table">
                                <div class="row display-tr">
                                    <h3 class="panel-title display-td">Payment Details<br> (only MoMo pay)</h3>
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
                                            <!-- <div class="form-group">
                                                <label for="cardNumber">Phone Number</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-7 col-md-7">
                                            <div class="form-group">
                                                <label for="cardExpiry"><span class="hidden-xs">Total Amount</span> </label>
                                                <input type="tel" class="form-control" name="total" placeholder="Totals" value="<?php echo $_GET['total']; ?>"
                                                    required disabled/>
                                            </div>
                                        </div>
                                        <div class="col-xs-5 col-md-5 pull-right">
                                            <div class="form-group">
                                                <label for="cardCVC">Nm | VIP</label>
                                                <input type="text" class="form-control" name="normal sits" id="cvc" ;
                                                    placeholder="Sits" ; autocomplete="off" ; value="<?php echo $_GET['normals'];?> | <?php echo $_GET['vips']; ?>" required disabled />
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
        <?php }
    } ?>
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

    $balance = mysqli_query($conn, "SELECT amount,id FROM wallets WHERE userId = '$userid' limit 1");
    $balance = mysqli_fetch_assoc($balance);

    if (mysqli_num_rows($events) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_array($events)) {
            $remainingnormals=$row['normalcapacity'];
            $remainingvips=$row['vipcapacity'];
        }
    }
    if($balance['amount'] < $total) {
        echo "<script>alert('Not enough balance! Topup your wallet and try again'); window.location='account.php';</script>";
        exit();
    }
    if($normal > $remainingnormals)
    {
        echo "<script>alert('Not enoughsits for normal Categories'); window.location='ticket.php?total=$total&normals=$normals&vips=$vips&eventid=$eventid';</script>";
        exit();
    }
    elseif($vip > $remainingvips)
    {
        echo "<script>alert('Not enoughsits for VIP Categories'); window.location='ticket.php?total=$total&normals=$normals&vips=$vips&eventid=$eventid';</script>";
        exit();
    }
    else{
      $saveticket = mysqli_query($conn, "INSERT INTO tickets(eventid,agentid,normalsits,vipsits,total,firstownerid,resellstatus,secondownerid,resellreason,resellprice,firstpaymentstatus,secondpaymentstatus) values ('$eventid','0','$normal','$vip','$total','$userid','0','0','','0','0','0')");
      if($saveticket = 1)
      {
        $newAmount = $balance['amount'] - $total;
        $update = mysqli_query($conn, "UPDATE wallets SET amount = '$newAmount' WHERE userId = '$userid' ");

        $ticketid= mysqli_insert_id($conn);
        $norm = $remainingnormals - $normal;
        $vi=$remainingvips - $vip;        
        $update = mysqli_query($conn, "UPDATE events SET normalcapacity = '$norm', vipcapacity = '$vi' WHERE ID= '$eventid' ");
        if($update = 1)
        {
            $phone1=$_POST['phonenumber'];
            $price=$_POST['total'];
            $curl = curl_init();
            $transID = uniqid();
            $calback = "";
            $normals=$_GET['normals'];
            $eventid=$_GET['eventid'];
            $vips=$_GET['vips'];
            $eventid=$_GET['eventid'];
            $dates=date('d/m/Y');
            $empty='';
            $off=0;
            $userid=$_SESSION['userid'];
            $holdersname=$_POST['holder'];
            
           
                                hdev_payment::api_id("HDEV-48d87cf2-c648-49c1-9c7c-a1a12dbc30eb-ID"); //send the api ID to hdev_payment
                                hdev_payment::api_key("HDEV-79d8e552-5bed-4f5a-9551-cd051e32e406-KEY");//send the api KEY to hdev_payment
                                $pay = hdev_payment::pay($phone1, $price, $transID, $calback); //finishing the transaction 

                                //var_dump($pay);//to get payment server response
                                $status = $pay->status; //get transaction status if sent or not
                                $message = $pay->message; //transaction message 
                                if ($status = 1) {                                    
                                    $insertQuery = mysqli_query($conn, "INSERT INTO payments(ticketid,userid,paid_dates,paid_phone,holdername,amount,transID,transaction_momo,trans_status) VALUES ('$ticketid','$userid','$dates','$phone1','$holdersname','$total','$transID','$empty','$off')");
                                    if ($insertQuery == 1) {
                                        echo "error:" . mysqli_error($conn);    
                                        $paymentid= mysqli_insert_id($conn);

                                        //echo "<script>window.location='comfirm.php?'; </script>";
                                    } else {
                                        //if the query was not ok bring alert
                                       // echo "<script>window.alert('failed to load querry'); window.location='ticket.php?total=$total&normals=$normals&vips=$vips&eventid=$eventid'; </script>";
                                       echo "error:" . mysqli_error($conn);                                      


                                    }
                                } else {
                                    echo "<script>window.alert('transaction was not successfuly sent'); window.location='ticket.php?total=$total&normals=$normals&vips=$vips&eventid=$eventid'; </script>";
                                    exit();
                                }



            echo "<script>window.location='success.php?ticketid=$ticketid&paymentid=$paymentid'</script>";


        }

        echo"<script>alert('Ticket saved')</script>";

      }
      else
      {
        echo"<script>alert('failed to save ticket')</script>";
        exit();

      }


    }

        



}
?>