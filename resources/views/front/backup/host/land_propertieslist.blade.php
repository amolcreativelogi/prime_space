@extends('front/layouts.default')
@section('content')
<div class="site-content">


<section class="dashboard-layout">
    <div class="row">
     @include('front/includes.host_side_menu')
      <div class="col-lg-9 col-md-8 col-sm-12 dl-content">
          <table class="table table-striped">
    <thead>
     
      <tr>
        <th>Name</th>
        <th>Location</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($getLandList as $plist) {  ?>
      <tr>
        <td><?php echo $plist->name; ?></td>
        <td><?php echo $plist->location; ?></td>
        <td><?php echo ($plist->status == 1) ? 'Active' : 'Inactive'; ?></td>
        <td><a href="#" style="color: #B6ABAB;">View Details</a></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
    </div>
    </div>
</section>
</div>
@stop

