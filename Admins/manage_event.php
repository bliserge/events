<?php
include('includes/checklogin.php');
check_login();
// Code for deleting product from cart
if (isset($_GET['delid'])) {
  $rid = intval($_GET['delid']);
  $sql = "delete from events where ID=:rid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':rid', $rid, PDO::PARAM_STR);
  $query->execute();
  echo "<script>alert('Data deleted');</script>";
  echo "<script>window.location.href = 'manage_event.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php"); ?>

<body>
  <!--  Author Name: UMUKUNZI Elysee
 for any PHP, Codeignitor, Laravel OR Python work contact me at +250789817969 OR elyseeumukunzi@gmail.com  
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
                  <h5 class="modal-title" style="float: left;">Event registry</h5>
                  <div class="card-tools" style="float: right;">
                  <?php
                      $total = 0;
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
                      if($role=='admin')
                      {
                        ?>
                          <a href="manage_categories.php"><button type="button" class="btn btn-sm btn-info"
                        data-toggle="modal" data-target="#addsector"><i class="fas fa-plus"></i>Event categories
                      </button> </a>

                        <?php
                      }
                      else{ }
                      ?>

                  
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#addsector"><i
                        class="fas fa-plus"></i> Add Event
                    </button>
                  </div>
                </div>

                <div class="modal fade" id="addsector">
                  <div class="modal-dialog modal-md ">
                    <div class="modal-content">


                      <div class="modal-header">
                        <h4 class="modal-title">Register Event</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <?php @include("newevent.php"); ?>
                      </div>
                      <div class="modal-footer ">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      </div>
                    </div>

                  </div>

                </div>

                <div class="card-body table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead>
                      <tr>
                        <th class="text-center">No.</th>
                        <th>Event Name</th>
                        <th>Sitting capacity<br> NM | VIP</th>
                        <th>Venue</th>
                        <th>Price</th>
                        <th>Actual Dates</th>
                        <th>Hours</th>
                        <th>Booking deadline</th>
                        <th></th>
                        <th class="text-center" style="width: 15%;">Action</th>
                      </tr>
                    </thead>
                    <!--  Author Name: UMUKUNZI Elysee
 for any PHP, Codeignitor, Laravel OR Python work contact me at +250789817969 OR elyseeumukunzi@gmail.com  
 Visit website : www.innovatesolutions.com -->
                    <tbody>
                      <?php
                      if ($role == "admin") {
                        $sql = "SELECT * from events";
                        $query = $dbh->prepare($sql);
                      } elseif ($role == 'organizer') {
                        $sql = "SELECT * from events WHERE organizerid=:organizer ";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':organizer', $aid, PDO::PARAM_STR);

                      }

                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);
                      $i = 0;
                      if ($query->rowCount() > 0) {
                        foreach ($results as $row) {
                          $i++;
                          $status = $row->status;
                          $id = $row->ID; ?>
                          <tr>
                            <td class="text-center">
                              <?php echo htmlentities($i); ?>
                            </td>
                            <td class="text-center">
                              <?php echo htmlentities($row->events); ?>
                            </td>
                            <td class="text-center">
                              <?php echo htmlentities($row->normalcapacity); ?>
                              <?php echo htmlentities($row->vipcapacity); ?> |
                            </td>
                            <td class="text-center">
                              <?php echo htmlentities($row->venue); ?>
                            </td>
                            <td class="text-center">
                              <?php echo htmlentities($row->ticketprice); ?>
                            </td>
                            <td class="text-center">
                              <?php echo htmlentities($row->eventdate); ?>
                            </td>
                            <td class="text-center">
                              <?php echo htmlentities($row->duration); ?>
                            </td>
                            <td class="font-w600">
                              <?php echo htmlentities($row->enddate); ?>
                            </td>
                            <td class="d-none d-sm-table-cell">
                              <?php echo htmlentities($row->CreationDate); ?>
                            </td>
                            <td class="text-center">
                              <?php
                              $aid = $_SESSION['odmsaid'];
                              $sql = "SELECT * from  tbladmin where ID=:aid";
                              $query = $dbh->prepare($sql);
                              $query->bindParam(':aid', $aid, PDO::PARAM_STR);
                              $query->execute();
                              $results = $query->fetchAll(PDO::FETCH_OBJ);
                              $cnt = 1;
                              if ($query->rowCount() > 0) {
                                foreach ($results as $row) {
                                  if ($row->role == "admin") {
                                    if ($status == 1) {
                                      ?>
                                      <a href="aprove.php?eventid=<?php echo $id; ?>&action=decline"><img
                                          src="../img/onBlue.png"></a>


                                      <?php
                                    } else {
                                      ?>
                                      <a href="aprove.php?eventid=<?php echo $id; ?>&action=aprove"><img
                                          src="../img/offBlue.png"></a>
                                      <?php
                                    }
                                    ?>





                                    <?php
                                  }
                                    ?>
                                    <a href="editevent.php?id=<?php echo $id; ?>" class="rounded btn btn-info"><i
                                        class="mdi mdi-eye" aria-hidden="true"></i></a>

                                    <a href="manage_event.php?delid=<?php echo ($row->ID); ?>"
                                      onclick="return confirm('Do you really want to Delete ?');"
                                      class="rounded btn btn-danger"><i class="mdi mdi-delete" aria-hidden="true"></i></a>


                                    <?php


                                    $cnt++;
                                  
                                }
                              } ?>



                            </td>

                          </tr>
                          <?php
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
  <!--  Author Name: UMUKUNZI Elysee
 for any PHP, Codeignitor, Laravel OR Python work contact me at +250789817969 OR elyseeumukunzi@gmail.com  
 Visit website : www.innovatesolutions.com -->

</body>
<!--  Author Name: UMUKUNZI Elysee From Rwanda-Muhanga 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +250789817969OR elyseeumukunzi@gmail.com@gmail.com  
 Visit website : www.innovatesolutions.com -->

</html>