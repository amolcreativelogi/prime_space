@extends('front/layouts.default')
@section('content')
<div class="site-content">


<section class="dashboard-layout">
    <div class="row">
     @include('front/includes.host_side_menu')
      <div class="col-lg-10 col-md-10 col-sm-12 dl-content">
        <h2 class="dash-title">my parkings</h2>
          <table class="table table-striped viewparking">
    <thead>
     
      <tr>
        <th>Name</th>
        <th>Location</th>
        <th>Status</th>
        <th class="action">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($getParkingList as $plist) {  ?>
      <tr>
        <td><?php echo $plist->name; ?></td>
        <td><?php echo $plist->location; ?></td>
        <td><?php echo ($plist->status == 1) ? 'Active' : 'Inactive'; ?></td>
        <td class="action">
          <a href="#" class="editprop"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
          <a href="#" class="viewprop"><i class="fa fa-eye" aria-hidden="true"></i></a>
          <a href="#" class="deleteprop"><i class="fa fa-trash" aria-hidden="true"></i></a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
    </div>
    </div>
</section>
</div>
@stop

