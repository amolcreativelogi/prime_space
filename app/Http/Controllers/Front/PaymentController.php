<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Rap2hpoutre\LaravelStripeConnect\StripeConnect;
use App\PropertyBooking;
use DB;
use Session;
use Stripe;
use Stripe\HttpClient\ClientInterface;
class PaymentController extends Controller
{
	public function connectStripAccount(Request $request)
	{
		$tokendata = [
			'client_secret' => 'sk_test_oLbicpRdoHMYDli7jqrx8kFC00ocW3XROQ',
		    'code' => $request->code,
		    'grant_type' => 'authorization_code',
		];

		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_URL =>'https://connect.stripe.com/oauth/token',
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "",
		    CURLOPT_MAXREDIRS => 10,
		    CURLOPT_TIMEOUT => 30000,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "POST",
		    CURLOPT_POSTFIELDS => json_encode($tokendata),
		    CURLOPT_HTTPHEADER => array(
		        "accept: */*",
		        "accept-language: en-US,en;q=0.8",
		        "content-type: application/json",
		    ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		    echo "cURL Error #:" . $err;
		} else {
		    if ($userAccountDtail = json_decode($response)) {
		    	DB::table('connect_stripe_account_for_host')->insert([
		    		'user_id' => $_SESSION['user']['user_id'], 
				    'stripe_user_id' => $userAccountDtail->stripe_user_id,
				    'stripe_publishable_key' => $userAccountDtail->stripe_publishable_key
				]);
			    $userPayment_setup = DB::table('prk_user_registrations')->where('user_id', $_SESSION['user']['user_id'])->update(['is_payment_setup' => 1]);
			    if ($userPayment_setup) {
			    	$_SESSION['user']['is_payment_setup'] = 1;
			    	return redirect('/user/host');
			    }
		    }
		}


	}

	public function make_payment(Request $request)
	{
		Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
		$amount = DB::table('booking_transactions')->orderBy('txn_id', 'DESC')->first();
		$amount = $amount->amount + $request->finalprice;
		$customer = Stripe\Customer::create(array(
			        	'name' => $request->name,
			            'email' => $_SESSION['user']['email_id'],
			            'source'  => $request->stripeToken
			        ));
		$charge = \Stripe\Charge::create([
			'customer' => $customer->id,
		    'amount' => $request->finalprice * 100,
		    'currency' => 'usd',
		    'description' => 'Test payment from prime space.'
		]);
        if ($charge->status == 'succeeded') {
        	DB::table('booking_transactions')->where('booking_id', $request->booking_id)->update([
														    'amount' => $amount,
														    'status_message' => 'success'
														]); 

        	DB::table('tbl_property_bookings')->where('booking_id', $request->booking_id)->update([
														    'booking_status' => 'approved'
														]); 
        }
        Session::flash('success', 'Payment successful!');
        return redirect('/user/customer');
	}

	public function autoPayToHost()
	{
		$bookings = DB::table('tbl_property_bookings')->join('booking_transactions', 'booking_transactions.booking_id', 'tbl_property_bookings.booking_id')->where('tbl_property_bookings.end_date', '<', date('Y-m-d'))->get();

		foreach ($bookings as $key => $booking) {
			$userAccount = DB::table('connect_stripe_account_for_host')->where('user_id', 19)->first();
			$transferToHost = ($booking->credit/100)*85 ;
			$adminbalance = $booking->amount - $transferToHost;
			Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
			//dd($transferToHost * 100);
			$transfer = \Stripe\Transfer::create([
			  "amount" => $transferToHost * 100,
			  "currency" => "usd",
			  "destination" => $userAccount->stripe_user_id,
			  "transfer_group" => "Host",
			  'description' => 'Test payment transfer from prime space to Host.'
			]);

			if ($transfer) {
				 DB::table('booking_transactions')->insert([            
		          'user_id' => $userAccount->user_id, 
		          'booking_id' => $booking->booking_id,
		          'debit' => $transferToHost,
		          'amount'=> $adminbalance,
		          'status_message' => 'success'
		        ]);
			}
		}
	}
	
}
