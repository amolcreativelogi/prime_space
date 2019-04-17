@extends('front/layouts.default')
@section('content')

<div class="site-content">

<div class="site-request-password-reset  site-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-12"></div>
            <div class="col-lg-4 col-md-6 col-sm-12">
        <h1>Reset password request</h1>

        <p class="subtitle">Please enter your email. You will be sent a link to reset your password.</p>

        <div class="site-form-box">
          <form id="request-password-reset-form" action="/site/request-password-reset" method="post">
          <input type="hidden" name="_csrf-frontend">
          <div class="form-group field-passwordresetrequestform-email required has-error">
            <label class="control-label" for="passwordresetrequestform-email">Email</label>
            <input type="text" id="passwordresetrequestform-email" class="form-control" name="PasswordResetRequestForm[email]" autofocus="" aria-required="true" aria-invalid="true">
          </div>
          <div class="form-group">
            <button type="submit" class="bluebtn">Send</button>                            
          </div>

          </form>                
        </div>
        </div>
            <div class="col-lg-4 col-md-3 col-sm-12"></div>
        </div>
    </div>
</div>

</div><!-- site-content -->
@stop

