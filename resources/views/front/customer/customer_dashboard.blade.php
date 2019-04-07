@extends('front/layouts.default')
@section('content')
<div class="site-content">


<section class="dashboard-layout">
    <div class="row">
     @include('front/includes.customer_side_menu')
      <div class="col-lg-9 col-md-8 col-sm-12 dl-content">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#dl-tab01">Parking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#dl-tab02">land</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#dl-tab03">Menu 3</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#dl-tab04">Menu 4</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#dl-tab05">Menu 5</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#dl-tab06">Menu 6</a>
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane container active" id="dl-tab01">
              <h3>Parking Slot</h3>
               <div class="color-highlighted">
                  <div class="row firstrow">
                    <div class="col-sm-3">
                      <div class="park-avail">
                        <div class="park-color available-parking"></div>
                        <div class="park-count">available parking</div>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="park-avail">
                        <div class="park-color unavailable-parking"></div>
                        <div class="park-count">booked parking</div>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="park-avail">
                        <div class="park-color largeduration-parking"></div>
                        <div class="park-count">Full Day </div>
                      </div>
                    </div>
                  </div>
                </div>
              
              <div class="clear"></div>
              <div class="row secondrow">
                 <div class="rect-parking">
                  <h5>Saraf chamber</h5>
                  <li class="park-available">
                    <input type="checkbox" name="parking" id="checkbox1" checkbox="">
                    <label for="checkbox1"></label>
                  </li>
                  <li class="park-available">
                    <input type="checkbox" name="parking" id="checkbox2">
                    <label for="checkbox2"></label>
                  </li>
                  <li class="park-available">
                    <input type="checkbox" name="parking" id="checkbox3">
                    <label for="checkbox3"></label>
                  </li>
                  <li class="park-available">
                    <input type="checkbox" name="parking" id="checkbox4">
                    <label for="checkbox4"></label>
                  </li>
                  <li class="park-available">
                    <input type="checkbox" name="parking" id="checkbox5">
                    <label for="checkbox5"></label>
                  </li>
                  <li class="park-available">
                    <input type="checkbox" name="parking" id="checkbox6">
                    <label for="checkbox6"></label>
                  </li>
                  <li class="park-available">
                    <input type="checkbox" name="parking" id="checkbox7">
                    <label for="checkbox7"></label>
                  </li>
                  <li class="park-available">
                    <input type="checkbox" name="parking" id="checkbox8">
                    <label for="checkbox8"></label>
                  </li>
                  <li class="park-available">
                    <input type="checkbox" name="parking" id="checkbox9">
                    <label for="checkbox9"></label>
                  </li>
                  <li class="park-available">
                    <input type="checkbox" name="parking" id="checkbox10">
                    <label for="checkbox10"></label>
                  </li>
                  <li class="park-available">
                    <input type="checkbox" name="parking" id="checkbox11">
                    <label for="checkbox11"></label>
                  </li>
                  <li class="park-available">
                    <input type="checkbox" name="parking" id="checkbox12">
                    <label for="checkbox12"></label>
                  </li>
                  <li class="park-available">
                    <input type="checkbox" name="parking" id="checkbox13">
                    <label for="checkbox13"></label>
                  </li>
                  <li class="park-available">
                    <input type="checkbox" name="parking" id="checkbox14">
                    <label for="checkbox14"></label>
                  </li>
                  <li class="park-available">
                    <input type="checkbox" name="parking" id="checkbox15">
                    <label for="checkbox15"></label>
                  </li>
                  <li class="park-available">
                    <input type="checkbox" name="parking" id="checkbox16">
                    <label for="checkbox16"></label>
                  </li>
                  <li class="park-available">
                    <input type="checkbox" name="parking" id="checkbox17">
                    <label for="checkbox17"></label>
                  </li>
                  <li class="park-available">
                    <input type="checkbox" name="parking" id="checkbox18">
                    <label for="checkbox18"></label>
                  </li>
                  <li class="park-available">
                    <input type="checkbox" name="parking" id="checkbox19">
                    <label for="checkbox19"></label>
                  </li>
                  <li class="park-available">
                    <input type="checkbox" name="parking" id="checkbox20">
                    <label for="checkbox20"></label>
                  </li>
                  
                  <div class="road-space" style="margin-bottom: 50px;"><div class="road"></div></div>
                  
                </div>
              </div>
            </div>
            <div class="tab-pane container fade" id="dl-tab02">
              <h3>land</h3>
              <div class="row firstrow">
                <div class="col-sm-4">
                  <div class="park-avail">
                    <div class="park-color available-land">06</div>
                    <div class="park-count">available land</div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="park-avail">
                    <div class="park-color unavailable-land">04</div>
                    <div class="park-count">unavailable land</div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="park-avail">
                    <div class="park-color largeduration-land">05</div>
                    <div class="park-count">Full Month Booked </div>
                  </div>
                </div>
              </div>
              <div class="row secondrow">
                <img src="images/land.jpg" alt="">
              </div>
            </div>
            <div class="tab-pane container fade" id="dl-tab03">Menu 3</div>
            <div class="tab-pane container fade" id="dl-tab04">Menu 4</div>
            <div class="tab-pane container fade" id="dl-tab05">Menu 5</div>
            <div class="tab-pane container fade" id="dl-tab06">Menu 6</div>
          </div>
      </div>
    </div>

</section>
 
</div>

@stop

