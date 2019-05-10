<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

//Priyanka : validation files

use App\Http\Requests\AssignRolesRequest;
use DB;

class RolesAndPermissions extends Controller
{
	//load roles page
	public function assign_roles($id=NULL)
    {	
    	//get admin types
    	$admin_types_list= DB::table('tbl_admin_types')->select('admin_type_id','admin_type')->where(['is_deleted'=>0,'status'=>1])->where('admin_type_id','!=','1')->get();
    	//get all roles
    	$roles = DB::table('tbl_main_roles as mroles')->
	    select('mroles.main_role_id','sroles.sub_role_id','mroles.action_name as mainaction','sroles.action_name as subaction','croles.action_name as childaction','mroles.main_module_name','sroles.sub_module_name','croles.child_module_name','croles.child_role_id','croles.route_url')->
	    join('tbl_sub_roles AS sroles', 'sroles.main_role_id', '=', 'mroles.main_role_id')->
	    join('tbl_child_roles AS croles', 'croles.sub_role_id', '=', 'sroles.sub_role_id')->
	    get();

	    //get assigned role to admin
	    $editRoles = DB::table('tbl_assigned_roles')->
	    select('tbl_assigned_roles.id','role_id','tbl_assigned_roles.admin_type_id','tbl_admin_types.admin_type')
	    ->leftJoin('tbl_admin_types','tbl_admin_types.admin_type_id','=','tbl_assigned_roles.admin_type_id')
	    ->where('tbl_admin_types.admin_type_id','!=','1')
	    ->where(['tbl_assigned_roles.is_deleted'=>0,'tbl_assigned_roles.status'=>1,'tbl_assigned_roles.id'=>$id])->
	    first();

	    //print_r($editRoles);die;

        $arrRoles=array();

	    foreach ($roles as $key => $value) {

	    	$arrRoles[$value->main_role_id.'_'.$value->main_module_name][$value->sub_role_id.'_'.$value->sub_module_name][]=
	    	array('role_id'=>$value->child_role_id,'action'=>$value->childaction,'route_url'=>$value->route_url,'child_module_name'=>$value->child_module_name

	    	);
	    	# code...
	    }
	    
    	return view('admin.roles_permissions.assignRoles')->with(['admin_types_list'=>$admin_types_list,'arrRoles'=>$arrRoles,'editRoles'=>$editRoles]);
    	exit;
    }

   // save assigned roles to admin user
    public function saveAssignedRoles(AssignRolesRequest $request){
    	
       //add functionality
    	$data=array();
    	if(!$request->input('id')){
    		
    		//get duplicate records
		    $duplicateEntry = DB::table('tbl_assigned_roles')->
		    where(['is_deleted'=>0,'status'=>1,'admin_type_id'=>$request->input('admin_types')])->count();

		    if($duplicateEntry == 0){
		    	//if roles not checked
		    	if(empty($request->input('role_id'))){
    				return redirect()->back()->withWarning('Roles should be checked');
    			}

	    		//admin type id
	    		$data['admin_type_id']=($request->input('admin_types'));
	    		//create comma separated string of roles
	    		$data['role_id']="";
	    		if(!empty($request->input('role_id'))){

	    			$data['role_id']=implode(',', $request->input('role_id'));
	    			//$data['main_role_id']=implode(',', $request->input('main_role_id'));
	    			//$data['sub_role_id']=implode(',', $request->input('sub_role_id'));
	    			
	    		}

	    		if(!empty($data)){
	    			$data['status']=1;
	    			$data['is_deleted']=0;
	    		    $data['created_by']=$_SESSION['admin_login_id'];
	    		    $data['modified_by']=$_SESSION['admin_login_id'];

	    		    $insert=DB::table('tbl_assigned_roles')->insert($data);

	    		    if($insert){
	    		    	 return redirect()->back()->withSuccess('Roles have been assigned successfully');	
	    		    }else{
	    		    	 return redirect()->back()->withSuccess('No changes has been done');
	    		    }
	    		}else{
	    			return redirect()->back()->withWarning('Details should be filled');
	    		}
	    	}else{
	    		return redirect()->back()->withWarning('Roles are already assigned');
	    	}


    	}else{ //edit functionality


    		//admin type id
    		$id=($request->input('id'));
    	   //get duplicate records
		    $duplicateEntry = DB::table('tbl_assigned_roles')->
		    where(['is_deleted'=>0,'status'=>1])->where('id','!=',$id)
		    ->where('admin_type_id','==',$request->input('admin_types'))
		    ->count();
		   
		    if($duplicateEntry == 0){

	    		//create comma separated string of roles
	    		$data['role_id']="";
	    		if(!empty($request->input('role_id'))){

	    			$data['role_id']=implode(',', $request->input('role_id'));
	    		}

	    		if(!empty($data)){

	    			//if roles not checked
			    	if(empty($request->input('role_id'))){
	    				return redirect()->back()->withWarning('Roles should be checked');
	    			}
	    			
	    		    $data['created_by']=$_SESSION['admin_login_id'];
	    		    $data['modified_by']=$_SESSION['admin_login_id'];

	    		    $update=DB::table('tbl_assigned_roles')->where(['is_deleted'=>0,'status'=>1,'id'=>$id])->update($data);

	    		    if($update){
	    		    	 return redirect()->back()->withSuccess('Roles have been updated successfully');	
	    		    }else{
	    		    	 return redirect()->back()->withSuccess('No changes has been done');
	    		    }
	    		}else{
	    			return redirect()->back()->withWarning('Details should be filled');
	    		}
	    	}else{
	    			return redirect()->back()->withWarning('Roles are already assigned');
	    	}


    	}

    	//tbl_assigned_roles
    	//print_r($_POST);die;
    }


