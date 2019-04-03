


<!-- singupModal start -->
<div class="modal fade formModal" id="singupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="site-signup site-form">
                      <form id="form-signup" url="{{ URL::asset('userRegistration') }}" method="post" novalidate="novalidate">
                      <input type="hidden" name="_csrf-frontend" value="">
                       {!! csrf_field() !!}
                      <div class="form-group field-signupform-email required">
                          <input type="text" id="email_id" class="form-control" name="email_id" aria-required="true" placeholder="Email Address">
                      </div>
                      <div class="form-group field-signupform-first_name required has-error">
                          <input type="text" id="firstname" class="form-control" name="firstname" autofocus="" aria-required="true" aria-invalid="true" placeholder="First Name">
                      </div>
                      <div class="form-group field-signupform-last_name required">
                          <input type="text" id="lastname" class="form-control" name="lastname" autofocus="" aria-required="true" placeholder="Last Name">
                      </div>
                      <div class="form-group field-signupform-password required">
                          <input type="password" id="password" class="form-control" name="password" aria-required="true" placeholder="Create a password">
                      </div>
                      <div class="form-group birthdategroup">
                         <label>Birthday</label>
                         <p>To sign up, you must be 18 or older. People won’t see your birthday</p>
                         <div class="birthdaygroup">
                          <select class="month" name="dob_month">
                            <?php for ($m=1; $m<=12; $m++) {
                            $month = date('F', mktime(0,0,0,$m, 1, date('Y'))); ?>
                            <option value="<?php echo $m; ?>"><?php echo $month; ?></option>
                            <?php } ?>
                          </select>
                          <select class="day" name="dob_day">
                            <?php for ($d=1; $d<=31; $d++) { ?>
                            <option value="<?php echo $d; ?>"><?php echo $d; ?></option>
                            <?php } ?>
                          </select>
                          <select class="year" name="dob_year">
                           <?php 
                           $year = date('Y')-18;
                           $validyear = date('Y')-100;
                           for ($y=$year; $y>=$validyear; $y--) { ?>
                           <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                           <?php } ?>
                          </select>
                         </div>
                      </div>

                      <div class="form-group acctype-group">
                          <label class="control-label" for="signupform-confirm_password">account type</label>
                          <ul>
                            <li>
                              <input type="radio" name="user_type_id" id="host" value="2">
                              <label for="host">Host</label>
                            </li>
                            <li>
                              <input type="radio" name="user_type_id" id="user" value="3">
                              <label for="user">User</label>
                            </li>
                          </ul>
                          <div id="user_type_id-error" class="error" for="email_address"></div>
                      </div>

                    <div class="row">
                        <div class="col-sm-1">
                            <input type="checkbox" id="privacy_policy_check"> <span class="checkmark"></span>
                        </div>
                        <div class="col-sm-11">
                            <label for="">
                                By continuing you are confirming that you have read and agree to the <a href="#">Terms of Service</a> &amp; <a href="#">Privacy Policy</a>.
                            </label>
                        </div>
                    </div>
                    <div class="msg-gloabal"></div>
                    <div class="form-group">
                        <button type="submit" class="bluebtn" name="signup-button">Sign up</button>                    
                    </div>

                    <div class="form-group password-reset text-center">
                        Already have a Prymespace account? <a href="#" data-toggle="modal" data-target="#loginModal" class="loginModal popuplink">Log in</a>.
                    </div>
                    </form>                
      </div>  
      </div>
    </div>
  </div>
</div>
<!-- singupModal end -->

<!-- loginModal start -->
<div class="modal fade formModal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Log in to continue</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="site-signup site-form">
                   <form id="form-login" url="{{ URL::asset('userLogin') }}" method="post" novalidate="novalidate">
                             {!! csrf_field() !!}
                            <input type="hidden" name="_csrf-frontend" value="">
                            <div class="form-group field-loginform-email required has-error">
                                <input type="text" id="email_id_login" class="form-control" name="email_id" autofocus="" aria-required="true" aria-invalid="true" placeholder="Email Address">
                            </div>
                            <div class="form-group field-loginform-password required has-error">
                                <input type="password" id="password_login" class="form-control" name="password" aria-required="true" aria-invalid="true" placeholder="Password">
                            </div>
                            <div class="form-group field-loginform-rememberme">
                              <div class="checkbox">
                                  <label for="loginform-rememberme">
                                  <input type="hidden" name="LoginForm[rememberMe]" value="0"><input type="checkbox" id="loginform-rememberme" name="rememberme" value="1" checked="">
                                  Remember Me
                                  </label>
                              </div>
                            </div>
                             <div class="msg-gloabal"></div>
                            <div class="form-group text-center">
                                <button type="submit" class="bluebtn" name="login-button">Login</button>
                            </div>

                            <div class="form-group text-center">
                              <ul class="social-login">
                                <li><a class="google auth-link" href="#" title="Google"><i class="fa fa-google-plus" aria-hidden="true"></i>Google+</a></li>
                                <li><a class="facebook auth-link" href="#" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i>Facebook</a></li>
                              </ul>
                            </div>

                            <a href="#" data-toggle="modal" data-target="#resetpassModal" class="forgotlink">Forgot password?</a>

                            <div class="form-group password-reset text-center" >
                                Don’t have a Prymespace account? <a href="#" data-toggle="modal" data-target="#singupModal" class="singupModal popuplink">Sign up</a>.
                            </div>

                        </form>              
      </div>  
      </div>
    </div>
  </div>
