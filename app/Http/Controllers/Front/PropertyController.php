<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use DB;
use Intervention\Image\Facades\Image;
//validation file
use App\Http\Requests\Frontend\PropertyRequest;

class PropertyController extends Controller
{
    public function addProperty($module_manage_id = NULL)
    {
        /*$getModuleCategories =[];
        $getCarType=[];
        $getParkingType =[];
        $getLandType=[];*/

        $getModuleCategories = DB::table('tbl_module_manage')
        ->select('module_manage_id','status','module_manage_name')
        ->where([['is_deleted', '=', 0],
                ['status', '=', 1]])->get();

        $getCarType = DB::table('prk_car_type')
        ->select('status','car_type','car_type_id')
        ->where([['is_deleted', '=', 0],
                ['status', '=', 1]])->get();

        $getParkingType = DB::table('prk_parking_type')
        ->select('status','parking_type','parking_type_id')
        ->where([['is_deleted', '=', 0],
                ['status', '=', 1]])->get();

        $getLandType = DB::table('lnd_land_type')
        ->select('status','land_type','land_type_id')
        ->where([['is_deleted', '=', 0],
                ['status', '=', 1]])->get();

        return view('front.property.add_property')
        ->with('getModuleCategories',$getModuleCategories)
        ->with('getCarType',$getCarType)
        ->with('getParkingType',$getParkingType)
        ->with('getLandType',$getLandType);


 


        /*->with(
        ?$getModuleCategories:'','getCarType'=>($getCarType)?$getCarType:'','getParkingType'=> ($getParkingType)?$getParkingType:'',
            ,'getLandType'=> ($getLandType)?$getLandType:'']);

        return view('front.property.add_property')->with(['getModuleCategories'=> ($getModuleCategories)?$getModuleCategories:'','getCarType'=>($getCarType)?$getCarType:'','getParkingType'=> ($getParkingType)?$getParkingType:'',
            ,'getLandType'=> ($getLandType)?$getLandType:'']);*/
        
    }

