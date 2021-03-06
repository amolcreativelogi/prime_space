@extends('front/layouts.default')
@section('content')
<div class="site-content">


<section class="dashboard-layout">
    <div class="row">
     @include('front/includes.customer_side_menu')
      <div class="col-lg-10 col-md-10 col-sm-12 dl-content">
        <h2 class="dash-title">Booking History</h2>

          <div class="dashfilter">
            <select>
                <option value="">Property Type</option>
                <option value="2">Parking</option>
                <option value="3">Land</option>
                <option value="4">Industry</option>
                <option value="5">Developement</option>
            </select>
            <select>
                <option value="">Host Name</option>
                <option value="2">james</option>
                <option value="3">john</option>
            </select>
            <div class="date">
              <input type="text" name="search_dates" placeholder="Search By From Date" id="transfromdate">
            </div>
            <div class="date">
              <input type="text" name="search_dates" placeholder="Search By To date" id="transtodate">
            </div>
            <input type="button" class="filtersearch" name="search" id="search" onclick="searchURL()" value="Search">
          </div>

          <table class="table table-striped viewparking">
            <thead>
              <tr>
                <th>Property name</th>
                <th>Properety Type</th>
                <th>Host Name</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Status </th>
                <th>Action </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($bookingDatas as $key => $bookingData): ?>
                <tr>
                   <td>{{$bookingData->name}}</td>
                   <td>parking</td>
                   <td>{{$bookingData->firstname}} {{$bookingData->lastname}}</td>
                   <td>{{$bookingData->start_date}} </td>
                   <td>{{$bookingData->end_date}} </td>
                   <td>{{$bookingData->booking_status}} </td>
                   <td class="action">
                      <a href="<?php echo URL::to('user/bookingView'); ?>/{{$bookingData->booking_id}}" class="viewprop"><i class="fa fa-eye" aria-hidden="true"></i></a>
                   </td>
                 </tr>
              <?php endforeach ?>
             
           </tbody>
          </table>
    </div>
    </div>
</section>
</div>
@stop