<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\URL;
use DB;

class CustomerController extends Controller
{
    public function customerDashboard()
    {

         $totalBooking = DB::table('tbl_property_bookings')->select('count(*)')->where('tbl_property_bookings.is_deleted', '=', 0)->where('user_id', '=', $_SESSION['user']['user_id'])->count();

         $getBookingList = DB::table('tbl_property_bookings')->select('*')->leftJoin('prk_user_registrations', 'prk_user_registrations.user_id', '=', 'tbl_property_bookings.user_id')->where('tbl_property_bookings.is_deleted', '=', 0)->where('tbl_property_bookings.user_id', '=', $_SESSION['user']['user_id'])->get();

    	return view('front.customer.customer_dashboard')->with(
            ['totalBooking'=>$totalBooking,'getBookingList'=>$getBookingList]
        );;
	}
	public function bookingHistory()
    {   
         $getBookingList = DB::table('tbl_property_bookings')->select('*')->leftJoin('prk_user_registrations', 'prk_user_registrations.user_id', '=', 'tbl_property_bookings.user_id')->where('tbl_property_bookings.is_deleted', '=', 0)->where('tbl_property_bookings.start_date', '>', date('Y-m-d'))->where('tbl_property_bookings.user_id', '=', $_SESSION['user']['user_id'])->get();
    	return view('front.customer.bookingHistory')->with(
            ['getBookingList'=>$getBookingList]
        );
	}
	public function orderHistory()
    {
        $gettransationList = DB::table('booking_transactions')->select('*')->leftJoin('tbl_property_bookings', 'booking_transactions.booking_id', '=', 'tbl_property_bookings.booking_id')->leftJoin('prk_add_property', 'tbl_property_bookings.property_id', '=', 'prk_add_property.property_id')->where('booking_transactions.user_id', '=', $_SESSION['user']['user_id'])->get();

    	return view('front.customer.orderHistory')->with(
            ['gettransationList'=>$gettransationList]
            );
	}
    public function bookingView()
    {


        return view('front.customer.bookingView');
    }
}
