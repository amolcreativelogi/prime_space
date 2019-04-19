<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use DB;
use DateTime;
use DateInterval;
use DatePeriod;


$now = new DateTime();

//validation file
use App\Http\Requests\Frontend\PropertyRequest;

class BookingController extends Controller
{
   
   
    //Get property details
    public function propertyDetails()
    {   

        $module_id = request()->moduleid;
        $property_id = request()->propertyid;

       // $module_id = empty(request()->moduleid)?'2':request()->moduleid;
       // $property_id = empty(request()->propertyid)?'2':request()->propertyid;
       $tbl_prefix=$this->getTablePrefix($module_id);

       $getPropertyDetails = DB::table($tbl_prefix.'add_property')->select('*')->where(['property_id'=>$property_id,'is_deleted'=>0,'status'=>1])->first();

       //get amenities with 
        $getPropImages = DB::table($tbl_prefix.'add_property_files')->select('name'
        )->where(['is_deleted'=>0,'status'=>1,'property_id'=>$property_id])->get();

       //get amenities with 
        $getPropAmenities = DB::table('tbl_mstr_amenities as amnty')->select('amnty.amenity_name',
          'amnty.status','amnty.amenity_image',
          'amnty.amenity_id'
        )
         ->leftJoin($tbl_prefix.'add_property_amenities as propAmnty', 'propAmnty.amenity_id', '=', 'amnty.amenity_id')
         ->where(['amnty.is_deleted'=>0,'amnty.status'=>1,'propAmnty.property_id'=>$property_id])->get();

         $getPropertyrent =  DB::table('prk_add_property_rent')->select('duration_type','car_type','rent_amount')->leftJoin('tbl_mstr_booking_duration_type', 'prk_add_property_rent.duration_type_id', '=', 'tbl_mstr_booking_duration_type.duration_type_id')->leftJoin('prk_car_type', 'prk_add_property_rent.car_type_id', '=', 'prk_car_type.car_type_id')->where('prk_add_property_rent.property_id', '=', $property_id)->get();



         $getLandrent =  DB::table('lnd_add_property_rent')->select('duration_type','rent_amount')->leftJoin('tbl_mstr_booking_duration_type', 'lnd_add_property_rent.duration_type_id', '=', 'tbl_mstr_booking_duration_type.duration_type_id')->where('lnd_add_property_rent.property_id', '=', $property_id)->get();


          $land_type_id =  DB::table('lnd_add_property')->select('land_type')->leftJoin('lnd_land_type', 'lnd_land_type.land_type_id', '=', 'lnd_add_property.land_type_id')->where('lnd_add_property.property_id', '=', $property_id)->first();

          $unit_type_id =  DB::table('lnd_add_property')->select('property_size','unit_type')->leftJoin('tbl_mstr_unit_type', 'tbl_mstr_unit_type.unit_type_id', '=', 'lnd_add_property.unit_type_id')->where('lnd_add_property.property_id', '=', $property_id)->first();


        
         $getPropertyType =  DB::table('prk_add_property_floors')->select('parking_type','floor_name','total_parking_spots')->leftJoin('prk_parking_type', 'prk_add_property_floors.parking_type_id', '=', 'prk_parking_type.parking_type_id')->where('prk_add_property_floors.property_id', '=', $property_id)->get();

          $getPropertyImagesFloorMap =  DB::table($tbl_prefix.'add_property_files')->select('name','document_type_id','default_file')->where('property_id', '=', $property_id)->where('document_type_id', '=', 2)->first();

          
         // // foreach($getPropertyrent as $rent)
         // // {
         // //     $arrCarRent = array_push($rent['car_type'], $rent);
           
         // // }
 
         // echo '<pre>';
         // print_r($getPropertyType);
         // exit;

          return view('front.property.property_details')->with(['getPropertyDetails'=>$getPropertyDetails,'getPropAmenities'=>$getPropAmenities,'getPropertyType'=>$getPropertyType,'getPropImages'=>$getPropImages,'getPropertyImagesFloorMap'=>$getPropertyImagesFloorMap,'getPropertyrent'=>$getPropertyrent,'getLandrent'=>$getLandrent,'module_id'=>$module_id,'land_type_id'=>$land_type_id,'unit_type_id'=>$unit_type_id]); 
    
    }


