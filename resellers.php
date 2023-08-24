<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>HOSTED EVENTS</title>
    <?php include "session.php"; ?>
    <?php include "connection.php"; ?>

    <?php require_once "bootstrap.php"; ?>
    <?php require_once "bootstrap1.php"; ?>


    <link rel="stylesheet" href="magnific-popup/dist/magnific-popup.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- Magnific Popup core JS file -->
    <script src="magnific-popup/dist/jquery.magnific-popup.js"></script>
  
    <style type="text/css">
        <?php
        if (isset($_SESSION['mail'])) {
            include "modal.css";
        } else {
            include "modal1.css";
        }
        ?>

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

            background-image: url(img/music.png);
            background-size: cover;
            overflow: scroll;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .content-wrapper {
            margin-top: 78px;
        }

        .w-container {
            margin-left: auto;
            margin-right: auto;
            max-width: 940px;
        }

        .page-title {
            margin-top: 0px;
            margin-bottom: 86px;
            font-size: 45px;
            line-height: 51px;
            font-weight: 300;
            text-align: center;
            text-transform: uppercase;
        }

        .footer {
            padding-top: 43px;
            padding-bottom: 43px;
            background-color: transparent;
            color: #222;
            text-align: center;
        }

        @media screen and (max-width: 991px) {

            .w-container {
                max-width: 728px !important;
            }

            .w-nav[data-collapse="medium"] .w-nav-menu {
                display: none;
            }

            .nav-menu {
                padding-top: 18px !important;
                padding-bottom: 18px !important;
                border-top: 1px solid #000 !important;
                background-color: rgba(0, 0, 0, .85) !important;
            }

            .w-container {
                max-width: 728px !important;
            }

            .logo {
                padding-top: 8px !important;
                width: 10% !important;
            }
        }

        @media (max-width: 767px) {


            .logo {
                padding-top: 8px !important;
                width: 10% !important;
            }
        }

        @media screen and (max-width: 479px) {
            .w-container {
                max-width: none !important;
            }

            .logo {
                padding-top: 8px !important;
                width: 10% !important;
            }
        }

        .row {
            text-align: center;
        }

        .thumb {
            width: 100%;
            margin-bottom: 60px;
            float: left;
        }

        .elastic {
            max-width: 80%;
        }

        .title {
            margin: 18px 0 10px;
            font-family: sans-serif;
            font-size: 18px;
            line-height: 21px;
            text-align: center;
            color: white;
        }

        .timestamp {
            height: 11px;
            font-size: 11px;
            letter-spacing: 1px;
            line-height: 11px;
            font-style: italic;
            color: #636363;
            text-align: center;
            text-transform: uppercase;
        }

        .timestamp img {
            display: inline;
            margin-right: 3px;
            margin-bottom: 1px;
        }

        .nav-link.w--current {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php require_once "navbar.php"; ?>
    <div class="content-wrapper w-container">
        <h1 class="page-title">
            <font style="vertical-align: inherit;">
                <font
                    style="vertical-align: inherit; background: linear-gradient(to right,#E20D13, #F0E300, #A4C615, #4363AB,#BE4A94,#E30922);-webkit-background-clip: text;-webkit-text-fill-color: transparent; font-family: sans-serif;">
                    Resellers</font>
            </font>
        </h1>
    </div>
    <div class="w-container">
        <div class="row">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM users,tickets,events WHERE events.ID=tickets.eventid AND tickets.firstownerid=users.id AND tickets.resellstatus=1 AND events.status!= 0  ");
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    $eventid = $row['ID'];
                    $normal = $row['ticketprice'];
                    $vip = $row['vipprice'];
                    $rn=$row['normalcapacity'];
                    $rv=$row['vipcapacity'];
                    $ticket=$row['id'];


                    ?>

                    <div class="col-md-4">

                        <div class="thumb videoThumb">
                            <div class="videoThumbImage">
                                <div class="hover"></div>
                                <div class="playIcon"></div>
                                <img class="elastic img" src="img\events\<?php echo $row['eventimage']; ?>" alt=<?php echo $row['events']; ?>">
                            </div>
                            <div class="title">
                                <?php echo $row['events']; ?>(
                                <?php echo $row['names']; ?>)
                            </div>
                            <div style="color:white;">
                                <?php echo $row['duration'] . ", " . $row['eventdate'] . " | " . $row['venue']; ?>
                                <br><del><?php echo $row['ticketprice'];?>RWF</del>  <?php echo $row['resellprice'];?>RWF  <br>
                            <span>Normal:<?php echo $row['normalsits']." | VIP:".$row['vipsits'];  ?></span>
                                
                            </div> <a href='comfirmresell.php?ticketid=<?php echo $ticket; ?>'><button class="btn btn-primary">
                            BUY 
                            </button></a>
                            
                        </div>
                       

                    </div>
                <?php }
            } ?>


        </div>
    </div>

    </div>

	

    <?php
    if (isset($_SESSION['mail'])) {
        include "modal.php";
    } else {
        include "modal1.php";
    }
    ?>
    <script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        //var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 


        // When the user clicks on <span> (x), close the modal
        function op(eventid,normal,vip,remainingnormal,remainingvip) {
  var normalprice = document.getElementById("normal").innerHTML = normal;
  var vipprice = document.getElementById("vip").innerHTML = vip;
  var eventid = document.getElementById("eventid").innerHTML = eventid;
  var rn = document.getElementById("rn").innerHTML = remainingnormal;
  var rv = document.getElementById("rv").innerHTML = remainingvip;


  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
//   window.location='events.php';
}

