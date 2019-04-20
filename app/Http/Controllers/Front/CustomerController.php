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
    	return view('front.customer.customer_dashboard');
	}
	public function bookingHistory()
    {
        $bookingDatas = DB::table('tbl_property_bookings')
                            ->join('prk_add_property', 'prk_add_property.property_id', 'tbl_property_bookings.property_id')->get();
    	return view('front.customer.bookingHistory', compact('bookingDatas', $bookingDatas));
	}
	public function orderHistory()
    {
    	return view('front.customer.orderHistory');
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
