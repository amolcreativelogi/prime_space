  @extends('front/layouts.default')
  @section('content')

  <div class="site-content">
  <section class="add-property">
  <div class="container">
 <h2>add property</h2>
  <!-- multistep form action="<?php echo url('frontend/saveProperty'); ?>"-->
  <form  action="<?php echo url('frontend/saveProperty'); ?>" method="post" enctype="multipart/form-data" id="msform" class="">

     {!! csrf_field() !!} 
  <!-- <form id="msform" > -->
  <!-- progressbar -->
  <ul id="progressbar">
  <li class="active"></li> 
  <li></li>
  <li></li>
  <li></li>
  <li class="avail-hide"></li>
  <li></li>
  <li></li>
  <li></li>
  </ul>

  <!-- fieldsets -->
 
  <fieldset>
  <h2 class="fs-title">Property Information</h2>
  <input type="text" name="data[property_name]" id="property_name" placeholder="Property Name " />
  <select id="select-property-type" name="module_manage_id" class="type" onchange="getProprtyMasters(this.value)">
     <option value="">Select Property</option>
    <?php foreach($getModuleCategories as $category){ ?>
        <option value="<?php echo $category->module_manage_id ?>"><?php echo $category->module_manage_name ?></option>
        <?php } ?>
       </select>
        <?php if($errors->first('module_manage_id')) { ?>
        <div class="text-danger"><?php echo $errors->first('module_manage_id'); ?></div>
    <?php } ?>
  </select>
  <input type="hidden" name="module_manage" value="3" id="module_manage" class="form-control">
  <input type="text" name="data[location]" id="location-property" placeholder="Location" />
  <input type="hidden" id="city-property" name="city">
  <input type="hidden" name="data[latitude]" id="latitude-property">
  <input type="hidden" name="data[longitude]" id="longitude-property">
  <input type="text" name="data[zip_code]" id="zip_code" placeholder="Enter Property Zip Code" />
  <textarea placeholder="Property description" name="data[property_description]" id="property_description" cols="6"></textarea>
  <div>
    <!-- <input type="file" name="property_images[]" id="property_images" multiple> -->
  <div class="box custom-fileinput">
    <input type="file" name="property_images[]" id="property_images" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple  />
    <label for="property_images"><span></span> <strong>Choose Property Images</strong></label>
  </div>

   <!--   class="box" class="inputfile inputfile-6" data-multiple-caption="{count} files selected"  <label for="property_images"><span></span> <strong>Choose Property Images</strong></label> -->
  </div>
  <input type="button" name="next" id="step1" class="next action-button" value="Next" />
  </fieldset>

  <fieldset>
  <h2 class="fs-title">Property Floor Map</h2>
  <div class="box">
    <!-- <input type="file" name="property_map[]" id="property-map" multiple /> -->
    <div class="box custom-fileinput">
    <input type="file" name="property_map[]" id="property-map" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple  />
    <label for="property-map"><span></span> <strong>Choose Property Floor Map</strong></label>
  </div>
  </div>
  <input type="button" name="previous" class="previous action-button" value="Previous" />
  <input type="button" name="next" id="step2" class="next action-button" value="Next" />
  </fieldset>


  <fieldset>
  <div class="form-field step-show" id="2"  style="display:none;">
    <h2 class="fs-title">Cars and Pricing</h2>
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
                  @if(!empty($getParkingType))
                    @foreach($getParkingType as $parkingType)
                      <option value="<?= $parkingType->parking_type_id?>"><?= $parkingType->parking_type ?></option>
                    @endForEach
                  @endIf
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
              <td colspan="5" style="text-align: left;">
                  <input type="button" class="btn btn-lg btn-block " id="addrow" value="Add Row" />
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

              <td class="col-sm-7">
                <table id="rent_with_booking_duration_type">
                  <!-- <tr>
                    <td class="col-sm-3">
                      <input type="text" name="" placeholder="Daily Price">
                    </td>
                    <td class="col-sm-3">
                      <input type="text" name="" placeholder="Daily Price">
                  </td>
                  <td class="col-sm-3">
                     <input type="text" name="" placeholder="Monthly Price">
                  </td>
                </tr> -->
               </table>
              </td>
              <!-- <td class="col-sm-3">
                  <input type="text" name="" placeholder="Daily Price">
              </td>
              <td class="col-sm-3">
                  <input type="text" name="" placeholder="Monthly Price">
              </td> -->
              <td class="col-sm-2"><a class="deleteRow"></a>

              </td>
          </tr>
      </tbody>
      <tfoot>
          <tr>
              <td colspan="5" style="text-align: left;">
                  <input type="button" class="btn btn-lg btn-block " id="second-addrow" value="Add Row" />
              </td>
          </tr>
          <tr>
          </tr>
      </tfoot>
    </table>
  </div>
  
  <!-- -->
  <div class="form-field step-show" id="3"  style="display:none;">
    <h2 class="fs-title">Property size </h2>
    <label style="float: none;width: 100%;text-align: left;font-weight: 600;">Units</label>
    <ul class="custom-radio" id="get_property_size">
   
    </ul>

  <input type="text" name="property_size" placeholder="Sqft / Sq Meter / Acres">
  <hr>

 
  <h2 class="fs-title">Land Use for</h2>
    <ul class="custom-checkbox">

       @if(!empty($getLandType))
          @foreach($getLandType as $landType)
           <li>
            <input type="checkbox" name="data[land][land_used_for][]" 
            value="<?= $landType->land_type_id?>" id="<?= $landType->land_type_id?>land_used_for">
            <label for="<?= $landType->land_type_id?>land_used_for"><?= $landType->land_type?></label>
          </li>
          @endForEach
        @endIf
    </ul>

    <label>Enter Property Rent</label>
    <table id="tbl_land_rent_with_booking_duration_type" class="table order-list-land">
      <tbody>
          <tr>
              <td class="col-sm-3">
                <table id="rent_land_with_booking_duration_type">
               </table>
              </td>
              <td class="col-sm-2"><a class="deleteRow"></a>

              </td>
          </tr>
      </tbody>
    </table>


  </div>

  <input type="button" name="previous" class="previous action-button" value="Previous" />
  <input type="button" name="next" id="step3" class="next action-button type" value="Next" />
  </fieldset>

  <fieldset>
  <h2 class="fs-title">Amenities and Other</h2>
  <ul class="aminities-list custom-checkbox" id="amenities_list">
    <!-- <li>
      <input type="checkbox" name="data[aminities]" id="Security">
      <label for="Security">Security</label>
    </li>
    <li>
      <input type="checkbox" name="aminities" id="EV-Charging">
      <label for="EV-Charging">EV Charging </label>
    </li>
    <li>
      <input type="checkbox" name="aminities" id="wheelchair">
      <label for="wheelchair">Wheelchair Accessible </label>
    </li>
    <li>
      <input type="checkbox" name="aminities" id="Security1">
      <label for="Security1">Security</label>
    </li>
    <li>
      <input type="checkbox" name="aminities" id="washing">
      <label for="washing">Washing center</label>
    </li>
    <li>
      <input type="checkbox" name="aminities" id="loundge">
      <label for="loundge">loundge</label>
    </li>
    <li>
      <input type="checkbox" name="aminities" id="fire-services">
      <label for="fire-services">Fire Services</label>
    </li>
    <li>
      <input type="checkbox" name="aminities" id="wheelchair1">
      <label for="wheelchair1">Wheelchair Accessible</label>
    </li>
    <li>
      <input type="checkbox" name="aminities" id="washing1">
      <label for="washing1">Washing Center</label>
    </li> -->
  </ul>
  <hr>
  <div id="locationtype">
  <h2 class="fs-title">Location Type</h2>
  <ul class="custom-radio" id="locationtypes">
     <!--  <li>
        <input type="radio" name="data[location_type]" id="covered">
        <label for="covered">Covered </label>
      </li>
      <li>
        <input type="radio" name="location" id="uncovered">
        <label for="uncovered">Uncovered</label>
      </li>
      <li>
        <input type="radio" name="location" id="both">
        <label for="both">Both</label>
      </li> -->
  </ul>
  </div>
  <input type="button" name="previous" class="previous action-button" value="Previous" />
  <input type="button" name="next" id="step4" class="next action-button" value="Next" />
  </fieldset>
  
  <fieldset>
  <div id="park-availabilty">
  <h2 class="fs-title">When is it available?</h2>
  <div class="box">
    <div class="availablediv">
    <div class="ad-row row sunday-row">
      <div class="ad-col col-sm-2">Sunday</div>
      <div class="ad-col col-sm-2">
            <label class="switch">
            <input type="checkbox" name="day_status[sunday]"  id="sunday-checkbox"  data-on="On" data-off="Off">
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
  </div>
  
  <div class="tour-avail">
      <h2 class="fs-title">Tour Availability </h2>
        <ul class="custom-radio" style="text-align: left;">
        <li>
          <input type="radio" name="data[land][tour_availability]" value="1" id="tour_availability_yes">
          <label for="tour_availability_yes">Yes  </label>
        </li>
        <li>
          <input type="radio" name="data[land][tour_availability]" value="0" id="tour_availability_no">
          <label for="tour_availability_no">No </label>
        </li>
      </ul>
  </div>
  
  
  <input type="button" name="previous" class="previous action-button" value="Previous" />
  <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>

  <fieldset id="cancellation-policy">
  <h2 class="fs-title">Set your cancellation policy</h2>
  <div class="box" id="get_cancellation_policy">
   

    
    
  </div>
  <input type="button" name="previous" class="previous action-button" value="Previous" />
  <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>

  <fieldset>
  <h2 class="fs-title">Documents</h2>
  <div>
    <!-- <input type="file" name="property_documents[]" multiple id="property-documents"/> -->
    <div class="box custom-fileinput">
    <input type="file" name="property_documents[]" id="property-documents" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple  />
    <label for="property-documents"><span></span> <strong>Choose Property Documents</strong></label>
  </div>
   <!--  class="inputfile inputfile-6" data-multiple-caption="{count} files selected" style="display: none;"  <label for="property-documents"><span></span> <strong>Choose Property Documents</strong></label> -->
  </div>
  <input type="button" name="previous" class="previous action-button" value="Previous" />
  <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>

  <fieldset>

  <div class="success-property" style="display: none;">
  <h2 class="fs-title">Thank you</h2>
  <h3 class="fs-subtitle"><div class="success-property-msg">Thank you for adding. Please wait for Admin approval.</div></h3>
  </div>

  <input type="button" name="previous" class="previous last-action-button action-button" value="Previous" />
  <input type="submit" name="submit" class="submit last-action-button action-button" value="Submit" />
  </fieldset>

  </form>
      </div>
  </section>

  </div><!-- site-content -->
  <!-- <link href="{{ URL::asset('public') }}/assets/front-design/css/component.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
 -->
  <script type="text/javascript">
    var baseurl = '<?php echo url('/'); ?>';
   /* $("#select-property-type").change(function() {
    alert('hi');
          var end = this.value;
          var firstDropVal = $('#pick').val();
      });
  */
  function getProprtyMasters(module_manage_id)
  {
          //alert(module_manage_id);  
          var url = baseurl+'/frontend/getPropertyMasters';
          //alert(url);
          $.ajax({
          method: 'POST',
          url: url,
          data: {'module_manage_id':module_manage_id,'_token':"{{ csrf_token() }}"}
          })
          .done(function(response) {
            //alert(response);
            var json = $.parseJSON(response); 
            var getBookingDurationType=json.getBookingDurationType;
            var getLocationTypes=json.getLocationTypes;
            var getAmenities=json.getAmenities;
            var getUnitTypes=json.getUnitTypes;
            var getcancellationpolicies=json.getcancellationpolicies;
            

            var masters=[];
              //if booking duration type array is not blank for selected module
              if(getBookingDurationType.length !== 0){
                masters['duration_price_input'] ='<tr class="duration_price_input">';
                $.each(getBookingDurationType, function(i, v) {
                    masters['duration_price_input'] += 
                   '<td class="col-sm-3">'+
                            '<input type="hidden" name="data[parking][duration_type_id]['+ v.duration_type_id +'][]" value="'+ v.duration_type_id +'"><input type="text" name="data[parking][rent_amount]['+ v.duration_type_id +'][]" placeholder="'+ v.duration_type +'Price">'+
                   '</td>'; 
                });
                masters['duration_price_input'] += '</tr>';
                if(module_manage_id == 2) {
                $('#rent_with_booking_duration_type').html(masters['duration_price_input']);
                } else if(module_manage_id ==3)  {
                $('#rent_land_with_booking_duration_type').html(masters['duration_price_input']);  
                }
              }

               masters['unittypes_input'] = '';
               if(getUnitTypes.length !== 0){
                $.each(getUnitTypes, function(i, v) {
                    masters['unittypes_input'] += 
                   '<li><input type="radio" name="units" id='+ v.unit_type +' value="'+ v.unit_type_id +'"><label for='+ v.unit_type +'>'+ v.unit_type +'</label></li>'; 
                });
                $('#get_property_size').html(masters['unittypes_input']);

 
                masters['duration_price_input'] += '</tr>';
                if(module_manage_id == 2) {
                $('#rent_with_booking_duration_type').html(masters['duration_price_input']);
                } else if(module_manage_id ==3)  {
                $('#rent_land_with_booking_duration_type').html(masters['duration_price_input']);  
                }
              }


              //if booking duration type array is not blank for selected module
              if(getcancellationpolicies.length !== 0){
                masters['cancellationpolicies'] ='';
                $.each(getcancellationpolicies, function(i, v) {
                    masters['cancellationpolicies'] += 
                            '<div class="row"><div class="col-sm-3"><div class="ad-col"><input type="radio" name="cancellation_policy_id" id="'+ v.cancellation_policy_id +'" value="'+ v.cancellation_policy_id +'"/><label for="'+ v.cancellation_policy_id +'">'+ v.cancellation_type +'</label></div></div><div class="col-sm-9"><p>'+ v.cancellation_policy_text +'</p></div></div>';
                   
                });
               // masters['cancellationpolicies'] += '';
                $('#get_cancellation_policy').html(masters['cancellationpolicies']);
                //alert(masters['location_type_input']);
              }


              //if booking duration type array is not blank for selected module
              if(getLocationTypes.length !== 0){
                masters['location_type_input'] ='<li>';
                $.each(getLocationTypes, function(i, v) {

                    masters['location_type_input'] += 
                            '<input type="radio" name="data[location_type]" id="'+v.location_type+'" value="'+v.location_type_id+'">'+
                            '<span for="'+v.location_type+'">'+v.location_type+'</span>';
                   
                });
                masters['location_type_input'] += '</li>';
               
                $('#locationtypes').html(masters['location_type_input']);
                //alert(masters['location_type_input']);
              }

               //if booking duration type array is not blank for selected module
              if(getAmenities.length !== 0){
                masters['amenities_input'] ='';
                $.each(getAmenities, function(i, v) {
                    masters['amenities_input'] += 
                            '<li><input type="checkbox" name="data[amenities][]" id="'+v.amenity_name+'" value="'+v.amenity_id+'">'+
                            '<span for="'+v.amenity_name+'"> <img src="<?php echo URL::to('/') ?>/public/images/amenity/'+v.amenity_image+'" width="50">'+v.amenity_name+'</span></li>';
                   
                });
                masters['amenities_input'] += '';
               
                $('#amenities_list').html(masters['amenities_input']);
                //alert(masters['amenities_input']);
              }
          });
  }
    // function test(){
    //   alert('hi'); 
    // }
