@extends('admin/layouts.default')
@section('content')
<div id="content">

    <div class="page-header">
    <div class="container-fluid">
     <div class="pull-right"><a href="<?php echo url('admin/faqs/categories/add'); ?>" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add New"><i class="fa fa-plus"></i></a>
      </div>
      <!--when active categories count are more than 1 then only update sequence button will be active-->

      @if($activeCategoryCount > 1)
     
      <div class="pull-right" style="margin: 0px 5px"><a href="<?php echo url('admin/faqs/updateCategorySequence'); ?>" data-toggle="tooltip" title="" class="btn btn-success pull-right" data-original-title="Update Sequence">Update Sequence</a>
      </div>
     
      @endif
      <div class="pull-right">
      <button type="button" id="button-filter-clear" class="btn btn-success pull-right">Clear</button>
      </div>
      <h3>FAQ Categories</h3>
    </div>
  </div>
   

  <div class="container-fluid"> 

<div class="panel panel-default">

 <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-bar-chart"></i>
         FAQ Category List</h3>
      </div>
    <div class="panel-body">       
   <div class="table-responsive">
          <table id="example" class="table table-striped">
            <thead>
              <tr>
              <td>Category Name</td>
              <td>Sequence</td>
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
getdatatableRecord('#example','<?php echo url('/admin/faqs/getFaqCategories'); ?>');
});

function DeleteFaqCategory(id,table,tbid)
{
        if(confirm('Are you sure you want to delete this record?')){
        var url = baseurl+'/admin/faqs/DeleteFaqCategory';
        //alert(isDeleteChild);
        $.ajax({
        method: 'POST',
        url: url,
        data: {'id':id,'table':table,'dbid':tbid,'_token':"{{ csrf_token() }}"}
        })
        .done(function( msg ) {
        alert('Record Deleted Successfully.');
        //location.reload();
        var oTable = $('#example').dataTable();
        oTable.fnDraw();
        });
        }else{
        return false;
        }
}
</script> 
@stop

