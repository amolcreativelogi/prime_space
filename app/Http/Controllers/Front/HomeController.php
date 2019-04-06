<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use DB;

class HomeController extends Controller
{
    public function Login()
    {
    	return view('front.pages.login');
    }

    public function Signup()
    {
    	return view('front.pages.sign_up');
    }


    public function Forgot_password()
    {
    	return view('front.pages.forgot_password');
    }

    public function Allproperty()
    {
    	return view('front.pages.all_property');
    }

     public function Home()
    {
        
        //get modules
        $getModuleCategories = DB::table('tbl_module_manage')
        ->select('module_manage_id','status','module_manage_name')
        ->where([['is_deleted', '=', 0],
                ['status', '=', 1]])->get();

        return view('front.pages.home')->with('getModuleCategories',$getModuleCategories);
    }

   
}
