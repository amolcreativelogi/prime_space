@extends('front/layouts.default')
@section('content')


<div class="site-content">



 <section class="faq-sect">
   <div class="container">

      <h3>Reset Your Password</h3>
      @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {!! \Session::get('success') !!}
        </div>
      @endif
      @if (\Session::has('error'))
        <div class="alert alert-danger">
            <ul>
                <li>{!! \Session::get('error') !!}</li>
            </ul>
        </div>
      @endif
      @if ($errors->has('password'))
      
                                    <div class="alert alert-danger">
                                    <ul>
                                      <li>{{ $errors->first('password') }}</li>
                                             </ul>
                                        </div>
                                @endif
      <div class="col-md-5">
      <div class="site-signup site-form">
                   <form  action="{{URL::to('submitForgotpass')}}" method="post">
                   {!! csrf_field() !!}
                            <div class="msg-gloabalsuccess"></div>
                            <div class="msg-gloabal"></div>
                             <input type="hidden" name="access_token" value="<?php echo $_GET['passwordtoken']?>">

                            <div class="form-group field-loginform-password required has-error">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group field-loginform-password required has-error">
                                <input type="password"  class="form-control" name="password_confirmation" placeholder="Confirm Password">
                            </div>

                             
                            <div class="form-group text-center">
                                <button type="submit" class="bluebtn" name="reset-password">Reset</button>
                            </div>

                        </form>              
      </div>
      </div>

  </div>
 </section>



</div><!-- site-content -->

@stop

