@extends('front/layouts.default')
@section('content')
<div class="site-content">

<section class="chatroom dl-content">
	<div class="container">
		<h2 class="dash-title">messages</h2>
		<div class="msg-room">
			<div class="row">
				<div class="col-sm-4">
					<ul class="nav nav-pills">
					  <li class="nav-item">
					    <a class="nav-link active" data-toggle="pill" href="#chat01">
					    	<div class="chatuserimg">
					    	<img src="{{ URL::asset('public') }}/assets/front-design/images/test-author-01.jpg" alt="">
					    	</div>
					    	<div class="chatuserinfo">
					    		<h4>test author 01<span class="msg-date">19/04/19</span></h4>
					    		<p>Lorem Ipsum is simply dummy text</p>
					    		<span class="msg-count">05</span>
					    	</div>
					    </a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" data-toggle="pill" href="#chat02">
					    	<div class="chatuserimg">
					    	<img src="{{ URL::asset('public') }}/assets/front-design/images/test-author-02.jpg" alt="">
					    	</div>
					    	<div class="chatuserinfo">
					    		<h4>test author 02<span class="msg-date">19/04/19</span></h4>
					    		<p>Lorem Ipsum is simply dummy text</p>
					    		<span class="msg-count">05</span>
					    	</div>
					    </a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" data-toggle="pill" href="#chat03">
					    	<div class="chatuserimg">
					    	<img src="{{ URL::asset('public') }}/assets/front-design/images/test-author-03.jpg" alt="">
					    	</div>
					    	<div class="chatuserinfo">
					    		<h4>test author 03<span class="msg-date">19/04/19</span></h4>
					    		<p>Lorem Ipsum is simply dummy text</p>
					    		<span class="msg-count">05</span>
					    	</div>
					    </a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" data-toggle="pill" href="#chat04">
							<div class="chatuserimg">
					    	<img src="{{ URL::asset('public') }}/assets/front-design/images/test-author-01.jpg" alt="">
					    	</div>
					    	<div class="chatuserinfo">
					    		<h4>test author 04<span class="msg-date">19/04/19</span></h4>
					    		<p>Lorem Ipsum is simply dummy text</p>
					    		<span class="msg-count">05</span>
					    	</div>
					    </a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" data-toggle="pill" href="#chat05">
					    	<div class="chatuserimg">
					    	<img src="{{ URL::asset('public') }}/assets/front-design/images/test-author-02.jpg" alt="">
					    	</div>
					    	<div class="chatuserinfo">
					    		<h4>test author 05<span class="msg-date">19/04/19</span></h4>
					    		<p>Lorem Ipsum is simply dummy text</p>
					    		<span class="msg-count">05</span>
					    	</div>
					    </a>
					  </li>
					</ul>
				</div>
				<div class="col-sm-8">
					<div class="tab-content">
					  <div class="tab-pane active" id="chat01">
					  	<div class="msgtop-head">
					  		<div class="msgtopimg">
						    <img src="{{ URL::asset('public') }}/assets/front-design/images/test-author-01.jpg" alt="">
						    </div>
						    <h3>test author 01<span class="msg-date">19/04/19</span></h3>
					  	</div>
					  	<div class="msgmid-sect">
					  		<ul>
					  			<li class="user-msg">
					  				<div class="um-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
					  				<div class="um-img">
					  					<img src="{{ URL::asset('public') }}/assets/front-design/images/test-author-01.jpg" alt="">
					  					<span class="msg-time">11:30</span>
					  				</div>
					  			</li>
					  			<div class="clear"></div>
					  			<li class="messanger-msg">
					  				<div class="um-img">
					  					<img src="{{ URL::asset('public') }}/assets/front-design/images/test-author-03.jpg" alt="">
					  					<span class="msg-time">11:30</span>
					  				</div>
					  				<div class="um-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
					  			</li>
					  			<div class="clear"></div>
					  			<li class="user-msg">
					  				<div class="um-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
					  				<div class="um-img">
					  					<img src="{{ URL::asset('public') }}/assets/front-design/images/test-author-01.jpg" alt="">
					  					<span class="msg-time">11:30</span>
					  				</div>
					  			</li>
					  			<div class="clear"></div>
					  			<li class="messanger-msg">
					  				<div class="um-img">
					  					<img src="{{ URL::asset('public') }}/assets/front-design/images/test-author-03.jpg" alt="">
					  					<span class="msg-time">11:30</span>
					  				</div>
					  				<div class="um-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
					  			</li>
					  			<div class="clear"></div>
					  			<li class="user-msg">
					  				<div class="um-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
					  				<div class="um-img">
					  					<img src="{{ URL::asset('public') }}/assets/front-design/images/test-author-01.jpg" alt="">
					  					<span class="msg-time">11:30</span>
					  				</div>
					  			</li>
					  			<div class="clear"></div>
					  			<li class="messanger-msg">
					  				<div class="um-img">
					  					<img src="{{ URL::asset('public') }}/assets/front-design/images/test-author-03.jpg" alt="">
					  					<span class="msg-time">11:30</span>
					  				</div>
					  				<div class="um-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
					  			</li>
					  			<div class="clear"></div>
					  		</ul>
					  	</div>
					  </div><!-- tab-pane -->
					  <div class="tab-pane container fade" id="chat02">...</div>
					  <div class="tab-pane container fade" id="chat03">...</div>
					  <div class="tab-pane container fade" id="chat04">...</div>
					  <div class="tab-pane container fade" id="chat05">...</div>
					  <div class="msgbtm-sect">
					  		<div class="row">
					  			<div class="col-lg-10 col-md-9 col-sm-8">
					  				<div class="box custom-fileinput">
					  					<input type="file" name="file_attachment" id="file_attachment" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple  />
									    <label for="file_attachment"><span></span><strong>Attached File</strong></label>
									</div>
					  				<textarea cols="6"></textarea>
					  			</div>
					  			<div class="col-lg-2 col-md-3 col-sm-4">
					  				<input type="button" name="" value="send" class="msg-send">
					  			</div>
					  		</div>
					  	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

</div><!-- site-content -->
@stop

