@extends('admin/layouts.default')
@section('content')
<?php //echo '<pre>'; print_r($editAmenity); echo '</pre>';die;?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <a href="<?php echo url('admin/amenitiesExecute'); ?>" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Back"><i class="fa fa-reply"></i></a></div>
      <h1> Amenities</h1>
    </div>
  </div>
  <div class="container-fluid">
        <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Amenity</h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo url('admin/saveAmenity'); ?>" method="post" enctype="multipart/form-data" id="form-user" class="form-horizontal">
          @if(session('success') || session('warning'))
            <div class="form-group">
            <div class="col-sm-offset-0 col-sm-12">
            <div class="alert alert-<?php echo (session('success')) ? 'success': 'danger'; ?>" style="display: block;"><?php echo (session('success')) ? session('success') : session('warning'); ?><button type="button" class="close" data-dismiss="alert">×</button>
            </div>
            </div>
            </div>
          @endif
        	<div class="form-group required">
	            <label class="col-sm-2 control-label" for="input-username">Module Categories</label>
	            <div class="col-sm-10">

               
                <?php foreach($getModuleCategories as $category){  ?>

                <input type="checkbox" name="module_manage_id[]" id="module_manage_id[]"
                value="<?php echo $category->module_manage_id ?>" 
                <?php echo  ($module_manage_ids && in_array($category->module_manage_id, $module_manage_ids)) ? 'checked' : ''; ?> 
                class="">&nbsp;&nbsp;&nbsp;<?php echo $category->module_manage_name ?>
                <?php } ?>

              
	               <!-- <select name="module_manage_id[]" id="module_manage_id[]" class="form-control" multiple="multiple">
	               	<option  disabled selected value>Select</option>

	             <?php foreach($getModuleCategories as $category){  ?>
           
    					<option value="<?php echo $category->module_manage_id ?>" <?php echo  ($module_manage_ids && in_array($category->module_manage_id, $module_manage_ids)) ? 'selected' : ''; ?>><?php echo $category->module_manage_name ?></option> 

	               	<?php } ?>
	               </select> -->
             
	                <?php if($errors->first('module_manage_id')) { ?>
                 	<div class="text-danger"><?php echo $errors->first('module_manage_id'); ?></div>
                	<?php } ?>
             </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-username"> Amenity Name</label>
            <div class="col-sm-10">
              <input type="text" name="amenity_name" value="<?php echo ($editAmenity && $editAmenity->amenity_name) ? $editAmenity->amenity_name : ''; ?>" placeholder="Amenity Name" id="amenity_name" class="form-control">

              <input type="hidden" name="id" value="<?php echo  ($editAmenity && $editAmenity->amenity_id) ? $editAmenity->amenity_id : ''; ?>" id="amenity_id" class="form-control">

                 <?php if($errors->first('amenity_name')) { ?>
                 <div class="text-danger"><?php echo $errors->first('amenity_name'); ?></div>
                <?php } ?>
             </div>
             {!! csrf_field() !!}
          </div>


          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-username">Amenity Image</label>
            <div class="col-sm-10">
               <input type="file" name="amenity_image" id="id_amenity_image">
               <input type="hidden" name="edit_amenity_image" id="id_edit_amenity_image" value="<?php echo  ($editAmenity && $editAmenity->amenity_image) ? $editAmenity->amenity_image : ''; ?>">
             </div>
              
           </div>
           <?php if(isset($editAmenity->amenity_image) && !empty($editAmenity->amenity_image)){ ?>
           <div class="form-group">
            <label class="col-sm-2 control-label" for="input-username">Amenity Image</label>
              <div class="col-sm-10">
              <?php echo '<a target="_blank" href="'.url('/public/images/amenity/'.$editAmenity->amenity_image.'').'"><img src="'.url('/public/images/amenity/'.$editAmenity->amenity_image.'').'" width="50"></a>'; ?>
             </div>
           </div>
         <?php }?>

           <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-username"> Status</label>
            <div class="col-sm-10">
               <select name="status" id="status" class="form-control">
                <option value="1" <?php echo  ($editAmenity && $editAmenity->status == 1) ? 'selected' : ''; ?>>Active</option>
                <option value="0" <?php echo  ($editAmenity && $editAmenity->status == 0) ? 'selected' : ''; ?>>Inactive</option>
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