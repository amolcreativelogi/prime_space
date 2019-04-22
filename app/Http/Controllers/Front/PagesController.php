<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\URL;
use DB;


class PagesController extends Controller
{
    public function host_faq()
    {
    	return view('front.pages.host_faq');		
	}

	public function faq()
    {
    	return view('front.pages.faq');		
	}

	public function general_faq()
    {
    	return view('front.pages.general_faq');		
	}

	public function payments_faq()
    {
    	return view('front.pages.payments_faq');		
	}

	public function pricing_faq()
    {
    	return view('front.pages.pricing_faq');		
	}

	public function refund_policy()
    {
    	return view('front.pages.refund_policy');		
	}

	public function renter_faq()
    {
    	return view('front.pages.renter_faq');		
	}
    public function notification()
    {
        return view('front.pages.notification');      
    }
    public function messages()
    {
        return view('front.pages.messages');      
    }
    public function accountSetting()
    {
        return view('front.pages.accountSetting');      
    }
    public function refundPolicy()
    {
        return view('front.pages.refundPolicy');      
    }
    public function blogListing()
    {
        return view('front.pages.blogListing');      
    }
    public function singleBlog()
    {
        return view('front.pages.singleBlog');      
    }
    public function aboutUs()
    {
        return view('front.pages.aboutUs');      
    }
    public function terms()
    {
        return view('front.pages.terms');      
    }
}
