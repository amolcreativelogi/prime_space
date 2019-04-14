@extends('admin/layouts.default')
@section('content')
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
     <div class="pull-right">
      </div>
      <h1>Profile</h1>
    </div>
  </div>
  <div class="container-fluid">
            <div class="panel panel-default">
     
 
      <div class="panel-body">
      
        <div class="col-lg-12 col-xs-12 admin-order-list"> 
          <div class="col-lg-4 col-xs-12 order-left pull-left">
            <div class="row">
              <div class="admin-order-left clearfix">
                <ul class="list-unstyled clearfix">
                  <li><span class="order-placed"> </span></li>
                  <li class="order-date-time">
                    <span class="date"><b></b></span>
                  </li>
                  <li>
                    <span class="admin-order-id">First Name :</span>
                    <span class="admin-student"><?php echo $user_profile->firstname; ?></span>
                  </li>
                  <li>
                    <span class="admin-pay-method">Last Name : </span>
                    <span class="admin-student"><?php echo $user_profile->lastname; ?></span>
                  </li>
                  <li>
                    <span class="admin-pay-method">Email : </span>
                   <span class="admin-student"><?php echo $user_profile->email_id; ?></span>
                  </li>

                  <li>
                    <span class="admin-pay-method">DOB : </span>
                   <span class="admin-student"><?php echo date('m-d-Y',strtotime($user_profile->dob)); ?></span>
                  </li>

                   <li>
                    <span class="admin-pay-method">Address : </span>
                   <span class="admin-student"><?php echo $user_profile->address; ?></span>
                  </li>

                  <li>
                    <span class="admin-pay-method">City : </span>
                   <span class="admin-student"><?php echo $user_profile->city; ?></span>
                  </li>

                  <li>
                    <span class="admin-pay-method">Zipcode : </span>
                   <span class="admin-student"><?php echo $user_profile->zipcode; ?></span>
                  </li>


                  <li>
                    <span class="admin-pay-method">longitude : </span>
                   <span class="admin-student"><?php echo $user_profile->user_longitude; ?></span>
                  </li>

                  <li>
                    <span class="admin-pay-method">latitude : </span>
                   <span class="admin-student"><?php echo $user_profile->user_latitude; ?></span>
                  </li>
  
                <!--  <li class="admin-last-subtotal">
                    <span class="admin-subtotal">User Type :</span>
                    <span class="admin-student"><?php echo ($user_profile->user_type_id == 2) ? 'Customer' : 'Host'; ?></span>
                  </li> -->

                  <li class="admin-last-subtotal">
                    <span class="admin-subtotal">Status :</span>
                    <span class="admin-student"><?php echo ($user_profile->status == 1) ? 'Active' : 'Inactive'; ?></span>
                  </li>

                  <li class="admin-last-subtotal">
                    <span class="admin-subtotal">Default User Type :</span>
                    <span class="admin-student"><?php echo ($user_profile->default_user_type == 2) ? 'Host' : 'Customer'; ?></span>
                  </li>

                  <?php 
                  if($user_profile->default_user_type != 3) { ?>
                  <li class="">
                  <span class="admin-subtotal">Switch User :</span>
                  <span class=""> <div >
                  <label class="btn btn-default btn-on btn-xs active buttonswitch">
                  <input type="radio" value="1" name="multifeatured_module[module_id][status]" <?php echo ($user_profile->user_type_id == 5) ? 'checked' : '' ?> onclick="updateSwitchPermission(<?php echo $user_profile->user_id; ?>,5)" >Active</label>
                  <label class="btn btn-default btn-off btn-xs buttonswitch">
                  <input type="radio" <?php echo ($user_profile->user_type_id != 5) ? 'checked' : '' ?>  onclick="updateSwitchPermission(<?php echo $user_profile->user_id; ?>,2)" value="0" name="multifeatured_module[module_id][status]">Inactive</label>
                  </div></span>
                  </li>
                  <?php } ?>

                   <?php 
                  if($user_profile->default_user_type != 2) { ?>
                  <li class="">
                  <span class="admin-subtotal">Switch Host :</span>
                  <span class=""> <div >
                  <label class="btn btn-default btn-on btn-xs active buttonswitch">
                  <input type="radio" value="1" name="multifeatured_module[module_id][status]" <?php echo ($user_profile->user_type_id == 5) ? 'checked' : '' ?> onclick="updateSwitchPermission(<?php echo $user_profile->user_id; ?>,5)" >Active</label>
                  <label class="btn btn-default btn-off btn-xs buttonswitch">
                  <input type="radio" <?php echo ($user_profile->user_type_id != 5) ? 'checked' : '' ?>  onclick="updateSwitchPermission(<?php echo $user_profile->user_id; ?>,3)" value="0" name="multifeatured_module[module_id][status]">Inactive</label>
                  </div></span>
                  </li>
                  <?php } ?>


                </ul>
              </div>
            </div>
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

<style type="text/css">

.disabledbutton
{
  background: #CCC;
  border: 1px solid #CCC;
}
.disabledbutton:hover
{
  background: #CCC;
  border: 1px solid #CCC;
  cursor: context-menu;
}
</style>


<script>
function updateSwitchPermission(profileId,status)
{
    $.ajax({  
      type: 'POST',  
      url: '<?php echo URL::to('admin/AssignPermission') ?>', 
      data: { profileId: profileId,user_type_id: status },
      success: function(response) {
         if(response == 200)
         {
          alert('Profile status updated successfull');
         } else {
          alert('Profile status not updated successfull');
         }
      }
  });
}
</script>

</div>
@stop