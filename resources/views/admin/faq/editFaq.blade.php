@extends('admin/layouts.default')
@section('content')

<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <a href="<?php echo url('admin/faq/list/'.$editFaqs->category_id); ?>" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Back"><i class="fa fa-reply"></i></a></div>
      <h1> FAQ </h Categories1>
    </div>
  </div>
  <div class="container-fluid">
        <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> Add FAQ</h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo url('admin/faq/editFaq'); ?>" id="formSaveFaq" method="post" enctype="multipart/form-data" id="form-user" class="form-horizontal">
          @if(session('success') || session('warning'))
            <div class="form-group">
            <div class="col-sm-offset-0 col-sm-12">
            <div class="alert alert-<?php echo (session('success')) ? 'success': 'danger'; ?>" style="display: block;"><?php echo (session('success')) ? session('success') : session('warning'); ?><button type="button" class="close" data-dismiss="alert">×</button>
            </div>
            </div>
            </div>
          @endif

          <div class="form-group required">
              <label class="col-sm-2 control-label" for="input-username">Categories</label>
              <div class="col-sm-10">

               <select name="category_id" id="category_id" class="form-control">
                <option value="">Select category</option>
                <?php foreach($getCategories as $category){  ?>
                  <option 
                  value="<?php echo $category->category_id ?>" 
                  <?php echo  ($category->category_id==$editFaqs->category_id) ? 'selected' : ''; ?> 
                  class=""><?php echo $category->category_name ?></option>
                <?php } ?>
                </select>
                  <?php if($errors->first('category_id')) { ?>
                  <div class="text-danger"><?php echo $errors->first('category_id'); ?></div>
                  <?php } ?>
             </div>
          </div>
        
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-username">Question</label>
            <div class="col-sm-10">
               <textarea name="question" value="" placeholder="Question" id="question" class="form-control"><?php echo ($editFaqs && $editFaqs->question) ? $editFaqs->question : ''; ?></textarea>
              <input type="hidden" name="faq_id" value="<?php echo  ($editFaqs && $editFaqs->faq_id) ? $editFaqs->faq_id : ''; ?>" id="faq_id" class="form-control">

                 <?php if($errors->first('question')) { ?>
                 <div class="text-danger"><?php echo $errors->first('question'); ?></div>
                <?php } ?>
             </div>
             {!! csrf_field() !!}
          </div>
           <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-username">Answer</label>
            <div class="col-sm-10">
              <textarea name="answer" value="" placeholder="Answer" id="answer" class="form-control"><?php echo ($editFaqs && $editFaqs->answer) ? $editFaqs->answer : ''; ?></textarea>
                 <?php if($errors->first('answer')) { ?>
                 <div class="text-danger"><?php echo $errors->first('answer'); ?></div>
                <?php } ?>
             </div>
            
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
          
            <button type="submit" id="faqSave"style="margin-left: 10px;" class="btn btn-success pull-right"> Save</button>
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
    CKEDITOR.replace( 'answer', {
      filebrowserUploadUrl: '{{ route('upload',['_token' => csrf_token() ]) }}'
    });
  };

 
</script>
@stop