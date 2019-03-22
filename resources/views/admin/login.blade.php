<!DOCTYPE html>
<html dir="ltr" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<title>Online Exam</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="#" rel="icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/Admin/js/jquery-2.js"></script>
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/Admin/js/bootstrap.js"></script>
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/Admin/js/highcharts.js"></script> 
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/Admin/js/exporting.js"></script>
<link href="{{ URL::asset('public') }}/assets/Admin/css/opencart.css" type="text/css" rel="stylesheet">
<link href="{{ URL::asset('public') }}/assets/Admin/css/font-awesome.css" type="text/css" rel="stylesheet">
<link href="{{ URL::asset('public') }}/assets/Admin/css/summernote.css" rel="stylesheet">
<script type="text/javascript" src="assets/js/summernote.js"></script>
<script src="{{ URL::asset('public') }}/assets/Admin/js/moment.js" type="text/javascript"></script>
<script src="{{ URL::asset('public') }}/assets/Admin/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

<link href="{{ URL::asset('public') }}/assets/Admin/css/bootstrap-datetimepicker.css" type="text/css" rel="stylesheet" media="screen">


<link type="text/css" href="{{ URL::asset('public') }}/assets/Admin/css/stylesheet.css" rel="stylesheet" media="screen">
<script src="{{ URL::asset('public') }}/assets/Admin/js/common.js" type="text/javascript"></script>
<script>
var Admin_module='Masteradmin';
</script>


</head>
<body>
<div id="container">
<header id="header" class="navbar navbar-static-top">
  <div class="navbar-header">
   <div class="logopanel" >
    <h1 class="logotitle">Pryme Space</h1>
   </div> 
   </div>
</header>
<div id="content">
  <div class="container-fluid"><br />
    <br />
    <div class="row">
      <div class="col-sm-offset-4 col-sm-4 login">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h1 class="panel-title"><i class="fa fa-lock"></i> Please enter your login details.</h1>
          </div>
          <div class="panel-body">
              <form action="#" id="loginform">
	       	  
	       	  <div class="alert alert-danger loginerror" style="display: none;"><i class="fa fa-exclamation-circle"></i> No match for Username and/or Password. <button type="button" class="close" data-dismiss="alert">×</button>
	        	</div>

              <div class="form-group">
                <label for="input-username">Username</label>
                <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                 <input type="email"  class="form-control" name="username" required="" id="username" placeholder="Enter email" value="test@gmail.com">
                </div>
              </div>
              <div class="form-group">
                <label for="input-password">Password</label>
                <div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="password" class="form-control" name="password" required="" id="password" placeholder="Enter pwd" value="12345">
                </div>
               </div>
              <div class="text-right">
                <button type="submit" class="col-lg-12 btn btn-primary"><i class="fa fa-key"></i> Login</button>
              </div>
             </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
  $("#loginform").submit(function(e) {
    e.preventDefault();
    var error=0;
    var username = $('#username').val();
    var password = $('#password').val();

    if(username == ''){
      error++;
      $('.username_err').html("Please Enter username");
    }else{
      $('.username_err').html("");
      }

    if(password == ''){
      error++;
    $('.pass_err').html("Please Enter password");
    }else{
      $('.pass_err').html("");
      }
    if(error==0) {
       $.ajax({
        url: '<?php echo url('/admin/LoginController'); ?>',
        type: 'POST',
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        processData: false,
        success:function(data){
            if(data['code']==200){
              //alert(data['code']);
              $('#loginform').trigger("reset");
              $('.target2').fadeIn();
              setTimeout(function(){
            window.location.href =baseurl+Admin_module+'/Dashboard/';
              }, 400);
            }
            if(data['code']==100){
              $('.loginerror').css('display','block');
              $('.formvalid').html("Invalid username and password");
            }
          }
    });
      }
    return false;
  });
});
</script>
</body></html>