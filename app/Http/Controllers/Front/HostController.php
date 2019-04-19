<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\URL;
use DB;
use Response;

class HostController extends Controller
{
	

    public function hostDashboard()
    {	
    	return view('front.host.host_dashboard');
	}

	public function parkingProperties()
	{	
		$query = DB::table('prk_add_property')->select('prk_add_property.created_at','firstname','lastname','property_id','name','location','prk_add_property.status')->leftJoin('prk_user_registrations', 'prk_user_registrations.user_id', '=', 'prk_add_property.user_id')->where('prk_add_property.is_deleted', '=', 0)->where('prk_add_property.user_id', '=', $_SESSION['user']['user_id']);
		$getParkingList = $query->get(); 
		return view('front.host.parking_propertieslist')->with(
        	['getParkingList'=>$getParkingList]
        );
	}

	public function ParkingDetails($parkingId)
    {	
    	$propertyDetails = DB::table('prk_add_property')->select('prk_add_property.created_at','firstname','lastname','property_id','name','location','zip_code','description','longitude','latitude','ev_charging','wheelchair_accessible','prk_add_property.status')->leftJoin('prk_user_registrations', 'prk_user_registrations.user_id', '=', 'prk_add_property.user_id')->where('prk_add_property.property_id', '=', $parkingId)->where('prk_add_property.is_deleted', '=', 0)->first();


    	$getAmenities =  DB::table('prk_add_property_amenities')->select('amenity_name','amenity_image')->leftJoin('tbl_mstr_amenities', 'tbl_mstr_amenities.amenity_id', '=', 'prk_add_property_amenities.amenity_id')->where('prk_add_property_amenities.property_id', '=', $parkingId)->get();

    	$getPropertyrent =  DB::table('prk_add_property_rent')->select('duration_type','car_type','rent_amount')->leftJoin('tbl_mstr_booking_duration_type', 'prk_add_property_rent.duration_type_id', '=', 'tbl_mstr_booking_duration_type.duration_type_id')->leftJoin('prk_car_type', 'prk_add_property_rent.car_type_id', '=', 'prk_car_type.car_type_id')->where('prk_add_property_rent.property_id', '=', $parkingId)->get();

    	$getPropertyType =  DB::table('prk_add_property_floors')->select('parking_type','floor_name','total_parking_spots')->leftJoin('prk_parking_type', 'prk_add_property_floors.parking_type_id', '=', 'prk_parking_type.parking_type_id')->where('prk_add_property_floors.property_id', '=', $parkingId)->get();


    	$getPropertyDoc =  DB::table('prk_add_property_files')->select('file_id','name','document_type_id','default_file')->where('prk_add_property_files.property_id', '=', $parkingId)->where('prk_add_property_files.document_type_id', '=', 3)->get();


    	$getPropertyImagesandDoc =  DB::table('prk_add_property_files')->select('name','document_type_id','default_file')->where('prk_add_property_files.property_id', '=', $parkingId)->where('prk_add_property_files.document_type_id', '=', 1)->get();


    	$getPropertyImagesFloorMap =  DB::table('prk_add_property_files')->select('name','document_type_id','default_file')->where('prk_add_property_files.property_id', '=', $parkingId)->where('prk_add_property_files.document_type_id', '=', 2)->get();

    

    	

    	return view('front.host.parking_details')->with('propertyDetails', $propertyDetails)->with('getAmenities', $getAmenities)->with('getPropertyrent', $getPropertyrent)->with('getPropertyType', $getPropertyType)->with('getPropertyImagesandDoc', $getPropertyImagesandDoc)->with('getPropertyImagesFloorMap', $getPropertyImagesFloorMap)->with('getPropertyDoc', $getPropertyDoc);
    }


    public function downloadDoc($file_id)
    {	
    	$getPropertyDoc =  DB::table('prk_add_property_files')->select('file_id','name','document_type_id','default_file')->where('file_id', '=', $file_id)->first();
    	$file_path = public_path('images/property-documents/'.$getPropertyDoc->name);
    	//$file= URL::to('/public/images/property-documents/'.$getPropertyDoc->name.'');
    	if(file_exists($file_path))
    	{
    		
    	}
        return response()->download($file_path);

    	// print_r($getPropertyDoc->name);
    	// exit;
    }

	public function landProperties()
	{	
		$query = DB::table('lnd_add_property')->select('lnd_add_property.created_at','firstname','lastname','property_id','name','location','lnd_add_property.status')->leftJoin('prk_user_registrations', 'prk_user_registrations.user_id', '=', 'lnd_add_property.user_id')->where('lnd_add_property.is_deleted', '=', 0)->where('lnd_add_property.user_id', '=', $_SESSION['user']['user_id']);
		$getLandList = $query->get();
		return view('front.host.land_propertieslist')->with(
        	['getLandList'=>$getLandList]
        );
	}

	
    function DeleteRecord()
	{	
	  	$data = array('is_deleted'=>1);
	  	$deleteRecord  = DB::table($_POST['table'])->where($_POST['dbid'], $_POST['id'])->update($data);
	    if($deleteRecord)
	    {
	        echo '{"code":"200"}';
	    }
	    else
	    {
	        echo '{"code":"100"}';
	    }
	}

	public function bookingProperties()
	{
		$query = DB::table('tbl_property_bookings')->select('booking_id','property_id','firstname','lastname','start_time','end_time','start_date','end_date','booking_status','module_manage_name')->leftJoin('prk_user_registrations', 'tbl_property_bookings.user_id', '=', 'tbl_property_bookings.user_id')->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_property_bookings.module_manage_id')->where('tbl_property_bookings.is_deleted', '=', 0)->orderBy('booking_id','desc');
		$getBookingList = $query->get();
		return view('front.host.bookinglist')->with(
        	['getBookingList'=>$getBookingList]
        );
	}
}
