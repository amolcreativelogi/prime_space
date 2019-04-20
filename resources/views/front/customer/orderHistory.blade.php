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
               <th class="action">Action</th>
             </tr>
           </thead>
           <tbody>
             <tr>
               <td>Property one</td>
               <td>parking</td>
               <td>04.08.19</td>
               <td>04.12.19</td>
               <td>$200</td>
               <td class="paid">paid</td>
               <td class="action">
                  <a href="<?php echo URL::to('bookingView'); ?>" class="viewprop"><i class="fa fa-eye" aria-hidden="true"></i></a>
               </td>
             </tr>
             <tr>
               <td>Property two</td>
               <td>land</td>
               <td>04.08.19</td>
               <td>04.12.19</td>
               <td>$200</td>
               <td class="pending">pending</td>
               <td class="action">
                  <a href="<?php echo URL::to('bookingView'); ?>" class="viewprop"><i class="fa fa-eye" aria-hidden="true"></i></a>
               </td>
             </tr>
             <tr>
               <td>Property three</td>
               <td>land</td>
               <td>04.08.19</td>
               <td>04.12.19</td>
               <td>$200</td>
               <td class="paid">paid</td>
               <td class="action">
                  <a href="<?php echo URL::to('bookingView'); ?>" class="viewprop"><i class="fa fa-eye" aria-hidden="true"></i></a>
               </td>
             </tr>
             <tr>
               <td>Property four</td>
               <td>parking</td>
               <td>04.08.19</td>
               <td>04.12.19</td>
               <td>$200</td>
               <td class="pending">pending</td>
               <td class="action">
                  <a href="<?php echo URL::to('bookingView'); ?>" class="viewprop"><i class="fa fa-eye" aria-hidden="true"></i></a>
               </td>
             </tr>
             <tr>
               <td>Property five</td>
               <td>parking</td>
               <td>04.08.19</td>
               <td>04.12.19</td>
               <td>$200</td>
               <td class="paid">paid</td>
               <td class="action">
                  <a href="<?php echo URL::to('bookingView'); ?>" class="viewprop"><i class="fa fa-eye" aria-hidden="true"></i></a>
               </td>
             </tr>
           </tbody>
         </table>
    </div>
    </div>
</section>
</div>
@stop