</div>
<!-- loginModal end -->



<!-- resetpassModal start -->
<div class="modal fade formModal" id="resetpassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reset password request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <div class="site-signup site-form">
     <form id="form-password" url="{{ URL::asset('resetPassword') }}" method="post" novalidate="novalidate">
         {!! csrf_field() !!}
        <div class="form-group field-passwordresetrequestform-email">
          <input type="text" id="forgot_password_email" class="form-control" name="email_id" autofocus="" aria-required="true" aria-invalid="true" placeholder="Email Address">
        </div>
        <div class="msg-gloabal"></div>
        <div class="form-group">
          <button type="submit" class="bluebtn" name="forgot-button">Send</button>                         
        </div>
      </form>             
    </div>  
      </div>
    </div>
  </div>
</div>
<!-- loginModal end -->



<footer class="site-footer">
  <div class="container">
    <div class="foot-top">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6">
          <a href="" class="foot-logo"><img src="{{ URL::asset('public') }}/assets/front-design/images/psw-logo.png" alt=""></a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <h4>Company</h4>
          <ul>
            <li><a href="">About Us</a></li>
            <li><a href="">Mission</a></li>
            <li><a href="">Vision</a></li>
            <li><a href="">Blog</a></li>
            <li><a href="">Press</a></li>
            <li><a href="">FAQ's</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <h4>Hosts</h4>
          <ul>
            <li><a href="">Benefits for Hosting with Us</a></li>
            <li><a href="">Become a Host</a></li>
            <li><a href="">Host FAQ's </a></li>
            <li><a href="">Community</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <h4>Renter</h4>
          <ul>
            <li><a href="">Benefits for Renting with Us</a></li>
            <li><a href="">Become a Renter</a></li>
            <li><a href="">Renter FAQ's </a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="foot-btm">
      <ul>
        <li><a href="">Terms</a></li>
        <li><a href="">Privacy Statement</a></li>
      </ul>
      <div class="copyright">© 2019 Pryme Space, Inc.</div>
      <ul class="foot-social">
        <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
        <li><a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
        <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
</footer>


<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/jquery.easing.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/custom-file-input.js"></script>
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/popper.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/common.js"></script>

<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/my-script.js"></script>


<link rel="stylesheet" type="text/css" href="{{ URL::asset('public') }}/assets/front-design/css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public') }}/assets/front-design/css/owl.theme.default.min.css">


<script>
$(function() {

//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){

  var form = $("#msform");
    form.validate({
      rules: {
        'data[property_name]': {
          required: true,
        },
        'module_manage_id': {
          required: true,
        },
        'data[location]': {
          required: true,
        },
        'data[zip_code]': {
          required: true,
        },
        'data[property_description]': {
          required: true,
        },
        'property_size': {
          required: true,
        }

        
      },
      messages: {
        'data[property_description]': {
          required: "Property name is required",
        },
        'module_manage_id': {
          required: "Property type is required",
        },
        'data[location]': {
          required: "Location name is required",
        },
        'data[zip_code]': {
          required: "Zip code is required",
        },
        'data[property_description]': {
          required: "Property description is required",
        },
        'property_size': {
          required: "Property Size is required",
        }
      }
    });

  if(animating) return false;
  animating = true;

  if (form.valid() == true){
      current_fs = $(this).parent();
      next_fs = $(this).parent().next();
      next_fs.show(); 
      current_fs.hide();
      animating = false;
  }

  
  
  
  //activate next step on progressbar using the index of next_fs
  $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
  
  //show the next fieldset
  //next_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale current_fs down to 80%
      scale = 1 - (1 - now) * 0.2;
      //2. bring next_fs from the right(50%)
      left = (now * 50)+"%";
      //3. increase opacity of next_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'transform': 'scale('+scale+')'});
      next_fs.css({'left': left, 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
});

$(".previous").click(function(){
  if(animating) return false;
  animating = true;
  
  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev();
  
  //de-activate current step on progressbar
  $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
  
  //show the previous fieldset
  previous_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale previous_fs from 80% to 100%
      scale = 0.8 + (1 - now) * 0.2;
      //2. take current_fs to the right(50%) - from 0%
      left = ((1-now) * 50)+"%";
      //3. increase opacity of previous_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'left': left});
      previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
});

$(".submit").click(function(){
  return false;
})

});
</script>

</body>
</html> 