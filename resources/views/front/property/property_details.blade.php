@extends('front/layouts.default')
@section('content')
<?php //echo '.............'.date('m.d.Y'); die;//print_r($_SESSION); die;?>
<div class="site-content">
  <?php if(empty($getPropertyDetails)){ echo '<h4>No contents to display.</h4>'; }else{?>
  <div class="single-property">
     <!-- property-slider -->
      <!-- <section class="property-slider">
      <div id="property-slider" class="owl-carousel owl-theme">
              <div class="item">
                <img src="images/homebanner1.jpg" alt="">
              </div>
              <div class="item">
                <img src="images/homebanner1.jpg" alt="">
              </div>
              <div class="item">
                <img src="images/homebanner1.jpg" alt="">
              </div>
          </div>
       </section> -->

        <section class="property-slider">
        <div id="property-slider" class="owl-carousel owl-theme">
                <?php if(!empty($getPropImages)){
                    foreach($getPropImages as $image){ ?>
                     <?php if(isset($image->name) && file_exists(public_path() . '/images/properties/' . $image->name. '')) { ?>
                      <div class="item">
                        <img src="<?php echo url('/public/images/properties/'.$image->name)?>" alt="">
                      </div> 
                     <?php }
                    ?>
                <?php }
                 }else{?>
                    <div class="item">
                      <img src="{{ URL::asset('public') }}/assets/front-design/images/homebanner1.jpg" alt="">
                    </div>
                <?php }?>
               <!--  <div class="item">
                  <img src="images/homebanner1.jpg" alt="">
                </div> -->
        </div>
      </section>

      <section class="property-content">
          <div class="container">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="col-sm-offset-0 col-sm-12" id="msg" >
                    <div id="msg" class="alert" style="display: block;"></div>
                </div>
            </div>
            <div class="row">
              <div class="col-lg-8 col-md-8 col-sm-12 pc-left">
               <!--  <h3>Great industrial lot</h3> -->
               <h3><?php echo !isset($getPropertyDetails->name)?'':$getPropertyDetails->name;?></h3>
               <!--  <h4>60 Beard St, Brooklyn, NY</h4> -->
                <h4><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo !isset($getPropertyDetails->location)?'':$getPropertyDetails->location;?></h4>
                <div class="row firstrow">
                   <?php if($module_id == 1) { ?>
                   <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Parking Type</th>
                        <th>Floor Name</th>
                        <th>Total Parking Spots</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($getPropertyType as $ptype) { ?>
                      <tr>
                        <td><?php echo $ptype->parking_type; ?></td>
                        <td><?php echo $ptype->floor_name; ?></td>
                        <td><?php echo $ptype->total_parking_spots; ?></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                <?php } ?>

                  <!-- <div class="col-sm-6"><i class="fa fa-server" aria-hidden="true"></i> Number of floor <strong>: 2 </strong></div>
                  <div class="col-sm-6"><i class="fa fa-list" aria-hidden="true"></i> Total Parking Slots <strong>: 10</strong></div>
                  <div class="col-sm-6"><i class="fa fa-car" aria-hidden="true"></i> Type of parking <strong>: Covered</strong></div> -->
                </div>
                <div class="about-property">
                  <h4>About the space</h4>
                  <p>Zip Code - <?php echo !isset($getPropertyDetails->zip_code)?'':$getPropertyDetails->zip_code;?></p>
                  <p><?php echo !isset($getPropertyDetails->description)?'':$getPropertyDetails->description;?></p>

                   <?php if($module_id == 3) { ?>
                   <p>Tour Availability - <?php $tour_availability =  !isset($getPropertyDetails->tour_availability)?'':$getPropertyDetails->tour_availability; 
                   echo ($tour_availability == 1) ? 'Yes' : 'No';
                   ?></p>

                    <p>Land Type - <?php echo  !isset($land_type_id->land_type)?'':$land_type_id->land_type; 
                   ?></p>

                     <p>Property Size - <?php echo  !isset($unit_type_id->unit_type)?'':$unit_type_id->property_size.' '.$unit_type_id->unit_type; 
                   ?></p>
                 <?php } ?>
                 <!--  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quam lectus, faucibus in elit et, vehicula convallis est. Morbi lacinia, arcu vel venenatis rhoncus, arcu lorem tincidunt magna, ut sollicitudin dui massa in urna. Integer semper enim ac augue varius laoreet. Fusce vehicula libero a maximus pretium. In hac habitasse platea dictumst. Phasellus risus leo, mattis accumsan semper sed, dictum non arcu. Nam mauris tortor, sodales sit amet leo non, aliquam molestie massa. Fusce imperdiet sed metus viverra rutrum. Cras ut finibus libero. Pellentesque blandit hendrerit dolor ut dapibus. Sed a magna nisi. Nullam auctor nec nibh quis pellentesque.</p> -->


                  <div class="row secondrow">
                      <div class="col-sm-12">
                          <div class="dl-content tablediv">
                            <?php if($module_id == 2) { ?>
                            <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Car Type</th>
                                <th>Booking Type</th>
                                <th>Rent</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach($getPropertyrent as $rent) { ?>
                              <tr>
                                <td><?php echo $rent->car_type; ?></td>
                                <td><?php echo $rent->duration_type; ?></td>
                                <td>$ <?php echo $rent->rent_amount; ?></td>
                              </tr>
                            <?php } ?>
                            </tbody>
                            </table>
                            <?php } else {?>

                            <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Booking Type</th>
                                <th>Rent</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach($getLandrent as $rent) { ?>
                              <tr>
                                <td><?php echo $rent->duration_type; ?></td>
                                <td>$ <?php echo $rent->rent_amount; ?></td>
                              </tr>
                            <?php } ?>
                            </tbody>
                            </table>
                          <?php } ?>

                              <!-- <table>
                                  <thead>
                                      <tr>
                                          <th>Car Type</th>
                                          <th>Hourly</th>
                                          <th>Daily</th>
                                          <th>Monthly</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>Hatchback</td>
                                          <td>10</td>
                                          <td>50</td>
                                          <td>300</td>
                                      </tr>
                                  </tbody>
                              </table> -->
                          </div>
                          <a href="#" data-toggle="modal" class="floor-map" data-target="#floor-map" >Floor Map</a>
<!-- searchModal start -->
<div class="modal fade formModal" id="floor-map" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Floor Map</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php if(isset($getPropertyImagesFloorMap->name)) { ?>
        <img src="<?php echo URL::to('/public/images/property-floor-map/'.$getPropertyImagesFloorMap->name.''); ?>" width="100">
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<!-- searchModal end -->
                      </div>
                  <!--<div class="col-sm-3"><span>Uses</span>All uses considered</div>-->
                  <!--<div class="col-sm-3"><span>Cancellation</span>Strict <i class="fa fa-exclamation-circle" aria-hidden="true"></i></div>-->
                  <!--<div class="col-sm-3"><span>Lease term</span>Negotiable</div>-->
                  <!--<div class="col-sm-3"><span>Phasellus</span>Molestie mass</div>-->
                </div>
                </div>


                <!--<div class="property-policies">-->
                <!--  <h4>Policies</h4>-->
                <!--  <ul>-->
                <!--    <li>Morbi lacinia, arcu vel venenatis</li>-->
                <!--    <li>Fusce vehicula libero</li>-->
                <!--    <li>Nam mauris tortor, sodales sit amet leo</li>-->
                <!--  </ul>-->
                <!--</div>-->
                <div class="property-review">
                  <h3>2 Reviews</h3>
                  <div class="rating">
                      <?php 
                        $countUser = count($bookingDataRatings);
                        if ($countUser == 0) {
                          $countUser = 1;
                        }
                      ?>
                      <?php for ($i=5; $i >= 1; $i--) { ?>
                          <?php if ($i <= ($calRating / $countUser)): ?>
                            <label style="color: #5500fe" class = "full" for="star<?= $i ?>-<?= $i ?>" title="Awesome - <?= $i ?> stars"></label>
                          <?php else: ?>
                            <label class = "full" for="star1-1" title="Awesome - 1 stars"></label>
                          <?php endif ?>
                      <?php } ?>
                     <!--  <input type="radio" id="star5-5" name="rating" value="5" />
                      <label class = "full" for="star5-5" title="Awesome - 5 stars"></label>
                      <input type="radio" id="star4-5" name="rating" value="4" />
                      <label class = "full" for="star4-5" title="Pretty good - 4 stars"></label>
                      <input type="radio" id="star3-5" name="rating" value="3" />
                      <label class = "full" for="star3-5" title="Meh - 3 stars"></label>
                      <input type="radio" id="star2-5" name="rating" value="2" />
                      <label class = "full" for="star2-5" title="Kinda bad - 2 stars"></label>
                      <input type="radio" id="star1-5" name="rating" value="1" />
                      <label class = "full" for="star1-5" title="Sucks big time - 1 star"></label> -->
                  </div>
                  <div class="clear"></div>
                  <?php foreach ($bookingDataRatings as $key => $bookingDataRating):?>
                    
                  <div class="reviewbox">
                    <div class="reviewer-img"><img src="{{ URL::asset('public') }}/assets/front-design/images/user-icon.jpg" alt=""></div>
                    <div class="reviewer-info"><h4>{{$bookingDataRating->firstname}} {{$bookingDataRating->lastname}}</h4><span>{{$bookingDataRating->rating_date}}</span>
                    <!-- {{$bookingDataRating->rating}} -->
                    <div class="rating">
                      <?php for ($i=5; $i >= 1; $i--) { ?>
                          <?php if ($i <= $bookingDataRating->rating): ?>
                            <label style="color: #5500fe" class = "full" for="star<?= $i ?>-<?= $i ?>" title="Awesome - <?= $i ?> stars"></label>
                          <?php else: ?>
                            <label class = "full" for="star1-1" title="Awesome - 1 stars"></label>
                          <?php endif ?>
                      <?php } ?>
                  </div>
                  </div> 
                    <div class="reviewer-content">{{$bookingDataRating->review}}<!--<a href="">Read more</a> --></div>
                  </div>
                  <?php endforeach ?>
                  <div class="rentedby">
                    <div class="row">
                      <div class="col-sm-6">
                        <h3>Rented by Marlow</h3>
                        <div class="rent-date">Joined in Dec, 2018</div>
                      </div>
                      <div class="col-sm-6">
                        <div class="reviewer-img"><img src="{{ URL::asset('public') }}/assets/front-design/images/user-icon.jpg" alt=""></div>
                      </div>
                    </div>
                    
                  </div><!-- rentedby -->
                </div>
              </div><!-- pc-left -->

              


              <div class="col-lg-4 col-md-4 col-sm-12 pc-right">
                 <div class="property-location">
                  <h4>Location</h4>
                  <div>

                     <div id="mapCanvas1"></div>

                  </div>
                </div><br>
                <div class="book-amenties">
                    <h4>Amenties</h4>
                    <ul>
                        <?php foreach($getPropAmenities as $amenities) {
                          if (isset($amenities->amenity_image) && file_exists(public_path() . '/images/amenity/' . $amenities->amenity_image. '')) {
                              $image = '<img src="'.url('/public/images/amenity/'.$amenities->amenity_image.'').'" width="100">';
                          } else {
                              $image =  'No Image';
                          }
                         ?>
                        <li><?php echo $image; ?><span><?php echo $amenities->amenity_name; ?>  </span></li> 
                        <?php } ?>
                    </ul>
                    <h4>Booking Availability</h4>
                    <table class="table table-bordered">
                    <tbody>
                      <?php foreach($days_time_availability as $dta) {
                       ?>
                      <tr>
                        <td><?php echo $dta->days; ?></td>
                        <td><?php echo $dta->start_time; ?></td>
                        <td><?php echo $dta->end_time; ?></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
                <hr>
                <a href="" class="cont-host">contact host</a><br/>
                <!-- <a href='<?php //echo URL('/') ?>/bookNow?moduleid=<?php //echo Request::get("module_id")."&propertyid=".$searchProp->property_id."&car_type_id=".$searchProp->car_type_id."&duration_type_id=".$searchProp->duration_type_id."&fromdate=".Request::get("fromdate")."&todate=".Request::get("todate")."&fromtime=".Request::get("fromtime")."&totime=".Request::get("totime")."&durationtype=".Request::get("activeTab")?>' class="cont-host">Book now</a> -->
                 <hr>
              </div><!-- pc-right -->
            </div>
          </div>
      </section><!-- property-content -->
  </div><!-- single-property -->
 <?php }?>
</div><!-- site-content -->

<style type="text/css">
  
  #mapCanvas1 {
    width: 100%;
    height: 400px;
}

</style>

<script type="text/javascript">
  var baseurl = '<?php echo url("/"); ?>';
</script>

<script>

//var jsonRes = <?php $searchResult; ?>;
// var as = JSON.parse(jsonRes);
// alert(as);
// console.log(as);


function  initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapCanvas1"), mapOptions);
    map.setTilt(50);
    // Multiple markers location, latitude, and longitude
    <?php if(isset($getPropertyDetails->location)) { ?>
    var markers =  [
        ['<?php echo $getPropertyDetails->location; ?>', <?php echo $getPropertyDetails->latitude; ?>,  <?php echo $getPropertyDetails->longitude; ?>]
    ];
   <?php } ?>

   

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
        this.setZoom(1);
        google.maps.event.removeListener(boundsListener);
    });
    
}
// Load initialize function
google.maps.event.addDomListener(window, 'load', initMap);
</script>
@stop