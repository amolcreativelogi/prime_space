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
                      <select id="select-property-type" class="select-property-type" name="module_manage_id">
                        <?php foreach($getModuleCategories as $category){ ?>
                            <option <?php if($category->module_manage_id == $searchArr['module_id']){ echo "selected";}?> value="<?php echo $category->module_manage_id ?>" class="property-type"><?php echo $category->module_manage_name ?></option>
                            <?php } ?>
                           </select>
                    </div>
              </div>
              <div class="col-sm-10">
                <div id="2" class="parking-slection">
                      <div class="prop-type">
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#hourly" role="tab" aria-controls="nav-home" aria-selected="true">Hourly</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"  href="#daily" role="tab" aria-controls="nav-profile" aria-selected="false">Daily</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#monthly" role="tab" aria-controls="nav-contact" aria-selected="false">Monthly</a>
                                </div>
                                
                                <select class="filter-select" id="car_type_id" name="car_type_id">
                                  <option value="">Car Type</option>
                                  <?php foreach($getCarType as $carType) { ?>
                                  <option <?php echo (Request::get("car_type_id")==$carType->car_type_id)?"selected":"" ?>
                                  value="<?php echo $carType->car_type_id; ?>"><?php echo $carType->car_type; ?></option>  
                                  <?php } ?>
                                </select>

                                <select class="filter-select" id="location_type_id" name="location_type_id">
                                  <option value="">Location Type</option>
                                  <?php foreach($getLocationType as $locationType) { ?>
                                  <option <?php echo (Request::get("location_type_id")==$locationType->location_type_id)?"selected":"" ?> value="<?php echo $locationType->location_type_id; ?>"><?php echo $locationType->location_type; ?></option>  
                                  <?php } ?>
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
                              <div id="hourly" class="tablist-container filterbox hourly" style="display: block;">
            
                                <form>
                                  <div class="form-group">
                                    <label>Search</label>
                                    <div class="search">
                    
                                      <input type="text" name="hrlyFrmlocation" id="hrlyFrmlocation" placeholder="Address, City" autocomplete="on" runat="server">
                                      <input type="hidden" id="hrlyFrmCity" name="hrlyFrmCity" />
                                      <input type="hidden" name="hrlyFrmLatitude" id="hrlyFrmLatitude">
                                      <input type="hidden" name="hrlyFrmLongitude" id="hrlyFrmLongitude">
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
                                      <input type="text" name="dailyFrmlocation" id="dailyFrmlocation" placeholder="Address, City" autocomplete="on" runat="server">
                                      <input type="hidden" id="dailyFrmCity" name="dailyFrmCity" />
                                      <input type="hidden" name="dailyFrmLatitude" id="dailyFrmLatitude">
                                      <input type="hidden" name="dailyFrmLongitude" id="dailyFrmLongitude">
                                    </div>
                                    </div>
                                  <div class="form-group date-group">
                                    <label>From</label>
                                    <!-- <div class="date"><input type="" name="" placeholder="Any"></div> -->
                                     <div class="date"><input type="text" class="form-control" placeholder="Any" id="from" /></div>
                                  </div>
                                  <div class="form-group date-group">
                                    <label>To</label>
                                    <div class="date"><input type="text" class="form-control" placeholder="Any" id="to" /></div>
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
                                        <input type="text" name="monthlyFrmlocation" id="monthlyFrmlocation" placeholder="Address, City" autocomplete="on" runat="server">
                                        <input type="hidden" id="monthlyFrmCity" name="monthlyFrmCity" />
                                        <input type="hidden" name="monthlyFrmLatitude" id="monthlyFrmLatitude">
                                        <input type="hidden" name="monthlyFrmLongitude" id="monthlyFrmLongitude"></div>
                                    </div>
                                  <div class="form-group date-group">
                                    <label>From</label>
                                    <!-- <div class="date"><input type="" name="" placeholder="Any"></div> -->
                                     <div class="date"><input type="text" class="form-control" placeholder="Any" id="monthly_from" /></div>
                                  </div>
                                  <div class="form-group date-group">
                                    <label>To</label>
                                    <div class="date"><input type="text" class="form-control" placeholder="Any" id="monthly_to" /></div>
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
                <div id="3" class="parking-slection" >
                    <nav>
              <div class="nav nav-tabs nav-fill" id="nav-tab1" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#land-daily" role="tab" aria-controls="nav-home" aria-selected="true">Daily</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#land-weekly" role="tab" aria-controls="nav-profile" aria-selected="false">Weekly</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#land-monthly" role="tab" aria-controls="nav-contact" aria-selected="false">Monthly</a>
              </div>
              
              <select class="filter-select" name="land_type_id" id="land_type_id">
                          <option value="">Land Use for</option>
                          <?php foreach($getlandType as $lType) { ?>
                          <option <?php echo (Request::get("land_type_id")==$lType->land_type_id)?"selected":"" ?> value="<?php echo $lType->land_type_id; ?>"><?php echo $lType->land_type; ?></option>
                          <?php } ?>
                        </select>
            </nav>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="land-daily" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div id="land-daily" class="landtablist-container filterbox daily">
                                <form action="searchproperty/" method="get">
                                  <div class="form-group">
                                    <label>Region</label>
                                    <div class="search">
                                        <input type="text" name="landdailyFrmlocation" id="landdailyFrmlocation" placeholder="Address, City" autocomplete="on" runat="server">
                                        <input type="hidden" id="landdailyFrmCity" name="landdailyFrmCity" />
                                        <input type="hidden" name="landdailyFrmLatitude" id="landdailyFrmLatitude">
                                        <input type="hidden" name="landdailyFrmLongitude" id="landdailyFrmLongitude"></div>
                                    </div>
                                  <div class="form-group date-group">
                                    <label>From</label>
                                    <!-- <div class="date"><input type="" name="" placeholder="Any"></div> -->
                                     <div class="date"><input type="text" class="form-control" placeholder="Any" id="daily_from" /></div>
                                  </div>
                                  <div class="form-group date-group">
                                    <label>To</label>
                                    <div class="date"><input type="text" class="form-control" placeholder="Any" id="daily_to" /></div>
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
                                       <input type="text" name="landweeklyFrmlocation" id="landweeklyFrmlocation" value="" placeholder="Address, City" autocomplete="on" runat="server">
                                        <input type="hidden" id="landweeklyFrmCity" name="landweeklyFrmCity" />
                                        <input type="hidden" name="landweeklyFrmLatitude" id="landweeklyFrmLatitude">
                                        <input type="hidden" name="landweeklyFrmLongitude" id="landweeklyFrmLongitude"></div>
                                    </div>
                                  <div class="form-group date-group">
                                    <label>From</label>
                                    <!-- <div class="date"><input type="" name="" placeholder="Any"></div> -->
                                     <div class="date"><input type="text" class="form-control" placeholder="Any" id="weekly_from" /></div>
                                  </div>
                                  <div class="form-group date-group">
                                    <label>To</label>
                                    <div class="date"><input type="text" class="form-control" placeholder="Any" id="weekly_to" /></div>
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
                                        <input type="text" name="landmonthlyFrmlocation" id="landmonthlyFrmlocation" placeholder="Address, City" autocomplete="on" runat="server">
                                        <input type="hidden" id="landmonthlyFrmCity" name="landmonthlyFrmCity" />
                                        <input type="hidden" name="landmonthlyFrmLatitude" id="landmonthlyFrmLatitude">
                                        <input type="hidden" name="landmonthlyFrmLongitude" id="landmonthlyFrmLongitude"></div>
                                    </div>
                                  <div class="form-group date-group">
                                    <label>From</label>
                                     <div class="date"><input type="text" class="form-control"placeholder="Any" id="land-monthly_from" /></div> 
                                  </div>
                                  <div class="form-group date-group">
                                    <label>To</label>
                                    <div class="date"><input type="text" class="form-control" placeholder="Any" id="land-monthly_to" /></div>
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
          <li class="nav-item <?php if($_GET['activeTab']=='monthly'){ echo 'active show';}else{ echo "";} ?>">
            <a class="nav-link <?php if($_GET['activeTab']=='monthly'){ echo 'active show';}else{ echo "";} ?>"  data-toggle="tab" href="#monthly">Monthly</a>
          </li>
          <li class="nav-item <?php if($_GET['activeTab']=='hourly'){ echo 'active show';}else{ echo ""; } ?>">
            <a class="nav-link <?php if($_GET['activeTab']=='hourly'){ echo 'active show';}else{ echo ""; } ?>"  data-toggle="tab" href="#hourly">Hourly</a>
          </li>
        </ul> -->
        
      </div>
    </section><!-- ap-filter -->

    <section class="filter-result">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-12 ps-div">
              <nav>
                    <div class="nav nav-tabs nav-fill" id="prop-tab" role="tablist">

                        <input type="text" id="location-from-search" value="" placeholder="Set Location">
                      <a class="nav-item nav-link active search-tab" id="nav-home-tab" data-toggle="tab" href="#closest" role="tab" aria-controls="nav-home" aria-selected="true">closest</a>
                      <a class="nav-item nav-link search-tab" id="nav-profile-tab" data-toggle="tab" href="#cheapest" role="tab" aria-controls="nav-profile" aria-selected="false">cheapest</a>
                    </div>
                  </nav>
                  <div class="proptab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="closest" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="ps-count"><?= $no_of_prop ?> Properties</div>
                      @foreach($searchResult['closest'] as $searchProp)
                        <div class="ps-box">
                            <div class="ps-img">
                        <?php if(isset($searchProp->image) && file_exists(public_path() . '/images/properties/' . $searchProp->image. '')) { ?>
                              <img src="<?php echo url('/public/images/properties/'.$searchProp->image)?>" alt=""> 
                         <?php }else {
                           echo  $image =  'No Image';
                         }
                        ?>
                            </div>
                            <div class="ps-text">
                                <div class="pstext-top">
                                  <h3><?= $searchProp->name; ?></h3>
                                  <?php $getDurationType=SearchPropertyController::getDurationType($searchProp->property_id,$searchProp->module_manage_id);?>
                                  <!--<div class="ps-avail"><?= $getDurationType;?></div>-->
                                  <!-- <div class="ps-avail">Hourly • Daily • Monthly</div> -->
                                  <!-- <div class="ps-price">$83<span>/day</span></div> -->
                                  <div class="ps-price">
                                    <?= isset($searchProp->rent_amount)?'$'.$searchProp->rent_amount:''; 
                                       $duration_type_txt="";
                                        if(isset($searchProp->rent_amount) && !empty(Request::get('duration_type_id'))){
                                       
                                          if(Request::get('duration_type_id') == 4  ){
                                            $duration_type_txt =" / Week";
                                          }else if(Request::get('duration_type_id') == 3 ){
                                            $duration_type_txt =" / Month";
                                          }else if(Request::get('duration_type_id') == 2 ){
                                            $duration_type_txt =" / Day";
                                          }else{
                                              $duration_type_txt =" / Hour";
                                          }

                                        };
                                    ?>
                                    <span><?= $duration_type_txt;?></span>
                                    </div>
                                   <fieldset>
                                  <div class="rating">
                                      <input type="radio" id="star5-1" name="rating" value="5" />
                                      <label class = "full" for="star5-1" title="Awesome - 5 stars"></label>
                                      <input type="radio" id="star4-1" name="rating" value="4" />
                                      <label class = "full" for="star4-1" title="Pretty good - 4 stars"></label>
                                      <input type="radio" id="star3-1" name="rating" value="3" />
                                      <label class = "full" for="star3-1" title="Meh - 3 stars"></label>
                                      <input type="radio" id="star2-1" name="rating" value="2" />
                                      <label class = "full" for="star2-1" title="Kinda bad - 2 stars"></label>
                                      <input type="radio" id="star1-1" name="rating" value="1" />
                                      <label class = "full" for="star1-1" title="Sucks big time - 1 star"></label>

                                  </div>
                                  <span>23</span>
                                </fieldset>
                                <div class="prop-miles"><?= isset($searchProp->distance)?round($searchProp->distance).' miles':''?></div>
                                </div>
                                <div class="pstext-btm">
                                  
                               <input type="hidden" id="to_destination_<?php echo $searchProp->property_id; ?>" value="<?php echo $searchProp->location; ?>" placeholder="Search Destination">
                                <a href="javascript:void();" class="get-direction" onclick="getAddress(<?php echo $searchProp->property_id; ?>)"  ><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                                <a href='<?php echo URL('/') ?>/propertydetails?moduleid=<?php echo Request::get("module_id")."&propertyid=".$searchProp->property_id."&fromdate=".Request::get("fromdate")."&todate=".Request::get("todate")."&fromtime=".Request::get("fromtime")."&totime=".Request::get("totime")."&durationtype=".Request::get("activeTab")?>' class="prop-details">details</a>
                                    <a href='<?php echo URL('/') ?>/bookNow?moduleid=<?php echo Request::get("module_id")."&propertyid=".$searchProp->property_id."&fromdate=".Request::get("fromdate")."&todate=".Request::get("todate")."&fromtime=".Request::get("fromtime")."&totime=".Request::get("totime")."&durationtype=".Request::get("activeTab")?>' class="booknow">Book now</a>
          
                                </div>
                            </div>
                        </div><!-- ps-box -->
                       @endForeach
                    </div>

                    <div class="tab-pane fade" id="cheapest" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="ps-count"><?= $no_of_prop ?> Properties</div>
                      @foreach($searchResult['cheapest'] as $searchProp)
                            <div class="ps-box">
                            <div class="ps-img">
                            <?php if(isset($searchProp->image) && file_exists(public_path() . '/images/properties/' . $searchProp->image. '')) { ?>
                                  <img src="<?php echo url('/public/images/properties/'.$searchProp->image)?>" alt=""> 
                             <?php }else {
                               echo  $image =  'No Image';
                             }
                            ?>
                                </div>
                                <div class="ps-text">
                                    <div class="pstext-top">
                                      <h3><?= $searchProp->name; ?></h3>
                                      <fieldset>
                                      <div class="rating">
                                          <input type="radio" id="star5-1" name="rating" value="5" />
                                          <label class = "full" for="star5-1" title="Awesome - 5 stars"></label>
                                          <input type="radio" id="star4-1" name="rating" value="4" />
                                          <label class = "full" for="star4-1" title="Pretty good - 4 stars"></label>
                                          <input type="radio" id="star3-1" name="rating" value="3" />
                                          <label class = "full" for="star3-1" title="Meh - 3 stars"></label>
                                          <input type="radio" id="star2-1" name="rating" value="2" />
                                          <label class = "full" for="star2-1" title="Kinda bad - 2 stars"></label>
                                          <input type="radio" id="star1-1" name="rating" value="1" />
                                          <label class = "full" for="star1-1" title="Sucks big time - 1 star"></label>
                
                                      </div>
                                      <span>23</span>
                                    </fieldset>
                                <div class="prop-miles"><?= isset($searchProp->distance)?round($searchProp->distance).' miles':''?></div>
                                     
                                      <div class="ps-price"><?= isset($searchProp->rent_amount)?'$'.$searchProp->rent_amount:''; 
                                        $duration_type_txt="";
                                        if(isset($searchProp->rent_amount) && !empty(Request::get('duration_type_id'))){
                                          
                                          if(Request::get('duration_type_id') == 4  ){
                                            $duration_type_txt =" / Week";
                                          }else if(Request::get('duration_type_id') == 3 ){
                                            $duration_type_txt =" / Month";
                                          }else if(Request::get('duration_type_id') == 2 ){
                                            $duration_type_txt =" / Day";
                                          }else{
                                              $duration_type_txt =" / Hour";
                                          }

                                        };
                                    ?> <span><?= $duration_type_txt;?></span></div>
                                    </div>
                                    <div class="pstext-btm">
                                      
                                   
                                     <!--<input type="hidden" id="from_destination_<?php echo $searchProp->property_id; ?>" value="<?php echo $searchProp->location; ?>" placeholder="Search Destination">-->
                                    <a href="" class="get-direction" onclick="getAddress(<?php echo $searchProp->property_id; ?>)"  ><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                                    <a href='<?php echo URL('/') ?>/propertydetails?moduleid=<?php echo Request::get("module_id")."&propertyid=".$searchProp->property_id."&fromdate=".Request::get("fromdate")."&todate=".Request::get("todate")."&fromtime=".Request::get("fromtime")."&totime=".Request::get("totime")."&durationtype=".Request::get("activeTab")?>' class="prop-details">details</a>
                                    <a href='<?php echo URL('/') ?>/bookNow?moduleid=<?php echo Request::get("module_id")."&propertyid=".$searchProp->property_id."&fromdate=".Request::get("fromdate")."&todate=".Request::get("todate")."&fromtime=".Request::get("fromtime")."&totime=".Request::get("totime")."&durationtype=".Request::get("activeTab")?>' class="booknow">Book now</a>
                <!--<input type="text"  id="to_destination_<?php echo $searchProp->property_id; ?>" class="form-control" placeholder="Search Destination" style="margin-top: 0px;margin-bottom: 5px;margin-top: -7px;">-->
                                     <!--  <button class="booknow"></button> -->
                                    </div>
                                </div>
                            </div><!-- ps-box -->
                           @endForeach

                    </div>
                  </div>
          </div>
          <div class="col-lg-7 col-md-7 col-sm-12 ps-map">
            <div id="mapCanvas"></div>
            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7441.412572122276!2d79.06870567471097!3d21.16408394370072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd4c0fcf85ee143%3A0x8a9261908197e622!2sSadar%2C+Nagpur%2C+Maharashtra!5e0!3m2!1sen!2sin!4v1553691732461" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe> -->
          </div>
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




