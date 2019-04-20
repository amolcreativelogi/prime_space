@extends('front/layouts.default')
@section('content')
<div class="site-content">

<section class="chatroom dl-content">
	<div class="container">
		<h2 class="dash-title">Account Settings</h2>
		<div class="acc-set-page">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4">
					<ul class="nav nav-pills">
					  <li class="nav-item">
					    <a class="nav-link active" data-toggle="pill" href="#astab-01">change password</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" data-toggle="pill" href="#astab-02">change user</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" data-toggle="pill" href="#astab-03">payment setup</a>
					  </li>
					</ul>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8">
					<div class="tab-content">
					  <div class="tab-pane container active" id="astab-01">
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
					  <div class="tab-pane container fade" id="astab-02">...</div>
					  <div class="tab-pane container fade" id="astab-03">
					  	<form class="site-form">
					  		<div class="form-group">
					  			<input type="text" name="" class="form-control" placeholder="New Password">
					  		</div>
					  		<div class="form-group">
					  			<input type="password" name="" class="form-control" placeholder="Confirm Password">
					  		</div>
					  		<div class="form-group">
					  		<button type="submit" class="bluebtn " name="login-button">submit</button>
					  		</div>
					  	</form>
					  </div>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>

</div><!-- site-content -->
@stop

