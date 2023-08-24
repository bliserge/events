<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit2']))
{
  $name=$_POST['name'];
   $tags=$_POST['tags'];
   $desc=$_POST['desc'];
   $image="event2.jpg";


  $sql="insert into eventcategories(category,description,recomended,image)values(:name,:desc,:tags,:image)";
  $query=$dbh->prepare($sql);
  $query->bindParam(':name',$name,PDO::PARAM_STR);
  $query->bindParam(':desc',$desc,PDO::PARAM_STR);
   $query->bindParam(':tags',$tags,PDO::PARAM_STR);
   $query->bindParam(':image',$image,PDO::PARAM_STR);

  $query->execute();
  $LastInsertId=$dbh->lastInsertId();
  if ($LastInsertId>0) {
    echo '<script>alert("Category has been added.")</script>';
  }
  else
  {
   echo '<script>alert("Something Went Wrong. Please try again")</script>';
 }
}
?>
<div class="card-body">
  <h4 class="card-title">New categor </h4>
  <form class="forms-sample" method="post">
    <div class="form-group">
      <label for="exampleInputName1">Category Name</label>
      <input type="text" name="name" class="form-control" id="servicename" placeholder="Service Name" required>
    </div>
    <div class="form-group">
      <label for="exampleTextarea1">Event Description</label>
      <textarea class="form-control" name="desc" id="servicedes" rows="4" required></textarea>
    </div>
    <div class="form-group">
      <label for="exampleInputName1">Tegs</label> *use # to separate tags
      <input type="text" name="tags" class="form-control" id="price" placeholder="Tags" required>
    </div>
   
    <button type="submit" name="submit2" class="btn btn-primary btn-fw mr-2">Submit</button>
  </form>
</div>