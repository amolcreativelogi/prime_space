<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Session;
use DB;


class MainController extends Controller
{
    //

    public function checkLogin(Request $request)
    {
    	$this->validate($request,[
    		'email' => 'required|email',
    		'password' => 'required'
    	]);
    	$user_data = array('email' => $request->post('email'),
    					   'password' => $request->post('password'));

    	$getadminLogin = DB::table('tbl_admin_login')->where('email', '=', $request->post('email'))->where('password', '=', md5($request->post('password')))->first();

    	$array = array();
    	if($getadminLogin)
    	{
    		$_SESSION['is_admin_login'] = true;
    		$_SESSION['admin_login_id'] = $getadminLogin->admin_login_id;
    	    $array = array('code'=>200);
    		//return redirect('admin/dashboard');
    	} else {
    		$array = array('code'=>100);
    		//return redirect()->back()->withWarning('wrong credential.');
    	}    
    	echo json_encode($array);
    	exit;
    }

    public function adminLogout()
    {
    	// session_unset('is_admin_login');
    	// session_unset('admin_login_id');
    	session_destroy();
    	return redirect('admin');
    	exit;
    }


    public function checkLoginT()
    {

    	//session_start();
    	//$_SESSION['test'] = 'ss';
  	  	//$request->session()->put('progress', '5%');
  		//Session::put('progress', '5%');
		// Session::save();
    	//$value = session('key', 'default');
    	//$request->session()->put('email', 'amol@gmail.com');
    	//$data =  $_SESSION['test'];
    	// $data = Session::all();
    	//echo '<pre>';
    	
    	// echo Hash::make('amol');
    	// if(Auth::attept($user_data))
    	// {
    	// 	echo 'success';
    	// }
    	// else
    	// {
    	// 	echo 'success';
    	// }
    	// print_r($user_data);
    	print_r(Session::all());
    	exit;
    }

    

}