// Add row for Parking Sopts in Add Property
$(document).ready(function () {
    var counter = 1;
    $("#addrow").on("click", function () {
        //alert('hia');
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td class="col-sm-3"><input type="text" class="form-control" placeholder="Enter floor name" name="data[parking][floor_name][]"/></td>';
        cols += '<td class="col-sm-3"><select name="data[parking][parking_type_id][]"><option value="">Parking Type</option>';

        <?php foreach($getParkingType as $parkingType) { ?>
        cols += '<option value="<?= $parkingType->parking_type_id?>"><?= $parkingType->parking_type ?></option>';
        <?php } ?>

        cols += '</select></td><td class="col-sm-3"><input type="text" class="form-control" placeholder="Total Parking spots " name="data[parking][total_parking_spots][]"/></td>';
        cols += '<td class="col-sm-2"><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list1").append(newRow);
        counter++;
    });

    $("table.order-list1").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });
});


// Add row for Car Parking Price in Add Property
$(document).ready(function () {
    var counter = 1;
    $("#second-addrow").on("click", function () {

        var duration_price_input = $('.duration_price_input').html();
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td class="car_type_id col-sm-3"><select name="data[parking][car_type_id][]"><option value="">Car Type</option>';

        <?php foreach($getCarType as $carType) { ?>
        cols += '<option value="<?= $carType->car_type_id?>"><?= $carType->car_type ?></option>';
        <?php } ?>

        cols += '</select></td>';
        
        cols += duration_price_input;

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

$(document).ready(function () {
  $('#property_name').focus();
    var counter = 1;
    $("#second-addrow-land").on("click", function () {

        var duration_price_input = $('.duration_price_input').html();
        var newRow = $("<tr>");
        var cols = "";

        cols += duration_price_input;

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list-land").append(newRow);
        counter++;
    });
    $("table.order-list-land").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });
});
</script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script type="text/javascript">
$(function() {

//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){

  var form = $("#msform");
    form.validate({
      rules: {
        'data[property_name]': {
          required: true,
        },
        'module_manage_id': {
          required: true,
        },
        'data[location]': {
          required: true,
        },
        'data[zip_code]': {
          required: true,
          digits: true
        },
        "data[property_description]": { 
           required: true,
        },
        "property_images[]": { 
           required: true,
           extension: "jpg|jpeg|png"
        },
        "data[parking][floor_name][]": { 
           required: true,
        },
        "data[parking][parking_type_id][]": { 
           required: true,
        },
        "data[parking][total_parking_spots][]": { 
           required: true,
           digits: true
        },
        "data[parking][car_type_id][]": { 
           required: true,
        },
        "data[parking][rent_amount][1][]": { 
           required: true,
        },
        "data[parking][rent_amount][2][]": { 
           required: true,
        },
        "data[parking][rent_amount][3][]": { 
           required: true,
        },
        "data[parking][rent_amount][4][]": { 
           required: true,
        },
        "data[amenities][]": {
            required: true,
            minlength: 1
         },
        "data[location_type]": {
            required: true,
            minlength: 1
         },
        "cancellation_policy_id": {
            required: true,
            minlength: 1
         },
         "property_documents[]": { 
           required: true,
           extension: "jpg|jpeg|png"
        },
        "units": { 
           required: true,
        },
        "property_size": { 
           required: true,
           digits: true
        },
        "data[land][land_used_for][]": { 
           required: true,
        },
        "data[land][tour_availability]": { 
           required: true,
            minlength: 1,
        }
      },
      messages: {
        'data[property_name]': {
          required: "Property name is required",
        },
        'module_manage_id': {
          required: "Property type is required",
        },
        'data[location]': {
          required: "Location name is required",
        },
        'data[zip_code]': {
          required: "Zip code is required",
        },
        'data[property_description]': {
          required: "Description is required",
        },
        'property_images[]': {
          required: "Property Images are required",
        },
        'data[parking][floor_name][]': {
          required: "floor name is required",
        },
        "data[parking][parking_type_id][]": {
          required: "Parking Type is required",
        },
        "data[parking][total_parking_spots][]": {
          required: "Total parking spot is required",
        },
        "data[parking][car_type_id][]": {
          required: "Car type id is required",
        },
        "data[parking][rent_amount][1][]": {
          required: "Hourly Price is required",
        },
        "data[parking][rent_amount][2][]": {
          required: "Daily Price is required",
        },
        "data[parking][rent_amount][3][]": {
          required: "Monthly Price is required",
        },
        "data[parking][rent_amount][4][]": {
          required: "Weekly Price is required",
        },
        "data[amenities][]": {
          required: "Amenities is required",
        },
        "data[location_type]": {
          required: "Location type is required",
        },
        "cancellation_policy_id": {
          required: "Cancellation Policy is required",
        },
        "property_documents[]": {
          required: "Property document is required",
        },
        "units": {
          required: "Units is required",
        },
        "property_size": {
          required: "Property size is required",
        },
        "data[land][land_used_for][]": {
          required: "land size is required",
        },
        "data[land][tour_availability]": {
          required: "tour availability is required"
        }
      }
    });
  // if(animating) return false;
  // animating = true;
 if (form.valid() == true){
      current_fs = $(this).parent();
      next_fs = $(this).parent().next();
      next_fs.show(); 
      current_fs.hide();
     // animating = false;
     $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active"); 
 }

  //activate next step on progressbar using the index of next_fs

  
  //show the next fieldset
  //next_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale current_fs down to 80%
      scale = 1 - (1 - now) * 0.2;
      //2. bring next_fs from the right(50%)
      left = (now * 50)+"%";
      //3. increase opacity of next_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'transform': 'scale('+scale+')'});
      next_fs.css({'left': left, 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
});

$(".previous").click(function(){
  //if(animating) return false;
  //animating = true;
  
  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev();
  
  //de-activate current step on progressbar
  $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
  
  //show the previous fieldset
  previous_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale previous_fs from 80% to 100%
      scale = 0.8 + (1 - now) * 0.2;
      //2. take current_fs to the right(50%) - from 0%
      left = ((1-now) * 50)+"%";
      //3. increase opacity of previous_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'left': left});
      previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  }); 
});
});

$('#msform').on('submit', function(e){


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

                    

            $('.fs-subtitle').html(data.response['msg']);
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
<!--  $("#rent_with_booking_duration_type").html('');

              '<table id="rent_with_booking_duration_type">
                  <tr>
                    <td class="col-sm-3">
                      <input type="text" name="" placeholder="Daily Price">
                    </td>
                    <td class="col-sm-3">
                      <input type="text" name="" placeholder="Daily Price">
                  </td>
                  <td class="col-sm-3">
                     <input type="text" name="" placeholder="Monthly Price">
                  </td>
                </tr>
</table>'; -->
@stop
