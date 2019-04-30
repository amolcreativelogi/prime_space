@extends('front/layouts.default')
@section('content')

<?php use \App\Http\Controllers\Front\SearchPropertyController;//echo print_r($_GET); die;//echo '<pre>'; print_r($searchResult); echo '</pre>'?>
<div class="site-content">

<div class="all-properties">
    <section class="ap-filter">
      <div class="container">
          <div class="row">
              <div class="col-sm-2">
                  <div class="prop-type first-prop-type">
                      <select id="select-property-type" class="select-property-type" name="module_manage_id" onchange="getAmenities(this.value)">
                                                    <option selected="" value="2" class="property-type">Parking</option>
                                                        <option value="3" class="property-type">Land</option>
                                                        <option value="4" class="property-type">Industry</option>
                                                        <option value="5" class="property-type">Developement</option>
                                                       </select>
                    </div>
              </div>
              <div class="col-sm-10">
                <div id="2" class="parking-slection">
                      <div class="prop-type">
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#hourly" role="tab" aria-controls="nav-home" aria-selected="true">Hourly</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#daily" role="tab" aria-controls="nav-profile" aria-selected="false">Daily</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#monthly" role="tab" aria-controls="nav-contact" aria-selected="false">Monthly</a>
                                </div>

                                
                                <select class="filter-select" id="car_type_id" name="car_type_id">
                                  <option value="">Car Type</option>
                                                                    <option selected="" value="1">Full Size</option>  
                                                                    <option value="2">Mid Size</option>  
                                                                    <option value="3">Compact</option>  
                                                                  </select>

                                <select class="filter-select" id="location_type_id" name="location_type_id">
                                  <option value="">Location Type</option>
                                                                    <option value="1">Covered</option>  
                                                                    <option value="2">Uncovered</option>  
                                                                    <option value="4">Garage Structure</option>  
                                                                    <option value="5">Parking Lot</option>  
                                                                    <option value="6">Personal</option>  
                                                                    <option value="7">Other</option>  
                                                                  </select>
                                
                               <!--  <select class="filter-select">
                                    <option>Location Type</option>
                                    <option>Covered </option>
                                    <option>Uncovered </option>
                                    <option>Both </option>
                                </select> -->
                            </nav>
                            

                            <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="hourly" role="tabpanel" aria-labelledby="nav-home-tab">
                              <div id="hourly" class="tablist-container filterbox hourly active show" style="display: block;">
            
                                <form>
                                  <div class="form-group">
                                    <label>Search</label>
                                    <div class="search">
                    
                                      <input type="text" name="hrlyFrmlocation" id="hrlyFrmlocation" placeholder="Address, City" autocomplete="off" runat="server">
                                      <input type="hidden" id="hrlyFrmCity" name="hrlyFrmCity">
                                      <input type="hidden" name="hrlyFrmLatitude" id="hrlyFrmLatitude" value="">
                                      <input type="hidden" name="hrlyFrmLongitude" id="hrlyFrmLongitude" value="">
                                      <!-- <input type="" name="" placeholder="Address, City"> -->
                    
                                    </div>
                                  </div>
                                  <div class="form-group date-group">
                                    <label>From Date</label>
                                    <div class="date"><input type="text" name="from_date" placeholder="Any" id="from_date"></div>
                                  </div>
                                  <!-- <div class="form-group time-group">-->
                                  <!--  <label>From time</label>-->
                                  <!--  <div class="time"><input type="text" name="from_time" placeholder="Any" id="from_time"></div>-->
                                  <!--</div>-->
                                  <div class="form-group date-group">
                                    <label>To date</label>
                                    <div class="date"><input type="text" name="to_date" placeholder="Any" id="to_date"></div>
                                  </div>
                                  <!--<div class="form-group time-group">-->
                                  <!--  <label>From time</label>-->
                                  <!--  <div class="time"><input type="text" name="to_time" placeholder="Any" id="to_time"></div>-->
                                  <!--</div>-->
                                </form>
                              </div>
                            </div>
                            <div class="tab-pane fade" id="daily" role="tabpanel" aria-labelledby="nav-profile-tab">
                              <div id="daily" class="tablist-container filterbox daily">
                                <form action="searchproperty/" method="get">
                                  <div class="form-group">
                                    <label>search</label>
                                    <div class="search">
                                      <input type="text" name="dailyFrmlocation" id="dailyFrmlocation" placeholder="Address, City" autocomplete="off" runat="server">
                                      <input type="hidden" id="dailyFrmCity" name="dailyFrmCity">
                                      <input type="hidden" name="dailyFrmLatitude" id="dailyFrmLatitude" value="">
                                      <input type="hidden" name="dailyFrmLongitude" id="dailyFrmLongitude" value="">
                                    </div>
                                    </div>
                                  <div class="form-group date-group">
                                    <label>From</label>
                                    <!-- <div class="date"><input type="" name="" placeholder="Any"></div> -->
                                     <div class="date"><input type="text" class="form-control" placeholder="Any" id="from"></div>
                                  </div>
                                  <div class="form-group date-group">
                                    <label>To</label>
                                    <div class="date"><input type="text" class="form-control" placeholder="Any" id="to"></div>
                                  </div>
                                 
                                </form>
                              </div>
                            </div>
                            <div class="tab-pane fade" id="monthly" role="tabpanel" aria-labelledby="nav-contact-tab">
                              <div id="monthly" class="tablist-container filterbox monthly">
                                <form action="searchproperty/" method="get">
                                  <div class="form-group">
                                    <label>search</label>
                                    <div class="search">
                                        <input type="text" name="monthlyFrmlocation" id="monthlyFrmlocation" placeholder="Address, City" autocomplete="off" runat="server">
                                        <input type="hidden" id="monthlyFrmCity" name="monthlyFrmCity">
                                        <input type="hidden" name="monthlyFrmLatitude" id="monthlyFrmLatitude" value="">
                                        <input type="hidden" name="monthlyFrmLongitude" id="monthlyFrmLongitude" value=""></div>
                                    </div>
                                  <div class="form-group date-group">
                                    <label>From</label>
                                    <!-- <div class="date"><input type="" name="" placeholder="Any"></div> -->
                                     <div class="date"><input type="text" class="form-control" placeholder="Any" id="monthly_from"></div>
                                  </div>
                                  <div class="form-group date-group">
                                    <label>To</label>
                                    <div class="date"><input type="text" class="form-control" placeholder="Any" id="monthly_to"></div>
                                  </div>
                                 
                                </form>
                              </div>
                            </div>
                            <input type="button" value="submit" onclick="searchURL()">
                          </div>
                  
                  
                        <!--<ul id="tablist">-->
                        <!--    <li><a href="#hourly" value="hourly">Hourly</a></li>-->
                        <!--    <li value="daily">Daily</li>-->
                        <!--    <li value="monthly">Monthly</li>-->
                        <!--</ul>-->
                    </div>
                       
        <!-- Tab panes -->
       
          
            
          
          
        </div>
                <div id="3" class="parking-slection" style="display: none;">
                    <nav>
              <div class="nav nav-tabs nav-fill" id="nav-tab1" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#land-daily" role="tab" aria-controls="nav-home" aria-selected="true">Daily</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#land-weekly" role="tab" aria-controls="nav-profile" aria-selected="false">Weekly</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#land-monthly" role="tab" aria-controls="nav-contact" aria-selected="false">Monthly</a>
              </div>

                <button data-toggle="collapse" data-target="#land-aminities" class="aminities-collapse"><i class="fa fa-bars" aria-hidden="true"></i></button>
              
              <select class="filter-select" name="land_type_id" id="land_type_id">
                          <option value="">Land Use for</option>
                                                    <option value="1">Agriculture</option>
                                                    <option selected="" value="2">Commercials</option>
                                                  </select>
            </nav>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="land-daily" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div id="land-daily" class="landtablist-container filterbox daily">
                                <form action="searchproperty/" method="get">
                                  <div class="form-group">
                                    <label>Region</label>
                                    <div class="search">
                                        <input type="text" name="landdailyFrmlocation" id="landdailyFrmlocation" placeholder="Address, City" autocomplete="off" runat="server">
                                        <input type="hidden" id="landdailyFrmCity" name="landdailyFrmCity">
                                        <input type="hidden" name="landdailyFrmLatitude" id="landdailyFrmLatitude" value="">
                                        <input type="hidden" name="landdailyFrmLongitude" id="landdailyFrmLongitude" value=""></div>
                                    </div>
                                  <div class="form-group date-group">
                                    <label>From</label>
                                    <!-- <div class="date"><input type="" name="" placeholder="Any"></div> -->
                                     <div class="date"><input type="text" class="form-control" placeholder="Any" id="daily_from"></div>
                                  </div>
                                  <div class="form-group date-group">
                                    <label>To</label>
                                    <div class="date"><input type="text" class="form-control" placeholder="Any" id="daily_to"></div>
                                  </div>
                                </form>
                              </div>
                  </div>
                  <div class="tab-pane fade" id="land-weekly" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div id="land-weekly" class="landtablist-container filterbox daily">
                                <form action="searchproperty/" method="get">
                                  <div class="form-group">
                                    <label>Region</label>
                                    <div class="search">
                                       <input type="text" name="landweeklyFrmlocation" id="landweeklyFrmlocation" value="" placeholder="Address, City" autocomplete="off" runat="server">
                                        <input type="hidden" id="landweeklyFrmCity" name="landweeklyFrmCity">
                                        <input type="hidden" name="landweeklyFrmLatitude" id="landweeklyFrmLatitude" value="">
                                        <input type="hidden" name="landweeklyFrmLongitude" id="landweeklyFrmLongitude" value=""></div>
                                    </div>
                                  <div class="form-group date-group">
                                    <label>From</label>
                                    <!-- <div class="date"><input type="" name="" placeholder="Any"></div> -->
                                     <div class="date"><input type="text" class="form-control" placeholder="Any" id="weekly_from"></div>
                                  </div>
                                  <div class="form-group date-group">
                                    <label>To</label>
                                    <div class="date"><input type="text" class="form-control" placeholder="Any" id="weekly_to"></div>
                                  </div>
                                </form>
                              </div>
                            </div>
                  <div class="tab-pane fade" id="land-monthly" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div id="land-monthly" class="landtablist-container filterbox daily">
                                <form action="searchproperty/" method="get">
                                  <div class="form-group">
                                    <label>Region</label>
                                    <div class="search">
                                        <input type="text" name="landmonthlyFrmlocation" id="landmonthlyFrmlocation" placeholder="Address, City" autocomplete="off" runat="server">
                                        <input type="hidden" id="landmonthlyFrmCity" name="landmonthlyFrmCity">
                                        <input type="hidden" name="landmonthlyFrmLatitude" id="landmonthlyFrmLatitude" value="">
                                        <input type="hidden" name="landmonthlyFrmLongitude" id="landmonthlyFrmLongitude" value=""></div>
                                    </div>
                                  <div class="form-group date-group">
                                    <label>From</label>
                                     <div class="date"><input type="text" class="form-control" placeholder="Any" id="land-monthly_from"></div> 
                                  </div>
                                  <div class="form-group date-group">
                                    <label>To</label>
                                    <div class="date"><input type="text" class="form-control" placeholder="Any" id="land-monthly_to"></div>
                                  </div>
                                </form>
                              </div>
                  </div>
                  <input type="button" value="submit" onclick="searchURL()">
                </div>
        
        
             <!--<div class="prop-type">-->
             <!--           <select id="landtablist"> -->
             <!--               <option value="land-daily">Daily </option>-->
             <!--               <option value="land-weekly">Weekly</option>-->
             <!--               <option value="land-monthly">Monthly</option>-->
             <!--           </select>-->
             <!--       </div>-->
            
          
          
          
          
          
          </div>  
              </div>
          </div>
        
        <!-- Nav tabs -->
        <!-- <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item ">
            <a class="nav-link "  data-toggle="tab" href="#monthly">Monthly</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link "  data-toggle="tab" href="#hourly">Hourly</a>
          </li>
        </ul> -->
        
      </div>
       <div id="parking-aminities" class="aminities-collapse-div">
          <!--class custom-checkbox removed for now because its not allowing to check the checkbox -->
          <div class="container">
          <ul class="aminities-list" id="amenities_list">
                                      <li><input type="checkbox" name="data[amenities][]" id="amenities" value="64">
                <label for="EV charging">
                <a target="_blank" href="https://www.prymestory.com/public/images/amenity/parking facility.svg"><img src="https://www.prymestory.com/public/images/amenity/parking facility.svg" width="50"></a> 

                  Over night parking</label>
              </li>
                          <li><input type="checkbox" name="data[amenities][]" id="amenities" value="66">
                <label for="EV charging">
                <a target="_blank" href="https://www.prymestory.com/public/images/amenity/on-site staff.svg"><img src="https://www.prymestory.com/public/images/amenity/on-site staff.svg" width="50"></a> 

                  On-Site Staff</label>
              </li>
                          <li><input type="checkbox" name="data[amenities][]" id="amenities" value="67">
                <label for="EV charging">
                <a target="_blank" href="https://www.prymestory.com/public/images/amenity/all time available.svg"><img src="https://www.prymestory.com/public/images/amenity/all time available.svg" width="50"></a> 

                  All time available</label>
              </li>
                          <li><input type="checkbox" name="data[amenities][]" id="amenities" value="68">
                <label for="EV charging">
                <a target="_blank" href="https://www.prymestory.com/public/images/amenity/free shuttle service.svg"><img src="https://www.prymestory.com/public/images/amenity/free shuttle service.svg" width="50"></a> 

                  Free Shuttle Service</label>
              </li>
                          <li><input type="checkbox" name="data[amenities][]" id="amenities" value="69">
                <label for="EV charging">
                <a target="_blank" href="https://www.prymestory.com/public/images/amenity/location memory.svg"><img src="https://www.prymestory.com/public/images/amenity/location memory.svg" width="50"></a> 

                  Location Memory</label>
              </li>
                          <li><input type="checkbox" name="data[amenities][]" id="amenities" value="70">
                <label for="EV charging">
                <a target="_blank" href="https://www.prymestory.com/public/images/amenity/in and out privileges.png"><img src="https://www.prymestory.com/public/images/amenity/in and out privileges.png" width="50"></a> 

                  In and Out Privileges</label>
              </li>
                      </ul>
          </div>
      </div>

    </section><!-- ap-filter -->

    <section class="filter-result">
      <div class="container">
        <div class="ondemand-filter">
          <a href="javascript:void();" class="ondemand-link active">closest</a> /
          <a href="javascript:void();" class="ondemand-link">cheapest</a>
          <a href="javascript:void();" class="ondemand-next">next</a> 
          <div class="clear"></div>
        </div>
        <div class="ondemand-map">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3720.81140801895!2d79.07615601489991!3d21.15990228592746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd4c0e4f0b614af%3A0xb84e5dfb07c84c0c!2sSaraf+Chambers+Income+Tax!5e0!3m2!1sen!2sin!4v1556630093469!5m2!1sen!2sin" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </section><!-- filter-result -->

</div><!-- all-properties -->
 
</div><!-- site-content -->
 <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!-- <h4 class="modal-title">Modal Header</h4> -->
                </div>
                <div class="modal-body">
                    <!-- <p>Some text in the modal.</p> -->
                    <p><input name="user_location" id="user_location" placeholder="Your Location" /></p>
                    <p><input name="prop_location" id="prop_location" placeholder=""/></p>
                </div>
                <div class="modal-footer">
                    <button type="button"  class="btn btn-default" onclick="showlocationOnMap()">Submit</button>
                    <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
</div>






@stop