    public function bookProperty()
    {
      
           $message ="";
           $data =array();

           //fromdatetime formatting
           $data['start_date'] = '1970:01:01';
           $data['start_time'] = '00:00:00';

           if(!empty(request()->bookfromdate)){

              $expFrmDate = explode(' ',request()->bookfromdate);
              
             if(isset($expFrmDate[0]) && !empty($expFrmDate[0]) ){
                $frm_bdate = $expFrmDate[0];
                $frm_bdate = DateTime::createFromFormat("m.d.Y" , $frm_bdate);
                $data['start_date'] = $frm_bdate->format('Y-m-d');
              }

              if(isset($expFrmDate[1]) && request()->durationtype == 'hourly'){
                 $frm_btime = $expFrmDate[1];
                 $data['start_time'] =$frm_btime;
              }

           }
           

            //Todatetime formatting

           $data['end_date'] = '1970:01:01';
           $data['end_time'] = '23:00:00';

           if(!empty(request()->booktodate)){

              $expToDate = explode(' ', request()->booktodate);
              $to_bdate = $expToDate[0];
              if(!empty($to_bdate)){
                $to_bdate = DateTime::createFromFormat("m.d.Y" , $to_bdate);
                $data['end_date'] = $to_bdate->format('Y-m-d');

              }

              if( (isset($expToDate[1]) && !empty($expToDate[1])) && (request()->durationtype=='hourly')){
                $to_btime = $expToDate[1];
                $data['end_time'] = $to_btime;
              }

           }
           //validate data

           if( ($data['end_date'] <  $data['start_date']) || ( $data['end_date'] < date('Y-m-d') )){

          $response = array('status' => 'danger',
                'message'=> 'Please select correct dates.');
            }
            /*else if( (request()->durationtype == 'hourly') && ( strtotime($data['end_time']) <= strtotime($data('start_time'))) ){

                $response = array('status' => 'danger',
                      'message'=> 'Please select correct time.');
            }*/
            else{

           
           $data['duration_type_id']="";

           //Booking amount calculation 
            $totalDays= $this->dateDiffInDays($data['start_date'],$data['end_date']);
            $totalHours= $this->timeDiffInHours($data['start_time'],$data['end_time']);

           if(request()->durationtype == 'hourly'){
               $data['duration_type_id']="1";

           }else if( (request()->durationtype == 'monthly') && ($totalDays >= 30)){
                $data['duration_type_id']="3";
               
           }else{
                $data['duration_type_id']="2";
               
           }

           //getting rent amount for duration type daily i,e 2 for now

           //$propertyAmount=$this->getPropertyAmount(request()->property_id,request()->moduleid,$data['duration_type_id']);
           $propertyAmount=$this->getPropertyAmount(request()->property_id,request()->moduleid,2);
           //get booking amount as per days and price per day
           $bookingAmount = $totalDays*$propertyAmount;


           $data['user_id']=empty($_SESSION['user']['user_id'])?'1':$_SESSION['user']['user_id'];
           $data['property_id']=request()->propertyid;
           $data['module_manage_id']=request()->moduleid;
           $data['booking_amount']= $bookingAmount;
           $data['booking_status']='pending'; 
           $data['created_by']='1';
           $data['modified_by']='1';

           if(!empty($data)){
               $insertBookingRow  = DB::table('tbl_property_bookings')->insert($data);
               $response = array('status' =>'success',
              'message'=> 'Booking has been done successfully.');
              
           }else{
                $response = array('status' => 'danger',
                'message'=> 'Booking has been done successfully.');
           }

       }
       //print_r($data);
       
       return json_encode($response);
      

       exit;

    }

  public function dateDiffInDays($date1, $date2)  
    { 
        // Calulating the difference in timestamps 
        $diff = strtotime($date2) - strtotime($date1); 
        // 24 * 60 * 60 = 86400 seconds 
        return abs(round($diff / 86400)) +1; 
    } 

   public function timeDiffInHours($time1, $time2)  
    { 
        
      // Absolute value of time difference in seconds
      $diff = abs(strtotime($time1) - strtotime($time2));

      // Convert $diff to minutes
      $tmins = $diff/60;

      // Get hours
      $hours = floor($tmins/60);
              // Calulating the difference in timestamps 
      //$diff = strtotime($time2) - strtotime($time1); 
        // 24 * 60 * 60 = 86400 seconds 
        return $hours; 
    } 

    //get property amount by booking duration type
    public function getPropertyAmount($propertyId,$moduleId,$durationTypeId){

      $tbl_prefix = $this->getTablePrefix($moduleId);
      //getPropertyDetails
       return $getPropertyAmount = DB::table($tbl_prefix.'add_property_rent')->select('rent_amount')->where(['duration_type_id'=>$durationTypeId,'property_id'=>$propertyId,'is_deleted'=>0,'status'=>1])->first();
    }



//Get table prefix by module id
    public function getTablePrefix($module_id){

    	 $tbl_prefix="";
        	switch ($module_id) {
        		case '2':
        			$tbl_prefix="prk_";
        			# code...
        			break;
        		case '3':
        			$tbl_prefix="lnd_";
        			# code...
        			break;
        		default:
        			$tbl_prefix="prk_";
        			# code...
        			break;
        	};

        return $tbl_prefix;

    }



