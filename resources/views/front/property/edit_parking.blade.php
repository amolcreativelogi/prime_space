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
                    <form  action="<?php echo url('frontend/saveeditProperty'); ?>" method="post" enctype="multipart/form-data" id="msform" class="">
                     {!! csrf_field() !!} 
                     <input type="hidden" name="step1" value="step1">
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
                            <a href="javascript:void();"><i class="fa fa-times-circle" onclick="RemoveImage(<?php echo $pimage->file_id; ?>)" aria-hidden="true"></i></a>
                          </div>
                          <?php } ?>
                          
                        </div>

                      </div>
                      <input type="submit" name="next" class="next action-button" value="Save">
                      <div class="clear"></div>
                    </div><!-- stepbox -->
                  </form> 
                </div>


                <div id="ep02" class="tab-pane fade">
                   <form  action="<?php echo url('frontend/saveeditProperty'); ?>" method="post" enctype="multipart/form-data" id="msform2" class="">
                     {!! csrf_field() !!} 
                     <input type="hidden" name="step2" value="step2">
                    <div class="stepbox">
                        <h3>Property Floor Map</h3>
                        <div class="box">
                          <!-- <input type="file" name="" id="" multiple="" > -->
                          <div class="box custom-fileinput">
                            <input type="file" name="property_map[]" multiple="" >
                          <!--   <label for="property-map"><span></span> <strong>Choose Property Floor Map</strong></label> -->
                          </div>
                          <div class="row">
                            <?php foreach($getPropertyFloorMap as $floorMap) { ?>
                              <div class="column">
                                <img src="<?php echo URL::asset('public/images/property-floor-map/'.$floorMap->name.''); ?>" alt="">
                                <a href=""><i class="fa fa-times-circle"  onclick="RemoveImage(<?php echo $floorMap->file_id; ?>)" aria-hidden="true"></i></a>
                              </div>
                              <?php } ?>
                          </div>
                        </div>
                        <input type="submit" name="next" class="next action-button" value="Save">
                        <div class="clear"></div>
                      </div><!-- stepbox -->
                    </form>
                </div>

                <div id="ep03" class="tab-pane fade">
                  <form  action="<?php echo url('frontend/saveeditProperty'); ?>" method="post" enctype="multipart/form-data" id="msform3" class="">
                     {!! csrf_field() !!} 
                     <input type="hidden" name="step3" value="step3">
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
                      <table id="tbl_rent_with_booking_duration_type" class="table order-list">
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

                            <?php 

                            if(count($getPropertyAddRent) > 0) { ?>
                            <?php foreach($getPropertyAddRent as $rent) { ?>       
                              <td class="col-sm-3">
                                
                                  <input type="hidden" name="data[parking][duration_type_id][<?php echo  $rent->duration_type_id; ?>][]" value="<?php echo  $rent->duration_type_id; ?>">
                                  <input type="text" name="data[parking][rent_amount][<?php echo  $rent->duration_type_id; ?>][]" value="<?php echo  $rent->rent_amount; ?>" placeholder="">
                              </td>

                            <?php } } else { ?>
                              <?php 
                              foreach($getPropertyRent as $rent) { ?>
                              <td class="col-sm-3">
                                  <input type="hidden" name="data[parking][duration_type_id][<?php echo  $rent->duration_type_id; ?>][]" value="<?php echo  $rent->duration_type_id; ?>">
                                  <input type="text" name="data[parking][rent_amount][<?php echo  $rent->duration_type_id; ?>][]" value="" placeholder="">
                              </td>
                            <?php } ?>
                            <?php } ?>



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
                      <input type="submit" name="next" class="next action-button" value="Save">
                      <div class="clear"></div>
                    </div><!-- stepbox -->
                  </form>
                </div>

                <div id="ep04" class="tab-pane fade">
                  <form  action="<?php echo url('frontend/saveeditProperty'); ?>" method="post" enctype="multipart/form-data" id="msform4" class="">
                     {!! csrf_field() !!} 
                     <input type="hidden" name="step4" value="step4">
                  <div class="stepbox">
                    <h3>Amenities and Other</h3>
                    <ul class="aminities-list custom-checkbox" id="amenities_list"><li>
                      <?php foreach($getAmenities as $anm) {
                       $expData = explode(',', $getPropertyAmenity->amenity_id);
                       if(in_array($anm->amenity_id, $expData)) 
                       {
                          $checked = 'checked';
                       } else {
                          $checked = '';
                       }
                       ?>
                      <input type="checkbox" name="data[amenities][]" value="<?php echo $anm->amenity_id; ?>" <?php echo $checked; ?>>
                      <label><img src="<?php echo URL::to('public/images/amenity/'.$anm->amenity_name.''); ?>" alt=""> <?php echo $anm->amenity_name; ?>  </label>
                      <?php } ?>


                    </li></ul>
                    <hr>
                    <h3>Location Type</h3>
                    <ul class="custom-radio" id="locationtypes"><li>
                      <?php foreach($getLocationTypes as $loctype) { 
                        ?>
                      <input type="radio" name="data[location_type]" id="<?php echo $loctype->location_type; ?>" value="<?php echo $loctype->location_type_id; ?>" <?php echo ($parking->location_type_id == $loctype->location_type_id) ? 'checked' : ''; ?> ><label for="<?php echo $loctype->location_type; ?>"><?php echo $loctype->location_type; ?></label>
                      <?php } ?>
                       </li></ul>
                     <input type="submit" name="next" class="next action-button" value="Save">
                     <div class="clear"></div>
                  </div><!-- stepbox -->
                </form>
                </div>

                 <div id="ep05" class="tab-pane fade">
                   <form  action="<?php echo url('frontend/saveeditProperty'); ?>" method="post" enctype="multipart/form-data" id="msform5" class="">
                     {!! csrf_field() !!} 
                     <input type="hidden" name="step5" value="step5">
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
                      <?php $checked = ($SundayAval->start_time != '00:00:01') ? 'checked' : ''; ?>
                      <div class="ad-col col-sm-2">
                        <input type="radio" name="day_hours[sunday]" value="1" <?php echo $checked; ?> id="sunday-sethrs"><label for="sunday-sethrs">Set hours</label>
                      </div>
                      <div class="ad-col col-sm-3">
                        <div class="form-group date-group">
                              <input type="text" name="from_hours_time[sunday]" placeholder="Time" id="sunday-from" class="dates" value="<?php echo $SundayAval->start_time; ?>" >
                              <input type="text" name="to_hours_time[sunday]" placeholder="Time" id="sunday-to" class="dates"  value="<?php echo $SundayAval->end_time; ?>" > 
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
                              <input type="text" name="from_hours_time[monday]" placeholder="Time" id="monday-from" class="dates"  value="<?php echo $MondayAval->start_time; ?>">
                              <input type="text" name="to_hours_time[monday]" placeholder="Time" id="monday-to" class="dates" value="<?php echo $MondayAval->end_time; ?>"> 
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
                              <input type="text" name="from_hours_time[tuesday]" placeholder="Time" id="tuesday-from" class="dates"  value="<?php echo $TuesdayAval->start_time; ?>">
                              <input type="text" name="to_hours_time[tuesday]" placeholder="Time" id="tuesday-to" class="dates" value="<?php echo $TuesdayAval->end_time; ?>"> 
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
                              <input type="text" name="from_hours_time[wednesday]" placeholder="Time" id="wednesday-from" class="dates" value="<?php echo $WednesdayAval->start_time; ?>">
                              <input type="text" name="to_hours_time[wednesday]" placeholder="Time" id="wednesday-to" class="dates" value="<?php echo $WednesdayAval->end_time; ?>"> 
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
                              <input type="text" name="from_hours_time[thursday]" placeholder="Time" id="thursday-from" class="dates" value="<?php echo $ThursdayAval->start_time; ?>">
                              <input type="text" name="to_hours_time[thursday]" placeholder="Time" id="thursday-to" class="dates" value="<?php echo $ThursdayAval->end_time; ?>"> 
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
                              <input type="text" name="from_hours_time[friday]" placeholder="Time" id="friday-from" class="dates"  value="<?php echo $FridayAval->start_time; ?>">
                              <input type="text" name="to_hours_time[friday]" placeholder="Time" id="friday-to" class="dates"  value="<?php echo $FridayAval->end_time; ?>"> 
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
                              <input type="text" name="from_hours_time[saturday]" placeholder="Time" id="saturday-from" class="dates" value="<?php echo $SaturdayAval->start_time; ?>">
                              <input type="text" name="to_hours_time[saturday]" placeholder="Time" id="saturday-to" class="dates" value="<?php echo $SaturdayAval->end_time; ?>"> 
                        </div>
                      </div>
                    </div><!--ad-row-->
                  </div>
                  </div>
                  <input type="submit" name="next" class="next action-button" value="Save">
                     <div class="clear"></div>
                  </div><!-- stepbox -->
                </form>
                </div>

                

                <div id="ep06" class="tab-pane fade">

                  <form  action="<?php echo url('frontend/saveeditProperty'); ?>" method="post" enctype="multipart/form-data" id="msform6" class="">
                     {!! csrf_field() !!} 
                     <input type="hidden" name="step6" value="step6">

                  <div class="stepbox">

                    <h3>Set your cancellation policy</h3>
                    <div class="box" id="get_cancellation_policy">

                      <?php
                   

                       foreach($getcancellationpolicies as $policy) { 

                        if(isset($AddPropertyCancelPolicy)) {
                       $checked =  ($AddPropertyCancelPolicy->cancellation_policy_id == $policy->cancellation_policy_id) ? 'checked' : ''; 
                        } {
                         $checked =  '';
                      }
                        ?>
                      <div class="row">
                        <div class="col-sm-3">
                        <div class="ad-col"><input type="radio" name="cancellation_policy_id" id="<?php echo $policy->cancellation_policy_id; ?>" value="<?php echo $policy->cancellation_policy_id; ?>" <?php echo $checked; ?> ><label for="<?php echo $policy->cancellation_policy_id; ?>"><?php echo $policy->cancellation_type; ?></label>
                        </div>
                      </div>
                      <div class="col-sm-9"><p><?php echo $policy->cancellation_policy_text; ?></p></div></div>
                    <?php } ?>
                    </div>
                    <tfoot>
                   <input type="submit" name="next" class="next action-button" value="Save">
                     <div class="clear"></div>
                  </div><!-- stepbox -->
                </form>
                </div>
                
                <div id="ep07" class="tab-pane fade">
                   <form  action="<?php echo url('frontend/saveeditProperty'); ?>" method="post" enctype="multipart/form-data" id="msform6" class="">
                     {!! csrf_field() !!} 
                     <input type="hidden" name="step7" value="step7">
                  <div class="stepbox">
                    <h3>Documents</h3>
                    <div class="box">
                      <!-- <input type="file" name="property_documents[]" multiple="" id="property-documents"> -->
                      <div class="box custom-fileinput">
                        <input type="file" name=property-documents" id="property-documents" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple  />
                        <label for="property-documents"><span></span> <strong>Choose Property Documents</strong></label>
                      </div>
                    </div>
                    <input type="submit" name="next" class="next action-button" value="Save">
                     <div class="clear"></div>
                  </div><!-- stepbox -->
                  </form>
                </div>

              </div>
            </div>
          </section> <!-- edit-property  -->
    
   </div><!-- dl-content -->
 </div></section></div>

