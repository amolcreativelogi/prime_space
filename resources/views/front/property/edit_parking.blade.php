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
                        <!-- <input type="file" name="" id="" multiple="" > -->
                        <div class="box custom-fileinput">
                            <input type="file" name="property_images[]" id="property_images" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple  />
                            <label for="property_images"><span></span> <strong>Choose Property Images</strong></label>
                          </div>
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
                          <!-- <input type="file" name="" id="" multiple="" > -->
                          <div class="box custom-fileinput">
                            <input type="file" name="property-map" id="property-map" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple  />
                            <label for="property-map"><span></span> <strong>Choose Property Floor Map</strong></label>
                          </div>
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
                      <h3>Cars and Pricing</h3>
                      <label>Enter Property Floors Parking spots</label>
						  <table id="myTable" class=" table order-list1">
                        <tbody>
                            <tr>
                                <td class="col-sm-3">
                                    <input type="text" name="data[parking][floor_name][]" placeholder="Enter floor name">
                                </td>
                                <td class="col-sm-3">
                                  <select name="data[parking][parking_type_id][]">
                                      <option value="">Parking Type</option>
                                      <option value="1">Self</option>
                                      <option value="2">Valet</option>
                                      <option value="3">Reserved</option>
                                      <option value="4">Handicap</option>
                                      <option value="5">handicaps</option>
                                  </select>
                                </td>
                                <td class="col-sm-3">
                                    <input type="text" name="data[parking][total_parking_spots][]" placeholder="Total Parking spots ">
                                </td>
                                <td class="col-sm-2"><a class="deleteRow"></a>

                                </td>
                            </tr>
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
                                      <option value=""></option>
                                  </select>
                                </td>

                                
                                      <td class="col-sm-3">
                                        <input type="text" name="" placeholder="Daily Price">
                                      </td>
                                      <td class="col-sm-3">
                                        <input type="text" name="" placeholder="Daily Price">
                                    </td>
                                    <td class="col-sm-3">
                                       <input type="text" name="" placeholder="Monthly Price">
                                    </td>
                                  
                                 
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
                    <ul class="aminities-list custom-checkbox" id="amenities_list">
                      <li>
                      <input type="checkbox" name="data[amenities][]" id="EV charging" value="59">
                      <label for="EV charging"><img src="https://www.prymestory.com/public/images/amenity/ev charging.png" alt=""> EV charging  </label>
                    </li>
                    <li>
                      <input type="checkbox" name="data[amenities][]" id="Water supply" value="58"><label for="Water supply"><img src="https://www.prymestory.com/public/images/amenity/water supply.svg" width="50"> Water supply </label>
                    </li>
                    <li>
                      <input type="checkbox" name="data[amenities][]" id="Security" value="57"><label for="Security"><img src="https://www.prymestory.com/public/images/amenity/security.svg" width="50"> Security </label>
                    </li>
                    <li>
                      <input type="checkbox" name="data[amenities][]" id="Wifi" value="55"><label for="Wifi"><img src="https://www.prymestory.com/public/images/amenity/wifi.svg" width="50"> Wifi </label>
                    </li>
                    <li>
                      <input type="checkbox" name="data[amenities][]" id="Fire Extinguisher" value="61"><label for="Fire Extinguisher"><img src="https://www.prymestory.com/public/images/amenity/fire extinguisher.svg" width="50"> Fire Extinguisher </label>
                    </li>
                    <li>
                      <input type="checkbox" name="data[amenities][]" id="Wheelchair accesible" value="56"><label for="Wheelchair accesible"><img src="https://www.prymestory.com/public/images/amenity/wheelchaire.svg" width="50"> Wheelchair accesible </label>
                    </li></ul>
                    <hr>
                    <h3>Location Type</h3>
                    <ul class="custom-radio" id="locationtypes"><li>
                      <input type="radio" name="data[location_type]" id="Covered" value="1"><label for="Covered">Covered</label>
                      <input type="radio" name="data[location_type]" id="Uncovered" value="2"><label for="Uncovered">Uncovered</label>
                      <input type="radio" name="data[location_type]" id="Both" value="3"><label for="Both">Both</label></li></ul>
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
                              <input type="text" name="from_hours_time[sunday]" placeholder="From Time" id="sunday-from" class="dates" >
                              <input type="text" name="to_hours_time[sunday]" placeholder="To Time" id="sunday-to" class="dates"> 
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
                              <input type="text" name="from_hours_time[monday]" placeholder="From Time" id="monday-from" class="dates">
                              <input type="text" name="to_hours_time[monday]" placeholder="To Time" id="monday-to" class="dates"> 
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
                              <input type="text" name="from_hours_time[tuesday]" placeholder="From Time" id="tuesday-from" class="dates">
                              <input type="text" name="to_hours_time[tuesday]" placeholder="To Time" id="tuesday-to" class="dates"> 
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
                              <input type="text" name="from_hours_time[wednesday]" placeholder="From Time" id="wednesday-from" class="dates">
                              <input type="text" name="to_hours_time[wednesday]" placeholder="To Time" id="wednesday-to" class="dates"> 
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
                              <input type="text" name="from_hours_time[thursday]" placeholder="From Time" id="thursday-from" class="dates">
                              <input type="text" name="to_hours_time[thursday]" placeholder="To Time" id="thursday-to" class="dates"> 
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
                              <input type="text" name="from_hours_time[friday]" placeholder="From Time" id="friday-from" class="dates">
                              <input type="text" name="to_hours_time[friday]" placeholder="To Time" id="friday-to" class="dates"> 
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
                              <input type="text" name="from_hours_time[saturday]" placeholder="From Time" id="saturday-from" class="dates">
                              <input type="text" name="to_hours_time[saturday]" placeholder="To Time" id="saturday-to" class="dates"> 
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
                    <div class="box" id="get_cancellation_policy"><div class="row"><div class="col-sm-3"><div class="ad-col"><input type="radio" name="cancellation_policy_id" id="8" value="8"><label for="8">Moderate</label></div></div><div class="col-sm-9"><p>Before 24 hrs – No fees/ Charges</p></div></div><div class="row"><div class="col-sm-3"><div class="ad-col"><input type="radio" name="cancellation_policy_id" id="9" value="9"><label for="9">Strict</label></div></div><div class="col-sm-9"><p>Before 23 hrs – No fees/ Charges</p></div></div><div class="row"><div class="col-sm-3"><div class="ad-col"><input type="radio" name="cancellation_policy_id" id="13" value="13"><label for="13">Super Strict</label></div></div><div class="col-sm-9"><p>Before 23.59 – 25% Charges</p></div></div></div>
                    <tfoot>
                   <input type="button" name="next" class="next action-button" value="Save">
                     <div class="clear"></div>
                  </div><!-- stepbox -->
                </div>
                
                <div id="ep07" class="tab-pane fade">
                  <div class="stepbox">
                    <h3>Documents</h3>
                    <div class="box">
                      <!-- <input type="file" name="property_documents[]" multiple="" id="property-documents"> -->
                      <div class="box custom-fileinput">
                        <input type="file" name=property-documents" id="property-documents" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple  />
                        <label for="property-documents"><span></span> <strong>Choose Property Documents</strong></label>
                      </div>
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


 <script type="text/javascript">
   // Add row for Parking Sopts in Add Property
$(document).ready(function () {
    var counter = 0;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><input type="text" class="form-control" placeholder="Enter floor name" name="name' + counter + '"/></td>';
        cols += '<td><select><option>Parking Type </option><option>Self </option><option>Valet </option><option>Reserved </option><option>Handicap </option></select></td>';
        cols += '<td><input type="text" class="form-control" placeholder="Total Parking spots " name="phone' + counter + '"/></td>';
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

 </script>

 @stop