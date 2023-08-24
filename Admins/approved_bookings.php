<?php
include('includes/checklogin.php');
check_login();
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
                  <h5 class="modal-title" style="float: left;">Approved tickets</h5>
                  <!-- <form method="POST" class="form-group">
                    <select class="form-control" name="event">
                      <option>Filer by Events</option>
                      <?php
                      $agentid = $_SESSION['odmsaid'];
                      $agents = 'agent';
                      $sql = "SELECT * from events,agentasignment WHERE events.ID=agentasignment.eventid AND agentasignment.agentid=:agentid";
                      $query = $dbh->prepare($sql);
                      $query->bindParam(':agentid', $agentid, PDO::PARAM_STR);
                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);
                      $cnt = 1;

                      foreach ($results as $row) {
                        $category = $row->id; ?>
                        <option value="<?php echo $row->ID; ?>"><?php echo $row->events; ?></option>
                        </span>


                      <?php } ?>

                    </select>
                    <button class="btn btn-info" type="submit" name='filter'>Filter</button>
                  </form> -->
                  <?php
                  if (isset($_POST['filter'])) {
                    $eventid = $_POST['event'];
                    echo "<script>window.location='approved_bookings.php?filter=$eventid'</script>";
                  }

                  ?>



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
                        <?php @include("view_newbookings.php"); ?>
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
                      $total=0;
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
                      

                        $sql = "SELECT * FROM agentasignment,payments,tickets,events,users WHERE tickets.firstownerid=users.id AND events.ID=agentasignment.eventid AND tickets.id=payments.ticketid AND agentasignment.agentid=:agentid AND payments.trans_status != 0";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':agentid', $aid, PDO::PARAM_STR);
                      } elseif ($role == 'organizer') {

                        $sql = "SELECT * FROM payments,tickets,events,users WHERE tickets.firstownerid=users.id AND tickets.id=payments.ticketid AND tickets.firstownerid=users.id AND events.organizerid=:organizer AND events.ID=tickets.eventid AND payments.trans_status != 0";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':organizer', $aid, PDO::PARAM_STR);

                      } elseif ($role == 'admin') {

                        $sql = "SELECT * FROM payments,tickets,events,users WHERE tickets.firstownerid=users.id AND tickets.id=payments.ticketid AND tickets.firstownerid=users.id AND  events.ID=tickets.eventid AND payments.trans_status != 0";
                        $query = $dbh->prepare($sql);
                      }
                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);

                      $cnt = 1;
                      if ($query->rowCount() > 0) {
                        foreach ($results as $rows) {
                          $resellstatus = $rows->resellstatus;
                          $secondpaymentstatus = $rows->secondpaymentstatus;
                          $total=$total + $rows->amount;
                          ?>
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

                            <td class="d-none d-sm-table-cell">
                              <span>
                                <a href="../finalticket.php?ticketid=<?php echo htmlentities($rows->ticketid); ?>"
                                  target="blank" class="btn btn-primary rounded"><i class="mdi mdi-printer"
                                    aria-hidden="true"></i></a>
                              </span>
                            </td>
                            <?php

                            ?>
                          </tr>
                          <?php
                          $cnt = $cnt + 1;
                        } ?>
                        <tfooter>
                          <tr>

                            <th>Totals</th>
                            <td class="d-none d-sm-table-cell"></td>
                            <td class="d-none d-sm-table-cell"></td>
                            <td class="d-none d-sm-table-cell">
                              <?php echo $total; ?>
                            </td>
                            <td class="d-none d-sm-table-cell"></td>
                            <td class=" Text-center" style="width: 15%;"></td>
                          </tr>
                        </tfooter>
                        <?php
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
</body>
<!--  Author Name: UMUKUNZI Elysee From Rwanda-Muhanga 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +250789817969OR elyseeumukunzi@gmail.com@gmail.com  
 Visit website : www.innovatesolutions.com -->

</html>