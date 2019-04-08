@extends('admin/layouts.default')
@section('content')
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <a href="<?php echo url('admin/landTypeExecute'); ?>" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Back"><i class="fa fa-reply"></i></a></div>
      <h1> Land Types</h1>
    </div>
  </div>
  <div class="container-fluid">
        <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Land Type</h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo url('admin/saveLandType'); ?>" method="post" enctype="multipart/form-data" id="form-user" class="form-horizontal">

           @if(session('success') || session('warning'))
            <div class="form-group">
            <div class="col-sm-offset-0 col-sm-12">
            <div class="alert alert-<?php echo (session('success')) ? 'success': 'danger'; ?>" style="display: block;"><?php echo (session('success')) ? session('success') : session('warning'); ?><button type="button" class="close" data-dismiss="alert">×</button>
            </div>
            </div>
            </div>
          @endif

          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-username">Land Type</label>
            <div class="col-sm-10">
              <input type="text" name="land_type" value="<?php echo ($editLandType && $editLandType->land_type) ? $editLandType->land_type : ''; ?>" placeholder="Land Type" id="land_type" class="form-control">

              <input type="hidden" name="id" value="<?php echo  ($editLandType && $editLandType->land_type_id) ? $editLandType->land_type_id : ''; ?>" id="land_type_id" class="form-control">

                 <?php if($errors->first('land_type')) { ?>
                 <div class="text-danger"><?php echo $errors->first('land_type'); ?></div>
                <?php } ?>
             </div>
             {!! csrf_field() !!}
          </div>

           <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-username"> Status</label>
            <div class="col-sm-10">
               <select name="status" id="status" class="form-control">
                <option value="1" <?php echo  ($editLandType && $editLandType->status == 1) ? 'selected' : ''; ?>>Active</option>
                <option value="0" <?php echo  ($editLandType && $editLandType->status == 0) ? 'selected' : ''; ?>>Inactive</option>
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