     public function getPropertyMasters()
    {


        $module_manage_id = $_POST['module_manage_id'];
        //echo json_encode($module_manage_id);
        //die;
        /*$getLocationTypes = DB::table('tbl_mstr_location_type')
        ->select('location_type_id','status','location_type')
        ->where([['is_deleted', '=', 0],
                ['status', '=', 1]])
        ->where('module_manage_id', '=', $module_manage_id)->get();*/

        /*$getUnitTypes = DB::table('tbl_mstr_unit_type')
        ->select('unit_type_id','status','unit_type')
        ->where([['is_deleted', '=', 0],
                ['status', '=', 1]])
        ->where('module_manage_id', '=', $module_manage_id)->get();*/

        //get unit types with its modules
        $getUnitTypes = DB::table('tbl_mstr_unit_type')
        ->select('tbl_mstr_unit_type.unit_type',
            'tbl_mstr_unit_type.status',
            'tbl_mstr_unit_type.unit_type_id')->leftJoin('tbl_mstr_unit_type_with_module', 'tbl_mstr_unit_type.unit_type_id', '=', 'tbl_mstr_unit_type_with_module.unit_type_id')
         ->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_mstr_unit_type_with_module.module_manage_id')
         ->where('tbl_mstr_unit_type_with_module.is_deleted', '=', 0)
         ->where('tbl_mstr_unit_type_with_module.module_manage_id', '=', $module_manage_id)
         ->where('tbl_mstr_unit_type_with_module.status', '=', 1)
         ->get();

        //get location type with its modules
        $getLocationTypes = DB::table('tbl_mstr_location_type')->select('tbl_mstr_location_type.location_type',
            'tbl_mstr_location_type.status',
            'tbl_mstr_location_type.location_type_id'
            )
         ->leftJoin('tbl_mstr_location_type_with_module', 'tbl_mstr_location_type_with_module.location_type_id', '=', 'tbl_mstr_location_type.location_type_id')
         ->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_mstr_location_type_with_module.module_manage_id')
         ->where('tbl_mstr_location_type_with_module.is_deleted', '=', 0)
         ->where('tbl_mstr_location_type_with_module.module_manage_id', '=', $module_manage_id)
         ->where('tbl_mstr_location_type_with_module.status', '=', 1)
         ->get();

        //get amenities with its modules
        $getAmenities = DB::table('tbl_mstr_amenities')
        ->select(
            'tbl_mstr_amenities.amenity_name',
            'tbl_mstr_amenities.status',
            'tbl_mstr_amenities.amenity_id',
            'tbl_mstr_amenities.amenity_image'
            )
         ->leftJoin('tbl_mstr_amenities_with_category', 'tbl_mstr_amenities_with_category.amenity_id', '=', 'tbl_mstr_amenities.amenity_id')
         ->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_mstr_amenities_with_category.module_manage_id')->where('tbl_mstr_amenities.is_deleted', '=', 0)
        ->where('tbl_mstr_amenities_with_category.module_manage_id', '=', $module_manage_id)
        ->where('tbl_mstr_amenities_with_category.status', '=', 1)
        ->get();

        //get amenities with its modules
        $getBookingDurationType = DB::table('tbl_mstr_booking_duration_type')
        ->select(
            'tbl_mstr_booking_duration_type.duration_type',
            'tbl_mstr_booking_duration_type.status',
            'tbl_mstr_booking_duration_type.duration_type_id'
            )
         ->leftJoin('tbl_mstr_booking_duration_type_with_module', 'tbl_mstr_booking_duration_type_with_module.duration_type_id', '=', 'tbl_mstr_booking_duration_type.duration_type_id')
         ->leftJoin('tbl_module_manage', 'tbl_module_manage.module_manage_id', '=', 'tbl_mstr_booking_duration_type_with_module.module_manage_id')->where('tbl_mstr_booking_duration_type.is_deleted', '=', 0)
        ->where('tbl_mstr_booking_duration_type_with_module.module_manage_id', '=', $module_manage_id)
        ->where('tbl_mstr_booking_duration_type_with_module.status', '=', 1)
        ->get();

         $getPropertyMasters =array('getLocationTypes'=>$getLocationTypes,
                                    'getUnitTypes'=>$getUnitTypes,
                                    'getAmenities'=>$getAmenities,
                                    'getBookingDurationType'=>$getBookingDurationType
                                        );


        return json_encode($getPropertyMasters,JSON_PRETTY_PRINT);
        //echo json_encode($getLocationTypes);

        //return view('front.property.add_property')->with('getModuleCategories', $getModuleCategories)->with('getLocationTypes', $getLocationTypes);
        
    }
    