    //get unauthorized roles to admin 

    public function getUnauthorizedRoles($admin_login_id=NULL,$use_in=NULL,$sub_module_name=NULL){

    	//get admin details
    	!empty($admin_login_id)?$admin_login_id:$_SESSION['admin_login_id'];

    	$getAdminDetails = DB::table('tbl_admin_login')
    	->select('tbl_admin_login.admin_login_id','tbl_admin_types.admin_type','tbl_admin_types.admin_type_id')
    	->leftjoin('tbl_admin_types', 'tbl_admin_types.admin_type_id', '=', 'tbl_admin_login.admin_type_id')
    	->where(['tbl_admin_types.status'=>1,'tbl_admin_types.is_deleted'=>0])
    	->where(['tbl_admin_login.status'=>1,'tbl_admin_login.is_deleted'=>0])
    	->where(['tbl_admin_login.admin_login_id'=>$admin_login_id])->first();
      //print_r($getAdminDetails);die;
    	//get unauthorized routes

    	$arrUnauthorizedRoles=array();
    	if(!empty($getAdminDetails) && ($getAdminDetails->admin_type_id == 1)){ //main admin
    		//show all menus
    		$unauthorizedRoles=array();
    		$arrUnauthorizedRoles = ($use_in=='footer')?json_encode($unauthorizedRoles):$unauthorizedRoles;
    	}else if(!empty($getAdminDetails) && ($getAdminDetails->admin_type_id != 1)){//not main admin

    		$admin_type_id = $getAdminDetails->admin_type_id;
    		//get roles
    		$getAdminRoles = DB::table('tbl_assigned_roles')
	    	->select('tbl_assigned_roles.role_id')
	    	->where(['tbl_assigned_roles.is_deleted'=>0,'tbl_assigned_roles.status'=>1])
	    	->where(['tbl_assigned_roles.admin_type_id'=>$admin_type_id])->first();

		    	if($use_in == 'footer'){//ajax call 

		    		if(isset($getAdminRoles->role_id) && !empty($getAdminRoles->role_id)){
		    		  $unauthorizedRoles = DB::table('tbl_child_roles')->select('child_role_id','action_name','route_url')->whereRaw('child_role_id NOT IN('.$getAdminRoles->role_id.')')->where(['is_deleted'=>0,'status'=>1])->whereRaw('action_name IN("list","add","update_sequence")')->get();

		    		//not assigned main role names
		    		$notAssignedMenus = 
		    		DB::table('tbl_main_roles')->select('main_module_key')->whereRaw('main_role_id  NOT IN(
		    				SELECT main_role_id FROM tbl_sub_roles WHERE sub_role_id IN
		    				(
		        				select sub_role_id from tbl_child_roles where child_role_id in('.$getAdminRoles->role_id.') and is_deleted=0 and status =1
		    				)
						)')->where(['is_deleted'=>0,'status'=>1])->get();


		    		

		    		}else{
		    			  $unauthorizedRoles=array();
		    			  $notAssignedMenus = 
		    		DB::table('tbl_main_roles')->select('main_module_key')->whereRaw('main_role_id  IN(
		    				SELECT main_role_id FROM tbl_sub_roles WHERE sub_role_id IN
		    				(
		        				select sub_role_id from tbl_child_roles where is_deleted=0 and status =1
		    				)
						)')->where(['is_deleted'=>0,'status'=>1])->get();
		    		}

		    		$arrUnauthorizedRoles=array('notAssignedMenus'=>$notAssignedMenus,
		    	    'notAssignedActions'=>$unauthorizedRoles);
		    		$arrUnauthorizedRoles = json_encode($arrUnauthorizedRoles);

		    	}else{ //controller call to hide datatable buttons edit/delete

			    	if(isset($getAdminRoles->role_id) && !empty($getAdminRoles->role_id)){
			    		$unauthorizedRoles = DB::table('tbl_child_roles as croles')->
			    		select(DB::raw("(GROUP_CONCAT(croles.action_name)) as `action_name`"))
			    		
			    		->join('tbl_sub_roles AS sroles', 'croles.sub_role_id', '=', 'sroles.sub_role_id')
			    		->join('tbl_main_roles AS mroles', 'sroles.main_role_id', '=', 'mroles.main_role_id')
			    		->where(['croles.is_deleted'=>0,'croles.status'=>1])->whereRaw('croles.child_role_id IN('.$getAdminRoles->role_id.') and croles.action_name IN("view","edit","delete","update_sequence")')->where('sroles.sub_module_key',$sub_module_name)->first();
			    		if(!empty($unauthorizedRoles)){
			    			$arrUnauthorizedRoles=explode(',',$unauthorizedRoles->action_name);

			    		}
			    	}
			    }
	    	}else{
	    		 $unauthorizedRoles=array();
	    			  $notAssignedMenus = 
	    		DB::table('tbl_main_roles')->select('main_module_key')->whereRaw('main_role_id  IN(
	    				SELECT main_role_id FROM tbl_sub_roles WHERE sub_role_id IN
	    				(
	        				select sub_role_id from tbl_child_roles where is_deleted=0 and status =1
	    				)
					)')->where(['is_deleted'=>0,'status'=>1])->get();
	    		

	    		$arrUnauthorizedRoles=array('notAssignedMenus'=>$notAssignedMenus,
	    	    'notAssignedActions'=>$unauthorizedRoles);

	    		$arrUnauthorizedRoles = ($use_in=='footer')?json_encode($arrUnauthorizedRoles):$unauthorizedRoles;
	    	}
    	///print_r($arrUnauthorizedRoles);die;
        return $arrUnauthorizedRoles;
        
    }

