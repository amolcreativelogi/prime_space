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
  
                 <li class="admin-last-subtotal">
                    <span class="admin-subtotal">User Type :</span>
                    <span class="admin-student"><?php echo ($user_profile->user_type_id == 2) ? 'Customer' : 'Host'; ?></span>
                  </li>

                  <li class="admin-last-subtotal">
                    <span class="admin-subtotal">Status :</span>
                    <span class="admin-student"><?php echo ($user_profile->status == 1) ? 'Active' : 'Inactive'; ?></span>
                  </li>

                  <li class="admin-last-subtotal">
                  <span class="admin-subtotal">Host :</span>
                  <span class="admin-student"> <div class="btn-group" id="status" data-toggle="buttons">
                  <label class="btn btn-default btn-on btn-xs active buttonswitch">
                  <input type="radio" value="1" name="multifeatured_module[module_id][status]" checked="checked">Active</label>
                  <label class="btn btn-default btn-off btn-xs buttonswitch">
                  <input type="radio" value="0" name="multifeatured_module[module_id][status]">Inactive</label>
                  </div></span>
                  </li>

                   <li class="admin-last-subtotal">
                  <span class="admin-subtotal">User :</span>
                  <span class="admin-student"> <div class="btn-group" id="status" data-toggle="buttons">
                  <label class="btn btn-default btn-on btn-xs active buttonswitch">
                  <input type="radio" value="1" name="multifeatured_module[module_id][status]" checked="checked">Active</label>
                  <label class="btn btn-default btn-off btn-xs buttonswitch">
                  <input type="radio" value="0" name="multifeatured_module[module_id][status]">Inactive</label>
                  </div></span>
                  </li>
                  
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
</div>
@stop