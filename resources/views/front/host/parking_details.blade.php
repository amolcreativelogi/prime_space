@extends('front/layouts.default')
@section('content')
<div class="site-content">


<section class="dashboard-layout">
    <div class="row">
     @include('front/includes.host_side_menu')
    
    <div class="col-lg-10 col-md-9 col-sm-12 dl-content dash-content">
        <div class="container-fluid">
            <div class="panel panel-default">
     <h1>Parking Property Details</h1>
 
                <div class="panel-body">
      
        <div class="col-lg-12 col-xs-12 admin-order-list"> 
          <div class="col-lg-4 col-xs-12 order-left pull-left">
            <div class="row">
              <div class="admin-order-left clearfix">
                <ul class="list-unstyled clearfix">
                  <li><span class="order-placed"> </span></li>
                  <li class="order-date-time">
                    <span class="date"><b></b></span>
                  </li>
                
                  <li>
                    <span class="admin-order-id">Module Name :</span>
                    <span class="admin-student">Parking</span>
                  </li>

                  <li>
                    <span class="admin-order-id">Customer Name :</span>
                    <span class="admin-student"><?php echo $propertyDetails->firstname.' '.$propertyDetails->lastname; ?></span>
                  </li>

                  <li>
                    <span class="admin-order-id">Property Name :</span>
                    <span class="admin-student"><?php echo $propertyDetails->name; ?></span>
                  </li>

                  <li>
                    <span class="admin-order-id">Location :</span>
                    <span class="admin-student"><?php echo $propertyDetails->location; ?></span>
                  </li>

                  <li>
                    <span class="admin-order-id">Latitude :</span>
                    <span class="admin-student"><?php echo $propertyDetails->latitude; ?></span>
                  </li>

                  <li>
                    <span class="admin-order-id">Longitude :</span>
                    <span class="admin-student"><?php echo $propertyDetails->longitude; ?></span>
                  </li>

                  <li>
                    <span class="admin-order-id">Zipcode :</span>
                    <span class="admin-student"><?php echo $propertyDetails->zip_code; ?></span>
                  </li>
                 

                  <li>
                    <span class="admin-order-id">Description :</span>
                    <span class="admin-student"><?php echo $propertyDetails->description; ?></span>
                  </li>

                  <li>
                    <span class="admin-order-id">EV Charging  :</span>
                    <span class="admin-student"><?php echo ($propertyDetails->ev_charging == 1) ? 'Active' : 'Inactive'; ?></span>
                  </li>

                   <li>
                    <span class="admin-order-id">Wheelchair Accessible :</span>
                    <span class="admin-student"><?php echo ($propertyDetails->wheelchair_accessible == 1) ? 'Active' : 'Inactive'; ?></span>
                  </li>

                  <li>
                    <span class="admin-order-id">Status :</span>
                    <span class="admin-student"><?php echo ($propertyDetails->status == 1) ? 'Active' : 'Inactive'; ?></span>
                  </li>
                 

                </ul>
              </div>
            </div>
          </div><!-- order-left -->
      
          <div class="col-lg-8 col-xs-12 order-right pull-right">  
               
              <div class="admin-order-right clearfix">
                <div class="col-lg-12 list-unstyled">
                  <h4>Amenities</h4>
                   <?php foreach($getAmenities as $amenities) {
                    if (isset($amenities->amenity_image) && file_exists(public_path() . '/images/amenity/' . $amenities->amenity_image. '')) {
                        $image = '<img src="'.url('/public/images/amenity/'.$amenities->amenity_image.'').'" width="100">';
                    } else {
                        $image =  'No Image';
                    }  
                    ?>
                     <div class="col-lg-2"> 

                    <?php 
                   //echo $amenities->amenity_name; 
                   echo $image;
                   ?>
                   <span style="font-weight: bold;"><?php echo $amenities->amenity_name; ?></span>
                      </div>  
                    <?php } ?>
                </div>  
                <hr>

                 <div class="col-lg-12 list-unstyled">
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


                 <div class="col-lg-12 list-unstyled">
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


                 <div class="col-lg-12 list-unstyled">
                  <h4>Property Documents</h4>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Parking Dcouments</th>
                       <!--  <th>Default Active</th> -->
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($getPropertyDoc as $pdoc) { 
                        $imagepath = URL::to('/public/images/property-documents/'.$pdoc->name.'');
                        ?>
                      <tr>
                        <td><a href="<?php echo URL::to('/user/downloadDoc/'.$pdoc->file_id.'') ?>">Download Doc</a>
                        </td>
                        <td><?php echo ($pdoc->default_file == 1) ? 'Active': 'Inactive'; ?></td>
                      </tr>
                    <?php }  ?>
                    </tbody>
                  </table>
                </div>


                <div class="col-lg-12 list-unstyled">
                  <h4>Property Images</h4>
                   
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Parking Image</th>
                        <!-- <th>Default Active</th> -->
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($getPropertyImagesandDoc as $pimage) { ?>
                      <tr>
                        <td><img src="<?php echo URL::to('/public/images/properties/'.$pimage->name.''); ?>" width="100"></td>
                        <!-- <td><?php echo $pimage->document_type_id; ?></td> -->
                        <td><?php echo ($pimage->default_file == 1) ?  'Active' : 'Inactive'; ?></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>

                </div>


                 <div class="col-lg-12 list-unstyled">
                  <h4>Property Floor Map</h4>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Parking Floor Map</th>
                       <!--  <th>Default Active</th> -->
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($getPropertyImagesFloorMap as $pmap) { ?>
                      <tr>
                        <td><img src="<?php echo URL::to('/public/images/property-floor-map/'.$pmap->name.''); ?>" width="100"></td>
                        <!-- <td><?php echo $pmap->document_type_id; ?></td> -->
                        <td><?php echo ($pmap->default_file == 1) ? 'Active': 'Inactive'; ?></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>

    


                </div>   
           </div> 
                  
          <div class="col-lg-12 col-xs-12 admin-order-list"> 
            <div id="mapCanvas1"></div>
           </div> 
              
          </div><!-- order-right -->
    </div>      

</section>
 
</div>

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

