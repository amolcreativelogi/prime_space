 <div class="col-lg-2 col-md-3 col-sm-12 dl-sidebar">
        <ul class="dash-menu">
          
         <!--  <li><a href="">Upcoming Booking </a></li>
          <li><a href="">Newly add Properties</a></li>
          <li><a href="">Upcoming Booking </a></li>
          <li><a href="">Newly add Properties</a></li>
          <li><a href="">Upcoming Booking </a></li> -->
          <li><a href="<?php echo URL::to('user/host'); ?>"><img src="{{ URL::asset('public') }}/assets/front-design/images/dashborad.svg" alt=""> Dashboard</a></li>
         
          <li><a href="<?php echo URL::to('addproperty'); ?>"><img src="{{ URL::asset('public') }}/assets/front-design/images/properties.svg" alt=""> Add Properties</a></li>
          <li class="dropdown">
              <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="{{ URL::asset('public') }}/assets/front-design/images/parked-car.svg" alt="">Parking Properties</a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="<?php echo URL::to('addproperty'); ?>"><img src="{{ URL::asset('public') }}/assets/front-design/images/arrow.svg" alt=""> Add Parking</a></li>
                    <li><a class="dropdown-item" href="<?php echo URL::to('addproperty'); ?>"><img src="{{ URL::asset('public') }}/assets/front-design/images/arrow.svg" alt=""> Edit Parking</a></li>
                    <li><a class="dropdown-item" href="<?php echo URL::to('user/parkingProperties'); ?>"><img src="{{ URL::asset('public') }}/assets/front-design/images/arrow.svg" alt=""> View Parking</a></li>
                </ul>
          </li>
          <li class="dropdown">
              <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="{{ URL::asset('public') }}/assets/front-design/images/land.svg" alt="">Land Properties</a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="<?php echo URL::to('addproperty'); ?>"><img src="{{ URL::asset('public') }}/assets/front-design/images/arrow.svg" alt=""> Add Land</a></li>
                    <li><a class="dropdown-item" href="<?php echo URL::to('addproperty'); ?>"><img src="{{ URL::asset('public') }}/assets/front-design/images/arrow.svg" alt=""> Edit Land</a></li>
                    <li><a class="dropdown-item" href="<?php echo URL::to('user/landProperties'); ?>"><img src="{{ URL::asset('public') }}/assets/front-design/images/arrow.svg" alt=""> View Land</a></li>
                </ul>
          </li>
          <li><a href="<?php echo URL::to('user/bookingProperties'); ?>"><img src="{{ URL::asset('public') }}/assets/front-design/images/booking.svg" alt="">Booking Properties</a></li>
        </ul>
      </div>