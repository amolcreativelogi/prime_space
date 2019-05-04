<!DOCTYPE html>
<html dir="ltr" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<title>PRYME SPACE</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="#" rel="icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/Admin/js/jquery-2.js"></script>
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/Admin/js/bootstrap.js"></script>
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/Admin/js/highcharts.js"></script> 
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/Admin/js/exporting.js"></script>
<link href="{{ URL::asset('public') }}/assets/Admin/css/opencart.css" type="text/css" rel="stylesheet">
<link href="{{ URL::asset('public') }}/assets/Admin/css/font-awesome.css" type="text/css" rel="stylesheet">
<link href="{{ URL::asset('public') }}/assets/Admin/css/summernote.css" rel="stylesheet">
<!-- <script type="text/javascript" src="{{ URL::asset('public') }}/assets/Adminassets/js/summernote.js"></script> -->
<script src="{{ URL::asset('public') }}/assets/Admin/js/moment.js" type="text/javascript"></script>
<script src="{{ URL::asset('public') }}/assets/Admin/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
<link href="{{ URL::asset('public') }}/assets/Admin/css/bootstrap-datetimepicker.css"  rel="stylesheet">
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCW7L7bkL1lt82llGHEqSbB7fczpddVDqU&libraries=places"></script>

<!--datatable css and js -->
<script src="{{ URL::asset('public') }}/assets/Admin/js/datatable/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="{{ URL::asset('public') }}/assets/Admin/js/datatable/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="{{ URL::asset('public') }}/assets/Admin/js/datatable/buttons.flash.min.js " type="text/javascript"></script>
<script src="{{ URL::asset('public') }}/assets/Admin/js/datatable/jszip.min.js " type="text/javascript"></script>
<script src="{{ URL::asset('public') }}/assets/Admin/js/datatable/pdfmake.min.js " type="text/javascript"></script>
<script src="{{ URL::asset('public') }}/assets/Admin/js/datatable/vfs_fonts.js " type="text/javascript"></script>
<script src="{{ URL::asset('public') }}/assets/Admin/js/datatable/buttons.html5.min.js " type="text/javascript"></script>
<script src="{{ URL::asset('public') }}/assets/Admin/js/datatable/buttons.print.min.js " type="text/javascript"></script>

<link href="{{ URL::asset('public') }}/assets/Admin/css/datatable/jquery.dataTables.min.css"  rel="stylesheet">
<link href="{{ URL::asset('public') }}/assets/Admin/css/datatable/buttons.dataTables.min.css"  rel="stylesheet">
<!---->

<script src="{{ URL::asset('public') }}/assets/Admin/js/my-script.js " type="text/javascript"></script>
<!--CUSTOM FRONTENT JS -->
<script type="text/javascript" src="{{ URL::asset('public') }}/assets/front-design/js/custom-file-input.js"></script>

<script>
var baseurl = '<?php echo url('/'); ?>'; 
var Admin_module='Masteradmin';

<?php if(isset($_SESSION['is_admin_login']) == false) { ?>
window.location.href =  '<?php echo url('/admin'); ?>';
<?php } ?>

