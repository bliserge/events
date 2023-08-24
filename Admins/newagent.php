<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $role = $_POST['role'];
  $contact = $_POST['contact'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];  
  $pass=md5($password);
  $status=1; 
  $photo='avatar15.jpg';
  $staffid='U00n';

  $sql = "insert into tbladmin(Staffid,AdminName,UserName,FirstName,LastName,MobileNumber,Email,Status,Photo,Password,role)values(:staffid,:name,:username,:fname,:lname,:mobile,:email,:status,:photo,:password,:role)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':staffid', $staffid, PDO::PARAM_STR);
  $query->bindParam(':name', $role, PDO::PARAM_STR);
  $query->bindParam(':username', $username, PDO::PARAM_STR);
  $query->bindParam(':fname', $fname, PDO::PARAM_STR);
  $query->bindParam(':lname', $lname, PDO::PARAM_STR);
  $query->bindParam(':mobile', $contact, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':status', $status, PDO::PARAM_STR);
  $query->bindParam(':photo', $photo, PDO::PARAM_STR);
  $query->bindParam(':password', $pass, PDO::PARAM_STR);
  $query->bindParam(':role', $role, PDO::PARAM_STR);

  $query->execute();
  $LastInsertId = $dbh->lastInsertId();
  if ($LastInsertId > 0) {
    echo '<script>alert("Agent has been added.")</script>';
  } else {
    echo '<script>alert("Something Went Wrong. Please try again")</script>';
  }
}
?>
<div class="card-body">
  <h4 class="card-title">Register events managers</h4>
  <form class="forms-sample" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="exampleInputName1">Event Type</label>
      <select class="form-control" required name="role">
        <option value="">Select</option>
        <option value="agent">Agent </option>
        <option value="organizer">Organizer</option>

      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputName1">First Names</label>
      <input type="text" name="fname" class="form-control" id="eventname" placeholder="F Name" required>
    </div>
    <div class="form-group">
      <label for="exampleInputName1">Last Names</label>
      <input type="text" name="lname" class="form-control" id="eventname" placeholder="S Name" required>
    </div>
    <div class="form-group">
      <label for="exampleInputName1">Username</label>
      <input type="text" name="username" class="form-control" id="servicename" placeholder="Username" required>
    </div>

    <div class="form-group">
      <label for="exampleInputName1">Contacts</label>
      <input type="number" name="contact" class="form-control" id="servicename" placeholder="Phone number" required>
    </div>
    <div class="form-group">
      <label for="exampleInputName1">Email</label>
      <input type="email" name="email" class="form-control" id="open" placeholder="Event Dates" required>
    </div>

    <div class="form-group">
      <label for="exampleInputName1">Password</label>
      <input type="password" name="password" class="form-control" id="open" placeholder="Password" required>
    </div>
    

   
     
    <button type="submit" name="submit" class="btn btn-primary btn-fw mr-2">Submit</button>
  </form>
</div>