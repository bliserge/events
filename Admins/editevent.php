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
                                <div class="modal-header ">
                                    <form method="POST" class="form-vertical">
                                        Assign agent to this event
                                        <?php
                                        $eventid = $_GET['id'];
                                        $agents = 'agent';
                                        $sql = "SELECT * from events,agentasignment,tbladmin WHERE events.ID=agentasignment.eventid AND agentasignment.agentid=tbladmin.ID AND events.ID=:eventid";
                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':eventid', $eventid, PDO::PARAM_STR);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;

                                        foreach ($results as $row) {
                                            $category = $row->id; ?>
                                            <span class="badge badge-info badge-sm">
                                                <?php echo $row->UserName; ?>
                                            </span>


                                        <?php } ?>
                                        <br><br>


                                        <div class="card-tools row">

                                            <select class="form-control col-md-6" name="agentid">
                                                <?php
                                                $eventid = $_GET['id'];
                                                $agents = 'agent';
                                                $sql = "SELECT * from tbladmin WHERE role=:agents";
                                                $query = $dbh->prepare($sql);
                                                $query->bindParam(':agents', $agents, PDO::PARAM_STR);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;

                                                foreach ($results as $row) {
                                                    $category = $row->id; ?>
                                                    <option value="<?php echo $row->ID; ?>"><?php echo $row->UserName; ?>
                                                    </option>

                                                <?php } ?>
                                            </select>
                                            <button type="submit" class="btn btn-sm btn-info col-md-6" name="assign"
                                                data-target="#addsector"><i class="fas fa-plus"></i> Asign
                                            </button>
                                    </form>

                                    <?PHP
                                    if (isset($_POST['assign'])) {
                                        $eventid = $_GET['id'];
                                        $agentid = $_POST['agentid'];
                                        $sql = "INSERT INTO agentasignment (eventid,agentid) values (:eventid,:agentid)";
                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':eventid', $eventid, PDO::PARAM_STR);
                                        $query->bindParam(':agentid', $agentid, PDO::PARAM_STR);
                                        $query->execute();
                                        $profile = $row->eventimage;
                                        echo "<script>window.location='editevent.php?id=$eventid'</script>";
                                    }
                                    ?>
                                </div>
                            </div>

                            <?php
                            $eventid = $_GET['id'];
                            $sql = "SELECT * from events WHERE ID=:eventid";
                            $query = $dbh->prepare($sql);
                            $query->bindParam(':eventid', $eventid, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;

                            foreach ($results as $row) {
                                $currentimage=$row->eventimage;
                                $category = $row->id; ?>
                                <form class="forms-sample" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Event Type</label>
                                        <select class="form-control" required name="category">
                                            <?php

                                            $sql = "SELECT * from eventcategories";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);

                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $roww) { ?>
                                                    <option value="<?php echo $roww->id; ?>"><?php echo $roww->category; ?>
                                                    </option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Event Name</label>
                                        <input type="text" name="event" class="form-control" id="eventname"
                                            placeholder="Event Name" value="<?php echo $row->events; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Venue</label>
                                        <input type="text" name="venue" class="form-control" id="servicename"
                                            placeholder="Event place" value="<?php echo $row->venue; ?>" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Actual Dates
                                                </label>
                                                <input type="date" name="dates" class="form-control" id="open"
                                                    placeholder="Event Dates" value="<?php echo $row->eventdate; ?>"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Hours:
                                                </label>
                                                <input type="time" name="hours" class="form-control" id="open"
                                                    placeholder="Event hours" value="<?php echo $row->duration; ?>">
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Booking closed:

                                                </label>
                                                <input type="date" name="closed" class="form-control" id="closed"
                                                    placeholder="Closing booking" value="<?php echo $row->enddate; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Ticket Price</label>
                                                <input type="text" name="price" class="form-control" id="closed"
                                                    placeholder="Pricee in RWF" value="<?php echo $row->ticketprice; ?>"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputName1">VIP Price</label>
                                                <input type="text" name="pricevip" class="form-control" id="closed"
                                                    placeholder="Pricee in RWF" value="<?php echo $row->vipprice; ?>"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Change Image</label>
                                        <input type="file" name="image" class="form-control" id="image">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Normal sits</label>
                                                <input type="text" name="capacity" class="form-control" id="closed"
                                                    placeholder="available sits" value="<?php echo $row->normalcapacity; ?>"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputName1">VIPs</label>
                                                <input type="text" name="capacityvip" class="form-control" id="closed"
                                                    placeholder="Available sits" value="<?php echo $row->vipcapacity; ?>"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Event Description</label>
                                        <textarea class="form-control" name="desc" id="servicedes" rows="4"
                                            required><?php echo $row->description; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Tags</label> *separate tags with # sign
                                        <input type="text" name="tags" class="form-control" id="closed"
                                            placeholder="Service Name" value="<?php echo $row->tags; ?>">
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-primary btn-fw mr-2">Submit</button>
                                </form>
                            <?php }

                            //updating events data
                            if (isset($_POST['submit'])) {
                                $event = $_POST['event'];
                                $category = $_POST['category'];
                                $name = $_POST['name'];
                                $place = $_POST['venue'];
                                $actualdates = $_POST['dates'];
                                $eventid = $_GET['id'];
                                $actualdates = $_POST['dates'];
                                $duration = $_POST['hours'];
                                $desc = $_POST['desc'];
                                $price = $_POST['price'];
                                $pricevip = $_POST['pricevip'];
                                $capacity = $_POST['capacity'];
                                $vipcapacity = $_POST['capacityvip'];
                                $tags = $_POST['tags'];
                                $image = "event3.pjg";
                                $desc = $_POST['desc'];
                                $organizer = $_SESSION['odmsaid'];
                                $status = 0;
                                $closed = $_POST['closed'];
                                $eventimage = $_FILES["image"]["name"];
                                if (empty($eventimage)) {
                                   $eventimage=$currentimage;

                                } else {
                                    move_uploaded_file($_FILES["image"]["tmp_name"], "../img/events/" . $_FILES["image"]["name"]);

                                }

                                $sql = "UPDATE events SET events=:event,normalcapacity=:normalcapacity,vipcapacity=:vipcapacity,ticketprice=:normalprice,vipprice=:vip,eventdate=:eventdate,enddate=:closedate,venue=:venue,description=:desc,eventimage=:eventimage,duration=:duration,tags=:tags WHERE ID=:eventid";

                                $query = $dbh->prepare($sql);
                                $query->bindParam(':event', $event, PDO::PARAM_STR);
                                $query->bindParam(':normalcapacity', $capacity, PDO::PARAM_STR);
                                $query->bindParam(':vipcapacity', $vipcapacity, PDO::PARAM_STR);
                                $query->bindParam(':normalprice', $price, PDO::PARAM_STR);
                                $query->bindParam(':vip', $pricevip, PDO::PARAM_STR);
                                $query->bindParam(':eventdate', $actualdates, PDO::PARAM_STR);
                                $query->bindParam(':closedate', $closed, PDO::PARAM_STR);
                                $query->bindParam(':venue', $place, PDO::PARAM_STR);
                                $query->bindParam(':desc', $desc, PDO::PARAM_STR);
                                $query->bindParam(':eventimage', $eventimage, PDO::PARAM_STR);
                                $query->bindParam(':duration', $duration, PDO::PARAM_STR);
                                $query->bindParam(':tags', $tags, PDO::PARAM_STR);
                                $query->bindParam(':eventid', $eventid, PDO::PARAM_STR);

                                $query->execute();
                               
                                    echo "<script>alert('Event update sucessfully');window.location='manage_event.php'</script>";
                                
                            }

                            ?>

                        </div>
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