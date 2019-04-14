<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\URL;
use DB;

use Mail; 

class UserController extends Controller
{

    public function userRegistration(Request $request)
    {		

    	// print_r($_POST);
    	// exit;
		$data = '';
		if($_POST){
			//Check Email id
			$check_email = array('table'=>'prk_user_registrations',
								'field'=>'email_id,is_deleted',
								'where'=>array('email_id' => $_POST['email_id'],'is_deleted' => 0));

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
	    					'status'=>($request->input('user_type_id') == 2) ? 1 : 1,
	    					'registration_type'=>1,
	    					'created_by'=>1,
	    					'modified_by'=>1,
	    					 );
			    $result  = DB::table('prk_user_registrations')->insert($data);
				if($result){

					$data = array('status' => true,
								  'response' => array('msg' =>'Registered Successfully.'),'url' => '');

					// if($request->input('user_type_id') == 2)
					// {
					// 		$data = array('status' => true,
					// 		'response' => array('msg' =>'Thank you for applying for host to our site. We will review your details and send you an email letting you know whether your application has been successful or not.'),'url' => '');
				
					// }
					// else
					// {
					// 	$data = array('status' => true,
					// 			  'response' => array('msg' =>'Registered Successfully.'),'url' => '');
					// }
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
	
		$getuserLogin = DB::table('prk_user_registrations')->select('user_id','user_type_id','default_user_type','status','firstname','is_deleted')->where('is_deleted', '=', 0)->where('email_id', '=', $request->input('email_id'))->where('password', '=', md5($request->input('password')))->first();
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
    		$_SESSION['user']['firstname'] = $getuserLogin->firstname;
    		$_SESSION['user']['user_id'] = $getuserLogin->user_id;
    		$_SESSION['user']['user_type_id'] = $getuserLogin->user_type_id;
    		$_SESSION['user']['default_user_type'] = $getuserLogin->default_user_type;
    		if($getuserLogin->default_user_type == 2)
    		{
    			$_SESSION['user']['user_type_permission'] = 'host';
    			$url = URL::to('/user/host');
    		} else {
    			$_SESSION['user']['user_type_permission'] = 'customer';
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

	public function userlogout()
	{
		session_destroy();
		return redirect('/');
	}

	public function switchtocustomer()
	{
		$_SESSION['user']['user_type_permission'] = 'customer';
		return redirect('/user/customer');
	}

	public function switchtohost()
	{
		$_SESSION['user']['user_type_permission'] = 'host';
		return redirect('/user/host');	
	}

	public function emailSend()
	{	
		$data = array('name'=>'amol kharate','body'=>'Test Email');
		echo  \Mail::send('emails.mail', $data, function ($m){
            $m->from('info@prymestory.com', 'Pryme Story');
            $m->to('amolkharate.wwg@gmail.com', 'Amol')->subject('you have successfully registered with prymestory.com');
        });
		exit;
	}

	public function editprofile($userId)
	{	
		$getuserDetails = DB::table('prk_user_registrations')->select('*')->where('user_id', '=', $userId)->first();

		return view('front.pages.update_profile')->with(['userdetails'=>$getuserDetails]);
	}

	public function updatesaveprofile(Request $request)
	{
		$data = array(
					'firstname'=>$request->input('firstname'),
					'lastname'=>$request->input('lastname'),
					'contact_no'=>$request->input('contact_no'),
					'address'=>$request->input('address'),
					'zipcode'=>$request->input('zipcode'),
					'city'=>$request->input('city'),
					'user_latitude'=>$request->input('latitude'),
					'user_longitude'=>$request->input('longitude')
    				 );

		$result  = DB::table('prk_user_registrations')->where('user_id', $request->input('user_id'))->update($data);


		if($result)
		{
			//forgot password link send on email
			$data = array('status' => true,
						  'response' =>  array('msg' =>'Your profile has been updated successfully.'),'url' => '');	
		}
		else
		{
			$data = array('status' => false,
						  'response' =>  array('msg' =>'Your profile not has been updated.'),'url' => '');	
		}
		echo json_encode($data);
		exit;
	}
}
