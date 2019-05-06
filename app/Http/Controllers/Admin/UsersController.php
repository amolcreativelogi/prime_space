<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

use App\Mail\SendMailable;

use DB;
use App\Http\Controllers\Admin\RolesAndPermissions;


class UsersController extends Controller
{

	
	//roles
    private $objRolesPermissions;
    public function __construct(RolesAndPermissions $objRolesPermissions)
    {
        $this->objRolesPermissions = $objRolesPermissions;
       

       
    }
	public function Hosts()
    {
    	return view('admin.users.list_hosts');
    }


     public function getHost()
    {
    	$sort = array('firstname','lastname');
		$myll = $_POST['start'];
		$offset = $_POST['length'];
		if(isset($_POST['order'][0])){
		$orrd = $_POST['order'][0];
		$title=$orrd['column'];
		$order=$orrd['dir'];
		}

		$getCarTotalRecord = DB::table('prk_user_registrations')->select('firstname','lastname','email_id','user_id','is_deleted')->where('default_user_type', '=', 2)->orWhere('user_type_id', '=', 5)->where('is_deleted', '=', 0)->get()->count();

		$query = DB::table('prk_user_registrations')->select('firstname','lastname','email_id','user_id','user_type_id','is_deleted');
		if($_POST['search']['value'] && $_POST['search']['value'] != 'clear') {
	    $query->where('firstname', 'like', '%' .  $_POST['search']['value'] . '%');
		$query->orWhere('lastname', 'like', '%' .  $_POST['search']['value'] . '%');
		$query->orWhere('email_id', 'like', '%' .  $_POST['search']['value'] . '%');
		}
		$query->where('default_user_type', '=', 2);
		//$query->orWhere('user_type_id', '=', 5);
		$query->where('is_deleted', '=', 0);
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
	           $row[] = $this->getUseType($carT->user_type_id);

	           /**check assigned roles and permission for  loggedin user and restrict edit delete access**/
             $unauthorizedRoles =$this->objRolesPermissions->getUnauthorizedRoles($_SESSION['admin_login_id'],'controller','host_list');
            
            //create edit delete buttons if roles are assigned else not

            if(!empty($unauthorizedRoles) && in_array('view',$unauthorizedRoles)){
            $viewButton ='<a href="'.url('admin/viewUsersProfile/'.$carT->user_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="View Profile"><i class="fa fa-eye"></i></a>  ';
            }
              if(!empty($unauthorizedRoles) && in_array('delete',$unauthorizedRoles)){ 
             $deleteButton ='<button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord_hostuser('.$carT->user_id.','."'prk_user_registrations'".','."'user_id'".');"><i class="fa fa-trash-o"></i></button>';
             }

            if(!empty($unauthorizedRoles)){ 
	            $viewButton="";
	            $deleteButton="";

	            if(in_array('view',$unauthorizedRoles)){
	            $viewButton ='<a href="'.url('admin/viewUsersProfile/'.$carT->user_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="View Profile"><i class="fa fa-eye"></i></a>  ';
	            }
	              if(in_array('delete',$unauthorizedRoles)){ 
	             $deleteButton ='<button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$carT->user_id.','."'prk_user_registrations'".','."'user_id'".');"><i class="fa fa-trash-o"></i></button>';
	             }

	             if( !empty($viewButton) || !empty($deleteButton)){

	                $button = $viewButton.$deleteButton;
	             }else{
	                  $button = '-';
	             }

	             $row[] = $button;
	         }else{
	         	$row[] ='<a href="'.url('admin/viewUsersProfile/'.$carT->user_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="View Profile"><i class="fa fa-eye"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$carT->user_id.','."'prk_user_registrations'".','."'user_id'".');"><i class="fa fa-trash-o"></i></button>';

	         }

             /**end roles check**/

	          /* $row[] ='<a href="'.url('admin/viewUsersProfile/'.$carT->user_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="View Profile"><i class="fa fa-eye"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$carT->user_id.','."'prk_user_registrations'".','."'user_id'".');"><i class="fa fa-trash-o"></i></button>';*/
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


	public function Users()
    {
    	return view('admin.users.list_user');
    }

    public function getUser()
    {
    	$sort = array('firstname','lastname');
		$myll = $_POST['start'];
		$offset = $_POST['length'];
		if(isset($_POST['order'][0])){
		$orrd = $_POST['order'][0];
		$title=$orrd['column'];
		$order=$orrd['dir'];
		}

		$getCarTotalRecord = DB::table('prk_user_registrations')->select('firstname','lastname','email_id','user_id','is_deleted')->where('default_user_type', '=', 3)->orWhere('user_type_id', '=', 5)->where('is_deleted', '=', 0)->get()->count();

		$query = DB::table('prk_user_registrations')->select('firstname','lastname','email_id','user_id','user_type_id','is_deleted');
		if($_POST['search']['value'] && $_POST['search']['value'] != 'clear') {
		$query->where('firstname', 'like', '%' .  $_POST['search']['value'] . '%');
		$query->orWhere('lastname', 'like', '%' .  $_POST['search']['value'] . '%');
		$query->orWhere('email_id', 'like', '%' .  $_POST['search']['value'] . '%');
		}
		//$query->orWhere('user_type_id', '=', 5);
		$query->where('default_user_type', '=', 3);
		$query->where('is_deleted', '=', 0);	
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
	           $row[] = $this->getUseType($carT->user_type_id);
	           $row[] ='<a href="'.url('admin/viewUsersProfile/'.$carT->user_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="View Profile"><i class="fa fa-eye"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$carT->user_id.','."'prk_user_registrations'".','."'user_id'".');"><i class="fa fa-trash-o"></i></button>';
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


 
    public function getUseType($userType)
    {
    	switch ($userType) {
		    case 2:
		       return 'Host';
		        break;
		    case 3:
		       return  'Customer';
		        break;
		    case 5:
		        return 'Host & Customer';
		        break;
		} 
    }

    public function Host_Users()
    {
    	return view('admin.users.list_user_and_host');
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

		$getCarTotalRecord = DB::table('prk_user_registrations')->select('firstname','lastname','email_id','user_id','is_deleted')->where('is_deleted', '=', 0)->get()->count();

		$query = DB::table('prk_user_registrations')->select('firstname','lastname','email_id','user_id','user_type_id','is_deleted');
		if($_POST['search']['value'] && $_POST['search']['value'] != 'clear') {
 	    $query->where('firstname', 'like', '%' .  $_POST['search']['value'] . '%');
		$query->orWhere('lastname', 'like', '%' .  $_POST['search']['value'] . '%');
		$query->orWhere('email_id', 'like', '%' .  $_POST['search']['value'] . '%');
		}
		$query->where('is_deleted', '=', 0);	
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
	           $row[] = $this->getUseType($carT->user_type_id);
	           $row[] ='<a href="'.url('admin/viewUsersProfile/'.$carT->user_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="View Profile"><i class="fa fa-eye"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$carT->user_id.','."'prk_user_registrations'".','."'user_id'".');"><i class="fa fa-trash-o"></i></button>';
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

    public function AssignPermission(Request $request)
    {
    	$data = array(
					 'user_type_id'=>$request->input('user_type_id'),
					 );
		$result  = DB::table('prk_user_registrations')->where('user_id', $request->input('profileId'))->update($data);
		if($result)
		{
			echo 200;
		} else {
			echo 100;
		}
    	exit;
    }
} 
