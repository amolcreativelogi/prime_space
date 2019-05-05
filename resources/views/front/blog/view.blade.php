@extends('front/layouts.default')
@section('content')
<div class="site-content">

@if(!empty($getBlogPageData))

<section class="single-blog">
    <div class="container">
      <h2><?php echo empty($getBlogPageData->title)?'':$getBlogPageData->title; ?></h2>
      <div class="blogdate"><?php echo empty($getBlogPageData->created)?'':date('d, M, Y',strtotime($getBlogPageData->created)) ?> </div>

      <?php  $image = '<a target="_blank" href="'.url('public/assets/front-design/images/homebanner1.jpg').'"><img src="'.url('public/assets/front-design/images/homebanner1.jpg').'" width="50"></a>';
      
           if (isset($getBlogPageData->image) && file_exists(public_path() . '/images/blogs/'.$getBlogPageData->image. '')) {
               $image = '<a target="_blank" href="'.url('/public/images/blogs/'.$getBlogPageData->image.'').'"><img src="'.url('/public/images/blogs/'.$getBlogPageData->image.'').'" ></a>';
            } ?>

      <div class="singleblog-img">
        <?=  $image;?>
       <!--  <img src="{{ URL::asset('public') }}/assets/front-design/images/homebanner1.jpg" title="" alt=""> -->
      </div>

      <div class="singleblog-content">
        <p>
        <?php echo empty($getBlogPageData->description)?'':$getBlogPageData->description; ?>
        </p>
      </div>
    </div>
</section>

@endIf

</div>
@stop