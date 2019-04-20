<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pryme Space</title>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public') }}/assets/front-design/css/custom.css">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public') }}/assets/front-design/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public') }}/assets/front-design/css/animate.css">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public') }}/assets/front-design/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet"> 
<!-- location autocomplete -->

<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCW7L7bkL1lt82llGHEqSbB7fczpddVDqU&libraries=places"></script>
 -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2oRAljHGZArBeQc5OXY0MI5BBoQproWY&libraries=places"></script>

<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/jquery-1.11.3.min.js"></script>

<script src="{{ URL::asset('public') }}/assets/front-design/js/jquery.validate.min.js"></script>


</head>
 
<body class="<?php echo   (URL::to('/') == Request::url()) ? 'home' : ''; ?>">
<div class="loader" style="display:none;">
<div class="loader-inner">
  <div class="loader-img">
    <!--<div class="mdl-spinner mdl-js-spinner is-active"></div>-->
    <img src="{{ URL::asset('public') }}/assets/front-design/images/loaderilk.gif" title="" alt=""></div> 
    <div class="loader-text">Please wait...</div>
</div>
</div>

<header class="site-header">
 <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-12 logodiv">
        <a href="{{ URL::asset('/') }}" class="logo"><img src="{{ URL::asset('public') }}/assets/front-design/images/psw-logo.png" alt=""></a>
      </div>
      <div class="col-lg-9 col-md-8 col-sm-12 menudiv">
        <a href="#" data-toggle="modal" class="searchModal popuplink" data-target="#searchModal" onclick="getTopSerchModuleList()"><i class="fa fa-search" aria-hidden="true" ></i> Search</a>
         <nav class="navbar navbar-default pullright">
            <ul class="nav navbar-nav">
              <li class="demandpark"><a href="<?php echo URL::to('/searchproperty?module_id=2&fromdate=04.19.2019&todate=04.19.2019&fromtime=00:00:01&totime=23:59:00&latitude=&longitude=&location=&car_type_id=&location_type_id=&land_type_id=&activeTab=daily&duration_type_id=2'); ?>">Try on-demand parking</a></li>
              
              <!-- <li class="dropdown"><a href="#" dropdown-toggle" data-toggle="dropdown">Get started <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Get started</a></li>
                  <li><a href="#">Get started</a></li>
                  <li><a href="#">Get started</a></li>
                </ul>
              </li> -->
              <li><a href="#">Help</a></li>
              <?php
              if(isset($_SESSION['user']['is_user_login'])) { ?>
              <div class="afterloginbox">
                <a href="<?php echo URL::to('messages'); ?>" class="head-msg"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                <a href="<?php echo URL::to('notification'); ?>" class="head-notification"><i class="fa fa-bell" aria-hidden="true"></i><span class="not-count">20</span></a>
              <ul>
                 <li class="dropdown"><a href="#" dropdown-toggle="" data-toggle="dropdown" aria-expanded="false"><img src="http://alkurn.info/html/Prymespace/images/test-author-03.jpg" alt=""><?php echo $_SESSION['user']['firstname']; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo ($_SESSION['user']['user_type_permission'] == 'host') ?  URL::to('user/host') :  URL::to('user/customer'); ?>">dashboard</a></li>
                  <?php if($_SESSION['user']['user_type_id'] == 5) { 
                  if($_SESSION['user']['user_type_permission'] == 'customer') {
                  ?>
                  <li><a href="<?php echo URL::to('user/switchtohost'); ?>">Switch to Host</a></li>
                  <?php } else { ?>
                  <li><a href="<?php echo URL::to('user/switchtocustomer'); ?>">Switch to Customer</a></li>
                   <?php } } ?>
                  <li><a href="<?php echo URL::to('user/editprofile/'.$_SESSION['user']['user_id']); ?>">edit profile</a></li>
                  <li><a href="<?php echo URL::to('user/accountSetting'); ?>">Account Setting </a></li>
                  <li><a href="<?php echo URL::to('/user/logout'); ?>">logout</a></li>
                </ul>
                </li>
              </ul>
              </div>
             <?php } else { ?>
              <li><a href="#" data-toggle="modal" class="singupModal popuplink" data-target="#singupModal">Sign up</a></li>
              <li><a href="#" data-toggle="modal" class="loginModal popuplink" data-target="#loginModal">Log in</a></li>
              <?php } ?>
            </ul>
        </nav>
      </div>
  </div>

  </div>
