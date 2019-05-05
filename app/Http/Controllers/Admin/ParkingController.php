<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Admin\RolesAndPermissions;


use DB;

use Illuminate\Support\Facades\Mail;
use App\Mail\PropertyApprovedAdmin;

class ParkingController extends Controller
{
    
	//roles
    private $objRolesPermissions;
    public function __construct(RolesAndPermissions $objRolesPermissions)
    {
        $this->objRolesPermissions = $objRolesPermissions;
       

       
    }
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

	            /**check assigned roles and permission for  loggedin user and restrict edit delete access**/
	           $unauthorizedRoles =$this->objRolesPermissions->getUnauthorizedRoles($_SESSION['admin_login_id'],'controller','parking_list');

	          //create edit delete buttons if roles are assigned else not
         	  
	          $deleteButton="";
	         
	            if(!empty($unauthorizedRoles) && in_array('delete',$unauthorizedRoles)){ 
	           		$deleteButton ='<button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$pList->property_id.','."'prk_add_property'".','."'property_id'".');"><i class="fa fa-trash-o"></i></button>';
	           }
	           if(!empty($unauthorizedRoles) && in_array('view',$unauthorizedRoles)){ 
	           		$viewButton ='<a href="'.url('admin/ParkingDetails/'.$pList->property_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-eye"></i></a> ';
	            }

	           if( !empty($viewButton) || !empty($deleteButton)){

	           		$button = $viewButton.$deleteButton;
	           }else{
	           	    $button = '-';
	           }

	           $row[] = $button;

	           /**end roles check**/
	         /* $row[] ='<a href="'.url('admin/ParkingDetails/'.$pList->property_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-eye"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$pList->property_id.','."'prk_add_property'".','."'property_id'".');"><i class="fa fa-trash-o"></i></button>';*/
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

    public function ParkingDetails($parkingId)
    {	
    	$propertyDetails = DB::table('prk_add_property')->select('prk_add_property.created_at','firstname','lastname','property_id','name','location','zip_code','description','longitude','latitude','ev_charging','wheelchair_accessible','prk_add_property.status')->leftJoin('prk_user_registrations', 'prk_user_registrations.user_id', '=', 'prk_add_property.user_id')->where('prk_add_property.property_id', '=', $parkingId)->where('prk_add_property.is_deleted', '=', 0)->first();


    	$getAmenities =  DB::table('prk_add_property_amenities')->select('amenity_name','amenity_image')->leftJoin('tbl_mstr_amenities', 'tbl_mstr_amenities.amenity_id', '=', 'prk_add_property_amenities.amenity_id')->where('prk_add_property_amenities.property_id', '=', $parkingId)->get();

    	$getPropertyrent =  DB::table('prk_add_property_rent')->select('duration_type','car_type','rent_amount')->leftJoin('tbl_mstr_booking_duration_type', 'prk_add_property_rent.duration_type_id', '=', 'tbl_mstr_booking_duration_type.duration_type_id')->leftJoin('prk_car_type', 'prk_add_property_rent.car_type_id', '=', 'prk_car_type.car_type_id')->where('prk_add_property_rent.property_id', '=', $parkingId)->get();

    	$getPropertyType =  DB::table('prk_add_property_floors')->select('parking_type','floor_name','total_parking_spots')->leftJoin('prk_parking_type', 'prk_add_property_floors.parking_type_id', '=', 'prk_parking_type.parking_type_id')->where('prk_add_property_floors.property_id', '=', $parkingId)->get();


    	$getPropertyImagesandDoc =  DB::table('prk_add_property_files')->select('name','document_type_id','default_file')->where('prk_add_property_files.property_id', '=', $parkingId)->where('prk_add_property_files.document_type_id', '=', 1)->get();


    	$getPropertyImagesFloorMap =  DB::table('prk_add_property_files')->select('name','document_type_id','default_file')->where('prk_add_property_files.property_id', '=', $parkingId)->where('prk_add_property_files.document_type_id', '=', 2)->get();

    	$getPropertyDoc =  DB::table('prk_add_property_files')->select('name','document_type_id','default_file')->where('prk_add_property_files.property_id', '=', $parkingId)->where('prk_add_property_files.document_type_id', '=', 3)->get();

    	// echo '<pre>';
    	// print_r($getPropertyDoc);
    	// exit;	

    	return view('admin.parking.parking_details')->with('propertyDetails', $propertyDetails)->with('getAmenities', $getAmenities)->with('getPropertyrent', $getPropertyrent)->with('getPropertyType', $getPropertyType)->with('getPropertyImagesandDoc', $getPropertyImagesandDoc)->with('getPropertyImagesFloorMap', $getPropertyImagesFloorMap)->with('getPropertyDoc', $getPropertyDoc);
    }


    public function PropertyApproval(Request $request)
    {
    	$data = array(
					 'status'=>$request->input('status'),
					 );
		$result  = DB::table('prk_add_property')->where('property_id', $request->input('property_id'))->update($data);
		

		$result1  = DB::table('prk_add_property')->where('property_id', $request->input('property_id'))->first();
		if($result)
		{
			if($request->input('status') == 1) { 
				$emailget  = DB::table('prk_user_registrations')->where('user_id', $result1->user_id)->first();
				Mail::to($emailget->email_id)->send(new PropertyApprovedAdmin);
			}
			echo 200;
		} else {
			echo 100;
		}
    	exit;
    }
}
