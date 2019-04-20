<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Braintree_Transaction;
use App\PropertyBooking;
use DB;
class PaymentController extends Controller
{
    

	public function process(Request $request)
	{
	    $payload = $request->input('payload', false);
	    $nonce = $payload['nonce'];

	    $status = Braintree_Transaction::sale([
		'amount' => $payload['amount'],
		'paymentMethodNonce' => $nonce,
		'options' => [
		    'submitForSettlement' => True
		]
	    ]);
	    if ($status->success) {
	    	$b_id = PropertyBooking::where('booking_id', $payload['booking_id'])->where('user_id',  $_SESSION['user']['user_id'])->update(['booking_status' => 'approved']);

            DB::table('booking_transactions')->where('booking_id',$payload['booking_id'])->where('user_id',  $_SESSION['user']['user_id'])->update(['status_message'=>'success']);
	    }else{
	    	$b_id = PropertyBooking::where('booking_id', $payload['booking_id'])->where('user_id',  $_SESSION['user']['user_id'])->update(['booking_status' => 'pending']);

            DB::table('booking_transactions')->where('booking_id',$payload['booking_id'])->where('user_id',  $_SESSION['user']['user_id'])->update(['status_message'=>'faield']);
	    }
	    return response()->json($status);
	}
}
