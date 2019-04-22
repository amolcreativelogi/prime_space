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
        $bookingDatas = DB::table('tbl_property_bookings')
                            ->join('prk_add_property', 'prk_add_property.property_id', 'tbl_property_bookings.property_id') ->join('prk_user_registrations', 'prk_user_registrations.user_id', 'prk_add_property.user_id')->get();
        
    	return view('front.customer.bookingHistory', compact('bookingDatas', $bookingDatas));
	}
	public function orderHistory()
    {
        $gettransationList = DB::table('booking_transactions')->select('*')->leftJoin('tbl_property_bookings', 'booking_transactions.booking_id', '=', 'tbl_property_bookings.booking_id')->leftJoin('prk_add_property', 'tbl_property_bookings.property_id', '=', 'prk_add_property.property_id')->where('booking_transactions.user_id', '=', $_SESSION['user']['user_id'])->get();

    	return view('front.customer.orderHistory')->with(
            ['gettransationList'=>$gettransationList]
            );
	}
    public function bookingView($booking_id)
    {
        $bookingData = DB::table('tbl_property_bookings')->where('tbl_property_bookings.booking_id', $booking_id)
                            ->join('prk_add_property', 'prk_add_property.property_id', 'tbl_property_bookings.property_id')->first();
        return view('front.customer.bookingView', compact('bookingData', $bookingData));
    }

    function submitRating(Request $request){
        DB::table('booking_ratings')->insert([
            'user_id' => $_SESSION['user']['user_id'],
            'booking_id' => $request->booking_id,
            'rating' => $request->starRating,
            'review' => $request->ratingComment
        ]);
    }
}
