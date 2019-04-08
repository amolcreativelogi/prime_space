@extends('admin/layouts.default')
@section('content')
<div id="content">

  <div class="page-header">
    <div class="container-fluid">
    
      <div class="pull-right">
      <button type="button" id="button-filter-clear" class="btn btn-success pull-right">Clear</button>
      </div>
      <h3>All Booking List</h3>
    </div>
  </div>

  <div class="container-fluid"> 
        <div class="panel panel-default">

 <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-bar-chart"></i>
         Booking List</h3>
      </div>
    <div class="panel-body">       
   <div class="table-responsive">
          <table id="example" class="table table-striped">
            <thead>
              <tr>    
              <td>Booking ID</td> 
              <td>Booking For</td> 
              <td>Customer</td>
              <td>Start Time</td>
              <td>End Time</td>
              <td>Start Date</td>
              <td>End Date</td>
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
getdatatableRecord('#example','<?php echo url('admin/getallBookingList'); ?>');
});
</script> 
@stop

