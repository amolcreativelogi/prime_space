@extends('front/layouts.default')
@section('content')
<div class="site-content">
<?php 
    $description="This page is not available";
	if(!empty($getCMSPageData) && (($getCMSPageData->status != 0) && ($getCMSPageData->is_deleted != 1))){

		$description=(isset($getCMSPageData->description) && !empty($getCMSPageData->description))?$getCMSPageData->description:"";
    }
?>
<section class="dl-content aboutpage">
@if(!empty($getCMSPageData))
  <div class="container">
    <h2 class="dash-title">  <?php echo empty($getCMSPageData->title)?"":$getCMSPageData->title; ?></h2>
    <div class="static-content">
      	<?php echo $description; ?>
    </div>
  </div>
 @endif
</section>

</div>
@stop
