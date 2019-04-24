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
                    <div class="dashcount-text"><span>100</span>My Booking</div>
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
                    <div class="dashtable-head"><h3>my bookings</h3><a href="">view all</a></div>
                    <table>
                        <thead>
                            <tr>
                                <th>property name</th>
                                <th>location</th>
                                <th>property type</th>
                                <th>date/time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#">property one</a></td>
                                <td>sadar</td>
                                <td>parking</td>
                                <td>16.04.19 (11.30)</td>
                            </tr>
                            <tr>
                                <td><a href="#">property two</a></td>
                                <td>sadar</td>
                                <td>land</td>
                                <td>16.04.19</td>
                            </tr>
                            <tr>
                                <td><a href="#">property three</a></td>
                                <td>sadar</td>
                                <td>parking</td>
                                <td>16.04.19 (14.30)</td>
                            </tr>
                            <tr>
                                <td><a href="#">property four</a></td>
                                <td>sadar</td>
                                <td>land</td>
                                <td>16.04.19</td>
                            </tr>
                            <tr>
                                <td><a href="#">property five</a></td>
                                <td>sadar</td>
                                <td>parking</td>
                                <td>16.04.19 (16:10)</td>
                            </tr>
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

