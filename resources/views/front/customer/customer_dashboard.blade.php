@extends('front/layouts.default')
@section('content')
<div class="site-content">


<section class="dashboard-layout">
    <div class="row">
     @include('front/includes.customer_side_menu')

     <div class="col-lg-10 col-md-9 col-sm-12 dl-content dash-content">
     	<div class="row firstrow">
     		<div class="col-lg-4 col-md-4 col-sm-6">
                <div class="dash-counterbox dash-add-prop">
                    <div class="dashcount-icon"><img src="{{ URL::asset('public') }}/assets/front-design/images/total-booking.svg" alt=""></div>
                    <div class="dashcount-text"><span><?php echo ($totalBooking) ? $totalBooking : 0; ?></span>My Booking</div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="dash-counterbox dash-messages">
                        <div class="dashcount-icon"><img src="{{ URL::asset('public') }}/assets/front-design/images/messages.svg" alt=""></div>
                        <div class="dashcount-text"><span>50</span>Total messages</div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="dash-counterbox dash-properties">
                    <div class="dashcount-icon"><img src="{{ URL::asset('public') }}/assets/front-design/images/review.svg" alt=""></div>
                    <div class="dashcount-text"><span>50</span>Rating & Review</div>
                </div>
            </div>
        </div>

		<div class="row third-row">
            <div class="col-sm-6">
                <div class="dash-table">
                    <div class="dashtable-head"><h3>my bookings</h3><a href="<?php echo URL::to('user/upcomingBooking'); ?>">view all</a></div>
                    <table>
                        <thead>
                            <tr>
                                <th>booking for</th>
                                <th>customer name</th>
                                <th>status</th>
                                <th>booking date/time</th>
                            </tr>
                        </thead>
                        <tbody>

                          <?php foreach($getBookingList as $booking) { 

                            ?>
                            <tr>
                                <td>Parking</td>
                                <td><?php echo $booking->firstname; ?></td>
                                <!-- <td class="de-active">de-active</td> -->
                                <td><?php echo $booking->booking_status; ?></td>
                                <td><?php echo $booking->start_time.' '.$booking->start_date; ?></td>

                            </tr>
                          <?php } ?>
                         
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="dash-table">
                   
            </div>
        </div>

     </div>
      
    </div>
</section>
 
</div>

@stop

