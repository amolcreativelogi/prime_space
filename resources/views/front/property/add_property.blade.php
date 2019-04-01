@extends('front/layouts.default')
@section('content')



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
        <select>
          <option>Choose a category</option>
          <option>Choose a category</option>
          <option>Choose a category</option>
        </select>
        <input type="text" name="" placeholder="Location" class="location">
        <input type="text" name="" placeholder="Dates" class="dates">
        <input type="button" name=""  value="Search">
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
                    <form id="form-signup" action="/site/signup" method="post">
                      <input type="hidden" name="_csrf-frontend" value="">
                      <div class="form-group field-signupform-email required">
                          <input type="text" id="signupform-email" class="form-control" name="SignupForm[email]" aria-required="true" placeholder="Email Address">
                      </div>
                      <div class="form-group field-signupform-first_name required has-error">
                          <input type="text" id="signupform-first_name" class="form-control" name="SignupForm[first_name]" autofocus="" aria-required="true" aria-invalid="true" placeholder="First Name">
                      </div>
                      <div class="form-group field-signupform-last_name required">
                          <input type="text" id="signupform-last_name" class="form-control" name="SignupForm[last_name]" autofocus="" aria-required="true" placeholder="Last Name">
                      </div>
                      <div class="form-group field-signupform-password required">
                          <input type="password" id="signupform-password" class="form-control" name="SignupForm[password]" aria-required="true" placeholder="Create a password">
                      </div>
                      <div class="form-group birthdategroup">
                         <label>Birthday</label>
                         <p>To sign up, you must be 18 or older. People won’t see your birthday</p>
                         <div class="birthdaygroup">
                          <select class="month">
                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                          </select>
                          <select class="day">
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                          </select>
                          <select class="year">
                            <option>1980</option>
                            <option>1981</option>
                            <option>1982</option>
                          </select>
                         </div>
                      </div>
                      <div class="form-group acctype-group">
                          <label class="control-label" for="signupform-confirm_password">account type</label>
                          <ul>
                            <li>
                              <input type="radio" name="acctype" id="host">
                              <label for="host">Host</label>
                            </li>
                            <li>
                              <input type="radio" name="acctype" id="user">
                              <label for="user">User</label>
                            </li>
                          </ul>
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
                   <form id="login-form" action="/site/login" method="post">
                            <input type="hidden" name="_csrf-frontend" value="">
                            <div class="form-group field-loginform-email required has-error">
                                <input type="text" id="loginform-email" class="form-control" name="LoginForm[email]" autofocus="" aria-required="true" aria-invalid="true" placeholder="Email Address">
                            </div>
                            <div class="form-group field-loginform-password required has-error">
                                <input type="password" id="loginform-password" class="form-control" name="LoginForm[password]" aria-required="true" aria-invalid="true" placeholder="Password">
                            </div>
                            <div class="form-group field-loginform-rememberme">
                              <div class="checkbox">
                                  <label for="loginform-rememberme">
                                  <input type="hidden" name="LoginForm[rememberMe]" value="0"><input type="checkbox" id="loginform-rememberme" name="LoginForm[rememberMe]" value="1" checked="">
                                  Remember Me
                                  </label>
                              </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="bluebtn" name="login-button">Login</button>
                            </div>

                            <div class="form-group text-center">
                              <ul class="social-login">
                                <li><a class="google auth-link" href="#" title="Google"><i class="fa fa-google-plus" aria-hidden="true"></i>Google+</a></li>
                                <li><a class="facebook auth-link" href="#" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i>Facebook</a></li>
                                <li><a class="linkedin auth-link" href="#" title="Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i>Linkedin</a></li>
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
      <form id="request-password-reset-form" action="/site/request-password-reset" method="post">
        <input type="hidden" name="_csrf-frontend">
        <div class="form-group field-passwordresetrequestform-email">
          <input type="text" id="passwordresetrequestform-email" class="form-control" name="PasswordResetRequestForm[email]" autofocus="" aria-required="true" aria-invalid="true" placeholder="Email Address">
        </div>
        <div class="form-group">
          <button type="submit" class="bluebtn">Send</button>                            
        </div>
      </form>             
    </div>  
      </div>
    </div>
  </div>
</div>
<!-- loginModal end -->

