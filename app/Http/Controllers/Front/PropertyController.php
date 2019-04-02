<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use DB;

//validation file
use App\Http\Requests\frontend\PropertyRequest;

class PropertyController extends Controller
{
    public function addProperty($module_manage_id = NULL)
    {
    	
    	$getModuleCategories = DB::table('tbl_module_manage')
    	->select('module_manage_id','status','module_manage_name')
    	->where([['is_deleted', '=', 0],
    			['status', '=', 1]])->get();
    	return view('front.property.add_property')->with('getModuleCategories', $getModuleCategories);
    	
    }

     public function getPropertyMasters()
    {
    	$module_manage_id = 2;//$_POST['module_manage_id'];
    	echo json_encode($module_manage_id);
    	die;
    	/*$getLocationTypes = DB::table('tbl_mstr_location_type')
    	->select('module_manage_id','status','location_type')
    	->where([['is_deleted', '=', 0],
    			['status', '=', 1]])->get();

    	echo json_decode($getLocationTypes);*/
    	//return view('front.property.add_property')->with('getModuleCategories', $getModuleCategories)->with('getLocationTypes', $getLocationTypes);
    	
    }

    public function saveProperty(PropertyRequest $request)
    {
    	
    	$getModuleCategories = DB::table('tbl_module_manage')
    	->select('module_manage_id','status','module_manage_name')
    	->where([['is_deleted', '=', 0],
    			['status', '=', 1]])->get();
    	return redirect()->back()->withSuccess('Record has been updated successfully');
    	//return view('front.property.add_property')->with('getModuleCategories', $getModuleCategories);
    	
    }
   
}
