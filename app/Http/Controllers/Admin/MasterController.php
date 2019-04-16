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
use App\Http\Requests\DocumentTypeRequest;
use App\Http\Requests\UnitTypeRequest;
use App\Http\Requests\CancellationTypeRequest;
use App\Http\Requests\CancellationPoliciesRequest;
use App\Http\Requests\LandTypeRequest;



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
 
			    		return redirect()->back()->withWarning('Car type already exists');
			    	}
		    } else {
		    		$duplicateEntry = DB::table('prk_car_type')->where('car_type', '=', $request->input('car_type'))->where('is_deleted', '=', 0)->where('car_type_id', '!=', $request->input('id'))->count();
				    if($duplicateEntry == 0) {
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
				    }  else {
 
			    		return redirect()->back()->withWarning('Car type already exists');
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

    
/*-----------------------------------
   DELETE FUNCTIONS
-----------------------------------*/

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


	 function DeleteRecordWithChild()
	{
	  	$data = array('is_deleted'=>1);
	  	$isDeleteChild = $_POST['isDeleteChild'];
	  	$deleteRecord  = DB::table($_POST['parentTable'])->where($_POST['dbid'], $_POST['id'])->update($data);

	    if($deleteRecord)
	    {
	    	$deleteDeleteChild  = DB::table($_POST['childTable'])->where($_POST['dbid'], $_POST['id'])->update($data);

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

    	$getAmenity = [];
    	$module_manage_ids = [];

    	if(!is_null($amenity_id)){
    	$getAmenity = DB::table('tbl_mstr_amenities')->select('tbl_mstr_amenities.amenity_name',
			'tbl_mstr_amenities.status','tbl_mstr_amenities.amenity_image',
			'tbl_mstr_amenities.amenity_id',
			DB::raw("(GROUP_CONCAT(tbl_module_manage.module_manage_id)) as `module_ids`"),
			
			DB::raw("(GROUP_CONCAT(module_manage_name)) as `modules`")
		)
		 ->leftJoin('tbl_mstr_amenities_with_category', 'tbl_mstr_amenities_with_category.amenity_id', '=', 'tbl_mstr_amenities.amenity_id')
		 ->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_mstr_amenities_with_category.module_manage_id')->where('tbl_mstr_amenities.is_deleted', '=', 0)
		 ->groupBy('tbl_mstr_amenities.amenity_id','tbl_mstr_amenities.amenity_name','tbl_mstr_amenities.status','tbl_mstr_amenities.amenity_image')
		 ->where('tbl_mstr_amenities.amenity_id', '=', $amenity_id)->first();

		//format module ids from string to array
		 
		 if(!empty($getAmenity->module_ids)){
			 $module_manage_ids = explode(',', $getAmenity->module_ids);
		  }

		 }

    	/*$getAmenity = DB::table('tbl_mstr_amenities')
    	->where('amenity_id', '=', $amenity_id)->first();*/
    	return view('admin.master.new_amenity')
    	->with(array(
    	'editAmenity' => $getAmenity,
    	'getModuleCategories'=>$getModuleCategories,
    	'module_manage_ids'=>$module_manage_ids));
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
 		
 		//store amenity image
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

		 //get categories id
		 $module_categories = $request->input('module_manage_id');
		
		if(!$request->input('id')) {

		 	//check duplicate entries for amenity
			$duplicateEntry = DB::table('tbl_mstr_amenities')->where('amenity_name', '=', $request->input('amenity_name'))->where('is_deleted', '=', 0)->count();

			if($duplicateEntry != 0) {

			    	return redirect()->back()->withWarning('Amenity already exists');

			}else{    
				//Store ameniy details
				$amenity_details= array(
    					'amenity_name'=>$request->input('amenity_name'),
    					'amenity_image'=>$image,
    					'status'=>$request->input('status'),
    					'created_by'=>'1',
    					'modified_by'=>'1'
    				 );


				$amenity_id  = DB::table('tbl_mstr_amenities')->insertGetId($amenity_details);
				    //$amenity_id = $saveAmenity->insertGetId();
				   	
				 $data =[];
				   	foreach($module_categories as $module_category){
					   		//Add new record
					   	if(!empty($module_category)){
					   		
						    	$data[] = array(
						    					'amenity_id'=>$amenity_id,
						    					'module_manage_id'=>$module_category,
						    					'status'=>$request->input('status'),
						    					'created_by'=>'1',
						    					'modified_by'=>'1'
						    				 );

					    }

				   	}
				   
				   	if(!empty($data)){
				   		$result  = DB::table('tbl_mstr_amenities_with_category')->insert($data);
				   	}
		   			
			    	if(isset($result))
			    	{
			    		return redirect()->back()->withSuccess('Record has been saved successfully');
			    	}
				    
			}

					    	
		} else { //EDIT FUNCTIONALITY
		 	
		 	//check duplicate entries for amenity
			$duplicateEntry = DB::table('tbl_mstr_amenities')->where('amenity_name', '=', $request->input('amenity_name'))->where('amenity_id', '!=', $request->input('id'))->where('is_deleted', '=', 0)->count();

			if($duplicateEntry == 0) {

				//Store ameniy details
				$amenity_details= array(
    					'amenity_name'=>$request->input('amenity_name'),
    					'amenity_image'=>$image,
    					'status'=>$request->input('status'),
    					'created_by'=>'1',
    					'modified_by'=>'1'
    				 );

				$result  = DB::table('tbl_mstr_amenities')->where('amenity_id', $request->input('id'))->update($amenity_details);

				//delete old entries 
				$isDeletedAmenityCat = DB::table('tbl_mstr_amenities_with_category')->where('amenity_id', $request->input('id'))
				//->whereIn('module_manage_id', $module_categories)
				->delete();

				$data =[];

				//if deleted old records then save new
				if($isDeletedAmenityCat){
					
				   	foreach($module_categories as $module_category){
					   		//Add new record
					   	if(!empty($module_category)){
						    	$data[] = array(
				    					'amenity_id'=>$request->input('id'),
				    					'module_manage_id'=>$module_category,
				    					'status'=>$request->input('status'),
				    					'created_by'=>'1',
				    					'modified_by'=>'1'
				    				 );

					    }
					    

				   	}

				   	if(!empty($data)){
				   		$insertAmenityCat  = DB::table('tbl_mstr_amenities_with_category')->insert($data);
				   	}
		   			
			    	if(isset($insertAmenityCat))
			    	{
			    		return redirect()->back()->withSuccess('Record has been saved successfully');
			    	}
				    
				}

			} else {

				return redirect()->back()->withWarning('Amenity already exists');
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
 		
 		//get total amenties
		$getAmenitiesTotalRecord = DB::table('tbl_mstr_amenities')->select('tbl_mstr_amenities.amenity_name','tbl_mstr_amenities.status','tbl_mstr_amenities.amenity_id')->where('is_deleted', '=', 0)->get()->count();

		//get amenities with its modules
		$query = DB::table('tbl_mstr_amenities')->select('tbl_mstr_amenities.amenity_name',
			'tbl_mstr_amenities.status','tbl_mstr_amenities.amenity_image',
			'tbl_mstr_amenities.amenity_id',
			DB::raw("(GROUP_CONCAT(tbl_module_manage.module_manage_id)) as `module_ids`"),
			
			DB::raw("(GROUP_CONCAT(module_manage_name)) as `modules`")
		)
		 ->leftJoin('tbl_mstr_amenities_with_category', 'tbl_mstr_amenities_with_category.amenity_id', '=', 'tbl_mstr_amenities.amenity_id')
		 ->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_mstr_amenities_with_category.module_manage_id')->where('tbl_mstr_amenities.is_deleted', '=', 0)
		 ->groupBy('tbl_mstr_amenities.amenity_id','tbl_mstr_amenities.amenity_name','tbl_mstr_amenities.status','tbl_mstr_amenities.amenity_image');

		if($_POST['search']['value'] && $_POST['search']['value'] != 'clear') {
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

	    	 if (isset($amenities->amenity_image) && file_exists(public_path() . '/images/amenity/' . $amenities->amenity_image. '')) {
		        $image = '<a target="_blank" href="'.url('/public/images/amenity/'.$amenities->amenity_image.'').'"><img src="'.url('/public/images/amenity/'.$amenities->amenity_image.'').'" width="50"></a>';
		    } else {
		        $image =  'No Image';
		    }  

	      	  $no++;
	          $row = array();
	          //$row[] = $sr++;
	          $row[] = $amenities->modules;
	          $row[] = $amenities->amenity_name;
	          $row[] = $image;
	          $row[] = ($amenities->status == 1) ? 'Active' : 'Inactive';
	           $row[] ='<a href="'.url('admin/addAmenity/'.$amenities->amenity_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete" onclick="DeleteRecordWithChild('.$amenities->amenity_id.','."'tbl_mstr_amenities'".','."'amenity_id'".','."'1'".','."'tbl_mstr_amenities_with_category'".');"><i class="fa fa-trash-o"></i></button>';
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
		 	//check duplicate entry
		    $duplicateEntry = DB::table('tbl_mstr_location_type')->where('location_type', '=', $request->input('location_type'))->where('module_manage_id', '=', $request->input('module_manage_id'))->where('is_deleted', '=', 0)->count();
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

			    		return redirect()->back()->withWarning('Location type already exists');
				}
					    	
		    } else {

		    	//check duplicate entry
		    	$duplicateEntry = DB::table('tbl_mstr_location_type')->where('location_type', '=', $request->input('location_type'))->where('module_manage_id', '=', $request->input('module_manage_id'))->where('location_type_id', '!=', $request->input('id'))->where('is_deleted', '=', 0)->count();
				if($duplicateEntry == 0) {
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
			     }  else {

			    		return redirect()->back()->withWarning('Location type already exists');
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

			    		return redirect()->back()->withWarning('Parking type already exists');
				}
					    	
		    } else {

		    	 $duplicateEntry = DB::table('prk_parking_type')->where('parking_type', '=', $request->input('parking_type'))->where('parking_type_id', '!=', $request->input('id'))->where('is_deleted', '=', 0)->count();
		    	
				    if($duplicateEntry == 0) {
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
				    }  else {

			    		return redirect()->back()->withWarning('Parking type already exists');
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
		
    	//get modulelist
		$getModuleCategories = DB::table('tbl_module_manage')
		    	->select('module_manage_id','status','module_manage_name')
		    	->where([['is_deleted', '=', 0],
		    			['status', '=', 1]])->get();

		//get booking duration type list as per its modules
		$getBookingDurtionType = [];
    	$module_manage_ids = [];

    	if(!is_null($booking_duration_type_id)){
    	$getBookingDurtionType = DB::table('tbl_mstr_booking_duration_type')->select('tbl_mstr_booking_duration_type.duration_type',
			'tbl_mstr_booking_duration_type.status',
			'tbl_mstr_booking_duration_type.duration_type_id',
			DB::raw("(GROUP_CONCAT(tbl_module_manage.module_manage_id)) as `module_ids`"),
			
			DB::raw("(GROUP_CONCAT(module_manage_name)) as `modules`")
		)
		 ->leftJoin('tbl_mstr_booking_duration_type_with_module', 'tbl_mstr_booking_duration_type_with_module.duration_type_id', '=', 'tbl_mstr_booking_duration_type.duration_type_id')
		 ->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_mstr_booking_duration_type_with_module.module_manage_id')->where('tbl_mstr_booking_duration_type.is_deleted', '=', 0)
		 ->groupBy('tbl_mstr_booking_duration_type.duration_type_id','tbl_mstr_booking_duration_type.duration_type','tbl_mstr_booking_duration_type.status')
		 ->where('tbl_mstr_booking_duration_type.duration_type_id', '=', $booking_duration_type_id)->first();

		//format module ids from string to array
		 
		 if(!empty($getBookingDurtionType->module_ids)){
			 $module_manage_ids = explode(',', $getBookingDurtionType->module_ids);
		  }

		 }
		
    	return view('admin.master.new_booking_duration_type')
    	->with(array(
    	'editBookingDurtionType' => $getBookingDurtionType,
    	'getModuleCategories'=>$getModuleCategories,
    	'module_manage_ids'=>$module_manage_ids));
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
 		
 		
		 //get categories id
		 $module_categories = $request->input('module_manage_id');
		
		if(!$request->input('id')) {

		 	//check duplicate entries for amenity
			$duplicateEntry = DB::table('tbl_mstr_booking_duration_type')->where('duration_type', '=', $request->input('booking_duration_type'))->where('is_deleted', '=', 0)->count();

			if($duplicateEntry != 0) {

			    	return redirect()->back()->withWarning('Booking duration type already exists');

			}else{    
				//Store ameniy details
				$duration_type_details= array(
    					'duration_type'=>$request->input('booking_duration_type'),
    					'status'=>$request->input('status'),
    					'created_by'=>'1',
    					'modified_by'=>'1'
    				 );


				$duration_type_id  = DB::table('tbl_mstr_booking_duration_type')->insertGetId($duration_type_details);
				    //$amenity_id = $saveAmenity->insertGetId();
				   	
				 $data =[];
				   	foreach($module_categories as $module_category){
					   		//Add new record
					   	if(!empty($module_category)){
					   		
						    	$data[] = array(
						    					'duration_type_id'=>$duration_type_id,
						    					'module_manage_id'=>$module_category,
						    					'status'=>$request->input('status'),
						    					'created_by'=>'1',
						    					'modified_by'=>'1'
						    				 );

					    }

				   	}
				   
				   	if(!empty($data)){
				   		$result  = DB::table('tbl_mstr_booking_duration_type_with_module')->insert($data);
				   	}
		   			
			    	if(isset($result))
			    	{
			    		return redirect()->back()->withSuccess('Record has been saved successfully');
			    	}
				    
			}

					    	
		} else { //EDIT FUNCTIONALITY
		 	
		 	//check duplicate entries for amenity
			$duplicateEntry = DB::table('tbl_mstr_booking_duration_type')->where('duration_type', '=', $request->input('booking_duration_type'))->where('duration_type_id', '!=', $request->input('id'))->where('is_deleted', '=', 0)->count();

			if($duplicateEntry == 0) {

				//Store ameniy details
				$duration_type_details= array(
    					'duration_type'=>$request->input('booking_duration_type'),
    					'status'=>$request->input('status'),
    					'created_by'=>'1',
    					'modified_by'=>'1'
    				 );

				$result  = DB::table('tbl_mstr_booking_duration_type')->where('duration_type_id', $request->input('id'))->update($duration_type_details);

				//delete old entries 
				$isDeletedDurationTypeModule = DB::table('tbl_mstr_booking_duration_type_with_module')->where('duration_type_id', $request->input('id'))
				//->whereIn('module_manage_id', $module_categories)
				->delete();

				$data =[];

				//if deleted old records then save new
				if($isDeletedDurationTypeModule){
					
				   	foreach($module_categories as $module_category){
					   		//Add new record
					   	if(!empty($module_category)){
						    	$data[] = array(
				    					'duration_type_id'=>$request->input('id'),
				    					'module_manage_id'=>$module_category,
				    					'status'=>$request->input('status'),
				    					'created_by'=>'1',
				    					'modified_by'=>'1'
				    				 );

					    }
					    

				   	}

				   	if(!empty($data)){
				   		$insertBookingDurationTypeModule  = DB::table('tbl_mstr_booking_duration_type_with_module')->insert($data);
				   	}
		   			
			    	if(isset($insertBookingDurationTypeModule))
			    	{
			    		return redirect()->back()->withSuccess('Record has been saved successfully');
			    	}
				    
				}

			} else {

				return redirect()->back()->withWarning('Booking duration type already exists');
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
    	$sort = array('module_manage_name','duration_type','tbl_module_manage.status');
		$myll = $_POST['start'];
		$offset = $_POST['length'];
		if(isset($_POST['order'][0])){
		$orrd = $_POST['order'][0];
		$title=$orrd['column'];
		$order=$orrd['dir'];
		}
 		
 		//get total booking duration type
		$getBookingDurTypeTotalRecord = DB::table('tbl_mstr_booking_duration_type')->select('tbl_mstr_booking_duration_type.duration_type','tbl_mstr_booking_duration_type.status','tbl_mstr_booking_duration_type.duration_type_id')->where('is_deleted', '=', 0)->get()->count();

		//get booking duration type with its modules
		$query = DB::table('tbl_mstr_booking_duration_type')->select('tbl_mstr_booking_duration_type.duration_type',
			'tbl_mstr_booking_duration_type.status',
			'tbl_mstr_booking_duration_type.duration_type_id',
			DB::raw("(GROUP_CONCAT(tbl_module_manage.module_manage_id)) as `module_ids`"),
			
			DB::raw("(GROUP_CONCAT(module_manage_name)) as `modules`")
		)
		 ->leftJoin('tbl_mstr_booking_duration_type_with_module', 'tbl_mstr_booking_duration_type_with_module.duration_type_id', '=', 'tbl_mstr_booking_duration_type.duration_type_id')
		 ->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_mstr_booking_duration_type_with_module.module_manage_id')->where('tbl_mstr_booking_duration_type.is_deleted', '=', 0)
		 ->groupBy('tbl_mstr_booking_duration_type.duration_type_id','tbl_mstr_booking_duration_type.duration_type','tbl_mstr_booking_duration_type.status');

		if($_POST['search']['value'] && $_POST['search']['value'] != 'clear') {
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
	          $row[] = $bookingDurType->modules;
	          $row[] = $bookingDurType->duration_type;
	          $row[] = ($bookingDurType->status == 1) ? 'Active' : 'Inactive';
	           $row[] ='<a href="'.url('admin/addBookingDurationType/'.$bookingDurType->duration_type_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecordWithChild('.$bookingDurType->duration_type_id.','."'tbl_mstr_booking_duration_type'".','."'duration_type_id'".','."'1'".','."'tbl_mstr_booking_duration_type_with_module'".');"><i class="fa fa-trash-o"></i></button>';
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

   


     /*-----------------------------------
   		DOCUMENT TYPE FUNCTIONS
	-----------------------------------*/

	/**
	author:Priyanka
	function: documentTypeExecute() 
	It loads listing of document type
	type:public
	return:Html
	**/

	 public function documentTypeExecute()
    {
    	return view('admin.master.document_type_list');
    }


    /** author:Priyanka
	function: addDocumentType() 
	It loads add and edit document type form
	type:public
	return:Html
	**/
    public function addDocumentType($document_type_id = NULL)
    {
    	$getModuleCategories = DB::table('tbl_module_manage')
    	->select('module_manage_id','status','module_manage_name')
    	->where([['is_deleted', '=', 0],
    			['status', '=', 1]])->get();

    	$getDocumentType = DB::table('tbl_mstr_document_type')->where('document_type_id', '=', $document_type_id)->first();
    	return view('admin.master.new_document_type')->with('editDocumentType', $getDocumentType)->with('getModuleCategories', $getModuleCategories);
    }

     /**
	author:Priyanka
	function: saveDocumentType() 
	This function submits and save location details.
	type:public
	return:text
	**/

	public function saveDocumentType(DocumentTypeRequest $request)
    {	
    	
		 if(!$request->input('id')) {

		    //Add new record

		 	//check duplicate records
		    $duplicateEntry = DB::table('tbl_mstr_document_type')->where('document_type', '=', $request->input('document_type'))->where('module_manage_id', '=', $request->input('module_manage_id'))->where('is_deleted', '=', 0)->count();
				if($duplicateEntry == 0) {
			    	$data = array(
		    					'document_type'=>$request->input('document_type'),
		    					'module_manage_id'=>$request->input('module_manage_id'),
		    					'status'=>$request->input('status'),
		    					'created_by'=>'1',
		    					'modified_by'=>'1'
			    				 );
			    	$result  = DB::table('tbl_mstr_document_type')->insert($data);
			    	if($result)
			    	{
			    		return redirect()->back()->withSuccess('Record has been saved successfully');
			    	}
			    }  else {

			    		return redirect()->back()->withWarning('Document type already exists');
				}
					    	
		    } else {
		    		//Update new record

		    	//check duplicate records
		    	$duplicateEntry = DB::table('tbl_mstr_document_type')
		    	->where('document_type', '=', $request->input('document_type'))
		    	->where('module_manage_id', '=', $request->input('module_manage_id'))
		    	->where('document_type_id', '!=', $request->input('id'))
		    	->where('is_deleted', '=', 0)->count();
				if($duplicateEntry == 0) {
		    		$data = array(
		    					'document_type'=>$request->input('document_type'),
		    					'module_manage_id'=>$request->input('module_manage_id'),
		    					'status'=>$request->input('status'),
		    					'created_by'=>'1',
		    					'modified_by'=>'1'
			    				 );
					$result  = DB::table('tbl_mstr_document_type')->where('document_type_id', $request->input('id'))->update($data);
			    	if($result)
			    	{
			    		return redirect()->back()->withSuccess('Record has been updated successfully');
			    	} else {
			    		return redirect('admin/documentTypeExecute');
			    	}
			    }  else {

			    		return redirect()->back()->withWarning('Document type already exists');
				}
		    }

		   
    }

    /**
	author:Priyanka
	function: getDocumentTypes() 
	This function list and return the json of location types .
	type:public
	return:json array
	**/


     public function getDocumentTypes()
    {	
    	$sort = array('module_manage_name','document_type','tbl_mstr_document_type.status');
		$myll = $_POST['start'];
		$offset = $_POST['length'];
		if(isset($_POST['order'][0])){
		$orrd = $_POST['order'][0];
		$title=$orrd['column'];
		$order=$orrd['dir'];
		}

		

		$getDocumentTypeTotalRecord = DB::table('tbl_mstr_document_type')->select('document_type','status','document_type_id')->where('is_deleted', '=', 0)->get()->count();

		$query = DB::table('tbl_mstr_document_type')->select('document_type','tbl_mstr_document_type.status','document_type_id','module_manage_name')->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_mstr_document_type.module_manage_id')->where('tbl_mstr_document_type.is_deleted', '=', 0);
		if($_POST['search']['value']) {
	    $query->where('document_type', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->orWhere('module_manage_name', 'like', '%' .  $_POST['search']['value'] . '%');
		}

		if($offset!= -1) {
		    $query->skip($myll)->take($offset);
		}
		if(isset($order)){
      	  	$query->orderBy($sort[$title], $order);
        }
        else{
       		$query->orderBy('document_type_id','desc');
        }
		$getDocumentType = $query->get();
	    $data = array();
	    $data = array();
	    $no = $_POST['start'];
	   
	    $sr = 1;
	    foreach ($getDocumentType as $documentType) {
	      	  $no++;
	          $row = array();
	          //$row[] = $sr++;
	          $row[] = $documentType->module_manage_name;
	          $row[] = $documentType->document_type;
	          $row[] = ($documentType->status == 1) ? 'Active' : 'Inactive';
	           $row[] ='<a href="'.url('admin/addDocumentType/'.$documentType->document_type_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$documentType->document_type_id.','."'tbl_mstr_document_type'".','."'document_type_id'".');"><i class="fa fa-trash-o"></i></button>';
	          $data[] = $row;
	        }
	      $output = array(
	                      "draw" => $_POST['draw'],
	                      "recordsTotal" => $getDocumentTypeTotalRecord,
	                      "recordsFiltered" => $getDocumentTypeTotalRecord,
	                      "data" => $data,
	    );
	    echo json_encode($output);

    }


    /*-----------------------------------
   		UNIT TYPE FUNCTIONS
	-----------------------------------*/

	/**
	author:Priyanka
	function: unitTypeExecute() 
	It loads listing of unit type
	type:public
	return:Html
	**/

	 public function unitTypeExecute()
    {
    	return view('admin.master.unit_type_list');
    }


    /** author:Priyanka
	function: addUnitType() 
	It loads add and edit unit type form
	type:public
	return:Html
	**/
    public function addUnitType($unit_type_id = NULL)
    {
    	$getModuleCategories = DB::table('tbl_module_manage')
    	->select('module_manage_id','status','module_manage_name')
    	->where([['is_deleted', '=', 0],
    			['status', '=', 1]])->get();

    	$getUnitType = DB::table('tbl_mstr_unit_type')->where('unit_type_id', '=', $unit_type_id)->first();
    	return view('admin.master.new_unit_type')->with('editUnitType', $getUnitType)->with('getModuleCategories', $getModuleCategories);
    }

     /**
	author:Priyanka
	function: saveUnitType() 
	This function submits and save unit details.
	type:public
	return:text
	**/

	public function saveUnitType(UnitTypeRequest $request)
    {	
    	
		 if(!$request->input('id')) {

		    //Add new record
		 	//check duplicate records
		    $duplicateEntry = DB::table('tbl_mstr_unit_type')->where('unit_type', '=', $request->input('unit_type'))->where('module_manage_id', '=', $request->input('module_manage_id'))->where('is_deleted', '=', 0)->count();
				if($duplicateEntry == 0) {
			    	$data = array(
		    					'unit_type'=>$request->input('unit_type'),
		    					'module_manage_id'=>$request->input('module_manage_id'),
		    					'status'=>$request->input('status'),
		    					'created_by'=>'1',
		    					'modified_by'=>'1'
			    				 );
			    	$result  = DB::table('tbl_mstr_unit_type')->insert($data);
			    	if($result)
			    	{
			    		return redirect()->back()->withSuccess('Record has been saved successfully');
			    	}
			    }  else {

			    		return redirect()->back()->withWarning('Unit type already exists');
				}
					    	
		    } else {
		    		//Update new record
		    	//check duplicate records
		    	$duplicateEntry = DB::table('tbl_mstr_unit_type')
		    	->where('unit_type', '=', $request->input('unit_type'))
		    	->where('module_manage_id', '=', $request->input('module_manage_id'))
		    	->where('unit_type_id', '!=', $request->input('id'))
		    	->where('is_deleted', '=', 0)->count();
				if($duplicateEntry == 0) {
		    		$data = array(
		    					'unit_type'=>$request->input('unit_type'),
		    					'module_manage_id'=>$request->input('module_manage_id'),
		    					'status'=>$request->input('status'),
		    					'created_by'=>'1',
		    					'modified_by'=>'1'
			    				 );
					$result  = DB::table('tbl_mstr_unit_type')->where('unit_type_id', $request->input('id'))->update($data);
			    	if($result)
			    	{
			    		return redirect()->back()->withSuccess('Record has been updated successfully');
			    	} else {
			    		return redirect('admin/unitTypeExecute');
			    	}
			    }  else {

			    		return redirect()->back()->withWarning('Unit type already exists');
				}

		    }

		   
    }

    /**
	author:Priyanka
	function: getUnitTypes() 
	This function list and return the json of unit types .
	type:public
	return:json array
	**/


     public function getUnitTypes()
    {	
    	$sort = array('module_manage_name','unit_type','tbl_mstr_unit_type.status');
		$myll = $_POST['start'];
		$offset = $_POST['length'];
		if(isset($_POST['order'][0])){
		$orrd = $_POST['order'][0];
		$title=$orrd['column'];
		$order=$orrd['dir'];
		}

		$getUnitTypeTotalRecord = DB::table('tbl_mstr_unit_type')->select('unit_type','status','unit_type_id')->where('is_deleted', '=', 0)->get()->count();

		$query = DB::table('tbl_mstr_unit_type')->select('unit_type','tbl_mstr_unit_type.status','unit_type_id','module_manage_name')->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_mstr_unit_type.module_manage_id')->where('tbl_mstr_unit_type.is_deleted', '=', 0);
		if($_POST['search']['value']) {
	    $query->where('unit_type', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->orWhere('module_manage_name', 'like', '%' .  $_POST['search']['value'] . '%');
		}

		if($offset!= -1) {
		    $query->skip($myll)->take($offset);
		}
		if(isset($order)){
      	  	$query->orderBy($sort[$title], $order);
        }
        else{
       		$query->orderBy('unit_type_id','desc');
        }
		$getUnitType = $query->get();
	    $data = array();
	    $data = array();
	    $no = $_POST['start'];
	   
	    $sr = 1;
	    foreach ($getUnitType as $unitType) {
	      	  $no++;
	          $row = array();
	          //$row[] = $sr++;
	          $row[] = $unitType->module_manage_name;
	          $row[] = $unitType->unit_type;
	          $row[] = ($unitType->status == 1) ? 'Active' : 'Inactive';
	           $row[] ='<a href="'.url('admin/addUnitType/'.$unitType->unit_type_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$unitType->unit_type_id.','."'tbl_mstr_unit_type'".','."'unit_type_id'".');"><i class="fa fa-trash-o"></i></button>';
	          $data[] = $row;
	        }
	      $output = array(
	                      "draw" => $_POST['draw'],
	                      "recordsTotal" => $getUnitTypeTotalRecord,
	                      "recordsFiltered" => $getUnitTypeTotalRecord,
	                      "data" => $data,
	    );
	    echo json_encode($output);

    }

    /*-----------------------------------
   		CANCELLATION TYPE FUNCTIONS
	-----------------------------------*/

	/**
	author:Priyanka
	function: cancellationTypeExecute() 
	It loads listing of cancellation type
	type:public
	return:Html
	**/

	 public function cancellationTypeExecute()
    {
    	return view('admin.master.cancellation_type_list');
    }


    /** author:Priyanka
	function: addCancellationType() 
	It loads add and edit cancellation type form
	type:public
	return:Html
	**/
    public function addCancellationType($cancellation_type_id = NULL)
    {
    	/*$getModuleCategories = DB::table('tbl_module_manage')
    	->select('module_manage_id','status','module_manage_name')
    	->where([['is_deleted', '=', 0],
    			['status', '=', 1]])->get();*/

    	$getCancellationType = DB::table('tbl_mstr_cancellation_type')->where('cancellation_type_id', '=', $cancellation_type_id)->first();
    	//return view('admin.master.new_cancellation_type')->with('editCancellationType', $getCancellationType)->with('getModuleCategories', $getModuleCategories);
    	return view('admin.master.new_cancellation_type')->with('editCancellationType', $getCancellationType);
    }

     /**
	author:Priyanka
	function: saveCancellationType() 
	This function submits and save canellation details.
	type:public
	return:text
	**/

	public function saveCancellationType(cancellationTypeRequest $request)
    {	
    	
		 if(!$request->input('id')) {

		    //Add new record
		 	//check duplicate entries
		    $duplicateEntry = DB::table('tbl_mstr_cancellation_type')->where('cancellation_type', '=', $request->input('cancellation_type'))//->where('module_manage_id', '=', $request->input('module_manage_id'))
		    ->where('is_deleted', '=', 0)->count();
				if($duplicateEntry == 0) {
			    	$data = array(
		    					'cancellation_type'=>$request->input('cancellation_type'),
		    					'module_manage_id'=>$request->input('module_manage_id'),
		    					'status'=>$request->input('status'),
		    					'created_by'=>'1',
		    					'modified_by'=>'1'
			    				 );
			    	$result  = DB::table('tbl_mstr_cancellation_type')->insert($data);
			    	if($result)
			    	{
			    		return redirect()->back()->withSuccess('Record has been saved successfully');
			    	}
			    }  else {

			    		return redirect()->back()->withWarning('Cancellation type already exists');
				}
					    	
		    } else {
		    		//Update new record
			    $duplicateEntry = DB::table('tbl_mstr_cancellation_type')
			    ->where('cancellation_type', '=', $request->input('cancellation_type'))//->where('module_manage_id', '=', $request->input('module_manage_id'))
			    ->where('cancellation_type_id', '!=', $request->input('id'))
			    ->where('is_deleted', '=', 0)->count();
				if($duplicateEntry == 0) {
		    		$data = array(
		    					'cancellation_type'=>$request->input('cancellation_type'),
		    					'module_manage_id'=>$request->input('module_manage_id'),
		    					'status'=>$request->input('status'),
		    					'created_by'=>'1',
		    					'modified_by'=>'1'
			    				 );
					$result  = DB::table('tbl_mstr_cancellation_type')->where('cancellation_type_id', $request->input('id'))->update($data);
			    	if($result)
			    	{
			    		return redirect()->back()->withSuccess('Record has been updated successfully');
			    	} else {
			    		return redirect('admin/cancellationTypeExecute');
			    	}
			     }  else {

			    		return redirect()->back()->withWarning('Cancellation type already exists');
				}
		    }

		   
    }

    /**
	author:Priyanka
	function: getCancellationTypes() 
	This function list and return the json of cancellation types .
	type:public
	return:json array
	**/


     public function getCancellationTypes_withmodule()
    {	
    	//$sort = array('module_manage_name','cancellation_type','tbl_mstr_unit_type.status');
    	$sort = array('cancellation_type','status');
		$myll = $_POST['start'];
		$offset = $_POST['length'];
		if(isset($_POST['order'][0])){
		$orrd = $_POST['order'][0];
		$title=$orrd['column'];
		$order=$orrd['dir'];
		}

		$getCancellationTypeTotalRecord = DB::table('tbl_mstr_cancellation_type')->select('cancellation_type','status','cancellation_type_id')->where('is_deleted', '=', 0)->get()->count();

		$query = DB::table('tbl_mstr_cancellation_type')->select('cancellation_type','tbl_mstr_cancellation_type.status','cancellation_type_id','module_manage_name')->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_mstr_cancellation_type.module_manage_id')->where('tbl_mstr_cancellation_type.is_deleted', '=', 0);
		if($_POST['search']['value']) {
	    $query->where('unit_type', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->orWhere('module_manage_name', 'like', '%' .  $_POST['search']['value'] . '%');
		}

		if($offset!= -1) {
		    $query->skip($myll)->take($offset);
		}
		if(isset($order)){
      	  	$query->orderBy($sort[$title], $order);
        }
        else{
       		$query->orderBy('cancellation_type_id','desc');
        }
		$getCancellationType = $query->get();
	    $data = array();
	    $data = array();
	    $no = $_POST['start'];
	   
	    $sr = 1;
	    foreach ($getCancellationType as $cancellationType) {
	      	  $no++;
	          $row = array();
	          //$row[] = $sr++;
	          //$row[] = $cancellationType->module_manage_name;
	          $row[] = $cancellationType->cancellation_type;
	          $row[] = ($cancellationType->status == 1) ? 'Active' : 'Inactive';
	           $row[] ='<a href="'.url('admin/addCancellationType/'.$cancellationType->cancellation_type_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$cancellationType->cancellation_type_id.','."'tbl_mstr_cancellation_type'".','."'cancellation_type_id'".');"><i class="fa fa-trash-o"></i></button>';
	          $data[] = $row;
	        }
	      $output = array(
	                      "draw" => $_POST['draw'],
	                      "recordsTotal" => $getCancellationTypeTotalRecord,
	                      "recordsFiltered" => $getCancellationTypeTotalRecord,
	                      "data" => $data,
	    );
	    echo json_encode($output);

    }


     public function getCancellationTypes()
    {	
    	$sort = array('cancellation_type','status');
		$myll = $_POST['start'];
		$offset = $_POST['length'];
		if(isset($_POST['order'][0])){
		$orrd = $_POST['order'][0];
		$title=$orrd['column'];
		$order=$orrd['dir'];
		}

		$getCancellationTypeTotalRecord = DB::table('tbl_mstr_cancellation_type')->select('cancellation_type','status','cancellation_type_id')->where('is_deleted', '=', 0)->get()->count();

		$query = DB::table('tbl_mstr_cancellation_type')->select('cancellation_type','status','cancellation_type_id')->where('is_deleted', '=', 0);
		if($_POST['search']['value']) {
	    $query->where('cancellation_type', 'like', '%' .  $_POST['search']['value'] . '%');
		}

		if($offset!= -1) {
		    $query->skip($myll)->take($offset);
		}
		if(isset($order)){
      	  	$query->orderBy($sort[$title], $order);
        }
        else{
       		$query->orderBy('cancellation_type_id','desc');
        }
		$getCancellationType = $query->get();
	    $data = array();
	    $data = array();
	    $no = $_POST['start'];
	   
	    $sr = 1;
	    foreach ($getCancellationType as $cancellationType) {
	      	  $no++;
	          $row = array();
	          //$row[] = $sr++;
	          $row[] = $cancellationType->cancellation_type;
	          $row[] = ($cancellationType->status == 1) ? 'Active' : 'Inactive';
	           $row[] ='<a href="'.url('admin/addCancellationType/'.$cancellationType->cancellation_type_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$cancellationType->cancellation_type_id.','."'tbl_mstr_cancellation_type'".','."'cancellation_type_id'".');"><i class="fa fa-trash-o"></i></button>';
	          $data[] = $row;
	        }
	      $output = array(
	                      "draw" => $_POST['draw'],
	                      "recordsTotal" => $getCancellationTypeTotalRecord,
	                      "recordsFiltered" => $getCancellationTypeTotalRecord,
	                      "data" => $data,
	    );
	    echo json_encode($output);
    }


     /*-----------------------------------
   		CANCELLATION POLICIES FUNCTIONS
	-----------------------------------*/

	/**
	author:Priyanka
	function: cancellationPoliciesExecute() 
	It loads listing of cancellation policies
	type:public
	return:Html
	**/

	 public function cancellationPoliciesExecute()
    {
    	return view('admin.master.cancellation_policies_list');
    }


    /** author:Priyanka
	function: addUnitType() 
	It loads add and edit cancellation policies form
	type:public
	return:Html
	**/
    public function addCancellationPolicies($cancellation_policy_id = NULL)
    {
    	$getModuleCategories = DB::table('tbl_module_manage')
    	->select('module_manage_id','status','module_manage_name')
    	->where([['is_deleted', '=', 0],
    			['status', '=', 1]])->get();

    	$getCancellationTypes = DB::table('tbl_mstr_cancellation_type')
    	->select('cancellation_type_id','status','cancellation_type')
    	->where([['is_deleted', '=', 0],
    			['status', '=', 1]])->get();

    	$getCancellationPolicies = DB::table('tbl_mstr_cancellation_policies')->where('cancellation_policy_id', '=', $cancellation_policy_id)->first();
    	return view('admin.master.new_cancellation_policies')->with('editCancellationPolicies', $getCancellationPolicies)->with('getModuleCategories', $getModuleCategories)->with('getCancellationTypes', $getCancellationTypes);
    }

     /**
	author:Priyanka
	function: saveUnitType() 
	This function submits and save cancellation policies details.
	type:public
	return:text
	**/

	public function saveCancellationPolicies(CancellationPoliciesRequest $request)
    {	
    	
		 if(!$request->input('id')) {
		    //Add new record
		    $duplicateEntry = DB::table('tbl_mstr_cancellation_policies')->where('cancellation_policy_text', '=', $request->input('cancellation_policy_text'))->where('module_manage_id', '=', $request->input('module_manage_id'))
		    ->where('cancellation_type_id', '=', $request->input('cancellation_type_id'))->where('is_deleted', '=', 0)->count();
				if($duplicateEntry == 0) {
			    	$data = array(
		    					'cancellation_policy_text'=>$request->input('cancellation_policy_text'),
		    					'cancellation_percentage'=>$request->input('cancellation_percentage'),
		    					'cancellation_type_id'=>$request->input('cancellation_type_id'),
		    					'module_manage_id'=>$request->input('module_manage_id'),
		    					'status'=>$request->input('status'),
		    					'created_by'=>'1',
		    					'modified_by'=>'1'
			    				 );
			    	$result  = DB::table('tbl_mstr_cancellation_policies')->insert($data);
			    	if($result)
			    	{
			    		return redirect()->back()->withSuccess('Record has been saved successfully');
			    	}
			    }  else {

			    		return redirect()->back()->withWarning('Cancellation Policy already saved');
				}
					    	
		    } else {
		    		//Update new record
		    	$duplicateEntry = DB::table('tbl_mstr_cancellation_policies')->where('cancellation_policy_text', '=', $request->input('cancellation_policy_text'))
		    	 ->where('module_manage_id', '=', $request->input('module_manage_id'))
		   		 ->where('cancellation_type_id', '=', $request->input('cancellation_type_id'))
		   		 ->where('is_deleted', '=', 0)
		   		 ->where('cancellation_policy_id', '!=', $request->input('id'))
		   		 ->count();
				if($duplicateEntry == 0) {
			    		$data = array(
			    					'cancellation_policy_text'=> $request->input(
			    					'cancellation_policy_text'),
			    					'cancellation_percentage'=>$request->input('cancellation_percentage'),
			    					'cancellation_type_id'=>$request->input('cancellation_type_id'),
			    					'module_manage_id'=>$request->input('module_manage_id'),
			    					'status'=>$request->input('status'),
			    					'created_by'=>'1',
			    					'modified_by'=>'1'
				    				 );
						$result  = DB::table('tbl_mstr_cancellation_policies')->where('cancellation_policy_id', $request->input('id'))->update($data);
				    	if($result)
				    	{
				    		return redirect()->back()->withSuccess('Record has been updated successfully');
				    	} else {
				    		return redirect('admin/cancellationPoliciesExecute');
				    	}

		    	}  else {

			    		return redirect()->back()->withWarning('Cancellation Policy already saved');
				}
		    }

		   
    }

    /**
	author:Priyanka
	function: getUnitTypes() 
	This function list and return the json of cancellation policies .
	type:public
	return:json array
	**/


     public function getCancellationPolicies()
    {	
    	$sort = array('module_manage_name','cancellation_type','cancellation_policy_text','tbl_mstr_cancellation_policies.status');
		$myll = $_POST['start'];
		$offset = $_POST['length'];
		if(isset($_POST['order'][0])){
		$orrd = $_POST['order'][0];
		$title=$orrd['column'];
		$order=$orrd['dir'];
		}

		$getCancellationPoliciesTotalRecord = DB::table('tbl_mstr_cancellation_policies')->select('cancellation_policy_text','status','cancellation_policy_id')->where('is_deleted', '=', 0)->get()->count();

		$query = DB::table('tbl_mstr_cancellation_policies')->select('cancellation_policy_text','cancellation_percentage','tbl_mstr_cancellation_policies.status','cancellation_policy_id','cancellation_type','module_manage_name')->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_mstr_cancellation_policies.module_manage_id')->leftJoin('tbl_mstr_cancellation_type', 'tbl_mstr_cancellation_type.cancellation_type_id', '=', 'tbl_mstr_cancellation_policies.cancellation_type_id')->where('tbl_mstr_cancellation_policies.is_deleted', '=', 0);
		if($_POST['search']['value']) {
	    $query->where('cancellation_policy_text', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->orWhere('module_manage_name', 'like', '%' .  $_POST['search']['value'] . '%');
	    $query->orWhere('cancellation_type', 'like', '%' .  $_POST['search']['value'] . '%');
		}

		if($offset!= -1) {
		    $query->skip($myll)->take($offset);
		}
		if(isset($order)){
      	  	$query->orderBy($sort[$title], $order);
        }
        else{
       		$query->orderBy('cancellation_policy_id','desc');
        }
		$getCancellationPolicies = $query->get();
	    $data = array();
	    $data = array();
	    $no = $_POST['start'];
	   
	    $sr = 1;
	    foreach ($getCancellationPolicies as $cancellationPolicies) {
	      	  $no++;
	          $row = array();
	          //$row[] = $sr++;
	          $row[] = $cancellationPolicies->module_manage_name;
	          $row[] = $cancellationPolicies->cancellation_type;
	          $row[] = $cancellationPolicies->cancellation_policy_text;
	          $row[] = (empty($cancellationPolicies->cancellation_percentage))?'0':$cancellationPolicies->cancellation_percentage.'%';
	          $row[] = ($cancellationPolicies->status == 1) ? 'Active' : 'Inactive';
	           $row[] ='<a href="'.url('admin/addCancellationPolicies/'.$cancellationPolicies->cancellation_policy_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$cancellationPolicies->cancellation_policy_id.','."'tbl_mstr_cancellation_policies'".','."'cancellation_policy_id'".');"><i class="fa fa-trash-o"></i></button>';
	          $data[] = $row;
	        }
	      $output = array(
	                      "draw" => $_POST['draw'],
	                      "recordsTotal" => $getCancellationPoliciesTotalRecord,
	                      "recordsFiltered" => $getCancellationPoliciesTotalRecord,
	                      "data" => $data,
	    );
	    echo json_encode($output);

    }










    

}
