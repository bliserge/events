 <div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <div class="modal-header">
    <a href='mytickets.php'><span class="close" style="margin-top: -18px;"><button>&times;</button></span></a>
    <h2 style="font-size: 23px; text-align: center;">Resell your Ticket</h2>
  </div>
<form method="post">
  <div class="container">
    <div class="jumbotron">
      <div class="row">
        <div class="col-sm-8">
          
          <span id="normal"></span>
          <input type="text" id="ticketid" name="ticketid" hidden>
          <span>Normal tickets Price was <span id="total"></span>  and was reserved for <?php echo $normals ?> Normal AND <?php echo $vips; ?> VIP places </span>
        </div>
        <div class="col-sm-4">
            <div class="input-group" id="mod">
                
                <input type="text" id="quantity" name="price" placeholder="enter new price" class="form-control input-number" style="margin-top: 0px; height: 32px; margin-bottom: 0px; width: 100%; float: none;  text-align: center;" value="0" min="0" max="10" required>               
            </div>
        </div>
      </div>
    </div>
    <div class="jumbotron">
      <div class="row">
          <div class="col-sm-4">
            <span>VIP Phase </span><br>
            <span id="vip"></span>
            <span>Please provide short description</span>
          </div>
          <div class="col-sm-8">
            <div class="input-group" id="mod">
              <textarea class="form-control input-text" name="description" required>

              </textarea>               
               
            </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal-footer">
    <div class="row" id="fot">
      <div class="col-sm-8">
          <span class="final-prize">I Agree</span>
          <input type="checkbox" id="agree" size="6">
          <span class="final-prize">that I will pay 20% of the monetary received in adittion to the ticket price while reselling on this platform</span>

      </div>
      <div class="col-sm-4">
        <div class="proceed-button">
              <button class="btn3" id="bt" type="submit" name="resell">Resell</button>
              
        </div>
      </div>
    </div>
  </div>
</form>

</div>
</div>


<?php 
if(isset($_POST['resell']))
{
    $description=$_POST['description'];
    $price=$_POST['price'];
    $ticket=$_POST['ticketid'];
    $resellticket = mysqli_query($conn, "UPDATE tickets SET resellstatus = '1', resellreason = '$description' WHERE id = '$ticket' ");
    if($resellticket = 1)
    {
        echo "<script>alert('Ticket reselled');window.location='mytickets.php'</script>";
    }
    else{
        echo "<script>alert('Failed to resell ticket')</script>";

    }
    
}
?>