@extends('admin/layouts.default')
@section('content')
<?php $arrEditRoles = isset($editRoles->role_id)?explode(',',$editRoles->role_id):array();?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
     <div class="pull-right">
        <a href="{{Request::root()}}/admin/roles/" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Back"><i class="fa fa-reply"></i></a></div>
      <h1>Roles</h1>
    </div>
  </div>
  <div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-body">
          <form name="assign_roles" action="{{Request::root()}}/admin/roles/saveAssignedRoles" method="post" enctype="multipart/form-data" >
       
         @if(session('success') || session('warning'))
            <div class="form-group">
            <div class="col-sm-offset-0 col-sm-12">
            <div class="alert alert-<?php echo (session('success')) ? 'success': 'danger'; ?>" style="display: block;"><?php echo (session('success')) ? session('success') : session('warning'); ?><button type="button" class="close" data-dismiss="alert">×</button>
            </div>
            </div>
            </div>
           @endif
         <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-username"><h4> Admin Type </h4> </label>
            <div class="col-sm-10">

              <?php if(isset($editRoles->id) && !empty($editRoles->id)){
                  echo '<b>'.$editRoles->admin_type.'</b>';
                  echo '<input type="hidden" name="admin_types" value="'.$editRoles->admin_type_id.'">';
              }else{

               if(!empty($admin_types_list)){?>
                  <?php //print_r($admin_types_list);?>
                
                    <span class="admin-student">
                      <select name="admin_types" id="admin_types">
                      <option value="">Select Admin User Type</option>
                      @foreach($admin_types_list as $admin_types)
                      <option  <?php echo (isset($editRoles->admin_type_id) && ($editRoles->admin_type_id == $admin_types->admin_type_id))?"selected":"";?> value="<?=$admin_types->admin_type_id?>"><?=$admin_types->admin_type?></option>
                      @endforeach
                    </select></span>
                 <?php }}?>

                 <input type="hidden" name="id" value="<?php echo (isset($editRoles->id))?$editRoles->id:"";?>">
         
                 <?php if($errors->first('admin_types')) { ?>
                 <div class="text-danger"><?php echo $errors->first('admin_types'); ?></div>
                <?php } ?>
             </div>
             {!! csrf_field() !!}
          </div>

      
        <div class="col-lg-12 col-xs-12 admin-order-list"> 
          <div class="col-lg-12 col-xs-12 order-left pull-left">
           
            <div class="row">
              <div class="admin-order-left clearfix">
                
                <ul class="list-unstyled clearfix">
                  <?php if(!empty($admin_types_list)){
                    ?>
                  <?php //print_r($admin_types_list);?>
                  <li class="admin-last-subtotal">
                    <span class="admin-subtotal panel-title"><h3>Roles: </h3></span>
                    <span class="admin-student">
                      
                       <ul class="treeview panel">

                        <?php foreach($arrRoles as $main_module => $subroles){
                            $main_mod_data = explode('_',$main_module);
                          ?>
                          
                          <li class="panel-title ">
                             <input class="<?=$main_mod_data[1];?>" id="<?=$main_mod_data[0];?>" type="checkbox" name="main_role_id[]" value="<?=$main_mod_data[0];?>">
                             <label for="short" class="custom-unchecked"><b><?=$main_mod_data[1]?></b></label>
                             <?php foreach($subroles as $sub_module =>$childroles){ 
                              $sub_mod_data = explode('_',$sub_module);?>

                               <ul class="list-group">
                                   <li class="list-group-item">
                                       <input  type="checkbox" name="sub_role_id[]" value="<?=$sub_mod_data[0]?>">
                                       <label for="tall-1" class="custom-unchecked"><?=$sub_mod_data[1]?></label>
                                        @foreach($childroles as $child_module =>$values)
                                        
                                          <ul>
                                           <li>
                                               <input type="checkbox" name="role_id[]" <?php echo
                                               (in_array($values['role_id'],  $arrEditRoles) )?"checked":"";?> value="<?=$values['role_id']?>" id="tall-2-1" />
                                               <label for="tall-2-1" class="custom-unchecked"><?=$values['child_module_name']?></label>
                                           </li>
                                          </ul>
                                        @endforeach
                                   </li>
                               </ul>
                             <?php }?>
                          </li>
                        <?php }?>

                      </ul>
                    </span>
                  </li>
                 <?php }?>
                </ul>

               
               
              </div>
            </div>
            <div class="row"></div>
             <div class="row">
              <span> Note: It is must to check <b>List</b> role checkbox if you want to assign <b>Edit</b> or <b>Delete</b> role to any user.</span>
              <span><input type="submit" class=" btn btn-success" name="submit" value="Submit"></span>
            </div>
            </form>


          </div><!-- order-left -->
      
          <div class="col-lg-8 col-xs-12 order-right pull-right">  
               
              <div class="admin-order-right clearfix">
                <div class="col-lg-12 list-unstyled">
                  
                
               <!--  <div class="col-lg-3 marginbottom">
                   <a href="#" class="btn btn-success profilebutton">Status</a> 
                </div>   -->

                </div>   

           </div> 
              
          </div><!-- order-right -->
        </div>
      </div>
    </div>
  </div>



</div>
<script type="text/javascript">

 //check and uncheck checkboxes
  $(function () {
    $("input[type='checkbox']").change(function () {
        $(this).siblings('ul')
            .find("input[type='checkbox']")
            .prop('checked', this.checked);
    });
});

</script>
@stop