@extends('admin/layouts.default')
@section('content')
<div id="content">

    <div class="page-header">
    <div class="container-fluid">
     <div class="pull-right"><a href="<?php echo url('admin/addCancellationType'); ?>" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add New"><i class="fa fa-plus"></i></a>
      </div>
      <h3>Cancellation Type</h3>
    </div>
  </div>

  <div class="container-fluid"> 
        <div class="panel panel-default">

 <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-bar-chart"></i>
         Cancellation Type List</h3>
      </div>
    <div class="panel-body">       
   <div class="table-responsive">
          <table id="example" class="table table-striped">
            <thead>
              <tr>
             <!--  <td>Module Category</td>   -->
              <td>Cancellation Type</td>
              <td>Status</td>
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
getdatatableRecord('#example','<?php echo url('admin/getCancellationTypes'); ?>');
});
</script> 
@stop

