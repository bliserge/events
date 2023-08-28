 <div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <div class="modal-header">
    <a href='mytickets.php'><span class="close" style="margin-top: -18px;"><button>&times;</button></span></a>
    <h2 style="font-size: 23px; text-align: center;">Resell your Ticket</h2>
  </div>
  <div class="container">
    <div class="jumbotron">
      <div class="row">
        <div class="col-sm-8">
        <span id="eventid" hidden></span>
          <input type="text" id="ticketid" name="ticketid" hidden value="<?= $ticketid ?>">
          <span>Select number of Normal tickets to refund </span>
        </div>
        <div class="col-sm-4">
              <div class="input-group" id="mod">
                  <span class="input-group-btn">
                    <button type="button" class="quantity-left-minus btn btn-number" style="width: 50px;" data-type="minus" data-field="">
                      <span class="glyphicon glyphicon-minus"></span>
                    </button>
                  </span>
                  <input type="text" id="quantity" name="quantity" class="form-control input-number" style="margin-top: 0px; height: 32px; margin-bottom: 0px; width: 100%; float: none;  text-align: center;" value="0" min="0" max="1" disabled="">
                  <span class="input-group-btn">
                    <button type="button" class="quantity-right-plus btn btn-number" style="width: 50px;" data-type="plus" data-field="">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                  </span>
              </div>
          </div>
      </div>
    </div>

    <div class="jumbotron">
        <div class="row">
            <div class="col-sm-8">
              <span>VIP Phase </span><br>
              <span>Select number of VIP tickets to refund </span>
            </div>
            <div class="col-sm-4">
              <div class="input-group" id="mod">
                  <span class="input-group-btn">
                    <button type="button" class="quantity-left-minus1 btn btn-number" style="width: 50px;" data-type="minus" data-field="" onclick="">
                      <span class="glyphicon glyphicon-minus"></span>
                    </button>
                  </span>
                  <input type="text" id="quantty" name="quanty" class="form-control input-number" style="margin-top: 0px; height: 32px; margin-bottom: 0px; width: 100%; float: none;  text-align: center;" value="0" min="0" max="10" disabled="">
                  <span class="input-group-btn">
                    <button type="button" class="quantity-right-plus1 btn btn-number" style="width: 50px;" data-type="plus" data-field="" onclick="">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                  </span>
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
        <span class="final-prize">On ticket refund, you get 80% of amount you paid</span>
        <br>
          <span class="final-prize">I Agree</span>
          <input type="checkbox" id="agree" size="6">

      </div>
      <div class="col-sm-4">
        <div class="proceed-button">
              <button class="btn3" id="bt" name="resell" onclick="che()">Resell</button>
              
        </div>
      </div>
    </div>
  </div>

</div>
</div>
