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
}