</header><!-- site-header -->
<style type="text/css">
.error
{
  color: red;
}
.pac-container {
    z-index: 10000 !important;
}
</style> 

<?php 
//get url module id
$module_manage_id=(isset($_GET['module_id']) && !empty($_GET['module_id']))?$_GET['module_id']:'';
 
?>


<script type="text/javascript">
function searchURL(){

    //get amenity
    var amenity = [];
    $.each($("input[name='data[amenities][]']:checked"), function(){            
        amenity.push($(this).val());
    });
    var amenities = amenity.join(",");
    
    //module id
    var module_id = ($('#select-property-type').val())?$('#select-property-type').val():'2';
    //default date time
    var fromdate = getCurrentDate();
    var todate =   getCurrentDate();
    var fromtime = '00:00:01';
    var totime= '23:59:00';
    var activeTab = "daily";
    var duration_type_id = 2;
    
    //home from date time 
    var  home_search_datetime = $('#search_dates1').val();
    if(typeof(home_search_datetime) != "undefined" && home_search_datetime != ""){
      var split_home_search_datetime = home_search_datetime.split(' ');
      var home_search_frmdate =split_home_search_datetime[0];
      var home_search_frmtime =split_home_search_datetime[1];
      //var home_search_frmtime_obj = home_search_datetime.split(' ');
      var hour = home_search_frmtime;//home_search_frmtime_obj[1];
      var hoursplit = hour.split(':');
      var home_search_totime  = parseInt(hoursplit[0])+parseInt(1)+':'+hoursplit[1];
     
      activeTab = "hourly";
      duration_type_id=1;
    }

    var location = "";
    var latitude = '';//$('#latitude').val(); 
    var longitude = '';//$('#latitude').val();
    var searchFormId=$("a.active").attr('href');
    var searchFormLand=$("#nav-tab1 a.active").attr('href');
    
    var car_type_id = '1';
    var land_type_id =  '2';
    var location_type_id ='';

    if(module_id == 2) {
        location_type_id = ( $('#location_type_id').val()) ?  $('#location_type_id').val() : '';
        if(searchFormId == '#monthly'){
           fromdate = $('#monthly_from').val(); 
           todate =   $('#monthly_to').val();
           location = $('#monthlyFrmlocation').val();
           latitude = $('#monthlyFrmLatitude').val(); 
           longitude = $('#monthlyFrmLongitude').val();
           car_type_id = ( $('#car_type_id').val()) ?  $('#car_type_id').val() : '1';
           activeTab = "monthly";
           duration_type_id=3;
        } else if(searchFormId == '#daily'){
           fromdate = $('#from').val(); 
           todate =   $('#to').val();
           location = $('#dailyFrmlocation').val();
           latitude = $('#dailyFrmLatitude').val(); 
           longitude = $('#dailyFrmLongitude').val();
           car_type_id = ( $('#car_type_id').val()) ?  $('#car_type_id').val() : '1';
           activeTab = "daily";
           duration_type_id=2;
        }
        else if(searchFormId == '#hourly'){
           var str = $('#from_date').val();
           var from_date = str.split(' ');
           var str1 = $('#to_date').val();
           var to_date = str1.split(' ');
           fromdate = from_date[0]; 
           todate =   to_date[0]; 
           fromtime = (from_date[1])?from_date[1]:'00:00:01';
           totime= (to_date[1])?to_date[1]:'23:59:00';
           location = $('#hrlyFrmlocation').val();
           latitude = $('#hrlyFrmLatitude').val(); 
           longitude = $('#hrlyFrmLongitude').val();
           car_type_id = ( $('#car_type_id').val()) ?  $('#car_type_id').val() : '1';
           activeTab = "hourly";
           duration_type_id=1;
        }else{
         var  search_dates = $('#search_dates').val();
         location = $('#location').val();
         latitude = $('#latitude').val(); 
         longitude = $('#longitude').val();
         fromdate = (home_search_frmdate)?home_search_frmdate:getCurrentDate();
         todate = (home_search_frmdate)?home_search_frmdate:getCurrentDate();
         fromtime = (home_search_frmtime)?home_search_frmtime:'00:00:01';
         totime= (home_search_totime)?home_search_totime:'23:59:00';
        } 
    } else {
       
       if(searchFormLand == '#land-monthly'){
           fromdate = $('#land-monthly_from').val(); 
           todate =   $('#land-monthly_to').val();
           location = $('#landmonthlyFrmlocation').val();
           latitude = $('#landmonthlyFrmLatitude').val(); 
           longitude = $('#landmonthlyFrmLongitude').val();
           land_type_id = ( $('#land_type_id').val()) ?  $('#land_type_id').val() : '2';
           activeTab = "monthly";
           duration_type_id=3;
        } else if(searchFormLand == '#land-daily'){
           fromdate = $('#daily_from').val(); 
           todate =   $('#daily_to').val();
           location = $('#landdailyFrmlocation').val();
           latitude = $('#landdailyFrmLatitude').val(); 
           longitude = $('#landdailyFrmLongitude').val();
           land_type_id = ( $('#land_type_id').val()) ?  $('#land_type_id').val() : '2';
           activeTab = "daily";
           duration_type_id=2;
        }
        else if(searchFormLand == '#land-weekly'){
           fromdate = $('#weekly_from').val(); 
           todate =   $('#weekly_to').val();
           location = $('#landweeklyFrmlocation').val();
           latitude = $('#landweeklyFrmLatitude').val(); 
           longitude = $('#landweeklyFrmLongitude').val();
           land_type_id = ( $('#land_type_id').val()) ?  $('#land_type_id').val() : '2';
           activeTab = "weekly";
           duration_type_id=4;
        }else{
         var  search_dates = $('#search_dates').val();
         location = $('#location').val();
         latitude = $('#latitude').val(); 
         longitude = $('#longitude').val();

        }


    }
     //create url
    var url = "<?php echo URL('/') ?>/searchproperty?module_id="+module_id+"&fromdate="+fromdate+"&todate="+todate+"&fromtime="+fromtime+"&totime="+totime+"&latitude="+latitude+"&longitude="+longitude+"&location="+location+"&car_type_id="+car_type_id+"&location_type_id="+location_type_id+"&land_type_id="+land_type_id+"&activeTab="+activeTab+"&duration_type_id="+duration_type_id+"&amenities="+amenities;
    //redirect url
    window.location = url;
   
  }

