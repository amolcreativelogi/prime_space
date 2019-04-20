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
					    <a class="nav-link active" data-toggle="pill" href="#astab-01">change password</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" data-toggle="pill" href="#astab-02">switch user</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" data-toggle="pill" href="#astab-03">payment setup</a>
					  </li>
					</ul>
				</div>
				<div class="col-lg-5 col-md-5 col-sm-12">
					<div class="tab-content">
					  <div class="tab-pane container active" id="astab-01">
					  	<h3>change password</h3>
					  	<form class="site-form">
					  		<div class="form-group">
					  			<input type="password" name="" class="form-control" placeholder="New Password">
					  		</div>
					  		<div class="form-group">
					  			<input type="password" name="" class="form-control" placeholder="Confirm Password">
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
					  <div class="tab-pane container fade" id="astab-03">
					  	<h3>payment setup</h3>
					  	<form class="site-form">
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
					  	</form>
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

