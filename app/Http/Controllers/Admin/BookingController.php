<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Admin\RolesAndPermissions;


use DB;

class BookingController extends Controller
{
    
	  //roles
    private $objRolesPermissions;
    public function __construct(RolesAndPermissions $objRolesPermissions)
    {
        $this->objRolesPermissions = $objRolesPermissions;
       

       
    }
    public function bookingList()
    {	
    	return view('admin.booking.booking_list');
    }

    public function getallBookingList()
    {
    	$sort = array('car_type','status');
		$myll = $_POST['start'];
		$offset = $_POST['length'];
		if(isset($_POST['order'][0])){
		$orrd = $_POST['order'][0];
		$title=$orrd['column'];
		$order=$orrd['dir'];
		}

		$getCarTotalRecord = DB::table('tbl_property_bookings')->select('booking_id')->where('is_deleted', '=', 0)->get()->count();

		$query = DB::table('tbl_property_bookings')->select('booking_id','property_id','firstname','lastname','start_time','end_time','start_date','end_date','booking_status','module_manage_name')->leftJoin('prk_user_registrations', 'tbl_property_bookings.user_id', '=', 'tbl_property_bookings.user_id')->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_property_bookings.module_manage_id')->where('tbl_property_bookings.is_deleted', '=', 0);
		if($_POST['search']['value']  && $_POST['search']['value'] != 'clear') {
	    $query->where('firstname', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->where('lastname', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->where('start_time', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->where('end_time', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->where('start_date', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->where('end_date', 'like', '%' .  $_POST['search']['value'] . '%');
		}

		if($offset!= -1) {
		    $query->skip($myll)->take($offset);
		}
		if(isset($order)){
      	  	$query->orderBy($sort[$title], $order);
        }
        else{
       		$query->orderBy('property_id','desc');
        }
		$getParkingList = $query->get();
	    $data = array();
	    $data = array();
	    $no = $_POST['start'];
	    // $total_rec = array_pop($getCarType);
	    //$total_rec = array_pop($list);
	    $sr = 1;
	    foreach ($getParkingList as $pList) {
	      	  $no++;
	          $row = array();
	          //$row[] = $sr++;
	          $row[] = $pList->booking_id;
	          $row[] = $pList->module_manage_name;
	          $row[] = $pList->firstname.' '.$pList->lastname;

	          $row[] = $pList->start_time;
	          $row[] = $pList->end_time;
	          $row[] = $pList->start_date;
	          $row[] = $pList->end_date;
	          //$row[] = $pList->booking_status;
	          // $row[] = $pList->location;
	         
	          // $row[] = $pList->created_at;
	          // $row[] = ($pList->status == 1) ? 'Active' : 'Inactive';
	         	$row[] ='<a href="#" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="View"><i class="fa fa-eye"></i></a>';
	          $data[] = $row;
	        }
	      $output = array(
	                      "draw" => $_POST['draw'],
	                      "recordsTotal" => $getCarTotalRecord,
	                      "recordsFiltered" => $getCarTotalRecord,
	                      "data" => $data,
	    );
	    echo json_encode($output);
    }



    //All parking booking
    public function allParkingBooking()
    {	
    	return view('admin.booking.parking_booking_list');
    }

    public function getallParkingList()
    {	
    	$sort = array('car_type','status');
		$myll = $_POST['start'];
		$offset = $_POST['length'];
		if(isset($_POST['order'][0])){
		$orrd = $_POST['order'][0];
		$title=$orrd['column'];
		$order=$orrd['dir'];
		}

		$getCarTotalRecord = DB::table('tbl_property_bookings')->select('booking_id')->where('is_deleted', '=', 0)->where('tbl_property_bookings.module_manage_id', '=', 2)->get()->count();

		$query = DB::table('tbl_property_bookings')->select('booking_id','property_id','firstname','lastname','start_time','end_time','start_date','end_date','booking_status','module_manage_name')->leftJoin('prk_user_registrations', 'tbl_property_bookings.user_id', '=', 'tbl_property_bookings.user_id')->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_property_bookings.module_manage_id')->where('tbl_property_bookings.is_deleted', '=', 0)->where('tbl_property_bookings.module_manage_id', '=', 2);
		if($_POST['search']['value']  && $_POST['search']['value'] != 'clear') {
	    $query->where('firstname', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->where('lastname', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->where('start_time', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->where('end_time', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->where('start_date', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->where('end_date', 'like', '%' .  $_POST['search']['value'] . '%');
		}

		if($offset!= -1) {
		    $query->skip($myll)->take($offset);
		}
		if(isset($order)){
      	  	$query->orderBy($sort[$title], $order);
        }
        else{
       		$query->orderBy('property_id','desc');
        }
		$getParkingList = $query->get();
	    $data = array();
	    $data = array();
	    $no = $_POST['start'];
	    // $total_rec = array_pop($getCarType);
	    //$total_rec = array_pop($list);
	    $sr = 1;
	    foreach ($getParkingList as $pList) {
	      	  $no++;
	          $row = array();
	          //$row[] = $sr++;
	          $row[] = $pList->booking_id;
	          $row[] = $pList->module_manage_name;
	          $row[] = $pList->firstname.' '.$pList->lastname;

	          $row[] = $pList->start_time;
	          $row[] = $pList->end_time;
	          $row[] = $pList->start_date;
	          $row[] = $pList->end_date;
	          //$row[] = $pList->booking_status;
	          // $row[] = $pList->location;
	         
	          // $row[] = $pList->created_at;
	          // $row[] = ($pList->status == 1) ? 'Active' : 'Inactive';
	         	$row[] ='<a href="#" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="View"><i class="fa fa-eye"></i></a>';
	          $data[] = $row;
	        }
	      $output = array(
	                      "draw" => $_POST['draw'],
	                      "recordsTotal" => $getCarTotalRecord,
	                      "recordsFiltered" => $getCarTotalRecord,
	                      "data" => $data,
	    );
	    echo json_encode($output);
    }



     //All land booking
    public function allLandBooking()
    {	
    	return view('admin.booking.land_booking_list');
    }

    public function getallLandList()
    {
    	$sort = array('car_type','status');
		$myll = $_POST['start'];
		$offset = $_POST['length'];
		if(isset($_POST['order'][0])){
		$orrd = $_POST['order'][0];
		$title=$orrd['column'];
		$order=$orrd['dir'];
		}
			
		$getCarTotalRecord = DB::table('tbl_property_bookings')->select('booking_id')->where('is_deleted', '=', 0)->where('tbl_property_bookings.module_manage_id', '=', 3)->get()->count();

		$query = DB::table('tbl_property_bookings')->select('booking_id','property_id','firstname','lastname','start_time','end_time','start_date','end_date','booking_status','module_manage_name')->leftJoin('prk_user_registrations', 'tbl_property_bookings.user_id', '=', 'tbl_property_bookings.user_id')->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_property_bookings.module_manage_id')->where('tbl_property_bookings.is_deleted', '=', 0)->where('tbl_property_bookings.module_manage_id', '=', 3);
		if($_POST['search']['value']  && $_POST['search']['value'] != 'clear') {
	    $query->where('firstname', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->where('lastname', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->where('start_time', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->where('end_time', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->where('start_date', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->where('end_date', 'like', '%' .  $_POST['search']['value'] . '%');
		}

		if($offset!= -1) {
		    $query->skip($myll)->take($offset);
		}
		if(isset($order)){
      	  	$query->orderBy($sort[$title], $order);
        }
        else{
       		$query->orderBy('property_id','desc');
        }
		$getParkingList = $query->get();


	    $data = array();
	    $data = array();
	    $no = $_POST['start'];
	    // $total_rec = array_pop($getCarType);
	    //$total_rec = array_pop($list);
	    $sr = 1;
	    foreach ($getParkingList as $pList) {
	      	  $no++;
	          $row = array();
	          //$row[] = $sr++;
	          $row[] = $pList->booking_id;
	          $row[] = $pList->module_manage_name;
	          $row[] = $pList->firstname.' '.$pList->lastname;

	          $row[] = $pList->start_time;
	          $row[] = $pList->end_time;
	          $row[] = $pList->start_date;
	          $row[] = $pList->end_date;
	          //$row[] = $pList->booking_status;
	          // $row[] = $pList->location;
	         
	          // $row[] = $pList->created_at;
	          // $row[] = ($pList->status == 1) ? 'Active' : 'Inactive';
	         	$row[] ='<a href="#" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="View"><i class="fa fa-eye"></i></a>';
	          $data[] = $row;
	        }
	      $output = array(
	                      "draw" => $_POST['draw'],
	                      "recordsTotal" => $getCarTotalRecord,
	                      "recordsFiltered" => $getCarTotalRecord,
	                      "data" => $data,
	    );
	    echo json_encode($output);
    }
}
