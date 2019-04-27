@extends('front/layouts.default')
@section('content')
<div class="site-content">


<section class="dashboard-layout">
    <div class="row">
     @include('front/includes.customer_side_menu')
      <div class="col-lg-10 col-md-10 col-sm-12 dl-content">
        <h2 class="dash-title">order History</h2>

          <div class="dashfilter">
          <select>
              <option value="">Property Type</option>
              <option value="2">Parking</option>
              <option value="3">Land</option>
              <option value="4">Industry</option>
              <option value="5">Developement</option>
          </select>
          <div class="date">
            <input type="text" name="search_dates" placeholder="Search By From Date" id="transfromdate">
          </div>
          <div class="date">
            <input type="text" name="search_dates" placeholder="Search By To date" id="transtodate">
          </div>
          <select>
              <option value="">Payment status</option>
              <option value="2">paid</option>
              <option value="3">pending</option>
          </select>
          <input type="button" class="filtersearch" name="search" id="search" onclick="searchURL()" value="Search">
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
              <!--  <th class="action">Action</th> -->
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
@stop

