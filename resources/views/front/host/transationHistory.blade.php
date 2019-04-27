@extends('front/layouts.default')
@section('content')
<div class="site-content">


<section class="dashboard-layout">
    <div class="row">
     @include('front/includes.host_side_menu')
      <div class="col-lg-10 col-md-10 col-sm-12 dl-content">
        <h2 class="dash-title">transaction history</h2>
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
          <select name="payment_status" id="payment_status">
              <option value="">Payment status</option>
              <option value="approved" <?php echo (isset($_GET['booking_status']) && $_GET['booking_status'] == 'approved') ? 'selected' : ''; ?>>approved</option>
              <option value="pending" <?php echo (isset($_GET['payment_status']) && $_GET['payment_status'] == 'pending') ? 'pending' : ''; ?>>pending</option>
              <option value="rejected" <?php echo (isset($_GET['payment_status']) && $_GET['payment_status'] == 'rejected') ? 'selected' : ''; ?>>rejected</option>
              <option value="onhold" <?php echo (isset($_GET['payment_status']) && $_GET['payment_status'] == 'onhold') ? 'selected' : ''; ?>>onhold</option>
              <option value="confirm" <?php echo (isset($_GET['payment_status']) && $_GET['payment_status'] == 'confirm') ? 'selected' : ''; ?>>confirm</option>
          </select>
          <input type="button" class="filtersearch" name="search" id="search" onclick="SearchTransactionBooking()" value="Search">
        </div>

         <table class="table table-striped viewparking">
           <thead>
             <tr>
               <th>Property name</th>
               <th>Property type</th>
               <th>From Date</th>
               <th>To Date</th>
               <th>Amount</th>
               <th>Status</th>
             </tr>
           </thead>
           <tbody>
             <?php foreach($gettransationList as $gtranlist) { ?>
             <tr>
               <td><?php echo $gtranlist->name; ?></td>
               <td>parking</td>
               <td><?php echo $gtranlist->name; ?></td>
               <td><?php echo $gtranlist->start_date; ?></td>
               <td><?php echo $gtranlist->booking_amount; ?></td>
               <td><?php echo $gtranlist->booking_status; ?></td>
             </tr>
            <?php } ?>
           </tbody>
         </table>
    </div>
    </div>
</section>
</div>

<script>
function SearchTransactionBooking()
{
  var parking_type = $('#up_parking_type_id').val();
  var up_search_from_date = $('#transfromdate').val();
  var up_search_to_date = $('#transtodate').val();
  var payment_status = $('#payment_status').val();
  

  var url = "<?php echo URL::to('user/transationHistory'); ?>?parking_type="+parking_type+"&&up_search_from_date="+up_search_from_date+"&&up_search_to_date="+up_search_to_date+"&&payment_status="+payment_status+"";
  window.location = url;
}
</script>
@stop

