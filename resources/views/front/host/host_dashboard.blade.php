@extends('front/layouts.default')
@section('content')
<div class="site-content">


<section class="dashboard-layout">
    <div class="row">
     @include('front/includes.host_side_menu')
    
    <div class="col-lg-10 col-md-9 col-sm-12 dl-content dash-content">
        <div class="row firstrow">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="dash-counterbox dash-properties">
                    <a href="">
                        <div class="dashcount-icon"><img src="{{ URL::asset('public') }}/assets/front-design/images/properties.svg" alt=""></div>
                        <div class="dashcount-text"><span>100</span>Total properties</div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="dash-counterbox dash-account">
                    <a href="">
                        <div class="dashcount-icon"><img src="{{ URL::asset('public') }}/assets/front-design/images/dollar.svg" alt=""></div>
                        <div class="dashcount-text"><span>$1000</span>Total Revenue</div>
                    </a>
                </div>
            </div>
             <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="dash-counterbox dash-add-prop">
                    <a href="">
                        <div class="dashcount-icon"><img src="{{ URL::asset('public') }}/assets/front-design/images/total-booking.svg" alt=""></div>
                        <div class="dashcount-text"><span>100</span>Total Booking</div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="dash-counterbox dash-messages">
                    <a href="">
                        <div class="dashcount-icon"><img src="{{ URL::asset('public') }}/assets/front-design/images/messages.svg" alt=""></div>
                        <div class="dashcount-text"><span>50</span>Total messages</div>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="row second-row">
            <div class="col-sm-12">
                 <div class="prop-type">
                    <select  id="tab-prop-type">
                        <option value="2">Parking</option>
                        <option value="3">Land</option>
                        <option value="4">Industry</option>
                        <option value="5">Developement</option>
                    </select>
                </div>
                <div id="2" class="parking-slection" style="display: block;">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="tab">
                                <button class="tablinks" onclick="openParking(event, 'Parking01')" id="defaultOpen">Parking 01</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking02')">Parking 02</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking03')">Parking 03</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking04')">Parking 04</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking05')">Parking 05</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking06')">Parking 06</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking07')">Parking 07</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking08')">Parking 08</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking09')">Parking 09</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking10')">Parking 10</button>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12">
                            <div id="Parking01" class="tabcontent">
                              <div class="park-layout">
                              <div class="color-highlighted">
                                <div class="row firstrow">
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color available-parking"></div>
                                      <div class="park-count">available parking (10)</div>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color unavailable-parking"></div>
                                      <div class="park-count">booked parking (10)</div>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color largeduration-parking"></div>
                                      <div class="park-count">Full Day (10) </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <div class="clear"></div>
                            <div class="row secondrow">
                               <div class="rect-parking">
                                <h5>Saraf chamber <span>(ground floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            <div class="rect-parking">
                                <h5>Saraf chamber <span>(first floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            <div class="rect-parking">
                                <h5>Saraf chamber <span>(second floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            </div>
                            </div>
                            </div><!-- tabcontent -->
                            <div id="Parking02" class="tabcontent">
                              <div class="park-layout">
                              <div class="color-highlighted">
                                <div class="row firstrow">
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color available-parking"></div>
                                      <div class="park-count">available parking (10)</div>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color unavailable-parking"></div>
                                      <div class="park-count">booked parking (10)</div>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color largeduration-parking"></div>
                                      <div class="park-count">Full Day (10) </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <div class="clear"></div>
                            <div class="row secondrow">
                               <div class="rect-parking">
                                <h5>Saraf chamber <span>(ground floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            <div class="rect-parking">
                                <h5>Saraf chamber <span>(first floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            <div class="rect-parking">
                                <h5>Saraf chamber <span>(second floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            </div>
                            </div>
                            </div><!-- tabcontent -->
                            <div id="Parking03" class="tabcontent">
                              <div class="park-layout">
                              <div class="color-highlighted">
                                <div class="row firstrow">
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color available-parking"></div>
                                      <div class="park-count">available parking (10)</div>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color unavailable-parking"></div>
                                      <div class="park-count">booked parking (10)</div>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color largeduration-parking"></div>
                                      <div class="park-count">Full Day (10) </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <div class="clear"></div>
                            <div class="row secondrow">
                               <div class="rect-parking">
                                <h5>Saraf chamber <span>(ground floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            <div class="rect-parking">
                                <h5>Saraf chamber <span>(first floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            <div class="rect-parking">
                                <h5>Saraf chamber <span>(second floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            </div>
                            </div>
                            </div><!-- tabcontent -->
                            <div id="Parking04" class="tabcontent">
                              <div class="park-layout">
                              <div class="color-highlighted">
                                <div class="row firstrow">
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color available-parking"></div>
                                      <div class="park-count">available parking (10)</div>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color unavailable-parking"></div>
                                      <div class="park-count">booked parking (10)</div>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color largeduration-parking"></div>
                                      <div class="park-count">Full Day (10) </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <div class="clear"></div>
                            <div class="row secondrow">
                               <div class="rect-parking">
                                <h5>Saraf chamber <span>(ground floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            <div class="rect-parking">
                                <h5>Saraf chamber <span>(first floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            <div class="rect-parking">
                                <h5>Saraf chamber <span>(second floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            </div>
                            </div>
                            </div><!-- tabcontent -->
                            <div id="Parking05" class="tabcontent">
                              <div class="park-layout">
                              <div class="color-highlighted">
                                <div class="row firstrow">
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color available-parking"></div>
                                      <div class="park-count">available parking (10)</div>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color unavailable-parking"></div>
                                      <div class="park-count">booked parking (10)</div>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color largeduration-parking"></div>
                                      <div class="park-count">Full Day (10) </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <div class="clear"></div>
                            <div class="row secondrow">
                               <div class="rect-parking">
                                <h5>Saraf chamber <span>(ground floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            <div class="rect-parking">
                                <h5>Saraf chamber <span>(first floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            <div class="rect-parking">
                                <h5>Saraf chamber <span>(second floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            </div>
                            </div>
                            </div><!-- tabcontent -->
                            <div id="Parking06" class="tabcontent">
                              <div class="park-layout">
                              <div class="color-highlighted">
                                <div class="row firstrow">
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color available-parking"></div>
                                      <div class="park-count">available parking (10)</div>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color unavailable-parking"></div>
                                      <div class="park-count">booked parking (10)</div>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color largeduration-parking"></div>
                                      <div class="park-count">Full Day (10) </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <div class="clear"></div>
                            <div class="row secondrow">
                               <div class="rect-parking">
                                <h5>Saraf chamber <span>(ground floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            <div class="rect-parking">
                                <h5>Saraf chamber <span>(first floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            <div class="rect-parking">
                                <h5>Saraf chamber <span>(second floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            </div>
                            </div>
                            </div><!-- tabcontent -->
                        </div>
                    </div>
                </div>
                <div id="3" class="parking-slection" style="display: none;">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="tab">
                                <button class="tablinks" onclick="openParking(event, 'Parking01')" id="defaultOpen">Parking 01</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking02')">Parking 02</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking03')">Parking 03</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking04')">Parking 04</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking05')">Parking 05</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking06')">Parking 06</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking07')">Parking 07</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking08')">Parking 08</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking09')">Parking 09</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking10')">Parking 10</button>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12">
                            <div id="Parking01" class="tabcontent">
                              <div class="park-layout">
                              <div class="color-highlighted">
                                <div class="row firstrow">
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color available-parking"></div>
                                      <div class="park-count">available parking (10)</div>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color unavailable-parking"></div>
                                      <div class="park-count">booked parking (10)</div>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color largeduration-parking"></div>
                                      <div class="park-count">Full Day (10) </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <div class="clear"></div>
                            <div class="row secondrow">
                               <div class="rect-parking">
                                <h5>Saraf chamber <span>(ground floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            <div class="rect-parking">
                                <h5>Saraf chamber <span>(first floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            <div class="rect-parking">
                                <h5>Saraf chamber <span>(second floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            </div>
                            </div>
                            </div><!-- tabcontent -->
                        </div>
                    </div>
                </div>
                <div id="4" class="parking-slection" style="display: none;">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="tab">
                                <button class="tablinks" onclick="openParking(event, 'Parking01')" id="defaultOpen">Parking 01</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking02')">Parking 02</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking03')">Parking 03</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking04')">Parking 04</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking05')">Parking 05</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking06')">Parking 06</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking07')">Parking 07</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking08')">Parking 08</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking09')">Parking 09</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking10')">Parking 10</button>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12">
                            <div id="Parking01" class="tabcontent">
                              <div class="park-layout">
                              <div class="color-highlighted">
                                <div class="row firstrow">
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color available-parking"></div>
                                      <div class="park-count">available parking (10)</div>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color unavailable-parking"></div>
                                      <div class="park-count">booked parking (10)</div>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color largeduration-parking"></div>
                                      <div class="park-count">Full Day (10) </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <div class="clear"></div>
                            <div class="row secondrow">
                               <div class="rect-parking">
                                <h5>Saraf chamber <span>(ground floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            <div class="rect-parking">
                                <h5>Saraf chamber <span>(first floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            <div class="rect-parking">
                                <h5>Saraf chamber <span>(second floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            </div>
                            </div>
                            </div><!-- tabcontent -->
                        </div>
                    </div>
                </div>
                <div id="5" class="parking-slection" style="display: none;">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="tab">
                                <button class="tablinks" onclick="openParking(event, 'Parking01')" id="defaultOpen">Parking 01</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking02')">Parking 02</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking03')">Parking 03</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking04')">Parking 04</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking05')">Parking 05</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking06')">Parking 06</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking07')">Parking 07</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking08')">Parking 08</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking09')">Parking 09</button>
                                <button class="tablinks" onclick="openParking(event, 'Parking10')">Parking 10</button>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12">
                            <div id="Parking01" class="tabcontent">
                              <div class="park-layout">
                              <div class="color-highlighted">
                                <div class="row firstrow">
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color available-parking"></div>
                                      <div class="park-count">available parking (10)</div>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color unavailable-parking"></div>
                                      <div class="park-count">booked parking (10)</div>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="park-avail">
                                      <div class="park-color largeduration-parking"></div>
                                      <div class="park-count">Full Day (10) </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <div class="clear"></div>
                            <div class="row secondrow">
                               <div class="rect-parking">
                                <h5>Saraf chamber <span>(ground floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            <div class="rect-parking">
                                <h5>Saraf chamber <span>(first floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            <div class="rect-parking">
                                <h5>Saraf chamber <span>(second floor)</span></h5>
                                <li class="park-available">
                                  <input type="checkbox" name="parking" id="checkbox1" checkbox>
                                  <label for="checkbox1"></label>
                                </li>
                                <li class="park-available">
                                  <input type="checkbox" class="booked" name="parking" id="checkbox2">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox5">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox9">
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
                                  <input type="checkbox" class="booked" name="parking" id="checkbox12">
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
                                <div class="road-space"></div>
                            </div><!-- rect-parking -->
                            </div>
                            </div>
                            </div><!-- tabcontent -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row third-row">
            <div class="col-sm-6">
                <div class="dash-table">
                    <div class="dashtable-head"><h3>latest properties</h3><a href="">view all</a></div>
                    <table>
                        <thead>
                            <tr>
                                <th>property name</th>
                                <th>location</th>
                                <th>property type</th>
                                <th>status</th>
                                <th>date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="dash-table">
                    <div class="dashtable-head"><h3>my bookings</h3><a href="">view all</a></div>
                    <table>
                        <thead>
                            <tr>
                                <th>booking for</th>
                                <th>customer name</th>
                                <th>booking date/time</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>      

</section>
 
</div>

@stop

