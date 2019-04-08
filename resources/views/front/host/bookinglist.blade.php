@extends('front/layouts.default')
@section('content')
<div class="site-content">


<section class="dashboard-layout">
    <div class="row">
     @include('front/includes.host_side_menu')
      <div class="col-lg-9 col-md-8 col-sm-12 dl-content">
          <table class="table table-striped">
    <thead>
     
      <tr>
        <th>Booking ID</th>
        <th>Booking For</th>
        <th>Customer</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Start Date</th>
        <th>End Time</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($getBookingList as $plist) {  ?>
      <tr>
        <td><?php echo $plist->booking_id; ?></td>
        <td><?php echo $plist->module_manage_name; ?></td>
        <td><?php echo $plist->firstname.' '.$plist->lastname; ?></td>
        <td><?php echo $plist->start_time; ?></td>
        <td><?php echo $plist->end_time; ?></td>
        <td><?php echo $plist->start_date; ?></td>
        <td><?php echo $plist->end_date; ?></td>
        <td><a href="#" style="color: #B6ABAB;">View Details</a></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
    </div>
    </div>
</section>
</div>
@stop

