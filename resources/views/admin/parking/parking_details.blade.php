@extends('admin/layouts.default')
@section('content')
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
     <div class="pull-right">
      </div>
      <h1>Parking Property Details</h1>
    </div>
  </div>
  <div class="container-fluid">
            <div class="panel panel-default">
     
 
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

                <li class="">
                  <span class=""> <div >
                  <label class="btn btn-default btn-on btn-xs active buttonswitch">
                  <input type="radio" value="1" name="multifeatured_module[module_id][status]" <?php echo ($propertyDetails->status == 1) ? 'checked' : '' ?> onclick="updateSwitchPermission(<?php echo $propertyDetails->property_id; ?>,1)" >Active</label>
                  <label class="btn btn-default btn-off btn-xs buttonswitch">
                  <input type="radio" <?php echo ($propertyDetails->status == 0) ? 'checked' : '' ?>  onclick="updateSwitchPermission(<?php echo $propertyDetails->property_id; ?>,0)" value="0" name="multifeatured_module[module_id][status]">Inactive</label>
                  </div></span>
                  </li>


                <!-- <div class="col-lg-12 list-unstyled">
                  <h4>Property Doc</h4>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Parking Doc</th>
                        <th>Default Active</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($getPropertyDoc as $pdoc) { ?>

                      <tr>
                        <td><a href="<?php echo URL::to('/public/images/property-documents/'.$pdoc->name.''); ?>">Download</a></td>
                        <td><?php echo $pdoc->document_type_id; ?></td>
                        <td><?php echo $pdoc->default_file; ?></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
-->
               


                </div>   

           </div> 
                  
          <div class="col-lg-12 col-xs-12 admin-order-list"> 
            <div id="mapCanvas1"></div>
           </div> 
              
          </div><!-- order-right -->
        </div>
      </div>
    </div>
  </div>

<style type="text/css">

.disabledbutton
{
  background: #CCC;
  border: 1px solid #CCC;
}
.disabledbutton:hover
{
  background: #CCC;
  border: 1px solid #CCC;
  cursor: context-menu;
}
</style>

<style type="text/css">
  
  #mapCanvas1 {
    width: 100%;
    height: 400px;
}

</style>



<script>
function updateSwitchPermission(property_id,status)
{
    $.ajax({  
      type: 'POST',  
      url: '<?php echo URL::to('admin/PropertyApproval') ?>', 
      data: { property_id: property_id,status: status },
      success: function(response) {
         if(response == 200)
         {
          alert('Property status updated successfull');
         } else {
          alert('Property status not updated successfull');
         }
      }
  });
}
</script>



</div>
@stop