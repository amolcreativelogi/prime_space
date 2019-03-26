<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests\MasterRequest;

//Priyanka : validation files
use App\Http\Requests\AmenityCategoriesRequest;
use App\Http\Requests\AmenitiesRequest;
use App\Http\Requests\LocationTypeRequest;
use App\Http\Requests\ParkingTypeRequest;
use App\Http\Requests\BookingDurtionTypeRequest;

use DB;

class MasterController extends Controller
{
    public function carTypeExecute()
    {
    	return view('admin.master.car_type_list');
    }

    public function addCarType($car_type_id = NULL)
    {
    	$getCartype = DB::table('prk_car_type')->where('car_type_id', '=', $car_type_id)->first();
    	return view('admin.master.new_car_type')->with('editCarType', $getCartype);
    }

    public function saveCarType(MasterRequest $request)
    {	
    	if(!$request->input('id')) {
    				//Add new record
			    	$duplicateEntry = DB::table('prk_car_type')->where('car_type', '=', $request->input('car_type'))->where('is_deleted', '=', 0)->count();
			    	if($duplicateEntry == 0) {
					    	$data = array(
					    					'car_type'=>$request->input('car_type'),
					    					'status'=>$request->input('status'),
					    					'created_by'=>'1',
					    					'modified_by'=>'1'
					    				 );
					    	$result  = DB::table('prk_car_type')->insert($data);
					    	if($result)
					    	{
					    		return redirect()->back()->withSuccess('Record has been saved successfully');
					    	}
			    	}  else {
 
			    		return redirect()->back()->withWarning('car type already saved');
			    	}
		    } else {
		    		//Update new record
		    		$data = array(
			    					'car_type'=>$request->input('car_type'),
			    					'status'=>$request->input('status'),
			    					'created_by'=>'1',
			    					'modified_by'=>'1'
			    				 );
					$result  = DB::table('prk_car_type')->where('car_type_id', $request->input('id'))->update($data);
			    	if($result)
			    	{
			    		return redirect()->back()->withSuccess('Record has been updated successfully');
			    	} else {
			    		return redirect('admin/carTypeExecute');
			    	}
		    }
    }

