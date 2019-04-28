@extends('admin/layouts.default')
@section('content')
<div id="content">

    <div class="page-header">
    <div class="container-fluid">

    <!--  <div class="pull-right"><a href="<?php echo url('admin/faqs/categories/add'); ?>" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add New"><i class="fa fa-plus"></i></a>
      </div> 
      <div class="pull-right"><a href="<?php echo url('admin/faqs/updateSequence'); ?>" data-toggle="tooltip" title="" class="btn btn-success pull-right" data-original-title="Update Sequence">Update Sequence</a>
      </div>-->
      <div class="pull-right">
        <a href="<?php echo url('admin/faq'); ?>" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Back"><i class="fa fa-reply"></i></a></div>
     
      <h3>FAQ Categories</h3>
    </div>
  </div>
   

  <div class="container-fluid"> 

<div class="panel panel-default">

 <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-bar-chart"></i>
         FAQ Category Sequence</h3>
      </div>
    <div class="panel-body">  
     <form action="<?php echo url('admin/faq/saveFaqSequece'); ?>" method="post" enctype="multipart/form-data" id="form-user" class="form-horizontal">
          @if(session('success') || session('warning'))
            <div class="form-group">
            <div class="col-sm-offset-0 col-sm-12">
            <div class="alert alert-<?php echo (session('success')) ? 'success': 'danger'; ?>" style="display: block;"><?php echo (session('success')) ? session('success') : session('warning'); ?><button type="button" class="close" data-dismiss="alert">×</button>
            </div>
            </div>
            </div>
          @endif     
         <div class="table-responsive">

                <table id="example" class="table table-striped">
                  
                  <?php if(!empty($getFaqWithSequence)){?>
                    <thead>
                      <tr>
                      <td>Question</td>
                      <td>Sequence</td>
                      <td>Status</td>
                      </tr>
                    </thead>
                    @foreach($getFaqWithSequence as $faq)
                      <tr>
                        <td><?= $faq ->question?></td>
                        <td>
                        <input type="hidden" name="category_id" value="<?= $faq->category_id?>">
                        <select name="sequence[<?= $faq->faq_id?>]">
                          @foreach($sequenceArr as $sequence)
                            <option <?php echo ($sequence == $faq->sequence)?"selected":""; ?> value="<?=$sequence;?>"><?= $sequence;?>
                            </option>
                          @endforeach
                        </select>
                          <?php if($errors->first('sequence')) { ?>
                           <div class="text-danger"><?php echo $errors->first('sequence'); ?></div>
                          <?php } ?>
                          {!! csrf_field() !!}
                        </td>
                        <td><?= ($faq ->status == '0')?"Inactive":"Active"; ?></td>
                      </tr>
                    @endforeach
                    @if(count($getFaqWithSequence) > 1)
                    <tr>
                      <td colspan="3">
                        <input type="submit" value="Update" class="btn btn-success pull-right" /></td>
                     </tr>
                    @endif
                <?php }else{ ?>
                  <tr><td colspan="3">No contents</td></tr>
                <?php } ?>
                </tbody>
                  
                </table>
         </div>
    </form>
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

<!-- <script type="text/javascript">
$(document).ready(function() {
getdatatableRecord('#example','<?php echo url('/admin/faqs/getFaqCategories'); ?>');
});
</script>  -->
@stop