<style type="text/css">
  
  #mapCanvas {
    width: 100%;
    height: 500px;
}

</style>

<?php 
//Map Pointer
$jsonClosest = array();
foreach($searchResult['closest'] as $s)
{
    $jsonClosest[] =   array($s->location,$s->latitude, $s->longitude);
   
}
//map pointer for cheapest tab
$jsonCheapest = array();
foreach($searchResult['cheapest'] as $s)
{
    $jsonCheapest[] =   array($s->location,$s->latitude, $s->longitude);
   
}

$mapperPointerClosest =  json_encode($jsonClosest);
$mapperPointerCheapest =  json_encode($jsonCheapest);

?>



<script>

  

  function getAddress(id)
  {
    var fromdest = $('#location-from-search').val();
    var to = $('#to_destination_'+id).val();

    url = 'https://www.google.com/maps/dir/'+fromdest+'/'+to+'';
    window.open(url, '_blank');

  }

//var jsonRes = <?php $searchResult; ?>;
// var as = JSON.parse(jsonRes);
// alert(as);
// console.log(as);

var module =  {{ app('request')->input('module_id') }};
if(module == 2){
    $("#2").show();
    $("#3").hide();
}else{
      $("#3").show();
    $("#2").hide();
}

function reloadMarkers() {
 
    // Loop through markers and set map to null for each
   /* for (var i=0; i<markers.length; i++) {
     
        markers[i].setMap(null);
    }*/

    var searchTabId=$("a.search-tab.active").attr('href');
    alert(searchTabId);
    // Reset the markers array
    markers = [];
    if(searchTabId == "#closest"){
      // Call set markers to re-add markers
      setMarkers('<?php echo $mapperPointerClosest;?>');
    }else{
      setMarkers('<?php echo $mapperPointerCheapest;?>');
      
    }
    


}

  /*  var markers;
    $('.search-tab').click(function(){
    alert('hi');
    var searchTabId=$("a.search-tab.active").attr('href');
    alert(searchTabId);
    markers = [];
    if(searchTabId == "#closest"){
      setMarkers('<?php echo $mapperPointerClosest;?>');
    }else{
      setMarkers('<?php echo $mapperPointerCheapest;?>');
      
    }
   
    });*/