    //get admin roles list
    public function index(){
    	return view('admin.roles_permissions.index');
    }

    //get admin roles list
    public function getAdminRoles(){

    	$sort = array('admin_type','status');
		$myll = $_POST['start'];
		$offset = $_POST['length'];
		if(isset($_POST['order'][0])){
		$orrd = $_POST['order'][0];
		$title=$orrd['column'];
		$order=$orrd['dir'];
		}

		$getAdminRolesTotalRecord =$query = DB::table('tbl_admin_types')
    	->select('tbl_assigned_roles.id','tbl_assigned_roles.role_id','tbl_admin_types.admin_type','tbl_admin_types.admin_type_id')
    	->join('tbl_assigned_roles','tbl_assigned_roles.admin_type_id', '=', 'tbl_admin_types.admin_type_id')
    	->where('tbl_admin_types.admin_type_id','!=','1')
    	->where(['tbl_admin_types.is_deleted'=>0,'tbl_admin_types.status'=>1,'tbl_assigned_roles.is_deleted'=>0,'tbl_assigned_roles.status'=>1])->get()->count();


    	//get roles by admin type
    	$query = DB::table('tbl_admin_types')
    	->select('tbl_assigned_roles.id','tbl_assigned_roles.role_id','tbl_admin_types.admin_type','tbl_admin_types.admin_type_id')
    	->join('tbl_assigned_roles','tbl_assigned_roles.admin_type_id', '=', 'tbl_admin_types.admin_type_id')
    	->where('tbl_admin_types.admin_type_id','!=','1')
    	->where(['tbl_admin_types.is_deleted'=>0,'tbl_admin_types.status'=>1,'tbl_assigned_roles.is_deleted'=>0,'tbl_assigned_roles.status'=>1]);

		if($_POST['search']['value']) {
	    $query->where('tbl_admin_types.admin_type', 'like', '%' .  $_POST['search']['value'] . '%');
		}

		if($offset!= -1) {
		    $query->skip($myll)->take($offset);
		}
		if(isset($order)){
      	  	$query->orderBy($sort[$title], $order);
        }
        else{
       		$query->orderBy('tbl_assigned_roles.id','desc');
        }
		$getAdminTypesWithRoles = $query->get();
		
	    $data = array();
	    $data = array();
	    $no = $_POST['start'];
	    // $total_rec = array_pop($getCarType);
	    //$total_rec = array_pop($list);
	    $sr = 1;

	     foreach ($getAdminTypesWithRoles as $adminRoles) {
	      	  $no++;
	          $row = array();
	          //$row[] = $sr++;
	          $row[] = $adminRoles->admin_type;

	          $roles = DB::table('tbl_child_roles as croles')->
	    		 select('mroles.action_name as mainaction','sroles.action_name as subaction','croles.action_name as childaction','mroles.main_module_name','sroles.sub_module_name','croles.child_module_name','croles.child_role_id','croles.route_url')
	    		
	    		->join('tbl_sub_roles AS sroles', 'croles.sub_role_id', '=', 'sroles.sub_role_id')
	    		->join('tbl_main_roles AS mroles', 'sroles.main_role_id', '=', 'mroles.main_role_id')
	    		->where(['croles.is_deleted'=>0,'croles.status'=>1])->whereRaw('croles.child_role_id IN('.$adminRoles->role_id.')')->get();

	    		$arrRoles=array();

	    		if(!empty($roles)){

				    foreach ($roles as $key => $value) {

				    	$arrRoles[$value->main_module_name][$value->sub_module_name][]=
				    	array('role_id'=>$value->child_role_id,'action'=>$value->childaction,'route_url'=>$value->route_url,'child_module_name'=>$value->child_module_name

				    	);
				    	# code...
				    }
			    }

			    $roleTree ='<ul class="treeview">';
	    		 	foreach($arrRoles as $main_module => $subroles){
                         
                     $roleTree .= '<li class="last"><label for="short" class="custom-unchecked"><b>'.$main_module.'</b></label>';
                      foreach($subroles as $sub_module =>$childroles){
	                     $roleTree .='<ul><li><label for="tall-1" class="custom-unchecked">'.$sub_module.'</label>';
	                     	foreach($childroles as $child_module =>$values){
                                        
                                $roleTree .='<ul><li>
                                  <label for="tall-2-1" class="custom-unchecked">'.$values['child_module_name'].'</label>';
                                  $roleTree .='</li>
                                 </ul>';
                            }
	                                        
	                     $roleTree .='</li></ul>';
	                    }
                     $roleTree .='</li>';
                    }

                 $roleTree .='</ul>';
	    		 $row[]=$roleTree;

	    		  /**check assigned roles and permission for  loggedin user and restrict edit delete access**/
	           $unauthorizedRoles =$this->getUnauthorizedRoles($_SESSION['admin_login_id'],'controller','roles');
         		
	          //create edit delete buttons if roles are assigned else not
         	 
	          if(!empty($unauthorizedRoles)){
	          	 $editButton="";
	             $deleteButton="";
		          if(in_array('edit',$unauthorizedRoles)){
		          $editButton ='<a href="'.url('admin/roles/assign_roles/'.$adminRoles->id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  ';
		          }
		           if(in_array('delete',$unauthorizedRoles)){ 
		           $deleteButton ='<button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$adminRoles->id.','."'tbl_assigned_roles'".','."'id'".');"><i class="fa fa-trash-o"></i></button>';
		           }

		           if( !empty($editButton) || !empty($deleteButton)){

		           		$button = $editButton.$deleteButton;
		           }else{
		           	    $button = '-';
		           }
		           $row[] = $button;
		       
		     }else{
		     	$row[] ='<a href="'.url('admin/roles/assign_roles/'.$adminRoles->id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$adminRoles->id.','."'tbl_assigned_roles'".','."'id'".');"><i class="fa fa-trash-o"></i></button>';
		     }

	          

	           /**end roles check**/
	    		/* $row[] ='<a href="'.url('admin/roles/assign_roles/'.$adminRoles->id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$adminRoles->id.','."'tbl_assigned_roles'".','."'id'".');"><i class="fa fa-trash-o"></i></button>';*/

	          $data[] = $row;
	        }

	         $output = array(
	                      "draw" => $_POST['draw'],
	                      "recordsTotal" => $getAdminRolesTotalRecord,
	                      "recordsFiltered" => $getAdminRolesTotalRecord,
	                      "data" => $data,
	    );
	    echo json_encode($output);
    }



 public static function getAuthorizedRoles($adminLoginId){

 	!empty($adminLoginId)?$adminLoginId:$_SESSION['admin_login_id'];
 	$arrAuthorizedRoles=array();
    $roles = array();

 	if($adminLoginId){

    	$getAdminDetails = DB::table('tbl_admin_login')
    	->select('tbl_admin_login.admin_login_id','tbl_admin_types.admin_type','tbl_admin_types.admin_type_id')
    	->leftjoin('tbl_admin_types', 'tbl_admin_types.admin_type_id', '=', 'tbl_admin_login.admin_type_id')
    	->where(['tbl_admin_types.status'=>1,'tbl_admin_types.is_deleted'=>0])
    	->where(['tbl_admin_login.status'=>1,'tbl_admin_login.is_deleted'=>0])
    	->where(['tbl_admin_login.admin_login_id'=>$adminLoginId])->first();

      //print_r($getAdminDetails);die;
    	//get unauthorized routes
    	
    	if(!empty($getAdminDetails) && ($getAdminDetails->admin_type_id != 1)){//not main admin

    		$admin_type_id = $getAdminDetails->admin_type_id;
    		//get roles
    		$getAdminRoles = DB::table('tbl_assigned_roles')
	    	->select('tbl_assigned_roles.role_id')
	    	->where(['tbl_assigned_roles.is_deleted'=>0,'tbl_assigned_roles.status'=>1])
	    	->where(['tbl_assigned_roles.admin_type_id'=>$admin_type_id])->first();

	    	//if roles are assigned
		    	if(isset($getAdminRoles->role_id) && !empty($getAdminRoles->role_id)){

			    	//get all roles
			    	$roles = DB::table('tbl_main_roles as mroles')->
				    select('mroles.main_role_id','sroles.sub_role_id','mroles.action_name as mainaction','sroles.action_name as subaction','mroles.main_module_name','sroles.sub_module_name','sroles.route_url')->
				    join('tbl_sub_roles AS sroles', 'sroles.main_role_id', '=', 'mroles.main_role_id')
				    ->where(['mroles.is_deleted'=>0,'mroles.status'=>1])
				    ->where(['sroles.is_deleted'=>0,'sroles.status'=>1])
				    ->whereRaw('sroles.sub_role_id IN (select sub_role_id from tbl_child_roles where child_role_id in('.$getAdminRoles->role_id.') and is_deleted=0 and status =1)')
				    ->get();
			 	}//else no left menu will display in header

			  
	    }else{
	    		 
	    		 	//get all roles
		    	$roles = DB::table('tbl_main_roles as mroles')->
			    select('mroles.main_role_id','sroles.sub_role_id','mroles.action_name as mainaction','sroles.action_name as subaction','mroles.main_module_name','sroles.sub_module_name','sroles.route_url')->
			    join('tbl_sub_roles AS sroles', 'sroles.main_role_id', '=', 'mroles.main_role_id')
			    ->where(['mroles.is_deleted'=>0,'mroles.status'=>1])
			    ->where(['sroles.is_deleted'=>0,'sroles.status'=>1])
			    ->get();
	    		

	    		
	    }

 	}
 	//print_r($editRoles);die;
 	
	foreach ($roles as $key => $value) {

		$arrAuthorizedRoles[$value->main_module_name][]=
		array('route_url'=>$value->route_url,'sub_module_name'=>$value->sub_module_name

		);
		# code...
	}
 	return $arrAuthorizedRoles;

 }
    

}