<div class="site-content">

<section class="add-property">
    <div class="container">
          <h2>add property</h2>
<!-- multistep form -->
<form id="msform">
<!-- progressbar -->
<ul id="progressbar">
<li class="active"></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
</ul>

<!-- fieldsets -->
<fieldset>
<h2 class="fs-title">Prpoerty Information</h2>
<input type="text" name="" placeholder="Property Name " />
<select id="select-property-type"  class="type">
  <option value="property-type">Property Type</option>
  <option value="parking-spaces">Parking Spaces</option>
  <option value="property-land">Land</option>
</select>
<input type="text" name="" placeholder="Location" />
<input type="text" name="" placeholder="Enter Property Zip Code" />
<textarea placeholder="Property description" cols="6"></textarea>
<!-- <input type="file" name="" placeholder="Property Images " /> -->
<div class="box">
  <input type="file" name="property-images" id="property-images" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple style="display: none;" />
  <label for="property-images"><span></span> <strong>Choose Property Images</strong></label>
</div>
<input type="button" name="next" class="next action-button" value="Next" />
</fieldset>

<fieldset>
<h2 class="fs-title">Property Floor Map</h2>
<div class="box">
  <input type="file" name="property-map" id="property-map" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple style="display: none;" />
  <label for="property-map"><span></span> <strong>Choose Property Floor Map</strong></label>
</div>
<input type="button" name="previous" class="previous action-button" value="Previous" />
<input type="button" name="next" class="next action-button" value="Next" />
</fieldset>

<fieldset>
<div class="form-field step-show" id="parking-spaces"  style="display:none;">
  <h2 class="fs-title">Cars and Pricing</h2>
  <label>Enter Property Floors Parking spots</label>
  <table id="myTable" class=" table order-list1">
    <tbody>
        <tr>
            <td class="col-sm-4">
                <input type="text" name="" placeholder="Enter floor name">
            </td>
            <td class="col-sm-4">
                <select>
                  <option>Parking Type </option>
                  <option>Self </option>
                  <option>Valet </option>
                  <option>Reserved </option>
                  <option>Handicap </option>
                </select>
            </td>
            <td class="col-sm-3">
                <input type="text" name="" placeholder="Total Parking spots ">
            </td>
            <td class="col-sm-2"><a class="deleteRow"></a>

            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: left;">
                <input type="button" class="btn btn-lg btn-block " id="addrow" value="Add Row" />
            </td>
        </tr>
        <tr>
        </tr>
    </tfoot>
</table>

  <label>Select Booking Duration Type and Enter Property Rent</label>
  <table id="myTable" class=" table order-list">
    <tbody>
        <tr>
            <td class="col-sm-3">
              <select>
                  <option>Car Type</option>
                  <option>Hatchback  </option>
                  <option>Sedan  </option>
                  <option>MPV  </option>
                  <option>SUV </option>
                  <option>Crossover </option>
                  <option>Coupe  </option>
                  <option>Convertibl </option>
                </select>
            </td>
            <td class="col-sm-3">
                <input type="text" name="" placeholder="Hourly Price">
            </td>
            <td class="col-sm-3">
                <input type="text" name="" placeholder="Daily Price">
            </td>
            <td class="col-sm-3">
                <input type="text" name="" placeholder="Monthly Price">
            </td>
            <td class="col-sm-2"><a class="deleteRow"></a>

            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: left;">
                <input type="button" class="btn btn-lg btn-block " id="second-addrow" value="Add Row" />
            </td>
        </tr>
        <tr>
        </tr>
    </tfoot>
</table>
</div>
<div class="form-field step-show" id="property-land"  style="display:none;">
  <h2 class="fs-title">Property size </h2>
  <label style="float: none;width: 100%;text-align: left;font-weight: 600;">Units</label>
  <ul class="custom-radio">
  <li>
    <input type="radio" name="units" id="sqft">
    <label for="sqft">Sqft  </label>
  </li>
  <li>
    <input type="radio" name="units" id="sq-Meter">
    <label for="sq-Meter">Sq Meter </label>
  </li>
  <li>
    <input type="radio" name="units" id="acres">
    <label for="acres">Acres </label>
  </li>
</ul>

