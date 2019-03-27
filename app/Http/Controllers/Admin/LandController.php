<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

//Priyanka : validation files

use App\Http\Requests\LandTypeRequest;
use DB;

class LandController extends Controller
{
    public function landTypeExecute()
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






    

}
