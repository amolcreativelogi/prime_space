@extends('admin/layouts.default')
@section('content')
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <a href="{{Request::root()}}/admin/cmspages" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Back"><i class="fa fa-reply"></i></a></div>
      <h1> CMS Page </h1>
    </div>
  </div>
  <div class="container-fluid">
        <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> Add CMS Page</h3>
      </div>
      <div class="panel-body">
        <form action="{{Request::root()}}/admin/cmspages/saveCmsPage" method="post" enctype="multipart/form-data" id="form-user" class="form-horizontal">

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
              <input type="text" name="title" value="<?php echo ($editCMSPage && $editCMSPage->title) ? $editCMSPage->title : ''; ?>" placeholder="CMS Page Title" id="title" class="form-control">

              <input type="hidden" name="cms_page_id" value="<?php echo  ($editCMSPage && $editCMSPage->id) ? $editCMSPage->id : ''; ?>" id="cms_page_id" class="form-control">

                 <?php if($errors->first('title')) { ?>
                 <div class="text-danger"><?php echo $errors->first('title'); ?></div>
                <?php } ?>
             </div>
             {!! csrf_field() !!}
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-username"> Description </label>
            <div class="col-sm-10">
             
              <textarea name="description" class="form-control" id="description" name="description">
                <?php echo ($editCMSPage && $editCMSPage->description) ? $editCMSPage->description : ''; ?>
                
              </textarea>

                 <?php if($errors->first('description')) { ?>
                 <div class="text-danger"><?php echo $errors->first('description'); ?></div>
                <?php } ?>
             </div>
           
          </div>

           <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-username"> Status</label>
            <div class="col-sm-10">
               <select name="status" id="status" class="form-control">
                <option value="1" <?php echo  ($editCMSPage && $editCMSPage->status == 1) ? 'selected' : ''; ?>>Active</option>
                <option value="0" <?php echo  ($editCMSPage && $editCMSPage->status == 0) ? 'selected' : ''; ?>>Inactive</option>
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