<input type="text" name="" placeholder="Sqft / Sq Meter / Acres">
<hr>

<h2 class="fs-title">Tour Availability </h2>
  <ul class="custom-radio" style="text-align: left;">
  <li>
    <input type="radio" name="tour_availability_yes" id="tour_availability_no">
    <label for="sqft">Yes  </label>
  </li>
  <li>
    <input type="radio" name="tour_availability_no" id="tour_availability_yes">
    <label for="sq-Meter">No </label>
  </li>
</ul>


<h2 class="fs-title">Land Use for</h2>
  <ul class="custom-checkbox">
    <li>
      <input type="checkbox" name="landuse" id="industrial">
      <label for="industrial">Industrial </label>
    </li>
    <li>
      <input type="checkbox" name="landuse" id="agriculture">
      <label for="agriculture">Agriculture </label>
    </li>
    <li>
      <input type="checkbox" name="landuse" id="residential">
      <label for="residential">Residential </label>
    </li>
    <li>
      <input type="checkbox" name="aminities" id="commercial">
      <label for="commercial">Commercial (Retail, Restaurant) </label>
    </li>
    <li>
      <input type="checkbox" name="aminities" id="all-type">
      <label for="all-type">For All Type</label>
    </li>
  </ul>



</div>

<input type="button" name="previous" class="previous action-button" value="Previous" />
<input type="button" name="next" class="next action-button type" value="Next" />
</fieldset>

<fieldset>
<h2 class="fs-title">Amenities and Other</h2>
<ul class="aminities-list custom-checkbox">
  <li>
    <input type="checkbox" name="aminities" id="Security">
    <label for="Security">Security</label>
  </li>
  <li>
    <input type="checkbox" name="aminities" id="EV-Charging">
    <label for="EV-Charging">EV Charging </label>
  </li>
  <li>
    <input type="checkbox" name="aminities" id="wheelchair">
    <label for="wheelchair">Wheelchair Accessible </label>
  </li>
  <li>
    <input type="checkbox" name="aminities" id="Security1">
    <label for="Security1">Security</label>
  </li>
  <li>
    <input type="checkbox" name="aminities" id="washing">
    <label for="washing">Washing center</label>
  </li>
  <li>
    <input type="checkbox" name="aminities" id="loundge">
    <label for="loundge">loundge</label>
  </li>
  <li>
    <input type="checkbox" name="aminities" id="fire-services">
    <label for="fire-services">Fire Services</label>
  </li>
  <li>
    <input type="checkbox" name="aminities" id="wheelchair1">
    <label for="wheelchair1">Wheelchair Accessible</label>
  </li>
  <li>
    <input type="checkbox" name="aminities" id="washing1">
    <label for="washing1">Washing Center</label>
  </li>
</ul>
<hr>
<div id="locationtype">
<h2 class="fs-title">Location Type</h2>
<ul class="custom-radio">
  <li>
    <input type="radio" name="location" id="covered">
    <label for="covered">Covered </label>
  </li>
  <li>
    <input type="radio" name="location" id="uncovered">
    <label for="uncovered">Uncovered</label>
  </li>
  <li>
    <input type="radio" name="location" id="both">
    <label for="both">Both</label>
  </li>
</ul>
</div>
<input type="button" name="previous" class="previous action-button" value="Previous" />
<input type="button" name="next" class="next action-button" value="Next" />
</fieldset>

<fieldset>
<h2 class="fs-title">Documents</h2>
<div class="box">
  <input type="file" name="property-documents" id="property-documents" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple style="display: none;" />
  <label for="property-documents"><span></span> <strong>Choose Property Documents</strong></label>
</div>
<input type="button" name="previous" class="previous action-button" value="Previous" />
<input type="button" name="next" class="next action-button" value="Next" />
</fieldset>

<fieldset>
<h2 class="fs-title">Thank you</h2>
<h3 class="fs-subtitle">Thank you for adding Parking. Please wait for Admin approval.</h3>

<input type="button" name="previous" class="previous action-button" value="Previous" />
<input type="submit" name="submit" class="submit action-button" value="Submit" />
</fieldset>

</form>
    </div>
</section>

</div><!-- site-content -->


<link href="{{ URL::asset('public') }}/assets/front-design/css/component.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
@stop






