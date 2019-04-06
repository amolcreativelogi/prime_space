@extends('front/layouts.default')
@section('content')

<?php use \App\Http\Controllers\Front\SearchPropertyController;//echo print_r($_GET); die;//echo '<pre>'; print_r($searchResult); echo '</pre>'?>
<div class="site-content">

<div class="all-properties">
    <section class="ap-filter">
      <div class="container">
        <div class="prop-type">
          <select id="select-property-type" name="module_manage_id">
            <?php foreach($getModuleCategories as $category){ ?>
                <option <?php if($category->module_manage_id == $searchArr['module_id']){ echo "selected";}?> value="<?php echo $category->module_manage_id ?>"><?php echo $category->module_manage_name ?></option>
                <?php } ?>
               </select>
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

        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item active">
            <a class="nav-link active"  data-toggle="tab" href="#monthly">Monthly</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  data-toggle="tab" href="#hourly">Hourly</a>
          </li>
        </ul> 

        <!-- Tab panes -->
        <div class="tab-content">
          <div id="monthly" class="container tab-pane active">
            <form action="searchproperty/" method="get">
              <div class="form-group">
                <label>Region</label>
                <div class="region">
                    <input type="text" name="location" id="location" placeholder="Seattle" autocomplete="on" runat="server">
                    <input type="hidden" id="city" name="city" />
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude"></div>
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
          <div id="hourly" class="container tab-pane fade">
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
               <div class="form-group time-group">
                <label>From time</label>
                <div class="time"><input type="text" name="from_time" placeholder="Any" id="from_time"></div>
              </div>
              <div class="form-group date-group">
                <label>To date</label>
                <div class="date"><input type="text" name="to_date" placeholder="Any" id="to_date"></div>
              </div>
              <div class="form-group time-group">
                <label>From time</label>
                <div class="time"><input type="text" name="to_time" placeholder="Any" id="to_time"></div>
              </div>
            </form>
          </div>
           <input type="button" value="submit" onclick="searchURL()">
        </div>
      </div>
    </section><!-- ap-filter -->

    <section class="filter-result">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-12 ps-div">
            <div class="ps-count"><?= $no_of_prop ?> Properties</div>

          @foreach($searchResult as $searchProp)
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
                      <div class="ps-avail"><?= $getDurationType;?></div>
                      <!-- <div class="ps-avail">Hourly • Daily • Monthly</div> -->
                      <!-- <div class="ps-price">$83<span>/day</span></div> -->
                      <div class="ps-price"><?= isset($searchProp->rent_amount)?$searchProp->rent_amount.'<span>/Hour</span>':''; ?></div>
                    </div>
                    <div class="pstext-btm">
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
                      <button class="booknow">Book now</button>
                    </div>
                </div>
            </div><!-- ps-box -->
           @endForeach
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 ps-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7441.412572122276!2d79.06870567471097!3d21.16408394370072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd4c0fcf85ee143%3A0x8a9261908197e622!2sSadar%2C+Nagpur%2C+Maharashtra!5e0!3m2!1sen!2sin!4v1553691732461" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </section><!-- filter-result -->

</div><!-- all-properties -->
 
</div><!-- site-content -->
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/jquery-1.11.3.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {

  $activeTab = '<?php echo $_GET['activeTab'];?>';

  if($activeTab == 'monthly'){
    $('#from').val('<?php echo $_GET['fromdate'];?>');
    $('#to').val('<?php echo $_GET['todate'];?>');
    $('#location').val('<?php echo $_GET['location'];?>');
  }else{
    $('#from_date').val('<?php echo $_GET['fromdate'];?>');
    $('#to_date').val('<?php echo $_GET['todate'];?>');
    $('#from_time').val('<?php echo $_GET['fromtime'];?>');
    $('#to_time').val('<?php echo $_GET['totime'];?>');
    $('#hrlyFrmlocation').val('<?php echo $_GET['location'];?>');
  }
  

});
</script> 
@stop