<script type="text/javascript">
// Add row for Parking Sopts in Add Property
$(document).ready(function () {
    var counter = 0;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><input type="text" class="form-control" name="data[parking][floor_name][]" placeholder="Enter floor name" name="name' + counter + '"/></td>';
        cols += '<td class="col-sm-3"><select name="data[parking][parking_type_id][]"><option value="">Parking Type</option>';

        <?php foreach($getParkingType as $parkingType) { ?>
        cols += '<option value="<?= $parkingType->parking_type_id?>"><?= $parkingType->parking_type ?></option>';
        <?php } ?>

        cols += '</select></td>';
        cols += '<td><input type="text" name="data[parking][total_parking_spots][]" class="form-control" placeholder="Total Parking spots " name="phone' + counter + '"/></td>';
        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list1").append(newRow);
        counter++;
    });
    $("table.order-list1").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });
});

function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}

// Add row for Car Parking Price in Add Property
$(document).ready(function () {
    var counter = 0;

    $("#second-addrow").on("click", function () {
        var newRow = $("<tr class='row'>");
        var cols = "";

        cols += '<td class="col-sm-3"><select><option>Car Type</option><option>Hatchback</option><option>Sedan</option><option>MPV</option><option>SUV </option><option>Crossover </option><option>Coupe</option><option>Convertibl </option></select></td>';
        cols += '<td class="col-sm-3"><input type="text" class="form-control" placeholder="Hourly Price" name="mail' + counter + '"/></td>';
        cols += '<td class="col-sm-3"><input type="text" class="form-control" placeholder="Daily Price" name="phone' + counter + '"/></td>';
        cols += '<td class="col-sm-3"><input type="text" class="form-control" placeholder="Monthly  Price" name="phone' + counter + '"/></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


});



function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#second-grandtotal").text(grandTotal.toFixed(3));
}



$('#msform, #msform2, #msform3, #msform4, #msform5, #msform6, #msform7').on('submit', function(e){
    $(".success-property").addClass("test");
    e.preventDefault();
    var formData = new FormData($(this)[0]);            
    var request = $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        //mimeType:'application/json',
        dataType:'json',
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){ 
            if(data.status == 200)
            { 
                if($(".success-property").hasClass('test'))
                {
                   $(".last-action-button").hide();
                   $(".success-property").removeClass("test");
                }
               alert(data.response['msg']);
               location.reload();
           // $('.fs-subtitle').html(data.response['msg']);
            $('.loader').css('display','none');
            $('.success-property').show();  
            $(this)[0].reset();
            }                         
            //alert('success');
        } ,
        error: function(msg){
             alert('error occurred please try again');  
        }
    });
});

 </script>


 <script>
function RemoveImage(id)
{
      if(confirm('Are you sure you want to delete this record?')){
      var url = '<?php echo URL::to('user/RemoveParkigImage'); ?>';
      //alert(isDeleteChild);
      $.ajax({
      method: 'POST',
      url: url,
      data: {'id':id}
      })
      .done(function( msg ) {
      alert('Record Deleted Successfully.');
      location.reload();
      // var oTable = $('#example').dataTable();
      // oTable.fnDraw();
      });
      }else{
      return false;
      }
}
</script>

 @stop