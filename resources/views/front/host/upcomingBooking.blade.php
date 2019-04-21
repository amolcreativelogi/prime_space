@extends('front/layouts.default')
@section('content')
<div class="site-content">


<section class="dashboard-layout">
    <div class="row">
     @include('front/includes.host_side_menu')
      <div class="col-lg-10 col-md-10 col-sm-12 dl-content">
        <h2 class="dash-title">upcoming bookings</h2>
        <div class="dashfilter">
          <select name="parking_type" id="up_parking_type_id">
              <option value="">Property Type</option>
              <option value="2" selected="selected">Parking</option>
              <option value="3">Land</option>
              <option value="4">Industry</option>
              <option value="5">Developement</option>
          </select>
          <div class="date">
            <input type="text" name="search_dates" value="<?php echo (isset($_GET['up_search_from_date'])) ? $_GET['up_search_from_date'] : ''; ?>" placeholder="Search By From Date" id="transfromdate">
          </div>
          <div class="date">
            <input type="text" name="up_search_to_date" value="<?php echo isset($_GET['up_search_to_date']) ? $_GET['up_search_to_date'] : ''; ?>" placeholder="Search By To date" id="transtodate">
          </div>
          <input type="button" class="filtersearch" name="search" id="search" onclick="SearchUpcomingBooking()" value="search">
        </div>

         <table class="table table-striped viewparking">
           <thead>
               <tr>
                <th>Booking ID</th>
                <th>Booking For</th>
                <th>Customer</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Start Date</th>
                <th>End Time</th>
              </tr>
           </thead>
           <tbody>
             <?php foreach($getBookingList as $plist) {  ?>
              <tr>
                <td><?php echo $plist->booking_id; ?></td>
                <td><?php echo 'Parking'; ?></td>
                <td><?php echo $plist->firstname.' '.$plist->lastname; ?></td>
                <td><?php echo $plist->start_time; ?></td>
                <td><?php echo $plist->end_time; ?></td>
                <td><?php echo $plist->start_date; ?></td>
                <td><?php echo $plist->end_date; ?></td>
              </tr>
            <?php } ?>
           </tbody>
         </table>
    </div>
    </div>
</section>
</div>

<script>
function SearchUpcomingBooking()
{
  var parking_type = $('#up_parking_type_id').val();
  var up_search_from_date = $('#transfromdate').val();
  var up_search_to_date = $('#transtodate').val();

  var url = "<?php echo URL::to('user/upcomingBooking'); ?>?parking_type="+parking_type+"&&up_search_from_date="+up_search_from_date+"&&up_search_to_date="+up_search_to_date+"";
  window.location = url;
}
</script>
@stop

