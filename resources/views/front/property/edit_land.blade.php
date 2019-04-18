 @extends('front/layouts.default')
  @section('content')


  <div class="site-content">

<section class="dashboard-layout host-dash">
    <div class="row">

@include('front/includes.host_side_menu')
      
      <div class="col-lg-10 col-md-9 col-sm-12 dl-content">
          <section class="edit-parking edit-property">
            <h2>Edit Land</h2>
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-12">
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#ep01">Property Information</a></li>
                    <li><a data-toggle="tab" href="#ep02">Property Floor Map</a></li>
                    <li><a data-toggle="tab" href="#ep03">Property size </a></li>
                    <li><a data-toggle="tab" href="#ep04">Amenities and Other</a></li>
                    <li><a data-toggle="tab" href="#ep05">Tour Availability </a></li>
                    <li><a data-toggle="tab" href="#ep06">Set your cancellation policy</a></li>
                    <li><a data-toggle="tab" href="#ep07">Documents</a></li>
                  </ul>
              </div>
              <div class="col-lg-9 col-md-9 col-sm-12 tab-content">
                <div id="ep01" class="tab-pane fade in active">
                    <div class="stepbox">
                      <h3>Property Information</h3>
                      <input type="text" name="data[property_name]" id="property_name" placeholder="Property Name ">
                      <select id="select-property-type" name="module_manage_id" class="type" onchange="getProprtyMasters(this.value)">
                        <option value="">Select Property</option>
                        <option value="2">Parking</option>
                        <option value="3">Land</option>
                        <option value="4">Industry</option>
                        <option value="5">Developement</option>
                      </select>
                              
                      <input type="text" name="data[location]" id="location-property" placeholder="Location" autocomplete="off">
                      <input type="text" name="data[zip_code]" id="zip_code" placeholder="Enter Property Zip Code">
                      <textarea placeholder="Property description" name="data[property_description]" id="property_description" cols="6"></textarea>
                      <div class="box">
                        <input type="file" name="" id="" multiple="" >
                        <div class="row">
                          <div class="column">
                            <img src="{{ URL::asset('public') }}/assets/front-design/images/discoverpsace01.jpg" alt="">
                            <a href=""><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                          </div>
                          <div class="column">
                            <img src="{{ URL::asset('public') }}/assets/front-design/images/discoverpsace01.jpg" alt="">
                            <a href=""><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                          </div>
                          <div class="column">
                            <img src="{{ URL::asset('public') }}/assets/front-design/images/discoverpsace01.jpg" alt="">
                            <a href=""><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                          </div>
                          <div class="column">
                            <img src="{{ URL::asset('public') }}/assets/front-design/images/discoverpsace01.jpg" alt="">
                            <a href=""><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                          </div>
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
                          <input type="file" name="" id="" multiple="" >
                          <div class="row">
                            <div class="column">
                            <img src="{{ URL::asset('public') }}/assets/front-design/images/floormap.jpg" alt="">
                              <a href=""><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                            </div>
                          </div>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Save">
                        <div class="clear"></div>
                      </div><!-- stepbox -->
                </div>

                <div id="ep03" class="tab-pane fade">
                      <div class="stepbox">
                      <h3>Property size </h3>
                      <label style="float: none;width: 100%;text-align: left;font-weight: 600;">Units</label>
                      <ul class="custom-radio" id="get_property_size"><li><input type="radio" name="units" id="Sqft" value="1"><label for="Sqft">Sqft</label>&nbsp;&nbsp;<input type="radio" name="units" id="Sq" meter="" value="2"><label for="Sq" meter="">Sq Meter</label>&nbsp;&nbsp;<input type="radio" name="units" id="Acres" value="3"><label for="Acres">Acres</label></li></ul>
                      <input type="text" name="property_size" placeholder="Sqft / Sq Meter / Acres">
                      <hr>
                      <h3>Land Use for</h3>
                      <ul class="custom-checkbox">
                        <li>
                          <input type="checkbox" name="data[land][land_used_for][]" value="1" id="1land_used_for">
                          <label for="1land_used_for">Agriculture</label>&nbsp;&nbsp;
                          <input type="checkbox" name="data[land][land_used_for][]" value="2" id="2land_used_for">
                          <label for="2land_used_for">Commercials</label>
                        </li>
                      </ul>
                      <label>Enter Property Rent</label>
                      <table id="tbl_land_rent_with_booking_duration_type" class="table order-list-land">
                        <tbody>
                            <tr>
                                <td class="col-sm-3">
                                  <table id="rent_land_with_booking_duration_type"><tbody><tr class="duration_price_input"><td class="col-sm-3"><input type="hidden" name="data[parking][duration_type_id][2][]" value="2"><input type="text" name="data[parking][rent_amount][2][]" placeholder="DailyPrice"></td><td class="col-sm-3"><input type="hidden" name="data[parking][duration_type_id][3][]" value="3"><input type="text" name="data[parking][rent_amount][3][]" placeholder="MonthlyPrice"></td><td class="col-sm-3"><input type="hidden" name="data[parking][duration_type_id][4][]" value="4"><input type="text" name="data[parking][rent_amount][4][]" placeholder="WeeklyPrice"></td></tr></tbody></table>
                                </td>
                                <td class="col-sm-2"><a class="deleteRow"></a>
                                </td>
                            </tr>
                        </tbody>
                      </table>
                      <input type="button" name="next" class="next action-button" value="Save">
                        <div class="clear"></div>
                    </div><!-- stepbox -->
                </div>

                <div id="ep04" class="tab-pane fade">
                  <div class="stepbox">
                    <h3>Amenities and Other</h3>
                    <ul class="aminities-list custom-checkbox" id="amenities_list"><li>
                      <input type="checkbox" name="data[amenities][]" id="EV charging" value="59">
                      <label for="EV charging">EV charging <img src="https://www.prymestory.com/public/images/amenity/ev charging.png" width="50"></label>
                      <input type="checkbox" name="data[amenities][]" id="Water supply" value="58"><label for="Water supply">Water supply <img src="https://www.prymestory.com/public/images/amenity/water supply.svg" width="50"></label>
                      <input type="checkbox" name="data[amenities][]" id="Security" value="57"><label for="Security">Security <img src="https://www.prymestory.com/public/images/amenity/security.svg" width="50"></label>
                      <input type="checkbox" name="data[amenities][]" id="Wifi" value="55"><label for="Wifi">Wifi <img src="https://www.prymestory.com/public/images/amenity/wifi.svg" width="50"></label>
                      <input type="checkbox" name="data[amenities][]" id="Fire Extinguisher" value="61"><label for="Fire Extinguisher">Fire Extinguisher <img src="https://www.prymestory.com/public/images/amenity/fire extinguisher.svg" width="50"></label>
                      <input type="checkbox" name="data[amenities][]" id="Wheelchair accesible" value="56"><label for="Wheelchair accesible">Wheelchair accesible <img src="https://www.prymestory.com/public/images/amenity/wheelchaire.svg" width="50"></label>
                    </li></ul>
                    <hr>
                     <input type="button" name="next" class="next action-button" value="Save">
                     <div class="clear"></div>
                  </div><!-- stepbox -->
                </div>

                <div id="ep05" class="tab-pane fade">
                  <div class="stepbox">
                    <h3>Tour Availability </h3>
                    <ul class="custom-radio" style="text-align: left;">
                      <li>
                        <input type="radio" name="data[land][tour_availability]" value="1" id="tour_availability_yes">
                        <label for="tour_availability_yes">Yes  </label>
                     
                        <input type="radio" name="data[land][tour_availability]" value="0" id="tour_availability_no">
                        <label for="tour_availability_no">No </label>
                      </li>
                  </ul> 
                  <input type="button" name="next" class="next action-button" value="Save">
                     <div class="clear"></div>
                  </div><!-- stepbox -->
                </div>

                <div id="ep06" class="tab-pane fade">
                  <div class="stepbox">
                    <h3>Set your cancellation policy</h3>
                    <div class="box" id="get_cancellation_policy"><div class="row"><div class="col-sm-3"><div class="ad-col"><input type="radio" name="cancellation_policy_id" id="18" value="18"><label for="18">Moderate</label></div></div><div class="col-sm-9"><p>Before 24 hrs – No fees/ Charges</p></div></div><div class="row"><div class="col-sm-3"><div class="ad-col"><input type="radio" name="cancellation_policy_id" id="19" value="19"><label for="19">Moderate</label></div></div><div class="col-sm-9"><p>Before 23.59 – 25% Charges</p></div></div><div class="row"><div class="col-sm-3"><div class="ad-col"><input type="radio" name="cancellation_policy_id" id="10" value="10"><label for="10">Strict</label></div></div><div class="col-sm-9"><p>Before 23 hrs – No fees/ Charges</p></div></div><div class="row"><div class="col-sm-3"><div class="ad-col"><input type="radio" name="cancellation_policy_id" id="11" value="11"><label for="11">Strict</label></div></div><div class="col-sm-9"><p>Before 24 hrs – No fees/ Charges</p></div></div><div class="row"><div class="col-sm-3"><div class="ad-col"><input type="radio" name="cancellation_policy_id" id="20" value="20"><label for="20">Strict</label></div></div><div class="col-sm-9"><p>Before 24 hrs – 25% Charges</p></div></div><div class="row"><div class="col-sm-3"><div class="ad-col"><input type="radio" name="cancellation_policy_id" id="21" value="21"><label for="21">Strict</label></div></div><div class="col-sm-9"><p>Before 23.59 –50% Charges</p></div></div><div class="row"><div class="col-sm-3"><div class="ad-col"><input type="radio" name="cancellation_policy_id" id="22" value="22"><label for="22">Super Strict</label></div></div><div class="col-sm-9"><p>Before 24 hrs – 50 fees/ Charges</p></div></div><div class="row"><div class="col-sm-3"><div class="ad-col"><input type="radio" name="cancellation_policy_id" id="23" value="23"><label for="23">Super Strict</label></div></div><div class="col-sm-9"><p>Before 23.59 – 100% Charges</p></div></div></div>
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

    </div>
</section>
 
</div><!-- site-content -->

   @stop