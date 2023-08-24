<?php 
include('includes/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body>
<!--  Author Name: UMUKUNZI Elysee From Rwanda-Muhanga 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +250789817969OR elyseeumukunzi@gmail.com@gmail.com  
 Visit website : www.innovatesolutions.com -->
  <div class="container-scroller">
    
    <?php @include("includes/header.php");?>
    
    <div class="container-fluid page-body-wrapper">
      
      
      <div class="main-panel"><br>
<!--         <strong style="color: red; background-color: white; margin-left: 100px;">
                Alert : Don't Sale or Publish this script with your name. However you can use it for Academic Practice !</strong> -->
        <div class="content-wrapper">


          <div class="row" >
          <?php
          //filter dashboard items by admins role

        $aid = $_SESSION['odmsaid'];
        $sql = "SELECT * from  tbladmin where ID=:aid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':aid', $aid, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt = 1;
          foreach ($results as $row) {
            $role=$row->role;
          }
            if ($role == "admin") {
              ?>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white"style="height: 130px;">
                <div class="card-body" >
                  <h4 class="font-weight-normal mb-3">Total New Tickets 
                  </h4>
                  <?php 
                  $sql ="SELECT ID from tblbooking where Status is null ";
                  $query = $dbh -> prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $totalnewbooking=$query->rowCount();
                  ?>
                  <h2 class="mb-5"><?php echo htmlentities($totalnewbooking);?></h2>
                </div>
              </div>
            </div>           
            <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-warning card-img-holder text-white"style="height: 130px;">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Total Approved Tickets
                  </h4>
                  <?php 
                  $sql ="SELECT ID from tblbooking where Status='Approved' ";
                  $query = $dbh -> prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $totalappbooking=$query->rowCount();
                  ?> 
                  <h2 class="mb-5"><?php echo htmlentities($totalappbooking);?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-primary  card-img-holder text-white"style="height: 130px;">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Total Cancelled Tickets <?php  echo @$role; ?>
                  </h4>
                  <?php 
                  $sql ="SELECT ID from tblbooking where Status='Cancelled' ";
                  $query = $dbh -> prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $totalcanbooking=$query->rowCount();
                  ?>
                  <h2 class="mb-5"><?php echo htmlentities($totalcanbooking);?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white"style="height: 130px;">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Total Events 
                  </h4>
                  <?php 
                  $sql ="SELECT ID from events";
                  $query = $dbh -> prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $totalserv=$query->rowCount();
                  ?>
                  <h2 class="mb-5"><?php echo htmlentities($totalserv);?></h2>
                </div>
              </div>
            </div>
            </div>
            </div>
            <?php } 
            elseif($role== 'organizer' ){
              ?>
               <div class="col-md-6">
              <div class="row">
                <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white"style="height: 130px;">
                <div class="card-body" >
                  <h4 class="font-weight-normal mb-3">Total New Tickets 
                  </h4>
                  <?php 
                  $sql ="SELECT ID from tblbooking where Status is null ";
                  $query = $dbh -> prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $totalnewbooking=$query->rowCount();
                  ?>
                  <h2 class="mb-5"><?php echo htmlentities($totalnewbooking);?></h2>
                </div>
              </div>
            </div>           
            <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-warning card-img-holder text-white"style="height: 130px;">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Total Approved Tickets
                  </h4>
                  <?php 
                  $sql ="SELECT ID from tblbooking where Status='Approved' ";
                  $query = $dbh -> prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $totalappbooking=$query->rowCount();
                  ?> 
                  <h2 class="mb-5"><?php echo htmlentities($totalappbooking);?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-primary  card-img-holder text-white"style="height: 130px;">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Total Cancelled Tickets <?php  echo @$role; ?>
                  </h4>
                  <?php 
                  $sql ="SELECT ID from tblbooking where Status='Cancelled' ";
                  $query = $dbh -> prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $totalcanbooking=$query->rowCount();
                  ?>
                  <h2 class="mb-5"><?php echo htmlentities($totalcanbooking);?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white"style="height: 130px;">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Total Events 
                  </h4>
                  <?php 
                  $sql ="SELECT ID from events";
                  $query = $dbh -> prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $totalserv=$query->rowCount();
                  ?>
                  <h2 class="mb-5"><?php echo htmlentities($totalserv);?></h2>
                </div>
              </div>
            </div>
            </div>
            </div>

              <?php
            }
            elseif($role== 'agent' ){
              ?>
               <div class="col-md-6">
              <div class="row">
                <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white"style="height: 130px;">
                <div class="card-body" >
                  <h4 class="font-weight-normal mb-3">Total New Tickets 
                  </h4>
                  <?php 
                  $sql ="SELECT ID from tblbooking where Status is null ";
                  $query = $dbh -> prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $totalnewbooking=$query->rowCount();
                  ?>
                  <h2 class="mb-5"><?php echo htmlentities($totalnewbooking);?></h2>
                </div>
              </div>
            </div>           
            <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-warning card-img-holder text-white"style="height: 130px;">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Total Approved Tickets
                  </h4>
                  <?php 
                  $sql ="SELECT ID from tblbooking where Status='Approved' ";
                  $query = $dbh -> prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $totalappbooking=$query->rowCount();
                  ?> 
                  <h2 class="mb-5"><?php echo htmlentities($totalappbooking);?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-primary  card-img-holder text-white"style="height: 130px;">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Total Cancelled Tickets <?php  echo @$role; ?>
                  </h4>
                  <?php 
                  $sql ="SELECT ID from tblbooking where Status='Cancelled' ";
                  $query = $dbh -> prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $totalcanbooking=$query->rowCount();
                  ?>
                  <h2 class="mb-5"><?php echo htmlentities($totalcanbooking);?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white"style="height: 130px;">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Total Events asigned on me
                  </h4>
                  <?php 
                  $sql ="SELECT ID from events";
                  $query = $dbh -> prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $totalserv=$query->rowCount();
                  ?>
                  <h2 class="mb-5"><?php echo htmlentities($totalserv);?></h2>
                </div>
              </div>
            </div>
            </div>
            </div>

              <?php
            }
            ?>


            <div class="col-md-6">
               <div id="piechart" style="width:100%; height: 300px;"></div>
            </div>
                     <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="modal-header">
                  <h5 class="modal-title" style="float: left;">New Tickets</h5>
                </div>

                
              
              <div id="editData4" class="modal fade">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">View Booking details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" id="info_update4">
                     <?php @include("view_newbookings.php");?>
                   </div>
                   <div class="modal-footer ">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
                  
                </div>
                
              </div>
              
            </div>
            
            <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead>
                      <tr>
                        <th class="text-center"></th>
                        <th>Event Name</th>
                        <th class="d-none d-sm-table-cell">Cutomer Name</th>
                        <th class="d-none d-sm-table-cell">Total Paid</th>
                        <th class="d-none d-sm-table-cell">Paid Number</th>
                        <th class="d-none d-sm-table-cell">Holder's name</th>
                        <th class=" Text-center" style="width: 15%;">Action</th>
                      </tr>
                    </thead>
                    <!--  Author Name: UMUKUNZI Elysee
 for any PHP, Codeignitor, Laravel OR Python work contact me at +250789817969 OR elyseeumukunzi@gmail.com  
 Visit website : www.innovatesolutions.com -->
                    <tbody>
                      <?php
                      $aid = $_SESSION['odmsaid'];
                      $sql = "SELECT * from  tbladmin where ID=:aid";
                      $query = $dbh->prepare($sql);
                      $query->bindParam(':aid', $aid, PDO::PARAM_STR);
                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);
                      $cnt = 1;
                      foreach ($results as $row) {
                        $role = $row->role;
                      }
                      if ($role == "agent") {
                        //events,agentasignment,users,tickets,payments,tbladmin WHERE agentasignment.eventid=events.ID AND agentasignment.agentid=:agentid  AND payments.ticketid = tickets.id AND payments.userid=users.id AND tbladmin.ID=agentasignment.agentid AND agentasignment.agentid=tbladmin.ID 
                        //$sql = "SELECT * FROM events,tickets,payments,agentasignment WHERE events.ID=tickets.eventid AND tickets.id=payments.ticketid AND events.ID=agentasignment.eventid";
                        //$sql = "SELECT * FROM events,agentasignment,users,tickets,payments,tbladmin WHERE tbladmin.ID=agentasignment.agentid AND agentasignment.eventid=events.ID AND agentasignment.agentid=:agentid  AND payments.ticketid = tickets.id AND payments.userid=users.id AND payments.userid=users.id";
                        

                        $sql = "SELECT * FROM agentasignment,payments,tickets,events,users WHERE tickets.FIRSTOWNERID=users.id AND events.ID=agentasignment.eventid AND tickets.id=payments.ticketid AND agentasignment.agentid=:agentid AND tickets.resellstatus!=1 AND tickets.secondpaymentstatus!=1 AND payments.trans_status != 1";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':agentid', $aid, PDO::PARAM_STR);
                      } elseif($role=='organizer') {

                        $sql = "SELECT * FROM payments,tickets,events,users WHERE tickets.firstownerid=users.id AND tickets.id=payments.ticketid AND tickets.firstownerid=users.id AND events.organizerid=:organizer AND events.ID=tickets.eventid AND payments.trans_status != 1";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':organizer', $aid, PDO::PARAM_STR);

                      }
                      elseif($role=='admin') {

                        $sql = "SELECT * FROM payments,tickets,events,users WHERE tickets.firstownerid=users.id AND tickets.id=payments.ticketid AND tickets.firstownerid=users.id AND events.ID=tickets.eventid AND payments.trans_status != 1";
                        $query = $dbh->prepare($sql);
                      }
                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);

                      $cnt = 1;
                      if ($query->rowCount() > 0) {
                        foreach ($results as $rows) { $resellstatus=$rows->resellstatus; $secondpaymentstatus=$rows->secondpaymentstatus; ?>
                          <tr>
                            <td class="text-center">
                              <?php echo htmlentities($cnt); ?>
                            </td>
                            <td class="font-w600">
                              <?php echo htmlentities($rows->events); ?>
                            </td>
                            <td class="font-w600">
                              <?php echo htmlentities($rows->names); ?>
                            </td>
                            <td class="font-w600">
                              <?php echo htmlentities($rows->amount); ?>
                            </td>
                            <td class="font-w600">
                              <?php echo htmlentities($rows->paid_phone); ?>
                            </td>
                            <td class="font-w600">
                              <span class="badge badge-info">
                                <?php echo htmlentities($rows->holdername); ?>
                              </span>
                            </td>
                            <?php if($rows->trans_status != '1') { ?>
                              <td class="d-none d-sm-table-cell">
                                <span>
                                <a href="aprove.php?paymentid=<?php echo $rows->pid; ?>&action=aprovepayment"><img
                                          src="../img/offBlue.png"></a>
                                </span>
                              </td>
                              <?php
                            }
                            ?>
                          </tr>
                          <?php
                          $cnt = $cnt + 1;
                        }
                      } ?>
                    </tbody>
                  </table>
                </div>

        </div>
      </div>
          </div>
        </div>
        
        
        <?php @include("includes/footer.php");?>
        
      </div>
      
    </div>
    
  </div>
  
  <?php @include("includes/foot.php");?>
<!--  Author Name: UMUKUNZI Elysee From Rwanda-Muhanga 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +250789817969OR elyseeumukunzi@gmail.com@gmail.com  
 Visit website : www.innovatesolutions.com -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Event', 'Total number'],
          ['Concerts',     4],
          ['Party DJ',      0],
          ['Festivals',  2],
          ['Gospel cencerts', 2],
          ['Fashion Model',    1]
        ]);

        var options = {
          title: 'Demanding Services'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</body>
<!--  Author Name: UMUKUNZI Elysee From Rwanda-Muhanga 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +250789817969OR elyseeumukunzi@gmail.com@gmail.com  
 Visit website : www.innovatesolutions.com -->
</html>


