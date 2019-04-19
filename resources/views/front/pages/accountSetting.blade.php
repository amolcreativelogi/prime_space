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
					    <a class="nav-link active" data-toggle="pill" href="#home">change password</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" data-toggle="pill" href="#menu1">Menu 1</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" data-toggle="pill" href="#menu2">Menu 2</a>
					  </li>
					</ul>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8">
					<div class="tab-content">
					  <div class="tab-pane container active" id="home">...</div>
					  <div class="tab-pane container fade" id="menu1">...</div>
					  <div class="tab-pane container fade" id="menu2">...</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>

</div><!-- site-content -->
@stop

