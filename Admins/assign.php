<?php
include('includes/checklogin.php');

check_login();
?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php"); ?>

<body>
  <!--  Author Name: UMUKUNZI Elysee From Rwanda Muhanga  For more php's pythons and relevant project from ideation to prototypes please call +250789817969 -->


    <?php @include("includes/header.php"); ?>

    <div class="container-fluid page-body-wrapper">


      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="modal-header">
                  <h5 class="modal-title" style="float: left;">You can review agents</h5>
                </div>
                <!-- <form method="POST">
                  <div class="modal-header">
                    <div class="row">
                      <div class="col-md-12">
                        <select class="form-control" name="events" required>
                          <option value="">Select agent</option>
                          <?php
                          $sql = "SELECT * from events";
                          $query = $dbh->prepare($sql);
                          $query->execute();
                          $results = $query->fetchAll(PDO::FETCH_OBJ);
                          $cnt = 1;
                          if ($query->rowCount() > 0) {
                            foreach ($results as $row) {
                              $status = $row->status;
                              $id = $row->ID; ?>

                              <option value="<?php echo $row->ID; ?>"> <?php echo $row->events; ?> </option>
                              <?php
                            }
                          } else {
                            echo "<option>No events yet</option>";
                          }
                          ?>

                        </select>
                      </div>
                      <div class="col-md-6"><button class="btn btn-info" name="assign" type="submit">Add</button></div>
                    </div>
                  </div>
                </form>
                <?PHP
                if (isset($_POST['assign'])) {
                  $agentid = $_GET['agentid'];
                  $eventid = $_POST['agentid'];
                  $sql = "INSERT INTO agentasignment (eventid,agentid) values (:eventid,:agentid)";
                  $query = $dbh->prepare($sql);
                  $query->bindParam(':eventid', $eventid, PDO::PARAM_STR);
                  $query->bindParam(':agentid', $agentid, PDO::PARAM_STR);

                  $query->execute();
                }
                ?> -->
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
                        <?php @include("view_newbooking.php"); ?>
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
                        <th>Event</th>
                        <th class="d-none d-sm-table-cell">Event Dates</th>
                        <th class="d-none d-sm-table-cell">Venue</th>
                        <th class="d-none d-sm-table-cell">Asignment Dates</th>
                        <th class="d-none d-sm-table-cell">Organizer</th>
                        <th class=" Text-center" style="width: 15%;">Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      </form>
                      <?php
                      $agentid = $_GET['agentid'];
                      $agents = 'agent';
                      $sql = "SELECT * from events,agentasignment,tbladmin WHERE events.ID=agentasignment.eventid AND agentasignment.agentid=tbladmin.ID AND agentasignment.agentid=:agentid ORDER BY agentasignment.id";
                      $query = $dbh->prepare($sql);
                      $query->bindParam(':agentid', $agentid, PDO::PARAM_STR);
                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);
                      $cnt = 1;
                      foreach ($results as $row) {
                        $organizerid = $row->organizerid;
                        $status = $row->status;
                        $asignmentid = $row->id;
                        ?>
                        <tr>
                          <td class="text-center">
                            <?php echo htmlentities($cnt); ?>
                          </td>
                          <td class="font-w600">
                            <?php echo htmlentities($row->events); ?>
                          </td>
                          <td class="font-w600">
                            <?php echo htmlentities($row->eventdate); ?>
                          </td>
                          <td class="font-w600">
                            <?php echo htmlentities($row->venue); ?>
                          </td>
                          <td class="font-w600">
                            <span class="badge badge-info">
                              <?php echo htmlentities($row->currenttime); ?>
                            </span>
                          </td>

                          <td class="font-w600">
                            <?php
                            $sql = "SELECT FirstName,LastName from tbladmin WHERE ID=:organizerid";
                            $query = $dbh->prepare($sql);
                            $query->bindParam(':organizerid', $organizerid, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);

                            if ($query->rowCount() > 0) {
                              foreach ($results as $row) {
                                $id = $row->ID;
                                echo $row->FirstName . " " . $row->LastNane;

                                ?>


                                <?php
                              }
                            }

                            ?>
                          </td>
                          <td class=" text-center">
                            <?php
                            if ($status == 0) {
                              ?>
                              <a href="assign.php?agentid=<?php echo $agentid; ?>&asignmentid=<?php echo $asignmentid; ?>&action=aprove"
                                title="click to change"><i class="mdi" aria-hidden="true"><img
                                    src="../img/offBlue.png"></i></a>
                              <?php
                            } elseif ($status == 1) { ?>
                              <a href="assign.php?agentid=<?php echo $agentid; ?>&asignmentid=<?php echo $asignmentid; ?>&action=decline"
                                title="click to change"><i class="mdi" aria-hidden="true"><img
                                    src="../img/onBlue.png"></i></a>
                              <?php

                            }
                            ?>
                            <a href="invoice_generating.php?invid=<?php echo htmlentities($row->ID); ?>"
                              class="btn btn-primary rounded"><i class="mdi mdi-printer" aria-hidden="true"></i></a>
                          </td>
                        </tr>
                        <?php
                        $cnt = $cnt + 1;
                      }
                      ?>
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
  


</body>


</html>
<?php
if (!empty($_GET['action'])) {

  $action = $_GET['action'];
  if ($action == 'aprove') {
    $agentid = $_GET['agentid'];
    $asignmentid = $_GET['asignmentid'];
    $status = 1;
    $sql = "UPDATE agentasignment SET status=:status WHERE id=:id";    
    $query = $dbh->prepare($sql);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->bindParam(':id', $asignmentid, PDO::PARAM_STR);
    $query->execute();
    echo "<script>alert('permission granted');window.location='assign.php?agentid=$agentid'</script>";



  } elseif ($action == 'decline') {
    $agentid = $_GET['agentid'];
    $asignmentid = $_GET['asignmentid'];
    $status = 0;
    $sql = "UPDATE agentasignment SET status=:status WHERE id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->bindParam(':id', $asignmentid, PDO::PARAM_STR);
    $query->execute();
    echo "<script>alert('permission denied');window.location='assign.php?agentid=$agentid'</script>";

  }
}


?>