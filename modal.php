  
  <div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
    <span class="close" style="margin-top: -18px;"><button>&times;</button></span>
      <h2 style="font-size: 23px; text-align: center;">Select Your Category</h2>
    </div>

    <div class="container">
      <div class="jumbotron">
        <div class="row">
          <div class="col-sm-8">
            <span>Normal </span><br>
            <span id="normal"></span>
            <span id="eventid" hidden></span>
            <span>Normal tickets are General Admission tickets into the Arena (<b>RN</b><span id="rn"> </span>  )</span>
          </div>
          <div class="col-sm-4">
              <div class="input-group" id="mod">
                  <span class="input-group-btn">
                    <button type="button" class="quantity-left-minus btn btn-number" style="width: 50px;" data-type="minus" data-field="">
                      <span class="glyphicon glyphicon-minus"></span>
                    </button>
                  </span>
                  <input type="text" id="quantity" name="quantity" class="form-control input-number" style="margin-top: 0px; height: 32px; margin-bottom: 0px; width: 100%; float: none;  text-align: center;" value="0" min="0" max="10" disabled="">
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
              <span id="vip"></span>
              <span>VIP Phase tickets give you entry into the VIP Section at the Arena. VIP section includes front of stage viewing, dedicated bars and toilets <b>RV:</b><span id="rv"></span>. </span>
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
    </div>

    <div class="modal-footer">
      <div class="row" id="fot">
        <div class="col-sm-8">
            <span class="final-prize">Total  Payment</span>
            <input type="text" id="myText" value="0" disabled size="6">
        </div>
        <div class="col-sm-4">
          <div class="proceed-button">
                <button class="btn3" id="bt" onclick="che()">Proceed</button>
                
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
