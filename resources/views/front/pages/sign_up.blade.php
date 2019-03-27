@extends('front/layouts.default')
@section('content')
<div class="site-content">

 <div class="site-signup site-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-2"></div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <h1>Sign up</h1>
                <p class="subtitle">Please fill out the following fields to signup:</p>

                <div class="site-form-box">
                    <form id="form-signup" action="/site/signup" method="post">
                      <input type="hidden" name="_csrf-frontend" value="">
                      <div class="form-group field-signupform-first_name required has-error">
                          <label class="control-label" for="signupform-first_name">First Name</label>
                          <input type="text" id="signupform-first_name" class="form-control" name="SignupForm[first_name]" autofocus="" aria-required="true" aria-invalid="true">
                      </div>
                      <div class="form-group field-signupform-last_name required">
                          <label class="control-label" for="signupform-last_name">Last Name</label>
                          <input type="text" id="signupform-last_name" class="form-control" name="SignupForm[last_name]" autofocus="" aria-required="true">
                      </div>
                      <div class="form-group field-signupform-email required">
                          <label class="control-label" for="signupform-email">Email Address</label>
                          <input type="text" id="signupform-email" class="form-control" name="SignupForm[email]" aria-required="true">
                      </div>
                      <div class="form-group field-signupform-password required">
                          <label class="control-label" for="signupform-password">Password</label>
                          <input type="password" id="signupform-password" class="form-control" name="SignupForm[password]" aria-required="true">
                      </div>
                      <div class="form-group field-signupform-confirm_password">
                          <label class="control-label" for="signupform-confirm_password">Confirm Password</label>
                          <input type="password" id="signupform-confirm_password" class="form-control" name="SignupForm[confirm_password]">
                      </div>
                      <div class="form-group acctype-group">
                          <label class="control-label" for="signupform-confirm_password">account type</label>
                          <ul>
                            <li>
                              <input type="radio" name="acctype" id="owner">
                              <label for="owner">As a Owner</label>
                            </li>
                            <li>
                              <input type="radio" name="acctype" id="customer">
                              <label for="customer">As a Customer</label>
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
                        <button type="submit" class="bluebtn" name="signup-button">Signup</button>                    
                    </div>

                    <div class="form-group password-reset text-center" style="color:#999;margin:1em 0">
                        Already have an account? Please log in <a href="{{ URL::asset('login') }}/">Here</a>.
                    </div>

                    </form>                
                  </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-2"></div>
        </div>
    </div>
</div>  

</div><!-- site-content --> 
@stop

