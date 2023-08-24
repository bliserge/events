<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_POST['submit'])) {
  $event = $_POST['event'];
  $category = $_POST['category'];
  $name = $_POST['name'];
  $place = $_POST['venue'];
  $actualdates = $_POST['dates'];
  $hours = $_POST['hours'];
  $closed = $_POST['close'];
  $price = $_POST['price'];
  $pricevip = $_POST['pricevip'];  
  $capacity = $_POST['capacity'];
  $vipcapacity = $_POST['capacityvip'];
  $tags = $_POST['tags'];
  $image="event3.pjg";
  $desc=$_POST['desc'];
  $organizer=$_SESSION['odmsaid'];
  $status=1;
  $eventimage=$_FILES["image"]["name"];
  move_uploaded_file($_FILES["image"]["tmp_name"],"../img/events/".$_FILES["image"]["name"]);
  $sql = "insert into events(events,organizerid,normalcapacity,vipcapacity,ticketprice,vipprice,eventdate,enddate,categoryid,venue,description,eventimage,duration,tags,status)values(:name,:organizerid,:capacity,:capacityvip,:price,:vip,:actualdates,:enddate,:categoryid,:venue,:description,:image,:duration,:tags,:status)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':name', $event, PDO::PARAM_STR);
  $query->bindParam(':organizerid', $organizer, PDO::PARAM_STR);
  $query->bindParam(':capacity', $capacity, PDO::PARAM_STR);
  $query->bindParam(':capacityvip', $vipcapacity, PDO::PARAM_STR);
  $query->bindParam(':price', $price, PDO::PARAM_STR);
  $query->bindParam(':vip', $pricevip, PDO::PARAM_STR);
  $query->bindParam(':actualdates', $actualdates, PDO::PARAM_STR);
  $query->bindParam(':enddate', $closed, PDO::PARAM_STR);
  $query->bindParam(':categoryid', $category, PDO::PARAM_STR);
  $query->bindParam(':venue', $place, PDO::PARAM_STR);
  $query->bindParam(':description', $desc, PDO::PARAM_STR);
  $query->bindParam(':image', $eventimage, PDO::PARAM_STR);
  $query->bindParam(':duration', $hours, PDO::PARAM_STR);  
  $query->bindParam(':tags', $tags, PDO::PARAM_STR);  
  $query->bindParam(':status', $status, PDO::PARAM_STR);  




  $query->execute();
  $LastInsertId = $dbh->lastInsertId();
  if ($LastInsertId > 0) {
    echo '<script>alert("Event has been added.")</script>';
  } else {
    echo '<script>alert("Something Went Wrong. Please try again")</script>';
  }
}
?>
<div class="card-body">
  <h4 class="card-title">Add Event Form </h4>
  <form class="forms-sample" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="exampleInputName1">Event Type</label>
      <select class="form-control" required name="category">
        <option value="">Select event type</option>
        <?php
        $sql = "SELECT * from eventcategories";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        $cnt = 1;
        if ($query->rowCount() > 0) {
          foreach ($results as $row) { ?>
            <option value="<?php echo $row->id ; ?>"><?php echo $row->category; ?> </option>
          <?php
          }
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputName1">Event Name</label>
      <input type="text" name="event" class="form-control" id="eventname" placeholder="Event Name" required>
    </div>
    <div class="form-group">
      <label for="exampleInputName1">Venue</label>
      <input type="text" name="venue" class="form-control" id="servicename" placeholder="Event place" required>
    </div>
    
    <div class="row">
      <div class="col-md-4">
    <div class="form-group">
      <label for="exampleInputName1">Actual Dates</label>
      <input type="date" name="dates" class="form-control" id="open" placeholder="Event Dates" required>
    </div>
    </div>
    <div class="col-md-4">    
    <div class="form-group">
      <label for="exampleInputName1">Hours</label>
      <input type="time" name="hours" class="form-control" id="open" placeholder="Event hours" required>
    </div>
   
      </div>
      <div class="col-md-4">
      <div class="form-group">
      <label for="exampleInputName1">Booking closed</label>
      <input type="date" name="close" class="form-control" id="closed" placeholder="Closing booking" required>
    </div>
    </div>
    </div>
    <div class="row">
      <div class="col-md-6">
    <div class="form-group">
      <label for="exampleInputName1">Ticket Price</label>
      <input type="text" name="price" class="form-control" id="closed" placeholder="Pricee in RWF" required>
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
      <label for="exampleInputName1">VIP Price</label>
      <input type="text" name="pricevip" class="form-control" id="closed" placeholder="Pricee in RWF" required>
    </div>
    </div>
    </div>
    <div class="form-group">
      <label for="exampleInputName1">Event Image</label>
      <input type="file" name="image" class="form-control" id="image" required >
    </div>
    <div class="row">
      <div class="col-md-6">
    <div class="form-group">
      <label for="exampleInputName1">Normal sits</label>
      <input type="text" name="capacity" class="form-control" id="closed" placeholder="available sits" required>
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
      <label for="exampleInputName1">VIPs</label>
      <input type="text" name="capacityvip" class="form-control" id="closed" placeholder="Available sits" required>
    </div>
    </div>
    </div>
    <div class="form-group">
      <label for="exampleTextarea1">Event Description</label>
      <textarea class="form-control" name="desc" id="servicedes" rows="4" required></textarea>
    </div>
    <div class="form-group">
      <label for="exampleInputName1">Tags</label> *separate tags with # sign
      <input type="text" name="tags" class="form-control" id="closed" placeholder="Service Name" required>
    </div>

    <button type="submit" name="submit" class="btn btn-primary btn-fw mr-2">Submit</button>
  </form>
</div>