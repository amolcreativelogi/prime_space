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

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCW7L7bkL1lt82llGHEqSbB7fczpddVDqU&libraries=places"></script>

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
        <a href="#" data-toggle="modal" class="searchModal popuplink" data-target="#searchModal"><i class="fa fa-search" aria-hidden="true"></i> Search</a>
         <nav class="navbar navbar-default pullright">
            <ul class="nav navbar-nav">
              <li class="demandpark"><a href="#">Try on-demand parking</a></li>
              <li class="dropdown"><a href="#" dropdown-toggle" data-toggle="dropdown">Get started <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Get started</a></li>
                <li><a href="#">Get started</a></li>
                <li><a href="#">Get started</a></li>
              </ul>
              </li>
              <li><a href="#">Help</a></li>
              <?php
              if(isset($_SESSION['user']['is_user_login'])) { ?>
              <div class="afterloginbox">
              <ul>
                 <li class="dropdown"><a href="#" dropdown-toggle"="" data-toggle="dropdown" aria-expanded="false"><img src="http://alkurn.info/html/Prymespace/images/test-author-03.jpg" alt=""><?php echo $_SESSION['user']['firstname']; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo ($_SESSION['user']['user_type_id'] == 2) ?  URL::to('user/host') :  URL::to('user/customer'); ?>">dashboard</a></li>
                  <?php if($_SESSION['user']['user_type_id'] == 5) { 
                  if($_SESSION['user']['user_type_permission'] == 'customer') {
                  ?>
                  <li><a href="<?php echo URL::to('user/switchtohost'); ?>">Switch to Host</a></li>
                  <?php } else { ?>
                  <li><a href="<?php echo URL::to('user/switchtocustomer'); ?>">Switch to Customer</a></li>
                   <?php } } ?>
                  <li><a href="#">edit profile</a></li>
                  <li><a href="#">Account Setting </a></li>
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
</style> 
</header><!-- site-header -->
<script type="text/javascript">

  function searchURL(){
   
    var module_id = ($('#select-property-type').val())?$('#select-property-type').val():'2';
    var fromdate = getCurrentDate();
    var todate =   getCurrentDate();
    var fromtime = '00:00:00';
    var totime= '23:00:00';
    var location = "";
    var latitude = '36.1626638';//$('#latitude').val(); 
    var longitude = '-86.78160159999999';
    var searchFormId=$("a.active").attr('href');
    var activeTab = "monthly";
    

    if(searchFormId == '#monthly'){

       fromdate = $('#from').val(); 
       todate =   $('#to').val();
       location = $('#location').val();
       latitude = '36.1626638';//$('#hrlyFrmLatitude').val(); 
       longitude = '-86.78160159999999';//$('#hrlyFrmLongitude').val();
       activeTab = "monthly";
    }else if(searchFormId == '#hourly'){

       fromdate = $('#from_date').val(); 
       todate =   $('#to_date').val(); 
       fromtime = ($('#from_time').val())?$('#from_time').val():'00:00:00';
       totime= ($('#to_time').val())?$('#to_time').val():'23:00:00';
       location = $('#hrlyFrmlocation').val();
       latitude = '36.1626638';//$('#latitude').val(); 
       longitude = '-86.78160159999999';//$('#longitude').val();
       activeTab = "hourly";

    }else{

    var  search_dates = $('#search_dates').val();
     location = $('#location').val();
     latitude = '36.1626638';//$('#latitude').val(); 
     longitude = '-86.78160159999999';//$('#longitude').val();
   
  }

    var url = "<?php echo URL('/') ?>/searchproperty?module_id="+module_id+"&fromdate="+fromdate+"&todate="+todate+"&fromtime="+fromtime+"&totime="+totime+"&latitude="+latitude+"&longitude="+longitude+"&location="+location+"&activeTab="+activeTab;
    
    //redirect url
     window.location = url;
    //window.location = "http://www.myurl.com/search/" + (input text value);
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

  var input = document.getElementById('hrlyFrmlocation');
  var autocomplete = new google.maps.places.Autocomplete(input);
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
        document.getElementById('hrlyFrmCity').value = place.name;
        document.getElementById('hrlyFrmLatitude').value = place.geometry.location.lat();
        document.getElementById('hrlyFrmLongitude').value = place.geometry.location.lng();
    });
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>

