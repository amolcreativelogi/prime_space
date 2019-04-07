@extends('admin/layouts.default')
@section('content')
<div id="content">

    <div class="page-header">
    <div class="container-fluid">
     
      <div class="pull-right">
      <button type="button" id="button-filter-clear" class="btn btn-success pull-right">Clear</button>
      </div>
    
      <h3>Customers</h3>
    </div>
  </div>

  <div class="container-fluid"> 
        <div class="panel panel-default">

 <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-bar-chart"></i>
         Customers list</h3>
      </div>
    <div class="panel-body">       
   <div class="table-responsive">
          <table id="example" class="table table-striped">
            <thead>
              <tr>
              <td>First Name</td>
              <td>Last Name</td>
              <td>Email</td>
              <td>User Type</td>
              <td>Action</td>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
   </div>
</div>
</div>
<div class="row">      
<div class="col-lg-6 col-md-12 col-sx-12 col-sm-12">
</div>
</div>
</div>
</div>

</div>
</div>

</div>

<script type="text/javascript">
$(document).ready(function() {
getdatatableRecord('#example','<?php echo url('admin/getUser'); ?>');
});
</script> 
@stop

