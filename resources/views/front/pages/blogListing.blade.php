@extends('front/layouts.default')
@section('content')
<div class="site-content">

<section class="blog-listing">
    <div class="container">
      <h3>Blog Listing</h3>
      <div class="bloglist">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 blogDiv">
            <div class="blogbox">
              <div class="blog-img">
                <img src="{{ URL::asset('public') }}/assets/front-design/images/loaderilk.gif" title="" alt="">
              </div>
              <div class="blog-content"></div>
            </div><!-- blogbox -->
          </div><!-- blogDiv -->
        </div>
      </div>
    </div>
</section>

</div>
@stop

