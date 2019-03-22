<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests\MasterRequest;
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

		//$get['fields'] = array('user_id','first_name','last_name','email_address','school_collage');
		// if(isset($search))  {
		// 	$get['search']=$search;
		// }
		// $get['myll']=$_POST['start'];
		// $get['offset'] = $_POST['length'];
		// if(isset($_POST['order'][0])){
		// $orrd= $_POST['order'][0];
		// $get['title']=$orrd['column'];
		// $get['order']=$orrd['dir'];
		// }

		// if(isset($data['order'])){
  //           $this->db->order_by($data['title'], $data['order']);
  //       }
  //       else{
  //           $this->db->order_by($sortid, 'desc');

  //       }

	      $getCarType = DB::table('prk_car_type')->select('car_type','status','car_type_id')->where('is_deleted', '=', 0)->get();
          $data = array();
          //$total_rec = array_pop($list);
          $sr = 1;
          foreach ($getCarType as $carT) {
              $row = array();
              $row[] = $sr++;
              $row[] = $carT->car_type;
              $row[] = ($carT->status == 1) ? 'Active' : 'Inactive';
               $row[] ='<a href="'.url('admin/addCarType/'.$carT->car_type_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$carT->car_type_id.','."'prk_car_type'".','."'car_type_id'".');"><i class="fa fa-trash-o"></i></button>';
              $data[] = $row;
            }
          $output = array(
                          "draw" => $_POST['draw'],
                          "recordsTotal" =>10,
                          "recordsFiltered" => 10,
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