    public function getCarType()
    {	
    	$sort = array('car_type','status');
		$myll = $_POST['start'];
		$offset = $_POST['length'];
		if(isset($_POST['order'][0])){
		$orrd = $_POST['order'][0];
		$title=$orrd['column'];
		$order=$orrd['dir'];
		}

		$getCarTotalRecord = DB::table('prk_car_type')->select('car_type','status','car_type_id')->where('is_deleted', '=', 0)->get()->count();

		$query = DB::table('prk_car_type')->select('car_type','status','car_type_id')->where('is_deleted', '=', 0);
		if($_POST['search']['value']) {
	    $query->where('car_type', 'like', '%' .  $_POST['search']['value'] . '%');
		}

		if($offset!= -1) {
		    $query->skip($myll)->take($offset);
		}
		if(isset($order)){
      	  	$query->orderBy($sort[$title], $order);
        }
        else{
       		$query->orderBy('car_type_id','desc');
        }
		$getCarType = $query->get();
	    $data = array();
	    $data = array();
	    $no = $_POST['start'];
	    // $total_rec = array_pop($getCarType);
	    //$total_rec = array_pop($list);
	    $sr = 1;
	    foreach ($getCarType as $carT) {
	      	  $no++;
	          $row = array();
	          //$row[] = $sr++;
	          $row[] = $carT->car_type;
	          $row[] = ($carT->status == 1) ? 'Active' : 'Inactive';
	           $row[] ='<a href="'.url('admin/addCarType/'.$carT->car_type_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$carT->car_type_id.','."'prk_car_type'".','."'car_type_id'".');"><i class="fa fa-trash-o"></i></button>';
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


/*-----------------------------------
   AMENITY CATEGORIES FUNCTIONS
-----------------------------------*/

	/**
	author:Priyanka
	function: amenityCategoriesExecute() 
	It loads listing of categories for amenity
	type:public
	return:Html
	**/
	 public function amenityCategoriesExecute()
    {
    	return view('admin.master.amenity_categories_list');
    }


    /**
	author:Priyanka
	function: addAmenityCategories() 
	It loads add and edit category form
	type:public
	return:array
	**/
	public function addAmenityCategories($amenity_category_id = NULL)
    {
    	//get category details by amenity_category_id and pass to the view
    	$getAmenityCategory = DB::table('prk_amenity_categories')->where('amenity_cat_id', '=', $amenity_category_id)->first();
    	return view('admin.master.new_amenity_category')->with('editAmenityCategory', $getAmenityCategory);
    }

    /**
	author:Priyanka
	function: saveAmenityCategory() 
	This function submits and save amenity category details.
	type:public
	return:text
	**/

	public function saveAmenityCategory(AmenityCategoriesRequest $request)
    {	
    	

		if(!$request->input('id')) {

		 	$duplicateEntry = DB::table('prk_amenity_categories')->where('category_name', '=', $request->input('amenity_category_name'))->where('is_deleted', '=', 0)->count();
			if($duplicateEntry == 0) {
		    		//Add new record
			    	$data = array(
			    					'category_name'=>$request->input('amenity_category_name'),
			    					'status'=>$request->input('status'),
			    					'created_by'=>'1',
			    					'modified_by'=>'1'
			    				 );
			    	$result  = DB::table('prk_amenity_categories')->insert($data);
			    	if($result)
			    	{
			    		return redirect()->back()->withSuccess('Record has been saved successfully');
			    	}
			 }  else {

			    		return redirect()->back()->withWarning('Category already saved');
			 }
					    	
	    } else {
	    		//Update new record
    		$data = array(
	    					'category_name'=>$request->input('amenity_category_name'),
	    					'status'=>$request->input('status'),
	    					'created_by'=>'1',
	    					'modified_by'=>'1'
	    				 );
			$result  = DB::table('prk_amenity_categories')->where('amenity_cat_id', $request->input('id'))->update($data);
	    	if($result)
	    	{
	    		return redirect()->back()->withSuccess('Record has been updated successfully');
	    	} else {
	    		return redirect('admin/amenityCategoriesExecute');
	    	}
	    }   
    }

    public function testJoin()
    {
    	$duplicateEntry = DB::table('tbl_mstr_amenities')->leftJoin('prk_amenity_categories', 'prk_amenity_categories.amenity_cat_id', '=', 'tbl_mstr_amenities.amenity_cat_id')->where('tbl_mstr_amenities.is_deleted', '=', 0)->get();
    	echo '<pre>';
    	print_r($duplicateEntry);
    	exit;
    }


    /**
	author:Priyanka
	function: getAmenityCategories() 
	This function loads category listing.
	type:public
	return:Html
	**/

    public function getAmenityCategories()
    {	
    	$sort = array('category_name','status');
		$myll = $_POST['start'];
		$offset = $_POST['length'];
		if(isset($_POST['order'][0])){
		$orrd = $_POST['order'][0];
		$title=$orrd['column'];
		$order=$orrd['dir'];
		}

		$getAmenityCatTotalRecord = DB::table('prk_amenity_categories')->select('category_name','status','amenity_cat_id')->where('is_deleted', '=', 0)->get()->count();

		$query = DB::table('prk_amenity_categories')->select('category_name','status','amenity_cat_id')->where('is_deleted', '=', 0);
		if($_POST['search']['value']) {
	    $query->where('category_name', 'like', '%' .  $_POST['search']['value'] . '%');
		}

		if($offset!= -1) {
		    $query->skip($myll)->take($offset);
		}
		if(isset($order)){
      	  	$query->orderBy($sort[$title], $order);
        }
        else{
       		$query->orderBy('amenity_cat_id','desc');
        }
		$getAmenityCategories = $query->get();
	    $data = array();
	    $no = $_POST['start'];
	   
	    $sr = 1;
	    foreach ($getAmenityCategories as $amenityCategories) {
	      	  $no++;
	          $row = array();
	          //$row[] = $sr++;
	          $row[] = $amenityCategories->category_name;
	          $row[] = ($amenityCategories->status == 1) ? 'Active' : 'Inactive';
	           $row[] ='<a href="'.url('admin/addAmenityCategories/'.$amenityCategories->amenity_cat_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$amenityCategories->amenity_cat_id.','."'prk_amenity_categories'".','."'amenity_cat_id'".');"><i class="fa fa-trash-o"></i></button>';
	          $data[] = $row;
	        }
	      $output = array(
	                      "draw" => $_POST['draw'],
	                      "recordsTotal" => $getAmenityCatTotalRecord,
	                      "recordsFiltered" => $getAmenityCatTotalRecord,
	                      "data" => $data,
	    );
	    echo json_encode($output);
    }


   
    /*-----------------------------------
   		AMENITY FUNCTIONS
	-----------------------------------*/
    
	/**
	author:Priyanka
	function: amenitiesExecute() 
	It loads listing of categories for amenity
	type:public
	return:Html
	**/

	 public function amenitiesExecute()
    {
    	return view('admin.master.amenities_list');
    }

   	/** author:Priyanka
	function: addAmenity() 
	It loads add and edit amenity form
	type:public
	return:Html
	**/

    public function addAmenity($amenity_id = NULL)
    {
    	$getModuleCategories = DB::table('tbl_module_manage')
    	->select('module_manage_id','status','module_manage_name')
    	->where([['is_deleted', '=', 0],
    			['status', '=', 1]])->get();
    	$getAmenity = DB::table('tbl_mstr_amenities')
    	->where('amenity_id', '=', $amenity_id)->first();
    	return view('admin.master.new_amenity')
    	->with(array('editAmenity' => $getAmenity,
    	'getModuleCategories'=>$getModuleCategories));
    } 


     /**
	author:Priyanka
	function: saveAmenity() 
	This function submits and save amenity details.
	type:public
	return:text
	**/

	public function saveAmenity(AmenitiesRequest $request)
    {	
		 $image = $request->file('amenity_image');
		 if($image)
		 {
		 $imagename = strtolower(trim($request->input('amenity_name'))).'.'.$image->getClientOriginalExtension();
		 $destinationPath = public_path('/images/amenity');
		 $amenities_image = $image->move($destinationPath,$imagename);
		 $image = $imagename;
		 } else {
			$image = $request->input('edit_amenity_image');
		 }
		
		 if(!$request->input('id')) {

		 	//check duplicate entry
    		$duplicateEntry = DB::table('tbl_mstr_amenities')->where('amenity_name', '=', $request->input('amenity_name'))->where('module_manage_id', '=', $request->input('module_manage_id'))->where('is_deleted', '=', 0)->count();

			   if($duplicateEntry == 0) {
		   			//Add new record
			    	$data = array(
			    					'amenity_name'=>$request->input('amenity_name'),
			    					'amenity_image'=>$image,
			    					'module_manage_id'=>$request->input('module_manage_id'),
			    					'status'=>$request->input('status'),
			    					'created_by'=>'1',
			    					'modified_by'=>'1'
			    				 );
			    	$result  = DB::table('tbl_mstr_amenities')->insert($data);
			    	if($result)
			    	{
			    		return redirect()->back()->withSuccess('Record has been saved successfully');
			    	}
			    }  else {

			    	return redirect()->back()->withWarning('Amenity already saved');
				}
					    	
		 } else {
				    		//Update new record
    		$data = array(
	    					'amenity_name'=>$request->input('amenity_name'),
			    			'amenity_image'=>$image,
			    			'module_manage_id'=>$request->input('module_manage_id'),
	    					'status'=>$request->input('status'),
	    					'created_by'=>'1',
	    					'modified_by'=>'1'
	    				 );
			$result  = DB::table('tbl_mstr_amenities')->where('amenity_id', $request->input('id'))->update($data);
	    	if($result)
	    	{
	    		return redirect()->back()->withSuccess('Record has been updated successfully');
	    	} else {
	    		return redirect('admin/amenitiesExecute');
	    	}
		}

		   
    }

    /**
	author:Priyanka
	function: getAmenities() 
	This function list and return the json of amenities .
	type:public
	return:json array
	**/

    public function getAmenities()
    {	
    	$sort = array('module_manage_name','amenity_name','tbl_module_manage.status');
		$myll = $_POST['start'];
		$offset = $_POST['length'];
		if(isset($_POST['order'][0])){
		$orrd = $_POST['order'][0];
		$title=$orrd['column'];
		$order=$orrd['dir'];
		}
 
		$getAmenitiesTotalRecord = DB::table('tbl_mstr_amenities')->select('amenity_name','status','amenity_id')->where('is_deleted', '=', 0)->get()->count();

		$query = DB::table('tbl_mstr_amenities')->select('amenity_name','tbl_mstr_amenities.status','amenity_id','module_manage_name','amenity_image')->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_mstr_amenities.module_manage_id')->where('tbl_mstr_amenities.is_deleted', '=', 0);
		if($_POST['search']['value']) {
	    $query->where('amenity_name', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->orWhere('module_manage_name', 'like', '%' .  $_POST['search']['value'] . '%');
		}

		if($offset!= -1) {
		    $query->skip($myll)->take($offset);
		}
		if(isset($order)){
      	  	$query->orderBy($sort[$title], $order);
        }
        else{
       		$query->orderBy('amenity_id','desc');
        }
		$getAmenities = $query->get();
	    $data = array();
	    $data = array();
	    $no = $_POST['start'];
	   
	    $sr = 1;
	    foreach ($getAmenities as $amenities) {

	    	 if (file_exists(public_path() . '/images/amenity/' . $amenities->amenity_image. '')) {
		        $image = '<img src="'.url('/public/images/amenity/'.$amenities->amenity_image.'').'" width="50">';
		    } else {
		        $image =  '';
		    }  

	      	  $no++;
	          $row = array();
	          //$row[] = $sr++;
	          $row[] = $amenities->module_manage_name;
	          $row[] = $amenities->amenity_name;
	          $row[] = $image;
	          $row[] = ($amenities->status == 1) ? 'Active' : 'Inactive';
	           $row[] ='<a href="'.url('admin/addAmenity/'.$amenities->amenity_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$amenities->amenity_id.','."'tbl_mstr_amenities'".','."'amenity_id'".');"><i class="fa fa-trash-o"></i></button>';
	          $data[] = $row;
	        }
	      $output = array(
	                      "draw" => $_POST['draw'],
	                      "recordsTotal" => $getAmenitiesTotalRecord,
	                      "recordsFiltered" => $getAmenitiesTotalRecord,
	                      "data" => $data,
	    );
	    echo json_encode($output);
    }
    

    /*-----------------------------------
   		LOCATION TYPE FUNCTIONS
	-----------------------------------*/

	/**
	author:Priyanka
	function: locationTypeExecute() 
	It loads listing of location type
	type:public
	return:Html
	**/

	 public function locationTypeExecute()
    {
    	return view('admin.master.location_type_list');
    }


    /** author:Priyanka
	function: addLocationType() 
	It loads add and edit location type form
	type:public
	return:Html
	**/
    public function addLocationType($location_type_id = NULL)
    {
    	$getModuleCategories = DB::table('tbl_module_manage')
    	->select('module_manage_id','status','module_manage_name')
    	->where([['is_deleted', '=', 0],
    			['status', '=', 1]])->get();

    	$getLocationType = DB::table('tbl_mstr_location_type')->where('location_type_id', '=', $location_type_id)->first();
    	return view('admin.master.new_location_type')->with('editLocationType', $getLocationType)->with('getModuleCategories', $getModuleCategories);
    }

     /**
	author:Priyanka
	function: saveLocationType() 
	This function submits and save location details.
	type:public
	return:text
	**/

	public function saveLocationType(LocationTypeRequest $request)
    {	
    	
		 if(!$request->input('id')) {

		    //Add new record

		    $duplicateEntry = DB::table('tbl_mstr_location_type')->where('location_type', '=', $request->input('location_type'))->where('is_deleted', '=', 0)->count();
				if($duplicateEntry == 0) {
			    	$data = array(
		    					'location_type'=>$request->input('location_type'),
		    					'module_manage_id'=>$request->input('module_manage_id'),
		    					'status'=>$request->input('status'),
		    					'created_by'=>'1',
		    					'modified_by'=>'1'
			    				 );
			    	$result  = DB::table('tbl_mstr_location_type')->insert($data);
			    	if($result)
			    	{
			    		return redirect()->back()->withSuccess('Record has been saved successfully');
			    	}
			    }  else {

			    		return redirect()->back()->withWarning('Location type already saved');
				}
					    	
		    } else {
		    		//Update new record
	    		$data = array(
	    					'location_type'=>$request->input('location_type'),
	    					'module_manage_id'=>$request->input('module_manage_id'),
	    					'status'=>$request->input('status'),
	    					'created_by'=>'1',
	    					'modified_by'=>'1'
		    				 );
				$result  = DB::table('tbl_mstr_location_type')->where('location_type_id', $request->input('id'))->update($data);
		    	if($result)
		    	{
		    		return redirect()->back()->withSuccess('Record has been updated successfully');
		    	} else {
		    		return redirect('admin/locationTypeExecute');
		    	}
		    }

		   
    }

    /**
	author:Priyanka
	function: getLocationTypes() 
	This function list and return the json of location types .
	type:public
	return:json array
	**/


     public function getLocationTypes()
    {	
    	$sort = array('module_manage_name','location_type','tbl_mstr_location_type.status');
		$myll = $_POST['start'];
		$offset = $_POST['length'];
		if(isset($_POST['order'][0])){
		$orrd = $_POST['order'][0];
		$title=$orrd['column'];
		$order=$orrd['dir'];
		}

		$getLocationTypeTotalRecord = DB::table('tbl_mstr_location_type')->select('location_type','status','location_type_id')->where('is_deleted', '=', 0)->get()->count();

		$query = DB::table('tbl_mstr_location_type')->select('location_type','tbl_mstr_location_type.status','location_type_id','module_manage_name')->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_mstr_location_type.module_manage_id')->where('tbl_mstr_location_type.is_deleted', '=', 0);
		if($_POST['search']['value']) {
	    $query->where('location_type', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->orWhere('module_manage_name', 'like', '%' .  $_POST['search']['value'] . '%');
		}

		if($offset!= -1) {
		    $query->skip($myll)->take($offset);
		}
		if(isset($order)){
      	  	$query->orderBy($sort[$title], $order);
        }
        else{
       		$query->orderBy('location_type_id','desc');
        }
		$getLocationType = $query->get();
	    $data = array();
	    $data = array();
	    $no = $_POST['start'];
	   
	    $sr = 1;
	    foreach ($getLocationType as $locationType) {
	      	  $no++;
	          $row = array();
	          //$row[] = $sr++;
	          $row[] = $locationType->module_manage_name;
	          $row[] = $locationType->location_type;
	          $row[] = ($locationType->status == 1) ? 'Active' : 'Inactive';
	           $row[] ='<a href="'.url('admin/addLocationType/'.$locationType->location_type_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$locationType->location_type_id.','."'tbl_mstr_location_type'".','."'location_type_id'".');"><i class="fa fa-trash-o"></i></button>';
	          $data[] = $row;
	        }
	      $output = array(
	                      "draw" => $_POST['draw'],
	                      "recordsTotal" => $getLocationTypeTotalRecord,
	                      "recordsFiltered" => $getLocationTypeTotalRecord,
	                      "data" => $data,
	    );
	    echo json_encode($output);
    }



    /*-----------------------------------
   		PARKING TYPE FUNCTIONS
	-----------------------------------*/

	/**
	author:Priyanka
	function: parkingTypeExecute() 
	It loads listing of location type
	type:public
	return:Html
	**/

	 public function parkingTypeExecute()
    {
    	return view('admin.master.parking_type_list');
    }


    /** author:Priyanka
	function: addLocationType() 
	It loads add and edit parking type form
	type:public
	return:Html
	**/
    public function addParkingType($parking_type_id = NULL)
    {
    	$getParkingType = DB::table('prk_parking_type')->where('parking_type_id', '=', $parking_type_id)->first();
    	return view('admin.master.new_parking_type')->with('editParkingType', $getParkingType);
    }

     /**
	author:Priyanka
	function: saveParkingType() 
	This function submits and save parking details.
	type:public
	return:text
	**/

	public function saveParkingType(ParkingTypeRequest $request)
    {	
    	
		 if(!$request->input('id')) {

		    //Add new record

		    $duplicateEntry = DB::table('prk_parking_type')->where('parking_type', '=', $request->input('parking_type'))->where('is_deleted', '=', 0)->count();
				if($duplicateEntry == 0) {
			    	$data = array(
			    					'parking_type'=>$request->input('parking_type'),
			    					'status'=>$request->input('status'),
			    					'created_by'=>'1',
			    					'modified_by'=>'1'
			    				 );
			    	$result  = DB::table('prk_parking_type')->insert($data);
			    	if($result)
			    	{
			    		return redirect()->back()->withSuccess('Record has been saved successfully');
			    	}
			    }  else {

			    		return redirect()->back()->withWarning('Parking type already saved');
				}
					    	
		    } else {
		    		//Update new record
	    		$data = array(
		    					'parking_type'=>$request->input('parking_type'),
		    					'status'=>$request->input('status'),
		    					'created_by'=>'1',
		    					'modified_by'=>'1'
		    				 );
				$result  = DB::table('prk_parking_type')->where('parking_type_id', $request->input('id'))->update($data);
		    	if($result)
		    	{
		    		return redirect()->back()->withSuccess('Record has been updated successfully');
		    	} else {
		    		return redirect('admin/parkingTypeExecute');
		    	}
		    }

		   
    }


    /**
	author:Priyanka
	function: getParkingTypes() 
	This function list and return the json of parking types .
	type:public
	return:json array
	**/


     public function getParkingTypes()
    {	
    	$sort = array('parking_type','status');
		$myll = $_POST['start'];
		$offset = $_POST['length'];
		if(isset($_POST['order'][0])){
		$orrd = $_POST['order'][0];
		$title=$orrd['column'];
		$order=$orrd['dir'];
		}

		$getParkingTypeTotalRecord = DB::table('prk_parking_type')->select('parking_type','status','parking_type_id')->where('is_deleted', '=', 0)->get()->count();

		$query = DB::table('prk_parking_type')->select('parking_type','status','parking_type_id')->where('is_deleted', '=', 0);
		if($_POST['search']['value']) {
	    $query->where('parking_type', 'like', '%' .  $_POST['search']['value'] . '%');
		}

		if($offset!= -1) {
		    $query->skip($myll)->take($offset);
		}
		if(isset($order)){
      	  	$query->orderBy($sort[$title], $order);
        }
        else{
       		$query->orderBy('parking_type_id','desc');
        }
		$getParkingType = $query->get();
	    $data = array();
	    $data = array();
	    $no = $_POST['start'];
	   
	    $sr = 1;
	    foreach ($getParkingType as $parkingType) {
	      	  $no++;
	          $row = array();
	          //$row[] = $sr++;
	          $row[] = $parkingType->parking_type;
	          $row[] = ($parkingType->status == 1) ? 'Active' : 'Inactive';
	           $row[] ='<a href="'.url('admin/addParkingType/'.$parkingType->parking_type_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$parkingType->parking_type_id.','."'prk_parking_type'".','."'parking_type_id'".');"><i class="fa fa-trash-o"></i></button>';
	          $data[] = $row;
	        }
	      $output = array(
	                      "draw" => $_POST['draw'],
	                      "recordsTotal" => $getParkingTypeTotalRecord,
	                      "recordsFiltered" => $getParkingTypeTotalRecord,
	                      "data" => $data,
	    );
	    echo json_encode($output);
    }



     /*-----------------------------------
   		BOOKING DURATION TYPE FUNCTIONS
	 -----------------------------------*/

	/**
	author:Priyanka
	function: bookingDurtionTypeExecute() 
	It loads listing of booking duration type
	type:public
	return:Html
	**/

	 public function bookingDurationTypeExecute()
    {
    	return view('admin.master.booking_duration_type_list');
    }


    /** author:Priyanka
	function: addBookingDurtionType() 
	It loads add and edit booking duration type form
	type:public
	return:Html
	**/
    public function addBookingDurationType($booking_duration_type_id = NULL)
    {
		$getModuleCategories = DB::table('tbl_module_manage')
		    	->select('module_manage_id','status','module_manage_name')
		    	->where([['is_deleted', '=', 0],
		    			['status', '=', 1]])->get();
    	$getBookingDurtionType = DB::table('tbl_mstr_booking_duration_type')->where('duration_type_id', '=', $booking_duration_type_id)->first();
    	return view('admin.master.new_booking_duration_type')->with('editBookingDurtionType', $getBookingDurtionType)->with('getModuleCategories', $getModuleCategories);
    }

     /**
	author:Priyanka
	function: saveBookingDurationType() 
	This function submits and save booking duration type details.
	type:public
	return:text
	**/

	public function saveBookingDurationType(BookingDurtionTypeRequest $request)
    {	
    	
		 if(!$request->input('id')) {

		    //Add new record

		    $duplicateEntry = DB::table('tbl_mstr_booking_duration_type')->where('duration_type', '=', $request->input('booking_duration_type'))->where('is_deleted', '=', 0)->count();
				if($duplicateEntry == 0) {
			    	$data = array(
			    					'duration_type'=>$request->input('booking_duration_type'),
			    					'module_manage_id'=>$request->input('module_manage_id'),
			    					'status'=>$request->input('status'),
			    					'created_by'=>'1',
			    					'modified_by'=>'1'
			    				 );
			    	$result  = DB::table('tbl_mstr_booking_duration_type')->insert($data);
			    	if($result)
			    	{
			    		return redirect()->back()->withSuccess('Record has been saved successfully');
			    	}
			    }  else {

			    		return redirect()->back()->withWarning('Booking duration type already saved');
				}
					    	
		    } else {
		    		//Update new record
	    		$data = array(
		    					'duration_type'=>$request->input('booking_duration_type'),
		    					'module_manage_id'=>$request->input('module_manage_id'),
		    					'status'=>$request->input('status'),
		    					'created_by'=>'1',
		    					'modified_by'=>'1'
		    				 );
				$result  = DB::table('tbl_mstr_booking_duration_type')->where('duration_type_id', $request->input('id'))->update($data);
		    	if($result)
		    	{
		    		return redirect()->back()->withSuccess('Record has been updated successfully');
		    	} else {
		    		return redirect('admin/bookingDurationTypeExecute');
		    	}
		    }
    }

    /**
	author:Priyanka
	function: getBookingDurationTypes() 
	This function list and return the json of booking duration types .
	type:public
	return:json array
	**/
    public function getBookingDurationTypes()
    {	
    	$sort = array('module_manage_name','booking_duration_type','tbl_mstr_booking_duration_type.status');
		$myll = $_POST['start'];
		$offset = $_POST['length'];
		if(isset($_POST['order'][0])){
		$orrd = $_POST['order'][0];
		$title=$orrd['column'];
		$order=$orrd['dir'];
		}

		$getBookingDurTypeTotalRecord = DB::table('tbl_mstr_booking_duration_type')->select('duration_type','tbl_mstr_booking_duration_type.status','duration_type_id')->where('is_deleted', '=', 0)->get()->count();

		$query = DB::table('tbl_mstr_booking_duration_type')->select('duration_type','tbl_mstr_booking_duration_type.status','duration_type_id','module_manage_name')->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_mstr_booking_duration_type.module_manage_id')->where('tbl_mstr_booking_duration_type.is_deleted', '=', 0);
		if($_POST['search']['value']) {
	    $query->where('duration_type', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->orWhere('module_manage_name', 'like', '%' .  $_POST['search']['value'] . '%');
		}

		if($offset!= -1) {
		    $query->skip($myll)->take($offset);
		}
		if(isset($order)){
      	  	$query->orderBy($sort[$title], $order);
        }
        else{
       		$query->orderBy('duration_type_id','desc');
        }
		$getBookingDurType = $query->get();
	    $data = array();
	    $data = array();
	    $no = $_POST['start'];
	  
	    $sr = 1;
	    foreach ($getBookingDurType as $bookingDurType) {
	      	  $no++;
	          $row = array();
	          //$row[] = $sr++;
	          $row[] = $bookingDurType->module_manage_name;
	          $row[] = $bookingDurType->duration_type;
	          $row[] = ($bookingDurType->status == 1) ? 'Active' : 'Inactive';
	           $row[] ='<a href="'.url('admin/addBookingDurationType/'.$bookingDurType->duration_type_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$bookingDurType->duration_type_id.','."'tbl_mstr_booking_duration_type'".','."'duration_type_id'".');"><i class="fa fa-trash-o"></i></button>';
	          $data[] = $row;
	        }
	      $output = array(
	                      "draw" => $_POST['draw'],
	                      "recordsTotal" => $getBookingDurTypeTotalRecord,
	                      "recordsFiltered" => $getBookingDurTypeTotalRecord,
	                      "data" => $data,
	    );
	    echo json_encode($output);
    }







    

}
