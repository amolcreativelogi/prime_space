<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
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
				$data = array(
	    					'firstname'=>$request->input('firstname'),
	    					'lastname'=>$request->input('lastname'),
	    					'email_id'=>$request->input('email_id'),
	    					'password'=>md5($request->input('password')),
	    					'user_type_id'=>$request->input('user_type_id'),
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
}
