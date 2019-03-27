@extends('front/layouts.default')
@section('content')
<div class="site-content">
<div class="site-login site-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-2"></div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <h1>Login</h1>

                <!--<p class="subtitle">Please fill out the following fields to login:</p>-->

                <div class="site-form-box">
                        <form id="login-form" action="/site/login" method="post">
                            <input type="hidden" name="_csrf-frontend" value="">
                            <div class="form-group field-loginform-email required has-error">
                                <label class="control-label" for="loginform-email">Email</label>
                                <input type="text" id="loginform-email" class="form-control" name="LoginForm[email]" autofocus="" aria-required="true" aria-invalid="true">
                            </div>
                            <div class="form-group field-loginform-password required has-error">
                                <label class="control-label" for="loginform-password">Password</label>
                                <input type="password" id="loginform-password" class="form-control" name="LoginForm[password]" aria-required="true" aria-invalid="true">
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
                              </ul>
                            </div>

                            <div class="form-group password-reset text-center" style="color:#999;margin:1em 0">
                                If you do not have an account please register <a href="{{ URL::asset('sign_up') }}/">Here</a>.
                            </div>

                          <div class="form-group password-reset text-center" style="color:#999;margin:1em 0">
                              If you forgot your password please click <a href="{{ URL::asset('forgot_password') }}/">Here</a>.
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

