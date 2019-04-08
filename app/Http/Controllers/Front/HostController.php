<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\URL;
use DB;

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

	public function landProperties()
	{	
		$query = DB::table('lnd_add_property')->select('lnd_add_property.created_at','firstname','lastname','property_id','name','location','lnd_add_property.status')->leftJoin('prk_user_registrations', 'prk_user_registrations.user_id', '=', 'lnd_add_property.user_id')->where('lnd_add_property.is_deleted', '=', 0)->where('lnd_add_property.user_id', '=', $_SESSION['user']['user_id']);
		$getLandList = $query->get();
		return view('front.host.land_propertieslist')->with(
        	['getLandList'=>$getLandList]
        );
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
