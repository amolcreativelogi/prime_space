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
	    select('mroles.action_name as mainaction','sroles.action_name as subaction','croles.action_name as childaction','mroles.main_module_name','sroles.sub_module_name','croles.child_module_name','croles.child_role_id','croles.route_url')->
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

	    	$arrRoles[$value->main_module_name][$value->sub_module_name][]=
	    	array('role_id'=>$value->child_role_id,'action'=>$value->childaction,'route_url'=>$value->route_url,'child_module_name'=>$value->child_module_name

	    	);
	    	# code...
	    }
	   //  print_r($arrRoles);

    	return view('admin.roles_permissions.assignRoles')->with(['admin_types_list'=>$admin_types_list,'arrRoles'=>$arrRoles,'editRoles'=>$editRoles]);
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
    	//$admin_login_id = 2;

    	$getAdminRoles = DB::table('tbl_assigned_roles')
    	->select('tbl_assigned_roles.role_id')
    	->join('tbl_admin_types', 'tbl_admin_types.admin_type_id', '=', 'tbl_assigned_roles.admin_type_id')
    	->join('tbl_admin_login', 'tbl_admin_login.admin_type_id', '=', 'tbl_admin_types.admin_type_id')
    	 ->where('tbl_admin_types.admin_type_id','!=','1')
    	->where(['tbl_assigned_roles.is_deleted'=>0,'tbl_assigned_roles.status'=>1])
    	->where(['tbl_admin_login.admin_login_id'=>$admin_login_id])->first();

    	//get unauthorized routes
    	$arrUnauthorizedRoles=array();
    	if(isset($getAdminRoles->role_id) && !empty($getAdminRoles->role_id)){

    		if($use_in == 'footer'){
	    		$unauthorizedRoles = DB::table('tbl_child_roles')->select('child_role_id','action_name','route_url')->whereRaw('child_role_id NOT IN('.$getAdminRoles->role_id.')')->where(['is_deleted'=>0,'status'=>1])->whereRaw('action_name IN("list","add","update_sequence")')->get();
	    	 	$arrUnauthorizedRoles = json_encode($unauthorizedRoles);
	    	}else{


	    		$unauthorizedRoles = DB::table('tbl_child_roles as croles')->
	    		select(DB::raw("(GROUP_CONCAT(croles.action_name)) as `action_name`"),)
	    		
	    		->join('tbl_sub_roles AS sroles', 'croles.sub_role_id', '=', 'sroles.sub_role_id')
	    		->join('tbl_main_roles AS mroles', 'sroles.main_role_id', '=', 'mroles.main_role_id')
	    		->where(['croles.is_deleted'=>0,'croles.status'=>1])->whereRaw('croles.child_role_id IN('.$getAdminRoles->role_id.') and croles.action_name IN("view","edit","delete","update_sequence")')->where('sroles.sub_module_key',$sub_module_name)->first();
	    		if(!empty($unauthorizedRoles)){
	    			$arrUnauthorizedRoles=explode(',',$unauthorizedRoles->action_name);

	    		}
	    	    

	    	}


	     }
         //print_r($unauthorizedRoles);die;	
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
	    		 $row[] ='<a href="'.url('admin/roles/assign_roles/'.$adminRoles->id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$adminRoles->id.','."'tbl_assigned_roles'".','."'id'".');"><i class="fa fa-trash-o"></i></button>';

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




    	/*//get admin roles
    	$arrAdminRoles=array();
    	if(!empty($getAdminRoles)){

    	 foreach ($getAdminRoles as $key => $roles) {

    	 	$roleList = DB::table('tbl_child_roles as croles')->
	    		 select('mroles.action_name as mainaction','sroles.action_name as subaction','croles.action_name as childaction','mroles.main_module_name','sroles.sub_module_name','croles.child_module_name','croles.child_role_id','croles.route_url')
	    		
	    		->join('tbl_sub_roles AS sroles', 'croles.sub_role_id', '=', 'sroles.sub_role_id')
	    		->join('tbl_main_roles AS mroles', 'sroles.main_role_id', '=', 'mroles.main_role_id')
	    		->where(['croles.is_deleted'=>0,'croles.status'=>1])->whereRaw('croles.child_role_id IN('.$roles->role_id.')')->get();

	    	$arrAdminRoles[$roles->]=array();

    	 	print_r($roleList);
    	 	# code...
    	 }*/
    		
    	//}

   //}

    /*public function getLandList()
    {
    	$sort = array('name','status');
		$myll = $_POST['start'];
		$offset = $_POST['length'];
		if(isset($_POST['order'][0])){
		$orrd = $_POST['order'][0];
		$title=$orrd['column'];
		$order=$orrd['dir'];
		}

		$getCarTotalRecord = DB::table('lnd_add_property')->select('property_id','name','location','lnd_add_property.status')->where('is_deleted', '=', 0)->get()->count();

		$query = DB::table('lnd_add_property')->select('lnd_add_property.created_at','firstname','lastname','property_id','name','location','lnd_add_property.status')->leftJoin('prk_user_registrations', 'prk_user_registrations.user_id', '=', 'lnd_add_property.user_id')->where('lnd_add_property.is_deleted', '=', 0);
		if($_POST['search']['value']  && $_POST['search']['value'] != 'clear') {
	    $query->where('name', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->orWhere('location', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->orWhere('firstname', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->orWhere('lastname', 'like', '%' .  $_POST['search']['value'] . '%');
		}

		if($offset!= -1) {
		    $query->skip($myll)->take($offset);
		}
		if(isset($order)){
      	  	$query->orderBy($sort[$title], $order);
        }
        else{
       		$query->orderBy('property_id','desc');
        }
		$getLandList = $query->get();
	    $data = array();
	    $data = array();
	    $no = $_POST['start'];
	    // $total_rec = array_pop($getCarType);
	    //$total_rec = array_pop($list);
	    $sr = 1;
	    foreach ($getLandList as $pList) {
	      	  $no++;
	          $row = array();
	          //$row[] = $sr++;
	          $row[] = $pList->name;
	          $row[] = $pList->location;
	          $row[] = $pList->firstname.' '.$pList->lastname;
	          $row[] = $pList->created_at;
	          $row[] = ($pList->status == 1) ? 'Active' : 'Inactive';
	          $row[] ='<a href="'.url('admin/addCarType/'.$pList->property_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-eye"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$pList->property_id.','."'prk_add_property'".','."'property_id'".');"><i class="fa fa-trash-o"></i></button>';
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
*/





   /* public function landTypeExecute()
    {
    	return view('admin.master.land_type_list');
    }

    public function addLandType($land_type_id = NULL)
    {
    	$getLandType = DB::table('lnd_land_type')->where('land_type_id', '=', $land_type_id)->first();
    	return view('admin.master.new_land_type')->with('editLandType', $getLandType);
    }

    public function saveLandType(LandTypeRequest $request)
    {	
    	if(!$request->input('id')) {
    				//Add new record
			    	$duplicateEntry = DB::table('lnd_land_type')->where('land_type', '=', $request->input('land_type'))->where('is_deleted', '=', 0)->count();
			    	if($duplicateEntry == 0) {
					    	$data = array(
					    					'land_type'=>$request->input('land_type'),
					    					'status'=>$request->input('status'),
					    					'created_by'=>'1',
					    					'modified_by'=>'1'
					    				 );
					    	$result  = DB::table('lnd_land_type')->insert($data);
					    	if($result)
					    	{
					    		return redirect()->back()->withSuccess('Record has been saved successfully');
					    	}
			    	}  else {
 
			    		return redirect()->back()->withWarning('Land type already saved');
			    	}
		    } else {

		    	$duplicateEntry = DB::table('lnd_land_type')->where('land_type', '=', $request->input('land_type'))->where('is_deleted', '=', 0)->where('land_type_id', '!=', $request->input('id'))->count();
				    if($duplicateEntry == 0) {
			    		//Update new record
			    		$data = array(
				    					'land_type'=>$request->input('land_type'),
				    					'status'=>$request->input('status'),
				    					'created_by'=>'1',
				    					'modified_by'=>'1'
				    				 );
						$result  = DB::table('lnd_land_type')->where('land_type_id', $request->input('id'))->update($data);
				    	if($result)
				    	{
				    		return redirect()->back()->withSuccess('Record has been updated successfully');
				    	} else {
				    		return redirect('admin/landTypeExecute');
				    	}

					}else {
 
			    		return redirect()->back()->withWarning('Land type already saved');
			    	}		    }
    }

    public function getLandTypes()
    {	
    	$sort = array('land_type','status');
		$myll = $_POST['start'];
		$offset = $_POST['length'];
		if(isset($_POST['order'][0])){
		$orrd = $_POST['order'][0];
		$title=$orrd['column'];
		$order=$orrd['dir'];
		}

		$getLandTotalRecord = DB::table('lnd_land_type')->select('land_type','status','land_type_id')->where('is_deleted', '=', 0)->get()->count();

		$query = DB::table('lnd_land_type')->select('land_type','status','land_type_id')->where('is_deleted', '=', 0);
		if($_POST['search']['value']) {
	    $query->where('land_type', 'like', '%' .  $_POST['search']['value'] . '%');
		}

		if($offset!= -1) {
		    $query->skip($myll)->take($offset);
		}
		if(isset($order)){
      	  	$query->orderBy($sort[$title], $order);
        }
        else{
       		$query->orderBy('land_type_id','desc');
        }
		$getLandTypes = $query->get();
	    $data = array();
	    $data = array();
	    $no = $_POST['start'];
	    
	    $sr = 1;
	    foreach ($getLandTypes as $landTypes) {
	      	  $no++;
	          $row = array();
	          //$row[] = $sr++;
	          $row[] = $landTypes->land_type;
	          $row[] = ($landTypes->status == 1) ? 'Active' : 'Inactive';
	           $row[] ='<a href="'.url('admin/addLandType/'.$landTypes->land_type_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$landTypes->land_type_id.','."'lnd_land_type'".','."'land_type_id'".');"><i class="fa fa-trash-o"></i></button>';
	          $data[] = $row;
	        }
	      $output = array(
	                      "draw" => $_POST['draw'],
	                      "recordsTotal" => $getLandTotalRecord,
	                      "recordsFiltered" => $getLandTotalRecord,
	                      "data" => $data,
	    );
	    echo json_encode($output);
    }

    


    function DeteteRecord()
	{
	  	$data = array('is_deleted'=>1);
	  	$deleteRecord  = DB::table($_POST['table'])->where($_POST['dbid'], $_POST['id'])->update($data);
	    if($deleteRecord)
	    {
	        echo '{"code":"200"}';
	    }
	    else
	    {
	        echo '{"code":"100"}';
	    }
	}
*/


public function myRecursiveFunction($parent_role_id=Null) {

   $mainroles = DB::table('tbl_roles')->
	    select('*')->where('parent_role_id',$parent_role_id)->get();

   

    
	
/*
  // (do the required processing...)
  $arrRoles=array();
  if (count($mainroles) == 0) {

    // end the recursion
    return;

  } else {



  	foreach ($mainroles as $key => $value) {
  		// continue the recursion
    	$arrRoles[$value->parent_role_id][$value->role_id]=array('menu_label'=> $value->menu_label,
	    			'role_id'=> $value->role_id,'parent_role_id'=> $value->parent_role_id);

		# code...
		$this->myRecursiveFunction($value->role_id);
	}
    
  }
  print_r($arrRoles);*/

 }
    

}
