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
                  <h5 class="modal-title" style="float: left;">Organizers</h5>
                  <div class="card-tools" style="float: right;">
                  
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#addsector"><i
                        class="fas fa-plus"></i> Add Organizer
                    </button>
                  </div>
                </div>

                <div class="modal fade" id="addsector">
                  <div class="modal-dialog modal-md ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"> Event</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <?php @include("newagent.php"); ?>
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
                        <th>STAFF ID</th>
                        <th>Username</th>
                        <th>F name</th>
                        <th>L name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th></th>
                        <th class="text-center" style="width: 15%;">Action</th>
                      </tr>
                    </thead>
                    <!--  Author Name: UMUKUNZI Elysee
 for any PHP, Codeignitor, Laravel OR Python work contact me at +250789817969 OR elyseeumukunzi@gmail.com  
 Visit website : www.innovatesolutions.com -->
                    <tbody>
                      <?php
                      $role='organizer';
                      $sql = "SELECT * from tbladmin WHERE role=:role";
                      $query = $dbh->prepare($sql);
                      $query->bindParam(':role', $role, PDO::PARAM_STR);
                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);

                      $cnt = 1;
                      if ($query->rowCount() > 0) {
                        foreach ($results as $row) {
                          $status = $row->status;
                          $id = $row->ID; ?>
                          <tr>
                            <td class="text-center">
                              <?php echo htmlentities($cnt); ?>
                            </td>
                            <td class="text-center">
                              <?php echo htmlentities($row->Staffid); ?>
                            </td>
                            <td class="text-center">
                              <?php echo htmlentities($row->UserName); ?>
                            </td>
                            <td class="text-center">
                              <?php echo htmlentities($row->FirstName); ?>
                            </td>
                            <td class="text-center">
                              <?php echo htmlentities($row->LastName); ?>
                            </td>
                            <td class="text-center">
                              <?php echo htmlentities($row->Email); ?>
                            </td>
                            <td class="text-center">
                              <?php echo htmlentities($row->MobileNumber); ?>
                            </td>
                            <td class="font-w600">
                              <?php echo htmlentities($row->enddate); ?>
                            </td>
                            
                            <td class="text-center">
                             
                                    <a href="manage_event.php?delid=<?php echo ($row->ID); ?>"
                                      onclick="return confirm('Do you really want to Delete ?');" class="rounded btn btn-info"><i
                                        class="mdi mdi-eye" aria-hidden="true"></i></a>





                                    <a href="editevent.php?id=<?php echo ($row->ID); ?>" class="rounded btn btn-info"><i
                                        class="mdi mdi-eye" aria-hidden="true"></i></a>

                                    <a href="manage_event.php?delid=<?php echo ($row->ID); ?>"
                                      onclick="return confirm('Do you really want to Delete ?');"
                                      class="rounded btn btn-danger"><i class="mdi mdi-delete" aria-hidden="true"></i></a>


                                    <?php

                                  
                                
                               ?>



                            </td>

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
  <!--  Author Name: UMUKUNZI Elysee
 for any PHP, Codeignitor, Laravel OR Python work contact me at +250789817969 OR elyseeumukunzi@gmail.com  
 Visit website : www.innovatesolutions.com -->

</body>
<!--  Author Name: UMUKUNZI Elysee From Rwanda-Muhanga 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +250789817969OR elyseeumukunzi@gmail.com@gmail.com  
 Visit website : www.innovatesolutions.com -->

</html>