function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
    map.setTilt(50);
    var markers ;
    markers = <?php echo $mapperPointerClosest; ?>;
    

    // Multiple markers location, latitude, and longitude
   // var markers = <?php echo $mapperPointerClosest; ?>;


    // [
    //     ['Brooklyn Museum, NY', 40.671531, -73.963588],
    //     ['Brooklyn Public Library, NY', 40.672587, -73.968146],
    //     ['Prospect Park Zoo, NY', 40.665588, -73.965336]
    // ];

   // console.log(markers);
                        
    // Info window content
    // var infoWindowContent = [
    //     ['<div class="info_content">' +
    //     '<p>Sadar.</p>' + '</div>'],
    //     ['<div class="info_content">' +
    //     '<p>Nagpur.</p>' +
    //     '</div>'],
    //     ['<div class="info_content">' +
    //     '<p>Mumbai.</p>' +
    //     '</div>']
    // ];
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);
    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(14);
        google.maps.event.removeListener(boundsListener);
    });
    
}
// Load initialize function
google.maps.event.addDomListener(window, 'load', initMap);
</script>

<script type="text/javascript">
$(document).ready(function() {
  //form land

  $('#landweeklyFrmlocation').val('<?php echo $_GET['location'];?>');
  $('#landweeklyFrmLatitude').val('<?php echo $_GET['latitude'];?>');
  $('#landweeklyFrmLongitude').val('<?php echo $_GET['longitude'];?>');

  $('#landmonthlyFrmlocation').val('<?php echo $_GET['location'];?>');
  $('#landmonthlyFrmLatitude').val('<?php echo $_GET['latitude'];?>');
  $('#landmonthlyFrmLongitude').val('<?php echo $_GET['longitude'];?>');

  $('#landdailyFrmlocation').val('<?php echo $_GET['location'];?>');
  $('#landdailyFrmLatitude').val('<?php echo $_GET['latitude'];?>');
  $('#landdailyFrmLongitude').val('<?php echo $_GET['longitude'];?>');

  //form parking

  //Keep selected location and lat long on form

  //Hourly
  $('#hrlyFrmlocation').val('<?php echo $_GET['location'];?>');
  $('#hrlyFrmLatitude').val('<?php echo $_GET['latitude'];?>');
  $('#hrlyFrmLongitude').val('<?php echo $_GET['longitude'];?>');

  //Daily
  $('#dailyFrmlocation').val('<?php echo $_GET['location'];?>');
  $('#dailyFrmLatitude').val('<?php echo $_GET['latitude'];?>');
  $('#dailyFrmLongitude').val('<?php echo $_GET['longitude'];?>');

  //Monthly
  $('#monthlyFrmlocation').val('<?php echo $_GET['location'];?>');
  $('#monthlyFrmLatitude').val('<?php echo $_GET['latitude'];?>');
  $('#monthlyFrmLongitude').val('<?php echo $_GET['longitude'];?>');
  
  

  var activeTab = '<?php echo $_GET['activeTab'];?>';
  var module_id = '<?php echo $_GET['module_id'];?>';

//parking top search form values keep selected
  if(module_id==2){
    if(activeTab == 'monthly' ){
        $('#monthly_from').val('<?php echo $_GET['fromdate'];?>');
        $('#monthly_to').val('<?php echo $_GET['todate'];?>');
        $('#location').val('<?php echo $_GET['location'];?>');

    }else if(activeTab == 'daily'){
        $('#from').val('<?php echo $_GET['fromdate'];?>');
        $('#to').val('<?php echo $_GET['todate'];?>');
    }
    else{
        var frmaDt ='<?php echo $_GET['fromdate']?>';
        var toDt ='<?php echo $_GET['todate']?>';

      if(frmaDt !='' && toDt !=''){
        $('#from_date').val('<?php echo $_GET['fromdate'].' '.$_GET['fromtime'];?>');
        $('#to_date').val('<?php echo $_GET['todate'].' '.$_GET['totime'];?>');
      }
        $('#from_time').val('<?php echo $_GET['fromtime'];?>');
        $('#to_time').val('<?php echo $_GET['totime'];?>');
        $('#hrlyFrmlocation').val('<?php echo $_GET['location'];?>');
    }
   }else{ //land top search form values keep selected
      if(activeTab == 'monthly' ){
          $('#land-monthly_from').val('<?php echo $_GET['fromdate'];?>');
          $('#land-monthly_to').val('<?php echo $_GET['todate'];?>');

      }else if(activeTab == 'daily'){
          $('#daily_from').val('<?php echo $_GET['fromdate'];?>');
          $('#daily_to').val('<?php echo $_GET['todate'];?>');
      }
      else{
          $('#weekly_from').val('<?php echo $_GET['fromdate'];?>');
          $('#weekly_to').val('<?php echo $_GET['todate'];?>');
    
      }

   }

   //top search fields keep selected

    $('#select-property-type-top').val(module_id);
    $('#location-top-search').val('<?php echo $_GET['location'];?>');
    $('#latitude-top-search').val('<?php echo $_GET['latitude'];?>');
    $('#longitude-top-search').val('<?php echo $_GET['longitude'];?>');
    if(module_id == 2){

      $('#search_dates').val('<?php echo $_GET['fromdate'].' '.$_GET['fromtime'];?>');
        
    }
});
</script> 

<style>
    nav > .nav.nav-tabs{

  border: none;
    color:#fff;
    background:#272e38;
    border-radius:0;

}
nav > div a.nav-item.nav-link,
nav > div a.nav-item.nav-link.active
{
  border: none;
    padding: 18px 25px;
    color:#fff;
    background:#272e38;
    border-radius:0;
}

nav > div a.nav-item.nav-link.active:after
 {
  content: "";
  position: relative;
  bottom: -60px;
  left: -10%;
  border: 15px solid transparent;
  border-top-color: #e74c3c ;
}
.tab-content{
  background: #fdfdfd;
    line-height: 25px;
    border: 1px solid #ddd;
    border-top:5px solid #e74c3c;
    border-bottom:5px solid #e74c3c;
    padding:30px 25px;
}

nav > div a.nav-item.nav-link:hover,
nav > div a.nav-item.nav-link:focus
{
  border: none;
    background: #e74c3c;
    color:#fff;
    border-radius:0;
    transition:background 0.20s linear;
}
</style>




@stop

