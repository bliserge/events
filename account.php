<?php
include("connection.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My account</title>
    <?php require_once "session.php"; ?>
    <?php require_once "bootstrap.php"; ?>
    <?php require_once "bootstrap1.php"; ?>
    <style>
        .login {

            margin: 0 auto;
            width: 340px;
        }

        body {

            background-image: url(img/back.png);
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
                Manage your Account</h1>
            <div class="container" style="padding-top: 5%;">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">


                        <div class="panel panel-default credit-card-box">
                            <div class="panel-heading display-table">
                                <div class="row display-tr">
                                    <h3 class="panel-title display-td">My account</h3>
                                    <div class="display-td">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form role="form" method="POST">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                
                                                <div class="input-group">
                                                    <input type="tel" class="form-control" name="names" placeholder="Valid 4ne number" value="<?php echo $row['names']; ?>"
                                                        id="num" autocomplete="" required autofocus />
                                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="tel" class="form-control" name="email"
                                                        placeholder="Valid 4ne number" value="<?php echo $row['email']; ?>"
                                                        id="num" autocomplete="" required autofocus />
                                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="tel" class="form-control" name="phone"
                                                        placeholder="Valid 4ne number" value="<?php echo $row['contacts']; ?>"
                                                        id="num" autocomplete="" required autofocus />
                                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-xs-7 col-md-7">
                                            <div class="form-group">
                                                <label for="cardExpiry"><span class="hidden-xs">Username</span> </label>
                                                <input type="tel" class="form-control" name="username" placeholder="usrname" value="<?php echo $row['username']; ?>"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="col-xs-5 col-md-5 pull-right">
                                            <div class="form-group">
                                                <label for="cardCVC">Password</label>
                                                <input type="password" class="form-control" name="password"
                                                    placeholder="Password" ; autocomplete="off" ; value="<?php echo $row['Password'];?>" required />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <button class="btn btn-success btn-lg btn-block" type="submit" name="ckeck"
                                                style="background-color: #2675aed9;">Update</button>
                                           
                                        </div>

                                        <div class="col-xs-6">
                                           <a href="signout.php"> <button class="btn btn-success btn-lg btn-block" type="button" name="ckeck"
                                                style="background-color: #2675aed9;">Logout</button></a>
                                           
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
   
</body>

<?php 
if(isset($_POST['ckeck']))
{
    $names=$_POST['names'];
    $email=$_POST['email'];
    $userame=$_POST['username'];
    $password=$_POST['password'];
    $contacts=$_POST['phone'];
    $userid=$_SESSION['userid'];
    $update = mysqli_query($conn, "UPDATE users SET names = '$names', email= '$email', contacts= '$contacts', username='$userame', password='$password' WHERE id = '$userid' ");
   echo "<script>alert('saved');window.location='account.php'</script>";
}
?>