function DeleteRecord(id,table,tbid)
{
        if(confirm('Are you sure you want to delete this record?')){
        var url = baseurl+'/admin/DeteteRecord';
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

function DeleteRecordWithChild(id,parentTable,tbid,isDeleteChild,childTable)
{
        if(confirm('Are you sure you want to delete this record?')){
        var url = baseurl+'/admin/DeleteRecordWithChild';
       // alert(isDeleteChild);
        $.ajax({
        method: 'POST',
        url: url,
        data: {'id':id,'parentTable':parentTable,'dbid':tbid,'isDeleteChild':isDeleteChild,'childTable':childTable,'_token':"{{ csrf_token() }}"}
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


<link type="text/css" href="{{ URL::asset('public') }}/assets/Admin/css/stylesheet.css" rel="stylesheet" media="screen">
<script src="{{ URL::asset('public') }}/assets/Admin/js/common.js" type="text/javascript"></script>
</head>
<body>
<div id="container">
<header id="header" class="navbar navbar-static-top">
  <div class="navbar-header">
   <div class="logopanel">
    <h1 class="logotitle"><a href="#" class="">Pryme Space</a></h1>
   </div> 
     <a type="button" id="button-menu" class="pull-left"></a>
    
   </div>

  <div class="headerright">
  <ul class="nav pull-right navadjust">
    <li class="dropdown liadjust">

<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="label label-danger pull-left">15</span> <i class="fa fa-bell fa-lg"></i></a>
      <ul class="dropdown-menu dropdown-menu-right alerts-dropdown">
        <li class="dropdown-header">Exam</li>
        <li><a href="#" style="display: block; overflow: auto;"><span class="label label-warning pull-right">1</span>Processing</a></li>
        <li><a href="#"><span class="label label-success pull-right">4</span>Completed</a></li>
        
      </ul>
    </li>    
    <li><a href="{{ URL::asset('admin/adminLogout') }}/"><span class="hidden-xs hidden-sm hidden-md">Logout</span> <i class="fa fa-sign-out fa-lg"></i></a></li>
  </ul>
</div> 
  
</header>
<nav id="column-left" class="active"><div id="profile">
  <div><a class="dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-user" style="font-size:40px;float:left;"></i> <img src="#" alt="John Doe" title="admin" class="img-circle"></a></div>
  <div>
    <small>Administrator</small></div>
</div>
<ul id="menu">

<li id="dashboard" class="active"><a href="{{ URL::asset('admin/dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> <span>Dashboard</span></a></li>

<li id="master"><a class="parent"><i class="fa fa-shopping-cart fa-fw"></i> <span>Master</span></a>
  <ul class="collapse">
    <!-- <li><a href="{{ URL::asset('admin/amenityCategoriesExecute') }}/">Amenity Categories</a></li> -->
    <li><a href="{{ URL::asset('admin/amenitiesExecute') }}/">Amenities</a></li>
    
    <li><a href="{{ URL::asset('admin/bookingDurationTypeExecute') }}/">Booking Duration Type</a></li>
    <!-- <li><a href="{{ URL::asset('admin/documentTypeExecute') }}/">Document Type</a></li> -->
    <li><a href="{{ URL::asset('admin/unitTypeExecute') }}/">Unit Type</a></li>
    <li><a href="{{ URL::asset('admin/locationTypeExecute') }}/">Location Type</a></li>
    <li><a href="{{ URL::asset('admin/cancellationTypeExecute') }}/">Cancellation Type</a></li>
    <li><a href="{{ URL::asset('admin/cancellationPoliciesExecute') }}/">Cancellation Policies </a></li>
  </ul>
</li>

<li id="parking"><a class="parent"><i class="fa fa-shopping-cart fa-fw"></i> <span>Parking</span></a>
  <ul class="collapse">
   <li><a href="{{ URL::asset('admin/carTypeExecute') }}/">Car Type</a></li>
   <li><a href="{{ URL::asset('admin/parkingTypeExecute') }}/">Parking Type</a></li>
   <li><a href="{{ URL::asset('admin/parkingList') }}/">Parking List</a></li>
  
  </ul>
</li>

<li id="land"><a class="parent"><i class="fa fa-shopping-cart fa-fw"></i> <span>Land</span></a>
  <ul class="collapse">
     <li><a href="{{ URL::asset('admin/landTypeExecute') }}/">Land Type</a></li>
     <li><a href="{{ URL::asset('admin/landList') }}/">Land List</a></li>
    <!-- <li><a href="{{ URL::asset('admin/amenityCategoriesExecute') }}/">Amenity Categories</a></li> -->
  </ul>
</li>

<li id="user"><a class="parent"><i class="fa fa-shopping-cart fa-fw"></i> <span>Users</span></a>
  <ul class="collapse">
    <li><a href="{{ URL::asset('admin/Host_Users') }}/">All Users & Host</a></li>
    <li><a href="{{ URL::asset('admin/Users') }}/">All Customers</a></li>
    <li><a href="{{ URL::asset('admin/Hosts') }}/">All Host</a></li>
  </ul>
</li>


<li id="booking" ><a class="parent"><i class="fa fa-shopping-cart fa-fw"></i> <span>Booking</span></a>
  <ul class="collapse">
    <li><a href="{{ URL::asset('admin/bookingList') }}/">All Booking</a></li>
    <li><a href="{{ URL::asset('admin/allParkingBooking') }}/">All Parking Booking</a></li>
    <li><a href="{{ URL::asset('admin/allLandBooking') }}/">All Land Booking</a></li>
  </ul>
</li>

<li id="cms" ><a class="parent" ><i class="fa fa-shopping-cart fa-fw"></i> <span>CMS Pages</span></a>
   <ul class="collapse">
      <li><a href="{{ URL::asset('admin/cmspages')}}/">Manage CMS Pages</a></li>
   </ul>
</li>
<li id="blog"><a class="parent" ><i class="fa fa-shopping-cart fa-fw"></i> <span>Blogs</span></a>
   <ul class="collapse">
      <li><a href="{{ URL::asset('admin/blogs')}}/">Manage Blogs</a></li>
   </ul>
</li>
<li faq="faq"><a class="parent" ><i class="fa fa-shopping-cart fa-fw"></i> <span>FAQ</span></a>
   <ul class="collapse">
      <li><a href="{{ URL::asset('admin/faqs/categories')}}/">Manage FAQ Categories</a></li>
      <li><a href="{{ URL::asset('admin/faq/')}}/">Manage FAQ's</a></li>
   </ul>
</li>

<li id="wallet" style="display: none;"><a class="parent"><i class="fa fa-money fa-fw"></i> <span>Wallet</span></a>
  <ul class="collapse">
    <li><a href="#">Sales List</a></li>
    <li><a href="#">Withdraw Requests</a></li>                    
  </ul>
</li>

@if($_SESSION['admin_login_id'] == 1)
<li id="roles_permissions"><a class="parent" ><i class="fa fa-shopping-cart fa-fw"></i> <span>Roles And Permissions</span></a>
   <ul class="collapse">
      <li><a href="{{ URL::asset('admin/roles')}}/">Manage Roles</a></li>
   </ul>
</li>
@endif

</ul>
</nav>