    public function saveProperty(Request $request)
    {   
       
        if(!$request->input('id')) {

            $tbl_prefix="";
            switch ($request->input('module_manage_id')) {
                case '2':
                    $tbl_prefix="prk_";
                    # code...
                    break;
                case '3':
                    $tbl_prefix="lnd_";
                    # code...
                    break;
                default:
                    $tbl_prefix="lnd_";
                    # code...
                    break;
            };

            //echo $request['data']['property_name'];die('in');

            // Commman parking and land save with condition
            if($request['module_manage_id'] == 2)
            {
            $propBasicDetails = array(
                                    'module_manage_id'=>$request['module_manage_id'],
                                    'user_id'=>$_SESSION['user']['user_id'],//$request->input('property_name'),
                                    'name'=>$request['data']['property_name'],
                                    'location'=>$request['data']['location'],
                                    'latitude'=>$request['data']['latitude'],
                                    'longitude'=>$request['data']['longitude'],//$request->input('longitude'),
                                    'zip_code'=>$request['data']['zip_code'],
                                    'description'=>$request['data']['property_description'],
                                    'location_type_id'=>$request['data']['location_type'],
                                    'status'=>1,
                                    'created_by'=>'1',
                                    'modified_by'=>'1',
                                    'is_deleted'=>'0',
                                 );
            } else {
            $propBasicDetails = array(
                                    'module_manage_id'=>$request['module_manage_id'],
                                    'user_id'=>2,//$request->input('property_name'),
                                    'name'=>$request['data']['property_name'],
                                    'location'=>$request['data']['location'],
                                    'latitude'=>$request['data']['latitude'],
                                    'longitude'=>$request['data']['longitude'],//
                                    'zip_code'=>$request['data']['zip_code'],
                                    'description'=>$request['data']['property_description'],
                                    'tour_availability'=>$request['data']['land']['tour_availability'],
                                    'property_size'=>$request['property_size'],
                                    'unit_type_id'=>$request['units'],
                                    'land_type_id'=>1,
                                    'status'=>1,
                                    'created_by'=>'1',
                                    'modified_by'=>'1',
                                    'is_deleted'=>'0',
                                 );  
            }

          $propertyId  = DB::table($tbl_prefix.'add_property')->insertGetId($propBasicDetails);
          if($propertyId)
          {

                    //property land
                    if(isset($request['data']['land']['land_used_for']) && !empty($request['data']['land']['land_used_for']) && $request['module_manage_id'] == 3)
                    {

                        foreach($request['data']['land']['land_used_for'] as $key => $land_used_for)
                        {
                           $insertLandUserForDetails[]= array(
                                                 'land_type_id'=>($land_used_for)?$land_used_for:'',
                                                 'property_id'=>$propertyId,
                                                 'status'=>1,
                                                 'created_by'=>'1',
                                                 'modified_by'=>'1',
                                                 'is_deleted'=>'0');
                                    
                        }
                        $insertLandUserForDetails  = DB::table($tbl_prefix.'add_land_type')->insert($insertLandUserForDetails);
                    }

                 

                    //insert parking floors
                    if(isset($request['data']['parking']['floor_name']) && !empty($request['data']['parking']['floor_name']) && $request['module_manage_id'] == 2)
                    {
                        foreach($request['data']['parking']['floor_name'] as $key => $floor_name)
                        {
                           $insertPropFloorDetails[]= array(
                                                 'floor_name'=>($floor_name)?$floor_name:'',
                                                 'parking_type_id'=>$request['data']['parking']['parking_type_id'][$key],
                                                 'total_parking_spots'=> $request['data']['parking']['total_parking_spots'][$key],
                                                 'property_id'=>$propertyId,
                                                 'status'=>1,
                                                 'created_by'=>'1',
                                                 'modified_by'=>'1',
                                                 'is_deleted'=>'0');
                                    
                        }
                        $insertPropFloorData  = DB::table($tbl_prefix.'add_property_floors')->insert($insertPropFloorDetails);
                    }

                     if(isset($request['data']['parking']['car_type_id']) && !empty($request['data']['parking']['car_type_id']))
                     {
                      if($request['module_manage_id'] == 2)
                      {
                            foreach($request['data']['parking']['car_type_id'] as $keyC => $car_type_id)
                            {
                                   foreach($request['data']['parking']['rent_amount'] as $keyR => $rent_amount)
                                   {
                                          $insertPropRentDetails[]= array(
                                                     'car_type_id' => $car_type_id,
                                                     'duration_type_id'=>$request['data']['parking']['duration_type_id'][$keyR][$keyC],
                                                     'rent_amount' => $rent_amount[$keyC],
                                                     'property_id'=>$propertyId,
                                                     'status'=>1,
                                                     'created_by'=>'1',
                                                     'modified_by'=>'1',
                                                     'is_deleted'=>'0');

                                   }
                          }
                      } 
                      else
                      {    
                         
                             foreach($request['data']['parking']['rent_amount'] as $keyR => $rent_amount)
                             {

                                        $insertPropRentDetails[]= array(
                                                       'property_id' => $propertyId,
                                                       'duration_type_id'=>$keyR,
                                                       'rent_amount'=>$rent_amount[0],
                                                       'status'=>1,
                                                       'created_by'=>'1',
                                                       'modified_by'=>'1',
                                                       'is_deleted'=>'0');

                             }
                      }


                     $insertPropRentData  = DB::table($tbl_prefix.'add_property_rent')->insert($insertPropRentDetails);
                    }
                  //Add Booking Durition
                  //exit;
                  $inserAmenitiesArr=[];
                  foreach ($request['data']['amenities'] as $value) {
                                # code...
                                $inserAmenitiesArr[]=array(
                                                          'amenity_id'=>$value,
                                                          'property_id'=>$propertyId,
                                                          'status'=>1,
                                                          'created_by'=>'1',
                                                          'modified_by'=>'1',
                                                          'is_deleted'=>'0'
                                                      );
                            }
                            $insertPropFloorData  = DB::table($tbl_prefix.'add_property_amenities')->insert($inserAmenitiesArr);
                            //print_r($propFloorDetails);die('in');
                    }
                    
                   //Code for upload image, floor map and doc
                   if($request->hasfile('property_images'))
                   {
                      foreach($request->file('property_images') as $key => $image)
                      {
                         // $name= str_replace(' ', '-', strtolower($request['data']['property_name']));
                        $name = time().'-'.$image->getClientOriginalName();
                        $image->move(public_path().'/images/properties', $name);  
                        $data[] = $name;  
                        $default_file = ($key == 0) ? 1 : 0;
                        $insertPropertyImage[]= array(
                                                   'name'=>$name,
                                                   'property_id'=>$propertyId,
                                                   'document_type_id'=>1,
                                                   'default_file'=>$default_file,
                                                   'status'=>1,
                                                   'created_by'=>'1',
                                                   'modified_by'=>'1',
                                                   'is_deleted'=>'0');

                      }
                      $insertPropertyImage  = DB::table($tbl_prefix.'add_property_files')->insert($insertPropertyImage);
                   }


                   if($request->hasfile('property_documents'))
                   {
                      foreach($request->file('property_documents') as $key => $image)
                      {
                         // $name= str_replace(' ', '-', strtolower($request['data']['property_name']));
                        $name = time().'-'.$image->getClientOriginalName();
                        $image->move(public_path().'/images/property-documents', $name);  
                        $data[] = $name;  
                        $default_file = ($key == 0) ? 1 : 0;
                        $insertPropertyDoc[]= array(
                                                   'name'=>$name,
                                                   'property_id'=>$propertyId,
                                                   'document_type_id'=>3,
                                                   'default_file'=>$default_file,
                                                   'status'=>1,
                                                   'created_by'=>'1',
                                                   'modified_by'=>'1',
                                                   'is_deleted'=>'0');

                      }
                      $insertPropertyDoc  = DB::table($tbl_prefix.'add_property_files')->insert($insertPropertyDoc);
                   }


                   if($request->hasfile('property_map'))
                   {
                      foreach($request->file('property_map') as $key => $image)
                      {
                         // $name= str_replace(' ', '-', strtolower($request['data']['property_name']));
                        $name = time().'-'.$image->getClientOriginalName();
                        $image->move(public_path().'/images/property-documents', $name);  
                        $data[] = $name;  
                        $default_file = ($key == 0) ? 1 : 0;
                        $insertPropertyMap[]= array(
                                                   'name'=>$name,
                                                   'property_id'=>$propertyId,
                                                   'document_type_id'=>2,
                                                   'default_file'=>$default_file,
                                                   'status'=>1,
                                                   'created_by'=>'1',
                                                   'modified_by'=>'1',
                                                   'is_deleted'=>'0');

                      }
                      $insertPropertyMap  = DB::table($tbl_prefix.'add_property_files')->insert($insertPropertyMap);
                   }

                   $nextyear = date('Y-m-d', strtotime('+365 days'));

                   $propBasicavail = array(
                                    'user_id'=>$_SESSION['user']['user_id'],//$request->input('property_name'),
                                    'property_id'=>$propertyId,
                                    'start_time'=>'00:00:01',
                                    'end_time'=>'23:59:00',
                                    'start_date'=>date('Y-m-d'),
                                    'end_date'=>$nextyear,//$request->input('longitude'),
                                    'created_by'=>'1',
                                    'modified_by'=>'1',
                                    'is_deleted'=>'0',
                                 );
                   $add_property_availabilities  = DB::table($tbl_prefix.'add_property_availabilities')->insert($propBasicavail);
         }

        $data = array('status' => 200,
                      'response' => array('msg' =>'success'));
            //echo 4;exit;  
        echo json_encode($data);
         //echo '{code:200,msg:success}';
    }
}
