 @extends('front/layouts.default')
  @section('content')

  <div class="site-content">


<section class="dashboard-layout">
    <div class="row">
     @include('front/includes.host_side_menu')

      <div class="col-lg-10 col-md-9 col-sm-12 dl-content">
          <section class="edit-parking edit-property">
            <h2>Edit Parking</h2>
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-12">
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#ep01">Property Information</a></li>
                    <li><a data-toggle="tab" href="#ep02">Property Floor Map</a></li>
                    <li><a data-toggle="tab" href="#ep03">Cars and Pricing</a></li>
                    <li><a data-toggle="tab" href="#ep04">Amenities and Other</a></li>
                    <li><a data-toggle="tab" href="#ep05">When is it available?</a></li>
                    <li><a data-toggle="tab" href="#ep06">Set your cancellation policy</a></li>
                    <li><a data-toggle="tab" href="#ep07">Documents</a></li>
                  </ul>
              </div>
              <div class="col-lg-9 col-md-9 col-sm-12 tab-content">
                <div id="ep01" class="tab-pane fade in active">
                    <div class="stepbox">
                      <h3>Property Information</h3>
                      <input type="text" name="data[property_name]" id="property_name" placeholder="Property Name" value="<?php echo (isset($parking->name)) ? $parking->name : ''; ?>">
                      <select id="select-property-type" name="module_manage_id" class="type" >
                        <option value="2" selected="selected">Parking</option>
                      </select>
                              
                      <input type="text" name="data[location]" id="location-property" placeholder="Location" autocomplete="off" value="<?php echo (isset($parking->location)) ? $parking->location : ''; ?>">

                      <input type="hidden" id="city-property" name="city">
                      <input type="hidden" name="data[latitude]" id="latitude-property" value="<?php echo (isset($parking->latitude)) ? $parking->latitude : ''; ?>">
                      <input type="hidden" name="data[longitude]" id="longitude-property" value="<?php echo (isset($parking->latitude)) ? $parking->latitude : ''; ?>">

                      <input type="text" name="data[zip_code]" id="zip_code" placeholder="Enter Property Zip Code" value="<?php echo (isset($parking->zip_code)) ? $parking->zip_code : ''; ?>">
                      <textarea placeholder="Property description" name="data[property_description]" id="property_description" cols="6"><?php echo (isset($parking->description)) ? $parking->description : ''; ?></textarea>
                      <div class="box">
                        <input type="file" name="property_images[]" multiple="" >
                        <div class="row">

                          <?php foreach($getPropertyImages as $pimage) { ?>
                          <div class="column">
                          	<img src="<?php echo URL::asset('public/images/properties/'.$pimage->name.''); ?>" alt="">
                            <a href=""><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                          </div>
                          <?php } ?>
                          
                        </div>

                      </div>
                      <input type="button" name="next" class="next action-button" value="Save">
                      <div class="clear"></div>
                    </div><!-- stepbox -->
                </div>

                <div id="ep02" class="tab-pane fade">
                    <div class="stepbox">
                        <h3>Property Floor Map</h3>
                        <div class="box">
                          <input type="file" name="property_map[]" id="" multiple="" >
                          <div class="row">
                            <?php foreach($getPropertyFloorMap as $floorMap) { ?>
                              <div class="column">
                                <img src="<?php echo URL::asset('public/images/property-floor-map/'.$floorMap->name.''); ?>" alt="">
                                <a href=""><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                              </div>
                              <?php } ?>
                          </div>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Save">
                        <div class="clear"></div>
                      </div><!-- stepbox -->
                </div>

                <div id="ep03" class="tab-pane fade">
                      <div class="stepbox">
                      <h3>Cars and Pricing</h3>
                      <label>Enter Property Floors Parking spots</label>
						  <table id="myTable" class=" table order-list1">
						    <tbody>


                    <?php foreach($getAddParkingSpot as $spot) {  ?>
						        <tr>
						            <td class="col-sm-4">
						               <input type="text" name="data[parking][floor_name][]" placeholder="Enter floor name" value="<?php echo (isset($spot->floor_name)) ? $spot->floor_name : ''; ?>">
						            </td>
						            <td class="col-sm-4">
						               <select name="data[parking][parking_type_id][]">
                           <option value="">Parking Type</option>
                          @if(!empty($getParkingType))
                            @foreach($getParkingType as $parkingType)
                              <option value="<?= $parkingType->parking_type_id?>" <?php echo ($spot->parking_type_id == $parkingType->parking_type_id) ? 'selected' : ''; ?>><?= $parkingType->parking_type ?></option>
                            @endForEach
                          @endIf
                          </select>
						            </td>
						            <td class="col-sm-3">
						                <input type="text" name="data[parking][total_parking_spots][]" placeholder="Total Parking spots" value="<?php echo (isset($spot->total_parking_spots)) ? $spot->total_parking_spots : ''; ?>">
						            </td>
						            <td class="col-sm-2"><a class="deleteRow"></a>
						            </td>
						        </tr>
                    <?php } ?>



						    </tbody>
						    <tfoot>
						        <tr>
						            <td colspan="5" style="text-align: right;">
						                <input type="button" class="btn btn-lg btn-block addrow" id="addrow" value="Add Row" />
						            </td>
						        </tr>
						        <tr>
						        </tr>
						    </tfoot>
						</table>

						  <label>Select Booking Duration Type and Enter Property Rent</label>
						  <table id="myTable" class=" table order-list">
						    <tbody>
						        <tr>
						            <td class="col-sm-3">
						             <select name="data[parking][car_type_id][]">
                         <option value="">Car Type</option>
                        @if(!empty($getCarType))
                          @foreach($getCarType as $carType)
                            <option value="<?= $carType->car_type_id?>"><?= $carType->car_type?></option>
                          @endForEach
                        @endIf
                        </select>
						            </td>
                        <?php foreach($getPropertyRent as $rent) { ?>
						            <td class="col-sm-3">
						                <input type="hidden" name="data[parking][duration_type_id][<?php echo  $rent->duration_type_id; ?>][]" value="<?php echo  $rent->rent_amount; ?>">
                            <input type="text" name="data[parking][rent_amount][<?php echo  $rent->duration_type_id; ?>][]" value="<?php echo  $rent->rent_amount; ?>" placeholder="HourlyPrice">
						            </td>
                      <?php } ?>
						           <!-- <td class="col-sm-3">
                        <input type="hidden" name="data[parking][duration_type_id][2][]" value="2">
                        <input type="text" name="data[parking][rent_amount][2][]" placeholder="DailyPrice"></td>
						            <td class="col-sm-3">
                          <input type="hidden" name="data[parking][duration_type_id][3][]" value="3"><input type="text" name="data[parking][rent_amount][3][]" placeholder="MonthlyPrice">
                        </td> -->

						            <td class="col-sm-2"><a class="deleteRow"></a>

						            </td>
						        </tr>
						    </tbody>
						    <tfoot>
						        <tr>
						            <td colspan="5" style="text-align: right;">
						                <input type="button" class="btn btn-lg btn-block addrow" id="second-addrow" value="Add Row" />
						            </td>
						        </tr>
						        <tr>
						        </tr>
						    </tfoot>
						</table>
                      <input type="button" name="next" class="next action-button" value="Save">
                      <div class="clear"></div>
                    </div><!-- stepbox -->
                </div>

                <div id="ep04" class="tab-pane fade">
                  <div class="stepbox">
                    <h3>Amenities and Other</h3>
                    <ul class="aminities-list custom-checkbox" id="amenities_list"><li>

                      <?php foreach($getAmenities as $anm) { ?>
                      <input type="checkbox" name="data[amenities][]" value="<?php echo $anm->amenity_id; ?>">
                      <label><img src="<?php echo URL::to('public/images/amenity/'.$anm->amenity_name.''); ?>" alt=""> EV charging  </label>
                      <?php } ?>


                    </li></ul>
                    <hr>
                    <h3>Location Type</h3>
                    <ul class="custom-radio" id="locationtypes"><li>
                      <?php foreach($getLocationTypes as $loctype) { ?>
                      <input type="radio" name="data[location_type]" id="<?php echo $loctype->location_type; ?>" value="<?php echo $loctype->location_type_id; ?>"><label for="<?php echo $loctype->location_type; ?>"><?php echo $loctype->location_type; ?></label>
                      <?php } ?>
                       </li></ul>
                     <input type="button" name="next" class="next action-button" value="Save">
                     <div class="clear"></div>
                  </div><!-- stepbox -->
                </div>

                <div id="ep05" class="tab-pane fade">
                  <div class="stepbox">
                    <h3>When is it available?</h3>
                    <div class="box">
                    <div class="availablediv">
                    <div class="ad-row row sunday-row">
                      <div class="ad-col col-sm-2">Sunday</div>
                      <div class="ad-col col-sm-2">
                            <label class="switch">
                            <input type="checkbox" name="day_status[sunday]"  id="sunday-checkbox" value="1"  data-on="On" data-off="Off">
                            <span class="slider round" id="sunday-slider"></span>
                          </label>
                      </div>
                      <div class="ad-col col-sm-3">
                         <input type="hidden" name="dayname[]" value="sunday">
                        <input type="radio" name="day_hours[sunday]" value="24" id="sunday-allday" checked><label for="sunday-allday">All day (24 hours)</label>
                      </div>
                      <div class="ad-col col-sm-2">
                        <input type="radio" name="day_hours[sunday]" value="1" id="sunday-sethrs"><label for="sunday-sethrs">Set hours</label>
                      </div>
                      <div class="ad-col col-sm-3">
                        <div class="form-group date-group">
                              <input type="text" name="from_hours_time[sunday]" placeholder="Time" id="sunday-from" class="dates" >
                              <input type="text" name="to_hours_time[sunday]" placeholder="Time" id="sunday-to" class="dates"> 
                        </div>
                      </div>
                    </div><!--ad-row-->
                    <div class="ad-row row monday-row">
                      <div class="ad-col col-sm-2">Monday</div>
                      <div class="ad-col col-sm-2">
                       
                          <label class="switch">
                            <input type="checkbox" name="day_status[monday]" id="monday-checkbox">
                            <span class="slider round" id="monday-slider"></span>
                          </label>
                      </div>
                      <div class="ad-col col-sm-3">
                         <input type="hidden" name="dayname[]" value="monday">
                        <input type="radio" name="day_hours[monday]" value="24"  id="monday-allday" checked><label for="monday-allday">All day (24 hours)</label>
                      </div>
                      <div class="ad-col col-sm-2">
                        <input type="radio" name="day_hours[monday]" value="1"  id="monday-sethrs"><label for="monday-sethrs">Set hours</label>
                      </div>
                      <div class="ad-col col-sm-3">
                        <div class="form-group date-group">
                              <input type="text" name="from_hours_time[monday]" placeholder="Time" id="monday-from" class="dates">
                              <input type="text" name="to_hours_time[monday]" placeholder="Time" id="monday-to" class="dates"> 
                        </div>
                      </div>
                    </div><!--ad-row-->
                    <div class="ad-row row tuesday-row">
                      <div class="ad-col col-sm-2">Tuesday</div>
                      <div class="ad-col col-sm-2">
                          
                          <label class="switch">
                            <input type="checkbox" name="day_status[tuesday]" id="tuesday-checkbox">
                            <span class="slider round" id="tuesday-slider"></span>
                          </label>
                      </div>
                      <div class="ad-col col-sm-3">
                        <input type="hidden" name="dayname[]" value="tuesday">
                        <input type="radio" name="day_hours[tuesday]"  value="24" id="tuesday-allday" checked><label for="tuesday-allday">All day (24 hours)</label>
                      </div>
                      <div class="ad-col col-sm-2">
                        <input type="radio" name="day_hours[tuesday]" value="1"  id="tuesday-sethrs"><label for="tuesday-sethrs">Set hours</label>
                      </div>
                      <div class="ad-col col-sm-3">
                        <div class="form-group date-group">
                              <input type="text" name="from_hours_time[tuesday]" placeholder="Time" id="tuesday-from" class="dates">
                              <input type="text" name="to_hours_time[tuesday]" placeholder="Time" id="tuesday-to" class="dates"> 
                        </div>
                      </div>
                    </div><!--ad-row-->
                    <div class="ad-row row wednesday-row">
                      <div class="ad-col col-sm-2">Wednesday</div>
                      <div class="ad-col col-sm-2">
                         
                          <label class="switch">
                            <input type="checkbox" name="day_status[wednesday]" id="wednesday-checkbox">
                            <span class="slider round" id="wednesday-slider"></span>
                          </label>
                      </div>
                      <div class="ad-col col-sm-3"> 
                         <input type="hidden" name="dayname[]" value="wednesday">
                        <input type="radio" name="day_hours[wednesday]"  value="24" id="wednesday-allday" checked><label for="wednesday-allday">All day (24 hours)</label>
                      </div>
                      <div class="ad-col col-sm-2">
                        <input type="radio" name="day_hours[wednesday]" value="1"  id="wednesday-sethrs"><label for="wednesday-sethrs">Set hours</label>
                      </div>
                      <div class="ad-col col-sm-3">
                        <div class="form-group date-group">
                              <input type="text" name="from_hours_time[wednesday]" placeholder="Time" id="wednesday-from" class="dates">
                              <input type="text" name="to_hours_time[wednesday]" placeholder="Time" id="wednesday-to" class="dates"> 
                        </div>
                      </div>
                    </div><!--ad-row-->
                    <div class="ad-row row thursday-row">
                      <div class="ad-col col-sm-2">Thursday</div>
                      <div class="ad-col col-sm-2">
                          <label class="switch">
                            <input type="checkbox" name="day_status[thursday]"  id="thursday-checkbox">
                            <span class="slider round" id="thursday-slider"></span>
                          </label>
                      </div>
                      <div class="ad-col col-sm-3">
                        <input type="hidden" name="dayname[]" value="thursday">
                        <input type="radio"  name="day_hours[thursday]"  value="24" id="thursday-allday" checked><label for="thursday-allday">All day (24 hours)</label>
                      </div>
                      <div class="ad-col col-sm-2">
                        <input type="radio" name="day_hours[thursday]" value="1"  id="thursday-sethrs"><label for="thursday-sethrs">Set hours</label>
                      </div>
                      <div class="ad-col col-sm-3">
                        <div class="form-group date-group">
                              <input type="text" name="from_hours_time[thursday]" placeholder="Time" id="thursday-from" class="dates">
                              <input type="text" name="to_hours_time[thursday]" placeholder="Time" id="thursday-to" class="dates"> 
                        </div>
                      </div>
                    </div><!--ad-row-->
                    <div class="ad-row row friday-row">
                      <div class="ad-col col-sm-2">Friday</div>
                      <div class="ad-col col-sm-2">
                          <label class="switch">
                            <input type="checkbox"  name="day_status[friday]"  id="friday-checkbox">
                            <span class="slider round" id="friday-slider"></span>
                          </label>
                      </div>
                      <div class="ad-col col-sm-3">
                        <input type="hidden" name="dayname[]" value="friday">
                        <input type="radio" name="day_hours[friday]"  value="24" id="friday-allday" checked><label for="friday-allday">All day (24 hours)</label>
                      </div>
                      <div class="ad-col col-sm-2">
                        <input type="radio" name="day_hours[friday]"  value="1"  id="friday-sethrs"><label for="friday-sethrs">Set hours</label>
                      </div>
                      <div class="ad-col col-sm-3">
                        <div class="form-group date-group">
                              <input type="text" name="from_hours_time[friday]" placeholder="Time" id="friday-from" class="dates">
                              <input type="text" name="to_hours_time[friday]" placeholder="Time" id="friday-to" class="dates"> 
                        </div>
                      </div>
                    </div><!--ad-row-->
                    <div class="ad-row row saturday-row">
                      <div class="ad-col col-sm-2">Saturday</div>
                      <div class="ad-col col-sm-2">
                          <label class="switch">
                            <input type="checkbox" name="day_status[saturday]" id="saturday-checkbox">
                            <span class="slider round"  id="saturday-slider"></span>
                          </label>
                      </div>
                      <div class="ad-col col-sm-3">
                         <input type="hidden" name="dayname[]" value="saturday">
                        <input type="radio" name="day_hours[saturday]"  value="24" id="saturday-allday" checked><label for="saturday-allday">All day (24 hours)</label>
                      </div>
                      <div class="ad-col col-sm-2">
                        <input type="radio" name="day_hours[saturday]" value="1"  id="saturday-sethrs"><label for="saturday-sethrs">Set hours</label>
                      </div>
                      <div class="ad-col col-sm-3">
                        <div class="form-group date-group">
                              <input type="text" name="from_hours_time[saturday]" placeholder="Time" id="saturday-from" class="dates">
                              <input type="text" name="to_hours_time[saturday]" placeholder="Time" id="saturday-to" class="dates"> 
                        </div>
                      </div>
                    </div><!--ad-row-->
                  </div>
                  </div>
                  <input type="button" name="next" class="next action-button" value="Save">
                     <div class="clear"></div>
                  </div><!-- stepbox -->
                </div>

                <div id="ep06" class="tab-pane fade">
                  <div class="stepbox">
                    <h3>Set your cancellation policy</h3>
                    <div class="box" id="get_cancellation_policy">
                     
                      <?php foreach($getcancellationpolicies as $policy) { ?>
                      <div class="row">
                        <div class="col-sm-3">
                        <div class="ad-col"><input type="radio" name="cancellation_policy_id" id="<?php echo $policy->cancellation_policy_id; ?>" value="<?php echo $policy->cancellation_policy_id; ?>"><label for="<?php echo $policy->cancellation_policy_id; ?>"><?php echo $policy->cancellation_type; ?></label>
                        </div>
                      </div>
                      <div class="col-sm-9"><p><?php echo $policy->cancellation_policy_text; ?></p></div></div>
                    <?php } ?>

                     </div>
                    <tfoot>
                   <input type="button" name="next" class="next action-button" value="Save">
                     <div class="clear"></div>
                  </div><!-- stepbox -->
                </div>
                
                <div id="ep07" class="tab-pane fade">
                  <div class="stepbox">
                    <h3>Documents</h3>
                    <div class="box">
                      <input type="file" name="property_documents[]" multiple="" id="property-documents">
                    </div>
                    <input type="button" name="next" class="next action-button" value="Save">
                     <div class="clear"></div>
                  </div><!-- stepbox -->
                </div>

              </div>
            </div>
          </section> <!-- edit-property  -->
      </div><!-- dl-content -->

 </div></section></div>

 @stop