    public function bookNow()
    {
      //request parameters from url    
      $module_id = request()->moduleid;
      $property_id = request()->propertyid;

      $fromtime = request()->fromtime;
      $totime = request()->totime;

      $fromdate = request()->fromdate; 
      $todate = request()->todate;  

      $durationtype = request()->durationtype;
      $car_type_req = request()->car_type_id;

      //end of request parameters

      $tbl_prefix=$this->getTablePrefix($module_id);
      
      //get property data
      $data['getPropertyDetails'] = DB::table($tbl_prefix.'add_property')->select('*')->where(['property_id'=>$property_id,'is_deleted'=>0,'status'=>1])->first();
      

      //get amminities

      $data['getPropAmenities'] = DB::table('tbl_mstr_amenities as amnty')->select('amnty.amenity_name',
      'amnty.status','amnty.amenity_image',
      'amnty.amenity_id'
    )
     ->leftJoin($tbl_prefix.'add_property_amenities as propAmnty', 'propAmnty.amenity_id', '=', 'amnty.amenity_id')
     ->where(['amnty.is_deleted'=>0,'amnty.status'=>1,'propAmnty.property_id'=>$property_id])->get();
      
      //get dates
      $data['fromdate'] = request()->fromdate;  
      $data['todate'] = request()->todate;  

      
      //get property images
      $data['getPropImages'] = DB::table($tbl_prefix.'add_property_files')->select('name'
        )->where(['is_deleted'=>0,'status'=>1,'property_id'=>$property_id])->first();
      
      //get property 
      $data['getPropertyType'] =  DB::table('prk_add_property_floors')->select('parking_type','floor_name','total_parking_spots')->leftJoin('prk_parking_type', 'prk_add_property_floors.parking_type_id', '=', 'prk_parking_type.parking_type_id')->where('prk_add_property_floors.property_id', '=', $property_id)->first();
      
      //get car details
      $data['getCarProperty'] =  DB::table('prk_add_property_rent')->select('duration_type','car_type','rent_amount', 'prk_car_type.car_type_id')->leftJoin('tbl_mstr_booking_duration_type', 'prk_add_property_rent.duration_type_id', '=', 'tbl_mstr_booking_duration_type.duration_type_id')->leftJoin('prk_car_type', 'prk_add_property_rent.car_type_id', '=', 'prk_car_type.car_type_id')->where('prk_add_property_rent.property_id', '=', $property_id)->where('prk_car_type.car_type_id', '=', $car_type_req)->where('duration_type', '=', strtolower($durationtype))->first();
      
      //Get user details 
      if(isset($_SESSION['user']['is_user_login'])) { 
      $userId = ($_SESSION['user']['user_id']);
      $data['user_details_get'] =  DB::table('prk_user_registrations')->select('*')->where('user_id', '=', $userId)->first();
      }

      $initialPrice = $data['getCarProperty']->rent_amount;
      

      $data['finalprice'] = $this->calculatePrice($fromtime, $totime, $fromdate, $todate, $durationtype, $initialPrice);

      //return view
      return view('front/pages/booking', $data);
    }

    //function to calculate price 
    public function calculatePrice($fromtime, $totime, $fromdate, $todate, $durationtype, $initialPrice){
          $frm_date = DateTime::createFromFormat("m.d.Y" , $fromdate);
          $from_date = $frm_date->format('Y-m-d');

          $t_date = DateTime::createFromFormat("m.d.Y" , $todate);
          $to_date = $t_date->format('Y-m-d');

          $datetime1 = new DateTime($to_date);
          $datetime2 = new DateTime($from_date);
          
     
       if ($durationtype == "hourly"){
        $to = \Carbon\Carbon::createFromFormat('H:s:i', $totime);
        $from = \Carbon\Carbon::createFromFormat('H:s:i', $fromtime); 
        $diff_in_minutes = $to->diffInMinutes($from);
        $finalPrice = $diff_in_minutes * $initialPrice;
        return $finalPrice;
      }

      else if ($durationtype == "daily"){
        
        $interval = $datetime2->diff($datetime1)->format('%m');
        $finalPrice = $interval * $initialPrice;
        return $finalPrice;
      }

      else if ($durationtype == "weekly"){
        $this->datediffInWeeks($datetime1, $datetime2);
        $finalPrice = $finalWeek* $initialPrice;
      }

      else if ($durationtype == "monthly"){
        $year1 = $datetime2->format('y');
        $year2 = $datetime1->format('y');
        $month1 = $datetime2->format('m');
        $month2 = $datetime1->format('m');
        $diff = (($year1 - $year2) * 12) + ($month1 - $month2);
        $finalPrice = $diff * $initialPrice;
        return $finalPrice;

      }

    }

    public function datediffInWeeks($datetime1, $datetime2)
    {
        if($datetime1 > $datetime2) return datediffInWeeks($datetime2, $datetime1);
        $first = DateTime::createFromFormat('m/d/Y', $datetime1);
        $second = DateTime::createFromFormat('m/d/Y', $datetime2);
        $finalWeek = $first->diff($second)->days/7;
        print_r($finalWeek);
        exit;
        return $finalWeek;
    }


}
