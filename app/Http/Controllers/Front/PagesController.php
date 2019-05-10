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
         $getCategory = DB::table('tbl_mstr_faq_categories')->where('category_id', '=', 27)->where('is_deleted', '=', 0)->first();

        $getFAQ = DB::table('tbl_faqs')
        ->select(
            'tbl_faqs.faq_id as faqid',
            'question',
            'answer',
            'sequence',
            'tbl_faqs.status',
            'tbl_faqs.is_deleted'
            )
         ->leftJoin('tbl_faq_sequence', 'tbl_faqs.faq_id', '=', 'tbl_faq_sequence.faq_id')
         ->where('tbl_faqs.category_id', '=', 27)
         ->where('tbl_faqs.status', '=', 1)
         ->where('tbl_faqs.is_deleted', '=', 0)
         ->orderBy('sequence', 'ASC')
         ->get();

        return view('front.pages.host_faq')->with(['getCategory'=>$getCategory->category_name,'getFAQ'=>$getFAQ]);
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
        $getCategory = DB::table('tbl_mstr_faq_categories')->where('category_id', '=', 29)->where('is_deleted', '=', 0)->first();

        $getFAQ = DB::table('tbl_faqs')
        ->select(
            'tbl_faqs.faq_id as faqid',
            'question',
            'answer',
            'sequence',
            'tbl_faqs.status',
            'tbl_faqs.is_deleted'
            )
         ->leftJoin('tbl_faq_sequence', 'tbl_faqs.faq_id', '=', 'tbl_faq_sequence.faq_id')
         ->where('tbl_faqs.category_id', '=', 29)
         ->where('tbl_faqs.status', '=', 1)
         ->where('tbl_faqs.is_deleted', '=', 0)
         ->orderBy('sequence', 'ASC')
         ->get();

    	return view('front.pages.renter_faq')->with(['getCategory'=>$getCategory->category_name,'getFAQ'=>$getFAQ]);		
	}
    public function notification()
    {
        return view('front.pages.notification');      
    }
    public function messages()
    {
        return view('front.pages.messages');      
    }
    // public function accountSetting()
    // {
    //     return view('front.pages.accountSetting');      
    // }
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

    public function ondemand_parking()
    {
        return view('front.pages.ondemand_parking');      
    }

}