function topPrpertySearch()
{
    var module_id = ($('#select-property-type-top').val())?$('#select-property-type-top').val():'2';

    var amenities = '<?= Request::get('amenities')?>';
    fromdate = $('#from_date').val(); 
    var fromdate = getCurrentDate();
    var todate =   getCurrentDate();
    var fromtime = '00:00:01';
    var totime= '23:59:00';
    var location = "";
    var searchFormId=$("a.active").attr('href');
    var activeTab = "daily";
    var  search_dates = $('#search_dates').val();
    var  location = $('#location-top-search').val();
    var  latitude = $('#latitude-top-search').val(); 
    var  longitude = $('#longitude-top-search').val();
    var duration_type_id=2;
    var location_type_id="";

    if(module_id == 2){//parking
      //top from date time 
      var  top_search_datetime = $('#search_dates').val();
     
      if(typeof(top_search_datetime) != "undefined" && top_search_datetime != ""){
        var split_top_search_datetime = top_search_datetime.split(' ');
        var fromdate =split_top_search_datetime[0];
        var todate =split_top_search_datetime[0];
        var fromtime =split_top_search_datetime[1];
        var hour = split_top_search_datetime[1];
        var hoursplit = hour.split(':');
        var totime  = parseInt(hoursplit[0])+parseInt(1)+':'+hoursplit[1];
        activeTab = "hourly";
        duration_type_id=1;
      }

    }
    //create url
    var url = "<?php echo URL('/') ?>/searchproperty?module_id="+module_id+"&fromdate="+fromdate+"&todate="+todate+"&fromtime="+fromtime+"&totime="+totime+"&latitude="+latitude+"&longitude="+longitude+"&location="+location+"&car_type_id=1"+"&location_type_id="+location_type_id+"&land_type_id=2"+"&activeTab="+activeTab+"&duration_type_id="+duration_type_id+"&amenities="+amenities;
    //redirect url
     window.location = url;
}

