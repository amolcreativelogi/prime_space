<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

use DB;

class ParkingController extends Controller
{
    public function parkingList()
    {	
    	return view('admin.parking.parking_list');
    }

    public function getParkingList()
    {
    	$sort = array('car_type','status');
		$myll = $_POST['start'];
		$offset = $_POST['length'];
		if(isset($_POST['order'][0])){
		$orrd = $_POST['order'][0];
		$title=$orrd['column'];
		$order=$orrd['dir'];
		}

		$getCarTotalRecord = DB::table('prk_add_property')->select('property_id','name','location','prk_add_property.status')->where('is_deleted', '=', 0)->get()->count();

		$query = DB::table('prk_add_property')->select('prk_add_property.created_at','firstname','lastname','property_id','name','location','prk_add_property.status')->leftJoin('prk_user_registrations', 'prk_user_registrations.user_id', '=', 'prk_add_property.user_id')->where('prk_add_property.is_deleted', '=', 0);
		if($_POST['search']['value']  && $_POST['search']['value'] != 'clear') {
	    $query->where('name', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->orWhere('location', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->orWhere('firstname', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->orWhere('lastname', 'like', '%' .  $_POST['search']['value'] . '%');
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
	          $row[] = $pList->name;
	          $row[] = $pList->location;
	          $row[] = $pList->firstname.' '.$pList->lastname;
	          $row[] = $pList->created_at;
	          $row[] = ($pList->status == 1) ? 'Active' : 'Inactive';
	          $row[] ='<a href="'.url('admin/addCarType/'.$pList->property_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-eye"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$pList->property_id.','."'prk_add_property'".','."'property_id'".');"><i class="fa fa-trash-o"></i></button>';
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
