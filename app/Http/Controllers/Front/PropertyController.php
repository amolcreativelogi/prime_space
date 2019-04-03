<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use DB;

//validation file
use App\Http\Requests\Frontend\PropertyRequest;

class PropertyController extends Controller
{
    public function addProperty($module_manage_id = NULL)
    {
    	/*$getModuleCategories =[];
    	$getCarType=[];
    	$getParkingType =[];
    	$getLandType=[];*/

    	$getModuleCategories = DB::table('tbl_module_manage')
    	->select('module_manage_id','status','module_manage_name')
    	->where([['is_deleted', '=', 0],
    			['status', '=', 1]])->get();

    	$getCarType = DB::table('prk_car_type')
    	->select('status','car_type','car_type_id')
    	->where([['is_deleted', '=', 0],
    			['status', '=', 1]])->get();

    	$getParkingType = DB::table('prk_parking_type')
    	->select('status','parking_type','parking_type_id')
    	->where([['is_deleted', '=', 0],
    			['status', '=', 1]])->get();

    	$getLandType = DB::table('lnd_land_type')
    	->select('status','land_type','land_type_id')
    	->where([['is_deleted', '=', 0],
    			['status', '=', 1]])->get();

    	return view('front.property.add_property')
    	->with('getModuleCategories',$getModuleCategories)
    	->with('getCarType',$getCarType)
    	->with('getParkingType',$getParkingType)
    	->with('getLandType',$getLandType);





    	/*->with(
    	?$getModuleCategories:'','getCarType'=>($getCarType)?$getCarType:'','getParkingType'=> ($getParkingType)?$getParkingType:'',
    		,'getLandType'=> ($getLandType)?$getLandType:'']);

    	return view('front.property.add_property')->with(['getModuleCategories'=> ($getModuleCategories)?$getModuleCategories:'','getCarType'=>($getCarType)?$getCarType:'','getParkingType'=> ($getParkingType)?$getParkingType:'',
    		,'getLandType'=> ($getLandType)?$getLandType:'']);*/
    	
    }

     public function getPropertyMasters()
    {
    	$module_manage_id = $_POST['module_manage_id'];
    	//echo json_encode($module_manage_id);
    	//die;
    	/*$getLocationTypes = DB::table('tbl_mstr_location_type')
    	->select('location_type_id','status','location_type')
    	->where([['is_deleted', '=', 0],
    			['status', '=', 1]])
    	->where('module_manage_id', '=', $module_manage_id)->get();*/

    	/*$getUnitTypes = DB::table('tbl_mstr_unit_type')
    	->select('unit_type_id','status','unit_type')
    	->where([['is_deleted', '=', 0],
    			['status', '=', 1]])
    	->where('module_manage_id', '=', $module_manage_id)->get();*/

    	//get unit types with its modules
		$getUnitTypes = DB::table('tbl_mstr_unit_type')
		->select('tbl_mstr_unit_type.unit_type',
			'tbl_mstr_unit_type.status',
			'tbl_mstr_unit_type.unit_type_id',
			//'tbl_module_manage.module_manage_id',
			//'module_manage_name'
			)
		 ->leftJoin('tbl_mstr_unit_type_with_module', 'tbl_mstr_unit_type.unit_type_id', '=', 'tbl_mstr_unit_type_with_module.unit_type_id')
		 ->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_mstr_unit_type_with_module.module_manage_id')
		 ->where('tbl_mstr_unit_type_with_module.is_deleted', '=', 0)
		 ->where('tbl_mstr_unit_type_with_module.module_manage_id', '=', $module_manage_id)
		 ->where('tbl_mstr_unit_type_with_module.status', '=', 1)
		 ->get();

    	//get location type with its modules
		$getLocationTypes = DB::table('tbl_mstr_location_type')->select('tbl_mstr_location_type.location_type',
			'tbl_mstr_location_type.status',
			'tbl_mstr_location_type.location_type_id',
			//'tbl_module_manage.module_manage_id',
			//'module_manage_name'
			)
		 ->leftJoin('tbl_mstr_location_type_with_module', 'tbl_mstr_location_type_with_module.location_type_id', '=', 'tbl_mstr_location_type.location_type_id')
		 ->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_mstr_location_type_with_module.module_manage_id')
		 ->where('tbl_mstr_location_type_with_module.is_deleted', '=', 0)
		 ->where('tbl_mstr_location_type_with_module.module_manage_id', '=', $module_manage_id)
		 ->where('tbl_mstr_location_type_with_module.status', '=', 1)
		 ->get();

    	//get amenities with its modules
		$getAmenities = DB::table('tbl_mstr_amenities')
		->select(
			'tbl_mstr_amenities.amenity_name',
			'tbl_mstr_amenities.status',
			//'tbl_mstr_amenities.amenity_image',
			'tbl_mstr_amenities.amenity_id',
			//'tbl_module_manage.module_manage_id',
			//'module_manage_name'
			)
		 ->leftJoin('tbl_mstr_amenities_with_category', 'tbl_mstr_amenities_with_category.amenity_id', '=', 'tbl_mstr_amenities.amenity_id')
		 ->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_mstr_amenities_with_category.module_manage_id')->where('tbl_mstr_amenities.is_deleted', '=', 0)
		->where('tbl_mstr_amenities_with_category.module_manage_id', '=', $module_manage_id)
		->where('tbl_mstr_amenities_with_category.status', '=', 1)
		->get();

		//get amenities with its modules
		$getBookingDurationType = DB::table('tbl_mstr_booking_duration_type')
		->select(
			'tbl_mstr_booking_duration_type.duration_type',
			'tbl_mstr_booking_duration_type.status',
			//'tbl_mstr_amenities.amenity_image',
			'tbl_mstr_booking_duration_type.duration_type_id',
			//'tbl_module_manage.module_manage_id',
			//'module_manage_name'
			)
		 ->leftJoin('tbl_mstr_booking_duration_type_with_module', 'tbl_mstr_booking_duration_type_with_module.duration_type_id', '=', 'tbl_mstr_booking_duration_type.duration_type_id')
		 ->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_mstr_booking_duration_type_with_module.module_manage_id')->where('tbl_mstr_booking_duration_type.is_deleted', '=', 0)
		->where('tbl_mstr_booking_duration_type_with_module.module_manage_id', '=', $module_manage_id)
		->where('tbl_mstr_booking_duration_type_with_module.status', '=', 1)
		->get();

		 $getPropertyMasters =array('getLocationTypes'=>$getLocationTypes,
		 							'getUnitTypes'=>$getUnitTypes,
		 							'getAmenities'=>$getAmenities,
		 							'getBookingDurationType'=>$getBookingDurationType
										);


    	return json_encode($getPropertyMasters,JSON_PRETTY_PRINT);
    	//echo json_encode($getLocationTypes);

    	//return view('front.property.add_property')->with('getModuleCategories', $getModuleCategories)->with('getLocationTypes', $getLocationTypes);
    	
    }
    
    public function saveProperty(Request $request)
    {
        print_r($_POST);
        exit;
    	//print_r($request);
    	//die('in');
    	$getModuleCategories = DB::table('tbl_module_manage')
    	->select('module_manage_id','status','module_manage_name')
    	->where([['is_deleted', '=', 0],
    			['status', '=', 1]])->get();
    	return redirect()->back()->withSuccess('Record has been updated successfully');
    	//return view('front.property.add_property')->with('getModuleCategories', $getModuleCategories);
    	
    }
   
}