function getTopSerchModuleList(){
      
      var module_id = '<?php echo $module_manage_id;?>';
      if(module_id == 2){ $("#search_dates").show();}else{$("#search_dates").hide();}
     
      $.ajax({
        type: "POST",
        url: "<?php echo URL('/') ?>/frontend/getModuleList",
        //context: document.body,
        global: false,
        success: function(data){
          if( data != ''){
            $("#select-property-type-top").empty();
            var response = $.parseJSON(data);
            $("#select-property-type-top").append("<option value=''>Choose a category</option>");
            $.each(response,function(index,item) 
            {
              var selectedOpt= (module_id == item.module_manage_id)?"selected":"";
              $("#select-property-type-top").append("<option "+selectedOpt+" value='"+item.module_manage_id+"'>"+item.module_manage_name+"</option>");
            });
          }
        }
          
      });

}



//to get lat long
function initialize() {
  
var input = document.getElementById('location');
  var autocomplete = new google.maps.places.Autocomplete(input);
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
        document.getElementById('city').value = place.name;
        document.getElementById('latitude').value = place.geometry.location.lat();
        document.getElementById('longitude').value = place.geometry.location.lng();
    });


  var input1 = document.getElementById('hrlyFrmlocation');
  var autocomplete1 = new google.maps.places.Autocomplete(input1);
    google.maps.event.addListener(autocomplete1, 'place_changed', function () {
        var place1 = autocomplete1.getPlace();
        document.getElementById('hrlyFrmCity').value = place1.name;
        document.getElementById('hrlyFrmLatitude').value = place1.geometry.location.lat();
        document.getElementById('hrlyFrmLongitude').value = place1.geometry.location.lng();
    });

  var inputd = document.getElementById('dailyFrmlocation');
  var autocompleted = new google.maps.places.Autocomplete(inputd);
    google.maps.event.addListener(autocompleted, 'place_changed', function () {
        var placed = autocompleted.getPlace();
        document.getElementById('dailyFrmCity').value = placed.name;
        document.getElementById('dailyFrmLatitude').value = placed.geometry.location.lat();
        document.getElementById('dailyFrmLongitude').value = placed.geometry.location.lng();
    });

  var inputm = document.getElementById('monthlyFrmlocation');
  var autocompletem = new google.maps.places.Autocomplete(inputm);
    google.maps.event.addListener(autocompletem, 'place_changed', function () {
        var placem = autocompletem.getPlace();
        document.getElementById('monthlyFrmCity').value = placem.name;
        document.getElementById('monthlyFrmLatitude').value = placem.geometry.location.lat();
        document.getElementById('monthlyFrmLongitude').value = placem.geometry.location.lng();
    });


  // land search location
  var inputlanddaily = document.getElementById('landdailyFrmlocation');
  var autocompletelanddaily = new google.maps.places.Autocomplete(inputlanddaily);
    google.maps.event.addListener(autocompletelanddaily, 'place_changed', function () {
        var placelanddaily = autocompletelanddaily.getPlace();
        document.getElementById('landdailyFrmCity').value = placelanddaily.name;
        document.getElementById('landdailyFrmLatitude').value = placelanddaily.geometry.location.lat();
        document.getElementById('landdailyFrmLongitude').value = placelanddaily.geometry.location.lng();
    });

   var inputlandweekly = document.getElementById('landweeklyFrmlocation');
  var autocompletelandweekly = new google.maps.places.Autocomplete(inputlandweekly);
    google.maps.event.addListener(autocompletelandweekly, 'place_changed', function () {
        var placelandweekly = autocompletelandweekly.getPlace();
        document.getElementById('landweeklyFrmCity').value = placelandweekly.name;
        document.getElementById('landweeklyFrmLatitude').value = placelandweekly.geometry.location.lat();
        document.getElementById('landweeklyFrmLongitude').value = placelandweekly.geometry.location.lng();
    }); 

  var inputlandmonthly = document.getElementById('landmonthlyFrmlocation');
  var autocompletelandmonthly = new google.maps.places.Autocomplete(inputlandmonthly);
    google.maps.event.addListener(autocompletelandmonthly, 'place_changed', function () {
        var placelandmonthly = autocompletelandmonthly.getPlace();
        document.getElementById('landmonthlyFrmCity').value = placelandmonthly.name;
        document.getElementById('landmonthlyFrmLatitude').value = placelandmonthly.geometry.location.lat();
        document.getElementById('landmonthlyFrmLongitude').value = placelandmonthly.geometry.location.lng();
    });



  var input2 = document.getElementById('location-property');
  var autocomplete2 = new google.maps.places.Autocomplete(input2);
    google.maps.event.addListener(autocomplete2, 'place_changed', function () {
        var place2 = autocomplete2.getPlace();
        document.getElementById('city-property').value = place2.name;
        document.getElementById('latitude-property').value = place2.geometry.location.lat();
        document.getElementById('longitude-property').value = place2.geometry.location.lng();
    });

  var input3 = document.getElementById('location-top-search');
  var autocomplete3 = new google.maps.places.Autocomplete(input3);
    google.maps.event.addListener(autocomplete3, 'place_changed', function () {
        var place3 = autocomplete3.getPlace();
        document.getElementById('city-top-search').value = place3.name;
        document.getElementById('latitude-top-search').value = place3.geometry.location.lat();
        document.getElementById('longitude-top-search').value = place3.geometry.location.lng();
    });


  var input4 = document.getElementById('update_profile_address');
  var autocomplete4 = new google.maps.places.Autocomplete(input4);
    google.maps.event.addListener(autocomplete4, 'place_changed', function () {
        var place4 = autocomplete4.getPlace();
        document.getElementById('city-profile-address').value = place4.name;
        document.getElementById('latitude-profile-address').value = place4.geometry.location.lat();
        document.getElementById('longitude-profile-address').value = place4.geometry.location.lng();
    });

  var input5 = document.getElementById('location-from-search');
  var autocomplete5 = new google.maps.places.Autocomplete(input5);
    google.maps.event.addListener(autocomplete5, 'place_changed', function () {
    });

}
google.maps.event.addDomListener(window, 'load', initialize);
</script>


<script>
function DeleteRecord(id,table,tbid)
{   
      if(confirm('Are you sure you want to delete this record?')){
      var url = '<?php echo URL::to('user/DeleteRecord'); ?>';
      //alert(isDeleteChild);
      $.ajax({
      method: 'POST',
      url: url,
      data: {'id':id,'table':table,'dbid':tbid,'_token':"{{ csrf_token() }}"}
      })
      .done(function( msg ) {
      alert('Record Deleted Successfully.');
      location.reload();
      // var oTable = $('#example').dataTable();
      // oTable.fnDraw();
      });
      }else{
      return false;
      }
}
</script>
