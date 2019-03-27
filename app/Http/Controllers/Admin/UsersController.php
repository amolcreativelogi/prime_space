<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

use App\Mail\SendMailable;

use DB;

class UsersController extends Controller
{
    public function Host_Users()
    {
    	return view('admin.master.Host_Users');
    }


 //    public function mail()
	// {
	//    $name = 'Krunal';
	//    \Mail::to('amolkharate.wwg@gmail.com.com')->send(new SendMailable($name));
	//    return 'Email was sent';
	// }

    public function getUserandHost()
    {
    	$sort = array('firstname','lastname');
		$myll = $_POST['start'];
		$offset = $_POST['length'];
		if(isset($_POST['order'][0])){
		$orrd = $_POST['order'][0];
		$title=$orrd['column'];
		$order=$orrd['dir'];
		}

		$getCarTotalRecord = DB::table('prk_user_registrations')->select('firstname','lastname','email_id','user_id')->where('is_deleted', '=', 0)->get()->count();

		$query = DB::table('prk_user_registrations')->select('firstname','lastname','email_id','user_id','user_type_id')->where('is_deleted', '=', 0);
		if($_POST['search']['value']) {
	    $query->where('firstname', 'like', '%' .  $_POST['search']['value'] . '%');
		}

		if($offset!= -1) {
		    $query->skip($myll)->take($offset);
		}
		if(isset($order)){
      	  	$query->orderBy($sort[$title], $order);
        }
        else{
       		$query->orderBy('user_id','desc');
        }
		$getUsers = $query->get();
	    $data = array();
	    $data = array();
	    $no = $_POST['start'];
	    // $total_rec = array_pop($getCarType);
	    //$total_rec = array_pop($list);
	    $sr = 1;
	    foreach ($getUsers as $carT) {
	      	  $no++;
	          $row = array();
	          //$row[] = $sr++;
	           $row[] = $carT->firstname;
	           $row[] = $carT->lastname;
	           $row[] = $carT->email_id;
	           $row[] = ($carT->user_type_id == 2) ? 'Customer' : 'Host';
	           $row[] ='<a href="'.url('admin/viewUsersProfile/'.$carT->user_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="View Profile"><i class="fa fa-eye"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$carT->user_id.','."'prk_car_type'".','."'car_type_id'".');"><i class="fa fa-trash-o"></i></button>';
	          $data[] = $row;
	        }
	      $output = array(
	                      "draw" => $_POST['draw'],
	                      "recordsTotal" => $getCarTotalRecord,
	                      "recordsFiltered" => $getCarTotalRecord,
	                      "data" => $data,
	    );
	    echo json_encode($output);
    }

    public function viewUsersProfile($user_id = null)
    {
    	$user_profile = DB::table('prk_user_registrations')->where('user_id', '=', $user_id)->where('is_deleted', '=', 0)->first();
    	return view('admin.users.users_view_profile')->with('user_profile', $user_profile);
    }
}