</script>
<script type="text/javascript">
  $(document).ready(function(){

var quantitiy=0;
   $('.quantity-right-plus').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
            
            $('#quantity').val(quantity + 1);

            var t=Number(document.getElementById("quantity").value);
            var r=Number(document.getElementById("quantty").value);
            var normal=Number(document.getElementById("normal").textContent);
            var vip=Number(document.getElementById("vip").textContent);

            document.getElementById("myText").value=t*normal+r*vip;

          
            // Increment
        
    });

     $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
      
            // Increment
            if(quantity>0){
            $('#quantity').val(quantity - 1);
            }

            var t=Number(document.getElementById("quantity").value);
            var r=Number(document.getElementById("quantty").value);

            var normal=Number(document.getElementById("normal").textContent);
            var vip=Number(document.getElementById("vip").textContent);
            var rn=Number(document.getElementById("rn").textContent);
            var rv=Number(document.getElementById("rv").textContent);



            document.getElementById("myText").value=t*normal+r*vip;
    });
    
});
</script>

<script type="text/javascript">
  $(document).ready(function(){

var quatiy=0;
   $('.quantity-right-plus1').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quanity = parseInt($('#quantty').val());
        
        // If is not undefined            
           
           $('#quantty').val(quanity + 1);
            var t=Number(document.getElementById("quantity").value);
            var r=Number(document.getElementById("quantty").value);

            var normal=Number(document.getElementById("normal").textContent);
            var vip=Number(document.getElementById("vip").textContent);
            var rn=Number(document.getElementById("rn").textContent);
            var rv=Number(document.getElementById("rv").textContent);

            document.getElementById("myText").value=t*normal+r*vip;

          
            // Increment
        
    });

     $('.quantity-left-minus1').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantty').val());
        
        // If is not undefined
      
            // Increment
            if(quantity>0){
            $('#quantty').val(quantity - 1);
            }
            var t=Number(document.getElementById("quantity").value);
            var r=Number(document.getElementById("quantty").value);

            var normal=Number(document.getElementById("normal").textContent);
            var vip=Number(document.getElementById("vip").textContent);
            document.getElementById("myText").value=t*normal+r*vip;
    });
    
});
</script>
<script>
function che()
{
  var to=Number(document.getElementById("myText").value);
  var normals=Number(document.getElementById("quantity").value);
  var vips=Number(document.getElementById("quantty").value);
  var eventid=Number(document.getElementById("eventid").textContent);


  if(to>0){
    window.location='ticket.php?total='+to+'&normals='+normals+'&vips='+vips+'&eventid='+eventid;
  }
  else{
    alert("Total amount should be greater than 0");
  }
}
</script>
</body>
</html>