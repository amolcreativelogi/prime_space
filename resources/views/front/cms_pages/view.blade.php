@extends('front/layouts.default')
@section('content')
<div class="site-content">
@if(!empty($getCMSPageData))
<section class="dl-content aboutpage">
  <div class="container">
    <h2 class="dash-title">  <?php echo $getCMSPageData->title ?></h2>
    <div class="static-content">
      	<?php echo $getCMSPageData->description ?>
    </div>
  </div>
</section>
@endif
</div>
@stop
