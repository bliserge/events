<?php
include('includes/checklogin.php');
check_login();

if (isset($_POST['submit'])) {
  $bid = $_GET['bookid'];
  $name = $_POST['name'];
  $mobnum = $_POST['contact'];
  $email = $_POST['email'];
  $edate = $_POST['eventdate'];
  $est = $_POST['est'];
  $eetime = $_POST['eetime'];
  $vaddress = $_POST['address'];
  $events = $_POST['events'];
  $addinfo = $_POST['info'];
  $bookingid = mt_rand(100000000, 999999999);
  $sql = "insert into tblbooking(BookingID,ServiceID,Name,MobileNumber,Email,EventDate,EventStartingtime,EventEndingtime,VenueAddress,events,AdditionalInformation)values(:bookingid,:bid,:name,:mobnum,:email,:edate,:est,:eetime,:vaddress,:events,:addinfo)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':bookingid', $bookingid, PDO::PARAM_STR);
  $query->bindParam(':bid', $bid, PDO::PARAM_STR);
  $query->bindParam(':name', $name, PDO::PARAM_STR);
  $query->bindParam(':mobnum', $mobnum, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':edate', $edate, PDO::PARAM_STR);
  $query->bindParam(':est', $est, PDO::PARAM_STR);
  $query->bindParam(':eetime', $eetime, PDO::PARAM_STR);
  $query->bindParam(':vaddress', $vaddress, PDO::PARAM_STR);
  $query->bindParam(':events', $events, PDO::PARAM_STR);
  $query->bindParam(':addinfo', $addinfo, PDO::PARAM_STR);

  $query->execute();
  $LastInsertId = $dbh->lastInsertId();
  if ($LastInsertId > 0) {
    echo '<script>alert("Booking Request Has Been added.")</script>';
    echo "<script>window.location.href ='new_bookings.php'</script>";
  } else {
    echo '<script>alert("Something Went Wrong. Please try again")</script>';
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php"); ?>

<body>
  <!--  Author Name: UMUKUNZI Elysee From Rwanda-Muhanga 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +250789817969OR elyseeumukunzi@gmail.com@gmail.com  
 Visit website : www.innovatesolutions.com -->
  <div class="container-scroller">

    <?php @include("includes/header.php"); ?>

    <div class="container-fluid page-body-wrapper">


      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="modal-header">
                  <h5 class="modal-title" style="float: left;">New Tickets Bookings</h5>
                  <div class="card-tools" style="float: right;">
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#AddData4"><i
                        class="fas fa-plus"></i> Add Bookings
                    </button>
                  </div>
                </div>




                <div id="AddData4" class="modal fade">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">


                        <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="label" for="name">Full Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="label" for="email">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="label" for="name">Contact No</label>
                                <input type="text" class="form-control" name="contact" id="contact"
                                  placeholder="contact">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="label" for="email">Event Date</label>
                                <input type="date" class="form-control" name="eventdate" id="eventdate" placeholder="">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="label" for="name">Event Starting Time</label>
                                <select type="text" class="form-control" name="est" required="true">
                                  <option value="">Select Starting Time</option>
                                  <option value="1 a.m">1 a.m</option>
                                  <option value="2 a.m">2 a.m</option>
                                  <option value="3 a.m">3 a.m</option>
                                  <option value="4 a.m">4 a.m</option>
                                  <option value="5 a.m">5 a.m</option>
                                  <option value="6 a.m">6 a.m</option>
                                  <option value="7 a.m">7 a.m</option>
                                  <option value="8 a.m">8 a.m"</option>
                                  <option value="9 a.m">9 a.m</option>
                                  <option value="10 a.m">10 a.m</option>
                                  <option value="11 a.m">11 a.m</option>
                                  <option value="12 p.m">12 p.m</option>
                                  <option value="1 p.m">1 p.m</option>
                                  <option value="2 p.m">2 p.m</option>
                                  <option value="3 p.m">3 p.m</option>
                                  <option value="4 p.m">4 p.m</option>
                                  <option value="5 p.m">5 p.m</option>
                                  <option value="6 p.m">6 p.m</option>
                                  <option value="7 p.m">7 p.m</option>
                                  <option value="8 p.m">8 p.m</option>
                                  <option value="9 p.m">9 p.m</option>
                                  <option value="10 p.m">10 p.m</option>
                                  <option value="10 p.m">10 p.m</option>
                                  <option value="12 a.m">12 a.m</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="label" for="email">Event Finish Time</label>
                                <select type="text" class="form-control" name="eetime" required="true">
                                  <option value="">Select Finish Time</option>
                                  <option value="1 a.m">1 a.m</option>
                                  <option value="2 a.m">2 a.m</option>
                                  <option value="3 a.m">3 a.m</option>
                                  <option value="4 a.m">4 a.m</option>
                                  <option value="5 a.m">5 a.m</option>
                                  <option value="6 a.m">6 a.m</option>
                                  <option value="7 a.m">7 a.m</option>
                                  <option value="8 a.m">8 a.m"</option>
                                  <option value="9 a.m">9 a.m</option>
                                  <option value="10 a.m">10 a.m</option>
                                  <option value="11 a.m">11 a.m</option>
                                  <option value="12 p.m">12 p.m</option>
                                  <option value="1 p.m">1 p.m</option>
                                  <option value="2 p.m">2 p.m</option>
                                  <option value="3 p.m">3 p.m</option>
                                  <option value="4 p.m">4 p.m</option>
                                  <option value="5 p.m">5 p.m</option>
                                  <option value="6 p.m">6 p.m</option>
                                  <option value="7 p.m">7 p.m</option>
                                  <option value="8 p.m">8 p.m</option>
                                  <option value="9 p.m">9 p.m</option>
                                  <option value="10 p.m">10 p.m</option>
                                  <option value="10 p.m">10 p.m</option>
                                  <option value="12 a.m">12 a.m</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="label" for="#">Venue Address</label>
                                <textarea name="address" class="form-control" id="address" cols="30" rows="4"
                                  placeholder=""></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="label" for="subject">Type of Event:</label>
                                <select type="text" class="form-control" name="events" required="true">
                                  <option value="">Choose Event Type</option>
                                  <?php

                                  $sql2 = "SELECT * from   events ";
                                  $query2 = $dbh->prepare($sql2);
                                  $query2->execute();
                                  $result2 = $query2->fetchAll(PDO::FETCH_OBJ);

                                  foreach ($result2 as $row) {
                                    ?>
                                    <option value="<?php echo htmlentities($row->events); ?>"><?php echo htmlentities($row->events); ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="label" for="#">Additional Information</label>
                                <textarea name="info" class="form-control" id="info" cols="30" rows="4"
                                  placeholder=""></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <input type="submit" value="Book" name="submit" class="btn btn-sm btn-info">
                                <div class="submitting"></div>
                              </div>
                            </div>
                          </div>
                        </form>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" id="info_update4">
                        <?php @include("view_newbooking.php"); ?>
                      </div>


                    </div>

                  </div>

                </div>

                <div id="newbid_action" class="modal fade">
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Take Action</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" id="info_update2">
                        <?php @include("newbooking_action.php"); ?>
                      </div>
                      <div class="modal-footer ">

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


        <?php @include("includes/footer.php"); ?>

      </div>

    </div>

  </div>

  <?php @include("includes/foot.php"); ?>
  <!--  Author Name: UMUKUNZI Elysee From Rwanda-Muhanga 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +250789817969OR elyseeumukunzi@gmail.com@gmail.com  
 Visit website : www.innovatesolutions.com -->

  <script type="text/javascript">
    $(document).ready(function () {
      $(document).on('click', '.edit_data4', function () {
        var edit_id4 = $(this).attr('id');
        $.ajax({
          url: "view_newbookings.php",
          type: "post",
          data: { edit_id4: edit_id4 },
          success: function (data) {
            $("#info_update4").html(data);
            $("#editData4").modal('show');
          }
        });
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
      $(document).on('click', '.edit_data2', function () {
        var edit_id2 = $(this).attr('id');
        $.ajax({
          url: "newbooking_action.php",
          type: "post",
          data: { edit_id2: edit_id2 },
          success: function (data) {
            $("#info_update2").html(data);
            $("#newbid_action").modal('show');
          }
        });
      });
    });
  </script>
</body>
<!--  Author Name: UMUKUNZI Elysee From Rwanda-Muhanga 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +250789817969OR elyseeumukunzi@gmail.com@gmail.com  
 Visit website : www.innovatesolutions.com -->

</html>