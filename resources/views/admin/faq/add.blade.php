@extends('admin/layouts.default')
@section('content')
<?php //echo '<pre>'; print_r($editAmenity); echo '</pre>';die;?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <a href="<?php echo url('admin/faqs/categories'); ?>" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Back"><i class="fa fa-reply"></i></a></div>
      <h1> FAQ Categories</h Categories1>
    </div>
  </div>
  <div class="container-fluid">
        <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Category</h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo url('admin/faqs/saveFaqsCategory'); ?>" method="post" enctype="multipart/form-data" id="form-user" class="form-horizontal">
          @if(session('success') || session('warning'))
            <div class="form-group">
            <div class="col-sm-offset-0 col-sm-12">
            <div class="alert alert-<?php echo (session('success')) ? 'success': 'danger'; ?>" style="display: block;"><?php echo (session('success')) ? session('success') : session('warning'); ?><button type="button" class="close" data-dismiss="alert">×</button>
            </div>
            </div>
            </div>
          @endif
        
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-username"> Category Name</label>
            <div class="col-sm-10">
              <input type="text" name="category_name" value="<?php echo ($editFaqs && $editFaqs->category_name) ? $editFaqs->category_name : ''; ?>" placeholder="Category Name" id="category_id" class="form-control">

              <input type="hidden" name="category_id" value="<?php echo  ($editFaqs && $editFaqs->category_id) ? $editFaqs->category_id : ''; ?>" id="category_id" class="form-control">

                 <?php if($errors->first('category_name')) { ?>
                 <div class="text-danger"><?php echo $errors->first('category_name'); ?></div>
                <?php } ?>
             </div>
             {!! csrf_field() !!}
          </div>
         

           <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-username"> Status</label>
            <div class="col-sm-10">
               <select name="status" id="status" class="form-control">
                <option value="1" <?php echo  ($editFaqs && $editFaqs->status == 1) ? 'selected' : ''; ?>>Active</option>
                <option value="0" <?php echo  ($editFaqs && $editFaqs->status == 0) ? 'selected' : ''; ?>>Inactive</option>
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
@stop