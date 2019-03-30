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
}
