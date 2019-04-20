@extends('front/layouts.default')
@section('content')

<div class="site-content">
    <section class="bookingform">
        <div class="container">
            <h3>Welcome to Prymestory. Book your property</h3>
            <!--<h3>booking form</h3>-->
            <div class="row">
                <div class="col-sm-8">
                    <div class="selectdate">
                        <h3><?php echo !isset($getPropertyDetails->name)?'':$getPropertyDetails->name;?></h3>
                        <h4><?php echo !isset($getPropertyDetails->location)?'':$getPropertyDetails->location;?></h4>
                        <!--<select class="filter-select">-->
                        <!--  <option>Car Type</option>-->
                        <!--  <option>Hatchback  </option>-->
                        <!--  <option>Sedan  </option>-->
                        <!--  <option>MPV  </option>-->
                        <!--  <option>SUV </option>-->
                        <!--  <option>Crossover </option>-->
                        <!--  <option>Coupe  </option>-->
                        <!--  <option>Convertibl </option>-->
                        <!--</select>-->
                        <label>Car Type : <strong><?php echo $getCarProperty->car_type;?></strong></label><br>
                        <label>Location Type : <strong>Covered</strong></label>
                        <!--<select class="filter-select">-->
                        <!--    <option>Location Type</option>-->
                        <!--    <option>Covered </option>-->
                        <!--    <option>Uncovered </option>-->
                        <!--    <option>Both </option>-->
                        <!--</select>-->
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group date-group">
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                    <label>From</label>
                                    <input type="text" name="frm_date" value="<?php echo $fromdate; ?>" class="dates">
                                    </div>
                                    <div class="col-md-4">
                                     <label>To</label>
                                    <input type="text" name="to_date" value="<?php echo $todate;?>" class="dates">
                                    </div>
                                    </div>
                                    
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php if(isset($_SESSION['user']['is_user_login'])) { ?>
                    <div class="your-info">
                        <h3>Your Information</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>FIRST NAME <span>*</span></label>
                                    <!-- <input type="text" class="form-control" value="<?php //echo $_SESSION['user']['firstname']; ?>" > -->
                                    <input type="text" class="form-control" placeholder="FIRST NAME" value="<?php echo $user_details_get->firstname; ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>LAST NAME <span>*</span></label>
                                    <!-- <input type="text" class="form-control" value = "" > -->
                                    <input type="text" class="form-control" placeholder="LAST NAME" value="<?php echo $user_details_get->lastname; ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>EMAIL <span>*</span></label>
                                    <input type="text" class="form-control" placeholder="name@email.com" value="<?php echo $user_details_get->email_id; ?>" >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>PHONE NUMBER</label>
                                    <input type="text" class="form-control" placeholder="(__) __-___" value="<?php echo $user_details_get->contact_no; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="your-info">
                        <h3>Payment Method</h3>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>YOUR CARD NUMBER <span>*</span></label>
                                    <input type="text" class="form-control" placeholder="Your Card Number" >
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group cardexp-group">
                                            <label>EXPIRATION DATE (MM/YYYY)</label>
                                            <input type="text" class="form-control" placeholder="Month" > /
                                            <input type="text" class="form-control" placeholder="Year" >
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>CVV</label>
                                            <input type="text" class="form-control" placeholder="CVV" > 
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>POSTAL CODE <span>*</span></label>
                                    <input type="text" class="form-control" placeholder="Postal code" >
                                </div>
                            </div>
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="checkbox" name="">Save payment method
                                </div>
                            </div>
                            <div class="col-sm-6"></div>
                            <hr>
                            <div class="col-sm-6"><h4>Your Order Total</h4></div>
                            <div class="col-sm-6"><h2>$<?php echo $finalprice;?></h2></div>
                            <div class="col-sm-6"><input type="button" value="submit" onclick="searchURL()" data-toggle="modal"  data-target="#thanksModal"></div>
                        </div>
                    </div>
<?php } else {?>
    <a href="#" data-toggle="modal" class="book-signup" data-target="#loginModal">Please sign-in to book your property</a>
<?php }?>
                </div>
                <div class="col-sm-4">
                    <div class="total-order">ORDER TOTAL <span>$<?php echo $finalprice;?></span></div>
                    <div class="book-box">
                        <div class="book-add"><?php echo !isset($getPropertyDetails->location)?'':$getPropertyDetails->location;?></div>
                        <div class="book-img"><img src="<?php echo url('/public/images/properties/'.$getPropImages->name)?>" alt=""></div>
                        <div class="book-amenties">
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
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    
<!-- thanksModal start -->
<div class="modal fade formModal" id="thanksModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!--<h5 class="modal-title" id="exampleModalLabel">Find a space</h5>-->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="thanksmsgbox">
            <i class="fa fa-smile-o" aria-hidden="true"></i>
            <h2>Thanks for your Booking</h2>
        </div>  
      </div>
    </div>
  </div>
</div>
<!-- thanksModal end -->
    
</div>
@stop
