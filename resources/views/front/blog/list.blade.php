@extends('front/layouts.default')
@section('content')
<div class="site-content">
 
<section class="blog-listing">
    <div class="container">
      <h2>Blog Listing</h2>
      <div class="bloglist">
        <div class="row">
          @if(!empty($getBlogs))
            @foreach($getBlogs as $blogs)
            
           <?php 
           // $image = '<a target="_blank" href="'.url('public/assets/front-design/images/homebanner1.jpg').'"><img src="'.url('public/assets/front-design/images/homebanner1.jpg').'" width="50"></a>';

           $image = '<a target="_blank" href="'.url('blogs/'.$blogs->id.'').'"><img src="'.url('public/assets/front-design/images/homebanner1.jpg').'" width="50"></a>';
           if (isset($blogs->image) && file_exists(public_path() . '/images/blogs/'.$blogs->image. '')) {
               $image = '<a target="_blank" href="'.url('blogs/'.$blogs->id.'').'"><img src="'.url('/public/images/blogs/'.$blogs->image.'').'" width="50"></a>';
            } ?>
          <div class="col-lg-6 col-md-6 col-sm-12 blogDiv">
            <div class="blogbox">
              <div class="blog-img">
                <?=$image?>
                <div class="blogdate"><?= date('d',strtotime($blogs->created))?><span><?= date('M',strtotime($blogs->created))?></span></div>
              </div>
              <div class="blog-content">
                <h3><a href="<?php echo url('blogs/'.$blogs->id)?>"><?php echo empty($blogs->title)?'':$blogs->title; ?></a></h3>
                <p><?php echo empty($blogs->short_description)?'':$blogs->short_description; ?></p>
              </div>
            </div><!-- blogbox -->
          </div><!-- blogDiv -->
          
            @endforeach
          @endif
          <div class="col-sm-12 custom-pagination">
             <ul class="pagination">
              <li class="page-item disabled prev"><a class="page-link" href="#">&laquo;</a></li>
              <li class="page-item"><a class="page-link active" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item next"><a class="page-link " href="#">&raquo;</a></li>
            </ul> 
          </div>
        </div>
      </div>
    </div>
</section>

</div>
@stop
