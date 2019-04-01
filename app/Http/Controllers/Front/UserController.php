<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\URL;
use DB;

class UserController extends Controller
{
    public function userRegistration(Request $request)
    {
    	
		$data = '';
		if($_POST){
			//Check Email id
			$check_email = array('table'=>'prk_user_registrations',
								'field'=>'email_id',
								'where'=>array('email_id' => $_POST['email_id']));
			$res = $this->check_duplicate($check_email);

								
			if($this->check_duplicate($check_email) == true){
				$data = array('status' => false,
						      'response' => array('msg' =>'email ID already exists.'),
							  'url' => '');
			}else{
				$dob = $request->input('dob_year').'-'.$request->input('dob_month').'-'.$request->input('dob_day');
				$data = array(
	    					'firstname'=>$request->input('firstname'),
	    					'lastname'=>$request->input('lastname'),
	    					'email_id'=>$request->input('email_id'),
	    					'password'=>md5($request->input('password')),
	    					'user_type_id'=>$request->input('user_type_id'),
	    					'dob'=>$dob,
	    					'default_user_type'=>$request->input('user_type_id'),
	    					'registration_type'=>1,
	    					'created_by'=>1,
	    					'modified_by'=>1,
	    					 );
			    $result  = DB::table('prk_user_registrations')->insert($data);
				if($result){
					$data = array('status' => true,
								  'response' => array('msg' =>'Registered Successfully.'),'url' => '');
				}
			}
			
		}else{
			$data = array('status' => false,
						  'response' => '','url' => '');	
		};
		echo json_encode($data);
		exit;
	}

	function check_duplicate($array)
	{	

		$res = DB::table($array['table'])->select($array['field'])->where($array['where'])->count();

		// $res = DB::table($array['table'])->select($array['field'])->where('email_id', '=', 'email@gmail.com')->get();
		//dd(DB::getQueryLog());
		// $ci=& get_instance();
	 //    $ci->load->database();
		// //$sql = "select model_action from moderators_per "; 
		// $ci->db->select($array['field']);
		// $ci->db->from($array['table']);
		// $ci->db->where($array['where']);
		// $q = $ci->db->get();
		// $res = $q->row();
		return $res ? true : false; 
	}


	public function userLogin(Request $request)
	{
		$getuserLogin = DB::table('prk_user_registrations')->select('user_id','user_type_id','default_user_type','status')->where('email_id', '=', $request->input('email_id'))->where('password', '=', md5($request->input('password')))->first();
		$array = array();
    	if($getuserLogin)
    	{
    		if($getuserLogin->default_user_type == 2 && $getuserLogin->status == 0)
    		{
    			$data = array('status' => false,
						  'response' =>  array('msg' =>'Your account not activate, please contact administrator.'),'url' => '');	
    		}
    		else
    		{
    		$_SESSION['user']['is_user_login'] = true;
    		$_SESSION['user']['user_id'] = $getuserLogin->user_id;
    		$_SESSION['user']['user_type_id'] = $getuserLogin->user_type_id;
    		$_SESSION['user']['default_user_type'] = $getuserLogin->default_user_type;
    		if($getuserLogin->default_user_type == 2)
    		{
    			$url = URL::to('/user/host');
    		} else {
    			$url = URL::to('/user/customer');
    		}
    	    $data = array('status' => true,
						  'response' => array('msg' =>'Login Successfully.'),'url' => $url);
    		}
    	} else {
    		$data = array('status' => false,
						  'response' =>  array('msg' =>'Invalid login details.'),'url' => '');	
    	}    
    	echo json_encode($data);
		exit;
	}

	//forgot password
	public function resetPassword(Request $request)
	{	
		$getuserDetails = DB::table('prk_user_registrations')->select('user_id','user_type_id','default_user_type','status')->where('email_id', '=', $request->input('email_id'))->first();
		if($getuserDetails)
		{
			//forgot password link send on email
			$data = array('status' => true,
						  'response' =>  array('msg' =>'An email has been sent to the registered email address. Follow the instruction in the email to reset your password.'),'url' => '');	
		}
		else
		{
			$data = array('status' => false,
						  'response' =>  array('msg' =>'Invalid email id.'),'url' => '');	
		}
		echo json_encode($data);
		exit;
	}
}
