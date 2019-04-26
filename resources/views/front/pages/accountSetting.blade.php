@extends('front/layouts.default')
@section('content')
<div class="site-content">

<section class="chatroom dl-content">
	<div class="container">
		<h2 class="dash-title">Account Settings</h2>
		<div class="acc-set-page">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-12"></div>
				<div class="col-lg-3 col-md-3 col-sm-12">
					<ul class="nav nav-pills">
					  <li class="nav-item">
					    <a class="nav-link <?php if($_SESSION['user']['is_payment_setup'] == 1) echo 'active' ?>" data-toggle="pill" href="#astab-01">change password</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" data-toggle="pill" href="#astab-02">switch user</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link <?php if($_SESSION['user']['is_payment_setup'] == 0) echo 'active' ?>" data-toggle="pill" href="#astab-03">payment setup</a>
					  </li>
					</ul>
				</div>
				<div class="col-lg-5 col-md-5 col-sm-12">
					<div class="tab-content">
					  <div class="tab-pane container <?php if($_SESSION['user']['is_payment_setup'] == 1) echo 'active' ?>" id="astab-01">

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
					  	<form action="{{URL::to('user/submitnewpassword')}}" method="post" class="site-form">
							{{csrf_field()}}
							<div class="form-group">
					  			<input type="password" name="current_pass" class="form-control" placeholder="Old Password">
					  		</div>
					  		<div class="form-group">
					  			<input type="password" name="password" class="form-control" placeholder="New Password">
					  		</div>
					  		<div class="form-group">
					  			<input type="password" name="password_confirmation" class="form-control" placeholder="Confirm New Password">
					  		</div>
					  		<div class="form-group">
					  		<button type="submit" class="bluebtn" name="login-button">submit</button>
					  		</div>
					  	</form>
					  </div>
					  <div class="tab-pane container fade" id="astab-02">
					  	<h3>switch user</h3>
					  	<a href="" class="switchuser">
					  	<img src="{{ URL::asset('public') }}/assets/front-design/images/user.svg" title="" alt="">
					  	<i class="fa fa-exchange" aria-hidden="true"></i>
					  	<img src="{{ URL::asset('public') }}/assets/front-design/images/user.svg" title="" alt="">
						</a>
					  </div>
					  <div class="tab-pane container fade <?php if($_SESSION['user']['is_payment_setup'] == 0) echo 'active' ?>" id="astab-03">
					  	<h3>payment setup</h3>
					  	<form class="site-form">
					  		<div class="row">
                            <!-- <div class="col-sm-12">
                                <div class="form-group">
                                    <label>PayPal Account <span>*</span></label>
                                    <input type="text" class="form-control" placeholder="Your Card Number">
                                </div>
                            </div> -->
                            <div class="col-sm-8">
                            	<div class="form-group">
                            		<!-- <button type="submit" class="bluebtn" name="login-button">submit</button> -->
                            		 <a class="bluebtn" target="_blank" href="https://connect.stripe.com/express/oauth/authorize?response_type=code&amp;client_id=ca_Es9WFPz9BU0y2g8KNZktUldht7TW6BRh" class="connect-button"><span>Connect with Stripe</span></a>
                            	</div>
                            </div>

                        </div>
					  	</form>
					  	<!-- <form class="site-form">
					  		<div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>YOUR CARD NUMBER <span>*</span></label>
                                    <input type="text" class="form-control" placeholder="Your Card Number">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group cardexp-group">
                                            <label>EXPIRATION DATE (MM/YYYY)</label>
                                            <input type="text" class="form-control" placeholder="Month"> <span>/</span>
                                            <input type="text" class="form-control" placeholder="Year">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>CVV</label>
                                            <input type="text" class="form-control" placeholder="CVV"> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                            	<div class="form-group">
                            		<button type="submit" class="bluebtn" name="login-button">submit</button>
                            	</div>
                            </div>
                        </div>
					  	</form> -->
					  </div>
					</div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-12"></div>
			</div>
		</div>

	</div>
</section>

</div><!-- site-content -->
@stop

