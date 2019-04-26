@extends('front/layouts.default')
@section('content')
<div class="site-content">


<section class="dashboard-layout">
    <div class="row">
     @include('front/includes.host_side_menu')
    
    <div class="col-lg-10 col-md-9 col-sm-12 dl-content dash-content">
      <div class="single-property">
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
            <br>
            <section class="property-content">
              <div class="row">

                <div class="col-lg-8 col-md-8 col-sm-12 pc-left">
                  <h3><?php echo $propertyDetails->name; ?></h3>
                  <h4><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $propertyDetails->location; ?>, <?php echo $propertyDetails->zip_code; ?></h4>
                  <div class="row firstrow">
                    <div class="col-sm-6"><strong>Customer Name : </strong> <?php echo $propertyDetails->firstname.' '.$propertyDetails->lastname; ?> </div>
                    <div class="col-sm-6"><strong>Module Name : </strong> Parking</div>
                  </div>
                  <h4>Description :</h4>
                  <p><?php echo $propertyDetails->description; ?></p>
                  <br>
                  <div class="tablediv">
                    <h4>Property Rent</h4>
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
                  </div>
                  <br>
                  <div class="tablediv">
                    <h4>Property Type</h4>
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
                  </div>

                  <div class="row firstrow">
                    <div class="col-sm-12"><strong>Parking Dcouments : </strong>  <?php foreach($getPropertyDoc as $pdoc) { 
                        $imagepath = URL::to('/public/images/property-documents/'.$pdoc->name.'');
                        ?>
                      <a href="<?php echo URL::to('/user/downloadDoc/'.$pdoc->file_id.'') ?>">Download Doc</a>
                        <!-- <?php //echo ($pdoc->default_file == 1) ? 'Active': 'Inactive'; ?> -->
                    <?php }  ?></div>
                    <div class="col-sm-12"><strong>Parking Floor Map :</strong> <?php foreach($getPropertyImagesFloorMap as $pmap) { ?>
                     <img src="<?php echo URL::to('/public/images/property-floor-map/'.$pmap->name.''); ?>" width="100" class="floor_map">
                        <!-- <td><?php echo $pmap->document_type_id; ?></td> -->
                       <!--  <?php echo ($pmap->default_file == 1) ? 'Active': 'Inactive'; ?> -->
                    <?php } ?></div>
                    
                  </div>

                </div><!-- pc-left -->

                <div class="col-lg-4 col-md-4 col-sm-12 pc-right">
                  <div class="property-location">
                    <h4>location</h4>
                    <div class="row firstrow">
                    <div class="col-sm-6"><strong>Latitude : </strong> <?php echo $propertyDetails->latitude; ?></div>
                    <div class="col-sm-6"><strong>Longitude : </strong> <?php echo $propertyDetails->longitude; ?> </div>
                  </div>
                  <div class="map-div"> 
                    <div id="mapCanvas1"></div>
                  </div>
                  <hr>
                  <div class="book-amenties">
                    <h4>Amenities</h4>
                    <ul>
                    <?php foreach($getAmenities as $amenities) {
                    if (isset($amenities->amenity_image) && file_exists(public_path() . '/images/amenity/' . $amenities->amenity_image. '')) {
                        $image = '<img src="'.url('/public/images/amenity/'.$amenities->amenity_image.'').'" width="100">';
                    } else {
                        $image =  'No Image';
                    }  
                    ?>
                     <li> 

                    <?php 
                   //echo $amenities->amenity_name; 
                   echo $image;
                   ?>
                   <span style="font-weight: bold;"><?php echo $amenities->amenity_name; ?></span>
                      </li>  
                    <?php } ?>
                    </ul>
                   <!--  <ul>
                        <li><img src="http://localhost/prime_space/public/images/amenity/wifi.svg" width="100"><span>Wifi  </span></li> 
                    </ul> -->
                </div>

                  </div>
                </div><!-- pc-right -->

              </div>
            </section>
      </div>

    </div>      

</section><!-- dashboard-layout -->
 
</div><!-- site-content -->

<style type="text/css">
#mapCanvas1 {
    width: 100%;
    height: 400px;
}
</style>


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
    var markers =  [
        ['<?php echo $propertyDetails->location; ?>', <?php echo $propertyDetails->latitude; ?>,  <?php echo $propertyDetails->longitude; ?>]
    ];

   

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

