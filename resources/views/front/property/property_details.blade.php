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
                <h4><?php echo !isset($getPropertyDetails->location)?'':$getPropertyDetails->location;?></h4>
                <div class="row firstrow">
                  <div class="col-sm-3"><img src="{{ URL::asset('public') }}/assets/front-design/images/ruler.svg" alt=""> 5,600 sqft</div>
                  <div class="col-sm-3"><i class="fa fa-map-marker" aria-hidden="true"></i> Lot ID #5617253</div>
                  <div class="col-sm-3"><i class="fa fa-map-marker" aria-hidden="true"></i> Lorem</div>
                  <div class="col-sm-3"><i class="fa fa-map-marker" aria-hidden="true"></i> Lorem</div>
                </div>
                <div class="about-property">
                  <h4>About the space</h4>
                  <p><?php echo !isset($getPropertyDetails->description)?'':$getPropertyDetails->description;?></p>
                 <!--  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quam lectus, faucibus in elit et, vehicula convallis est. Morbi lacinia, arcu vel venenatis rhoncus, arcu lorem tincidunt magna, ut sollicitudin dui massa in urna. Integer semper enim ac augue varius laoreet. Fusce vehicula libero a maximus pretium. In hac habitasse platea dictumst. Phasellus risus leo, mattis accumsan semper sed, dictum non arcu. Nam mauris tortor, sodales sit amet leo non, aliquam molestie massa. Fusce imperdiet sed metus viverra rutrum. Cras ut finibus libero. Pellentesque blandit hendrerit dolor ut dapibus. Sed a magna nisi. Nullam auctor nec nibh quis pellentesque.</p> -->


                  <div class="row secondrow">
                  <div class="col-sm-3"><span>Uses</span>All uses considered</div>
                  <div class="col-sm-3"><span>Cancellation</span>Strict <i class="fa fa-exclamation-circle" aria-hidden="true"></i></div>
                  <div class="col-sm-3"><span>Lease term</span>Negotiable</div>
                  <div class="col-sm-3"><span>Phasellus</span>Molestie mass</div>
                </div>
                </div>
                
                <div class="property-location">
                  <h4>Location</h4>
                  


                  <div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7441.412572122276!2d79.06870567471097!3d21.16408394370072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd4c0fcf85ee143%3A0x8a9261908197e622!2sSadar%2C+Nagpur%2C+Maharashtra!5e0!3m2!1sen!2sin!4v1554118760955!5m2!1sen!2sin" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe></div>


                </div>
                <div class="property-policies">
                  <h4>Policies</h4>
                  <ul>
                    <li>Morbi lacinia, arcu vel venenatis</li>
                    <li>Fusce vehicula libero</li>
                    <li>Nam mauris tortor, sodales sit amet leo</li>
                  </ul>
                </div>
                <div class="property-review">
                  <h3>2 Reviews</h3>
                  <div class="rating">
                      <input type="radio" id="star5-5" name="rating" value="5" />
                      <label class = "full" for="star5-5" title="Awesome - 5 stars"></label>
                      <input type="radio" id="star4-5" name="rating" value="4" />
                      <label class = "full" for="star4-5" title="Pretty good - 4 stars"></label>
                      <input type="radio" id="star3-5" name="rating" value="3" />
                      <label class = "full" for="star3-5" title="Meh - 3 stars"></label>
                      <input type="radio" id="star2-5" name="rating" value="2" />
                      <label class = "full" for="star2-5" title="Kinda bad - 2 stars"></label>
                      <input type="radio" id="star1-5" name="rating" value="1" />
                      <label class = "full" for="star1-5" title="Sucks big time - 1 star"></label>
                  </div>
                  <div class="clear"></div>
                  <div class="reviewbox">
                    <div class="reviewer-img"><img src="{{ URL::asset('public') }}/assets/front-design/images/user-icon.jpg" alt=""></div>
                    <div class="reviewer-info"><h4>Ivan</h4><span>March 2019</span></div>
                    <div class="reviewer-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quam lectus, faucibus in elit et, vehicula convallis est. Morbi lacinia, arcu vel venenatis rhoncus, arcu lorem tincidunt magna, ut sollicitudin dui massa in urna...<a href="">Read more</a></div>
                  </div>
                  <div class="reviewbox">
                    <div class="reviewer-img"><img src="images/user-icon.jpg" alt=""></div>
                    <div class="reviewer-info"><h4>Ivan</h4><span>March 2019</span></div>
                    <div class="reviewer-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quam lectus, faucibus in elit et, vehicula convallis est. Morbi lacinia, arcu vel venenatis rhoncus, arcu lorem tincidunt magna, ut sollicitudin dui massa in urna...<a href="">Read more</a></div>
                  </div>
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
                    <a href="" class="cont-host">contact host</a>
                  </div><!-- rentedby -->
                </div>
              </div><!-- pc-left -->

              


              <div class="col-lg-4 col-md-4 col-sm-12 pc-right">
                <div class="pcright-box">
                  <div class="pc-price">$2800/month</div>
                  <div class="pc-avail"><span>Available</span>MAR 30</div>
                  <form name="booking-form" id="booking-form" method="post">
                     {!! csrf_field() !!} 
                      <div class="form-group date-group">
                        <label>From</label>
                         <div class="date"><input type="text" class="form-control" placeholder="mm/dd/yyyy H:i:s" name="bookfromdate" value="<?=$_GET['fromdate'].' '.$_GET['fromtime']?>" id="bookfromdate" /></div>
                      </div>
                      <div class="form-group date-group">
                        <label>To</label>
                        <div class="date"><input type="text" class="form-control" name="booktodate" value="<?=$_GET['todate'].' '.$_GET['totime']?>"placeholder="mm/dd/yyyy H:i:s" id="booktodate" /></div>
                      </div>
                      <input type="hidden" name="module_id" id="module_id" value="<?=$getPropertyDetails->module_manage_id?>">
                      <input type="hidden" name="property_id" id="property_id" value="<?=$getPropertyDetails->property_id?>">
                      <input type="hidden" name="duration_type" id="duration_type" value="<?=$_GET['durationtype']?>">
                  </form>
                  <!-- <button class="bluebtn">Apply</button> -->
                  <button class="whitebtn" id="bookProperty" onclick="bookProperty()">Book</button>
                </div>
              </div><!-- pc-right -->

              <div class="col-sm-12 more-space">
                <h3>More spaces you may like</h3>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="morespaceBox">
                      <div class="ms-img">
                        <img src="{{ URL::asset('public') }}/assets/front-design/images/book-space2.jpg" alt="">
                      </div>
                      <div class="ms-info">
                        <h4>Morbi lacinia, arcu vel venenatis</h4>
                        <span>$2400 per month • 2667 sqft</span>
                        <fieldset>
                        <div class="rating">
                            <input type="radio" id="star5-1" name="rating" value="5">
                            <label class="full" for="star5-1" title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4-1" name="rating" value="4">
                            <label class="full" for="star4-1" title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3-1" name="rating" value="3">
                            <label class="full" for="star3-1" title="Meh - 3 stars"></label>
                            <input type="radio" id="star2-1" name="rating" value="2">
                            <label class="full" for="star2-1" title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1-1" name="rating" value="1">
                            <label class="full" for="star1-1" title="Sucks big time - 1 star"></label>
                        </div>
                        <span>23</span>
                      </fieldset>
                      </div>
                    </div><!-- morespaceBox -->
                  </div><!-- col-sm-4 -->
                  <div class="col-sm-4">
                    <div class="morespaceBox">
                      <div class="ms-img">
                        <img src="{{ URL::asset('public') }}/assets/front-design/images/book-space2.jpg" alt="">
                      </div>
                      <div class="ms-info">
                        <h4>Morbi lacinia, arcu vel venenatis</h4>
                        <span>$2400 per month • 2667 sqft</span>
                        <fieldset>
                        <div class="rating">
                            <input type="radio" id="star5-2" name="rating" value="5">
                            <label class="full" for="star5-2" title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4-2" name="rating" value="4">
                            <label class="full" for="star4-2" title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3-2" name="rating" value="3">
                            <label class="full" for="star3-2" title="Meh - 3 stars"></label>
                            <input type="radio" id="star2-2" name="rating" value="2">
                            <label class="full" for="star2-2" title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1-2" name="rating" value="1">
                            <label class="full" for="star1-2" title="Sucks big time - 1 star"></label>
                        </div>
                        <span>23</span>
                      </fieldset>
                      </div>
                    </div><!-- morespaceBox -->
                  </div><!-- col-sm-4 -->
                  <div class="col-sm-4">
                    <div class="morespaceBox">
                      <div class="ms-img">
                        <img src="{{ URL::asset('public') }}/assets/front-design/images/book-space2.jpg" alt="">
                      </div>
                      <div class="ms-info">
                        <h4>Morbi lacinia, arcu vel venenatis</h4>
                        <span>$2400 per month • 2667 sqft</span>
                        <fieldset>
                        <div class="rating">
                            <input type="radio" id="star5-3" name="rating" value="5">
                            <label class="full" for="star5-3" title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4-3" name="rating" value="4">
                            <label class="full" for="star4-3" title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3-3" name="rating" value="3">
                            <label class="full" for="star3-3" title="Meh - 3 stars"></label>
                            <input type="radio" id="star2-3" name="rating" value="2">
                            <label class="full" for="star2-3" title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1-3" name="rating" value="1">
                            <label class="full" for="star1-3" title="Sucks big time - 1 star"></label>
                        </div>
                        <span>23</span>
                      </fieldset>
                      </div>
                    </div><!-- morespaceBox -->
                  </div><!-- col-sm-4 -->
                </div>
              </div><!-- more-space -->

            </div>
          </div>
      </section><!-- property-content -->

  </div><!-- single-property -->
 <?php }?>
</div><!-- site-content -->
<script type="text/javascript">
  var baseurl = '<?php echo url("/"); ?>';
</script>
@stop