@extends('admin/layouts.default')
@section('content')
<div id="content">

    <div class="page-header">
    <div class="container-fluid">
     <div class="pull-right"><a href="<?php echo url('admin/faq/add'); ?>" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add Questions"><i class="fa fa-plus"></i></a>
     </div>
     <!--  <div class="pull-right">
      <button type="button" id="button-filter-clear" class="btn btn-success pull-right">Clear</button>
      </div> -->
      <div class="pull-right">
        <a href="<?php echo url('admin/faq'); ?>" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Back"><i class="fa fa-reply"></i></a></div>
      <h3> FAQ </h3>
    </div>
  </div>
<div class="container-fluid"> 

<div class="panel panel-default">

 <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-bar-chart"></i>
         Category : <b><?= $getCategoryName;?></b></h3>
 </div>
   <!--  <div class="panel-body">  -->

     <table id="" class="table table-striped">
                  
                  <?php if(!empty($getAllFaq)){?>
                    <thead>
                      <tr>
                      <td>S.N.</td>
                      <td>Question</td>
                      <td>Status</td>
                      <td>Action</td>
                      </tr>
                    </thead>

                    <?php 
                    $i=1;
                    foreach($getAllFaq as $faq){ ?>
                      <tr>
                        <td><?= $i;?></td>
                        <td><?= $faq->question?></td>
                        <td><?= ($faq ->status == '0')?"Inactive":"Active"; ?></td>
                        <td>


                      @if($getRoles['edit'] == 1 && $getRoles['delete']==0)
                        <a href="<?php echo url('admin/faq/edit/'.$faq->faq_id.'')?>" data-toggle="tooltip" title="" data-original-title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                      @elseif($getRoles['delete'] == 1 && $getRoles['edit']==0)
                        <a href="<?php echo url('admin/faq/delete/'.$faq->faq_id.'/'.$faq->category_id)?>" data-toggle="tooltip" title="" data-original-title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this question?')"><i class="fa fa-trash-o"></i></a>
                      @elseif($getRoles['edit'] == 0 && $getRoles['delete'] == 0)
                        <?= '-';?>
                      @else
                       <a href="<?php echo url('admin/faq/edit/'.$faq->faq_id.'')?>" data-toggle="tooltip" title="" data-original-title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a>

                        <a href="<?php echo url('admin/faq/delete/'.$faq->faq_id.'/'.$faq->category_id)?>" data-toggle="tooltip" title="" data-original-title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this question?')"><i class="fa fa-trash-o"></i></a>
                      @endif 


                        </td>
                      </tr>
                    <?php $i++; }?>
                  
                <?php }else{ ?>
                  <tr><td colspan="3">No contents</td></tr>
                <?php } ?>
                </tbody>
                  
                </table>      
   <!-- <div class="table-responsive">
          <table id="example" class="table table-striped">
            <thead>
              <tr>
              <td>Question </td>
              <td>Description</td>
              <td>Status</td>
              <td>Action</td>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
   </div> -->
<!-- </div> -->
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
/*$(document).ready(function() {
  getdatatableRecord('#example','<?php echo url('/admin/faq/list/'); ?>');
});*/

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



