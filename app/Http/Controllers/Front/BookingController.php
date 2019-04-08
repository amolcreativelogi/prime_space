<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use DB;
use DateTime;

$now = new DateTime();

//validation file
use App\Http\Requests\Frontend\PropertyRequest;

class BookingController extends Controller
{
   
   
    //Get property details
    public function propertyDetails()
    { 
      
       $module_id = empty(request()->moduleid)?'2':request()->moduleid;
       $property_id = empty(request()->propertyid)?'2':request()->propertyid;
      //getTablePrefix
       $tbl_prefix=$this->getTablePrefix($module_id);

      //getPropertyDetails
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
         ->where(['amnty.is_deleted'=>0,'amnty.status'=>1])->get();

          return view('front.property.property_details')->with(['getPropertyDetails'=>$getPropertyDetails,'getPropAmenities'=>$getPropAmenities,'getPropImages'=>$getPropImages]); 
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


}
