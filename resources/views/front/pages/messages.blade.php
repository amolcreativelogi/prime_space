@extends('front/layouts.default')
@section('content')
<div class="site-content">
<style>
.resp-container {
    position: relative;
    overflow: hidden;
    padding-top: 50.25%;
}
.resp-iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}
</style>
<section class="chatroom dl-content">
<div class="resp-container">
    <iframe class="resp-iframe" src="{{ URL::asset('public') }}/chat/" gesture="media"  allow="encrypted-media" allowfullscreen></iframe>
</div>
</section>

</div><!-- site-content -->
@stop
