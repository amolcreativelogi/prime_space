 <!-- searchModal start -->
  <div class="modal fade formModal" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Find a space</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="site-signup site-form">
        <form> 
          <select id="select-property-type-top" required="required">
            <option value="">Choose a category</option>
            <!-- <option value="2">Parking</option>
            <option value="3">Land</option> -->
          </select>
          <div class="error from_parkingtype1"></div>
         
          <input type="text" name="location-top-search" placeholder="Location" id="location-top-search" autocomplete="off" runat="server">
          <div class="error from_location1"></div>
          <input type="hidden" id="city-top-search" name="city" />
          <input type="hidden" name="latitude" id="latitude-top-search">
          <input type="hidden" name="longitude" id="longitude-top-search">
        <!--   <input type="text" name="" placeholder="Dates" class="dates"> -->
          <div class="form-group date-group">
              <input type="text" name="search_dates1" placeholder="Dates" id="search_dates" class="dates">
              <div class="error from_search_dates1"></div>
              <!--<input type="text" name="search_dates" placeholder="Dates" id="land-search_dates" class="dates" style="display:none">-->
          <!--<div class="date"><input type="text" class="form-control" placeholder="Dates" id="from"></div>-->
          </div>

          <input type="button" name="" onclick="topPrpertySearch()"  value="Search">
        </form>              
      </div>  
        </div>
      </div>
    </div>
  </div>
  <!-- searchModal end -->


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
                        <div class="msg-gloabal"></div>
                      <input type="hidden" name="_csrf-frontend" value="">
                       {!! csrf_field() !!}
                      <div class="form-group field-signupform-email required">
                          <input type="text" id="email_id" autofocus class="form-control" name="email_id" aria-required="true" placeholder="Email Address">
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
                          <select class="month" name="dob_month" id="dob_month">
                            <option value="">Select Month</option>
                            <?php for ($m=1; $m<=12; $m++) {
                            $month = date('F', mktime(0,0,0,$m, 1, date('Y'))); ?>
                            <option value="<?php echo $m; ?>"><?php echo $month; ?></option>
                            <?php } ?>
                          </select>
                          <select class="day" name="dob_day"  id="dob_day">
                            x<option value="">Select Day</option>
                            <?php for ($d=1; $d<=31; $d++) { ?>
                            <option value="<?php echo $d; ?>"><?php echo $d; ?></option>
                            <?php } ?>
                          </select>
                          <select class="year" name="dob_year"  id="dob_year">
                            <option value="">Select year</option>
                           <?php 
                           $year = date('Y')-18;
                           $validyear = date('Y')-100;
                           for ($y=$year; $y>=$validyear; $y--) { ?>
                           <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                           <?php } ?>
                          </select>
                           <div id="dob_id-error" class="error" for="user_type"></div>
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
                          <div id="user_type_id-error" class="error" for="user_type"></div>
                      </div>

                    <div class="row">
                        <div class="col-sm-1">
                            <input type="checkbox" id="privacy_policy_check" name="privacy_policy_check"> <span class="checkmark"></span>
                        </div>
                        <div class="col-sm-11">
                            <label for="">
                                By continuing you are confirming that you have read and agree to the <a href="#">Terms of Service</a> &amp; <a href="#">Privacy Policy</a>.
                            </label>
                            <div id="terms-error" class="error" for="terms-error"></div>
                        </div>
                    </div>
                    
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
                            <div class="msg-gloabalsuccess"></div>
                            <div class="msg-gloabal"></div>
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
                             
                            <div class="form-group text-center">
                                <button type="submit" class="bluebtn" name="login-button">Login</button>
                            </div>

                            <div class="form-group text-center">
                              <ul class="social-login">
                                <li><a class="google auth-link" href="#" title="Google"><img src="{{ URL::asset('public') }}/assets/front-design/images/google-social.jpg" alt=""></a></li>
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
          <a href="<?php echo URL::to(''); ?>" class="foot-logo"><img src="{{ URL::asset('public') }}/assets/front-design/images/psw-logo.png" alt=""></a>
        </div> 
        <div class="col-lg-3 col-md-3 col-sm-6">
          <h4>Company</h4>
          <ul>
            <li><a href="<?php echo URL::to('aboutUs'); ?>">About Us</a></li>
            <li><a href="#">Mission</a></li>
            <li><a href="#">Vision</a></li>
            <li><a href="<?php echo URL::to('blogListing'); ?>">Blog</a></li>
            <li><a href="#">Press</a></li>
            <li><a href="<?php echo URL::to('faq'); ?>">FAQ's</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <h4>Hosts</h4>
          <ul>
            <li><a href="#">Benefits for Hosting with Us</a></li>
            <?php
            if(isset($_SESSION['user']['is_user_login'])) { ?>
               <!-- <a href="">Find a space</a> -->
            <?php } else { ?>
            <li><a href="#" data-toggle="modal" class="singupModal popuplink" data-target="#singupModal">Become a Host</a></li>
            <?php } ?>
            <li><a href="<?php echo URL::to('host-faq'); ?>">Host FAQ's </a></li>
            <li><a href="#">Community</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <h4>Renter</h4>
          <ul>
            <li><a href="#">Benefits for Renting with Us</a></li>
             <?php
            if(isset($_SESSION['user']['is_user_login'])) { ?>
               <!-- <a href="">Find a space</a> -->
            <?php } else { ?>
            <li><a href="#" data-toggle="modal" class="singupModal popuplink" data-target="#singupModal">Become a Renter</a></li>
            <?php } ?>
            <li><a href="<?php echo URL::to('renter-faq'); ?>">Renter FAQ's </a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="foot-btm">
      <ul>
        <li><a href="<?php echo URL::to('refundPolicy'); ?>">Cancellation and Refund Policy</a></li>
<<<<<<< HEAD
        <li><a href="javascript:void();">Terms</a></li>
||||||| merged common ancestors
        <li><a href="">Terms</a></li>
=======
        <li><a href="https://www.prymestory.com/public/assets/front-design/images/Terms-and-Conditions.pdf" target="_blank">Terms</a></li>
>>>>>>> 3db2cd8a51b65dfb4ca10b940bc428099ad82f44
        <li><a href="https://www.prymestory.com/public/assets/front-design/images/PrivacyPolicy.pdf" target="_blank">Privacy Statement</a></li>
      </ul>
      <div class="copyright">© 2019 Pryme Space, Inc.</div>
      <ul class="foot-social">
        <li><a href="javascript:void();"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <li><a href="javascript:void();"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a href="javascript:void();"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
        <li><a href="javascript:void();"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
        <li><a href="javascript:void();"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
</footer>

<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/jquery.easing.min.js"></script>

<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/custom-file-input.js"></script>
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/popper.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/common.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js"></script>

<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/my-script.js"></script>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public') }}/assets/front-design/css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public') }}/assets/front-design/css/owl.theme.default.min.css">

<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/property-details-page.js"></script>
</body>
</html> 