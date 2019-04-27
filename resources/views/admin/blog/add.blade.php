@extends('admin/layouts.default')
@section('content')
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <a href="{{Request::root()}}/admin/blogs" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Back"><i class="fa fa-reply"></i></a></div>
      <h1> Blogs </h1>
    </div>
  </div>
  <div class="container-fluid">
        <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Blog</h3>
      </div>
      <div class="panel-body">
        <form action="{{Request::root()}}/admin/blogs/saveBlog" method="post" enctype="multipart/form-data" id="form-user" class="form-horizontal">

           @if(session('success') || session('warning'))
            <div class="form-group">
            <div class="col-sm-offset-0 col-sm-12">
            <div class="alert alert-<?php echo (session('success')) ? 'success': 'danger'; ?>" style="display: block;"><?php echo (session('success')) ? session('success') : session('warning'); ?><button type="button" class="close" data-dismiss="alert">×</button>
            </div>
            </div>
            </div>
          @endif

          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-username"> Title </label>
            <div class="col-sm-10">
              <input type="text" name="title" value="<?php echo ($editBlogs && $editBlogs->title) ? $editBlogs->title : ''; ?>" placeholder="Blog Title" id="title" class="form-control">

              <input type="hidden" name="blog_id" value="<?php echo  ($editBlogs && $editBlogs->id) ? $editBlogs->id : ''; ?>" id="blog_id" class="form-control">

                 <?php if($errors->first('title')) { ?>
                 <div class="text-danger"><?php echo $errors->first('title'); ?></div>
                <?php } ?>
             </div>
             {!! csrf_field() !!}
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-username">Blog Image</label>
            <div class="col-sm-10">
               <input type="file" name="image" id="image">
               <input type="hidden" name="edit_blog_image" id="id_edit_blog_image" value="<?php echo  ($editBlogs && $editBlogs->image) ? $editBlogs->image : ''; ?>">

               <?php if($errors->first('image')) { ?>
                 <div class="text-danger"><?php echo $errors->first('image'); ?></div>
                <?php } ?>
             </div>
              
           </div>
           <?php if(isset($editBlogs->image) && !empty($editBlogs->image)){ ?>
           <div class="form-group">
            <label class="col-sm-2 control-label" for="input-username">Blog  Image</label>
              <div class="col-sm-10">
              <?php echo '<a target="_blank" href="'.url('/public/images/blogs/'.$editBlogs->image.'').'"><img src="'.url('/public/images/blogs/'.$editBlogs->image.'').'" width="50"></a>'; ?>
             </div>
           </div>
         <?php }?>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-username"> Short Description </label>
            <div class="col-sm-10">
             
              <textarea name="short_description" maxlength='125' class="form-control" id="short_description" name="description" placeholder="Short Description"><?php echo ($editBlogs && $editBlogs->short_description) ? $editBlogs->short_description : ''; ?></textarea>
                <p>Maximum 125 character</p>

                 <?php if($errors->first('short_description')) { ?>
                 <div class="text-danger"><?php echo $errors->first('short_description'); ?></div>
                <?php } ?>
             </div>
           
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-username"> Description </label>
            <div class="col-sm-10">
             
              <textarea name="description" placeholder=""class="form-control" id="description" name="description"><?php echo ($editBlogs && $editBlogs->description) ? $editBlogs->description : ''; ?></textarea>

                 <?php if($errors->first('description')) { ?>
                 <div class="text-danger"><?php echo $errors->first('description'); ?></div>
                <?php } ?>
             </div>
           
          </div>

           <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-username"> Status</label>
            <div class="col-sm-10">
               <select name="status" id="status" class="form-control">
                <option value="1" <?php echo  ($editBlogs && $editBlogs->status == 1) ? 'selected' : ''; ?>>Active</option>
                <option value="0" <?php echo  ($editBlogs && $editBlogs->status == 0) ? 'selected' : ''; ?>>Inactive</option>
               </select>
             </div>
           </div>

            <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <div class="pull-left">
            <!-- <button type="button" style="margin-right: 10px;" class="btn btn-primary pull-right"> Save & Continue</button> -->
            <button type="submit" style="margin-right: 10px;" class="btn btn-success pull-right"> Save</button>
          </div>
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    //CKEDITOR.replace( 'description' );
    window.onload = function() {
    CKEDITOR.replace( 'description', {
      filebrowserUploadUrl: '{{ route('upload',['_token' => csrf_token() ]) }}'
    });
  };
</script>
@stop