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
   
   
    //Search properties
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
      
     
       $data =array();
       //fromdatetime
       $data['start_date'] = '1970:01:01';
       $data['start_time'] = '00:00:00';

       if(!empty(request()->bookfromdate)){

          $expFrmDate = explode(' ', request()->bookfromdate);
          
         if(isset($expFrmDate[0]) && !empty($expFrmDate[0])){
            $frm_bdate = $expFrmDate[0];
            $frm_bdate = DateTime::createFromFormat("m.d.Y" , $frm_bdate);
            $data['start_date'] = $frm_bdate->format('Y-m-d');
          }

          if(isset($expFrmDate[1]) && !empty($expFrmDate[1]) && (request()->durationtype=='hourly')){
             $frm_btime = $expFrmDate[1];
             $data['start_time'] =$frm_btime;
          }
          
       }

        //todatetime

       $data['end_date'] = '1970:01:01';
       $data['end_time'] = '23:00:00';

       if(!empty(request()->booktodate)){

          $expToDate = explode(' ', request()->booktodate);
          $to_bdate = $expToDate[0];
          if(!empty($to_bdate)){
            $to_bdate = DateTime::createFromFormat("m.d.Y" , $to_bdate);
            $data['end_date'] = $to_bdate->format('Y-m-d');

          }

          if(isset($expToDate[1]) && !empty($expToDate[1]) && (request()->durationtype=='hourly')){
            $to_btime = $expToDate[1];
            $data['end_time'] = $to_btime;
          }

       }

       $data['duration']="";
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


       $propertyAmount=$this->getPropertyAmount(request()->property_id,request()->moduleid,$data['duration_type_id']);



       if(request()->durationtype == 'hourly'){ //hourly cal

           $bookingAmount = $totalDays*$totalHours*$propertyAmount;
           $data['booking_amount']=$bookingAmount;
          

       }else if( (request()->durationtype == 'monthly') && ($totalDays >= 30)){

            $month = $totalDays/30;
            $reminder =  $totalDays%30;
            $ratePerDayForMonth=$propertyAmount/30;
            $bookingAmount = ($month*$propertyAmount)+($reminder*$ratePerDayForMonth);
            $data['booking_amount']=$bookingAmount;
           
       }else{
            $bookingAmount = $totalDays*$propertyAmount;
            $data['booking_amount']=$bookingAmount;
           
       }

       $data['propertyAmount'] = $propertyAmount;
       $data['totalDays'] = $totalDays;
       $data['totalHours'] = $totalHours;
       $data['property_id']=request()->module_id;
       $data['module_manage_id']=request()->property_id;
       $data['booking_amount']= $bookingAmount;//request()->durationtype;
       $data['booking_status']='pending'; //request()->durationtype;
       $data['created_by']='1';
       $data['modified_by']='1';
      
       print_r($data);


       //todate
      // $to_date = date('Y-m-d');
       /*if(!empty(request()->booktodate)){
          $todate = request()->booktodate;
          $todate = DateTime::createFromFormat("m.d.Y" , $todate);
          $to_date = $todate->format('Y-m-d');
       }
      print_r(request()->booktodate);*/
       //todate
       /*$to_date = date('Y-m-d');
       if(!empty(request()->booktodate)){
          $todate = request()->booktodate;
          $todate = DateTime::createFromFormat("m.d.Y" , $todate);
          $to_date = $todate->format('Y-m-d');
       }*/


       /*//fromtime
       $from_time = date('Y-m-d');
       if(!empty(request()->bookfromdate)){
          $bookfromdate = request()->bookfromdate;
          $bookfromdate = DateTime::createFromFormat("H:i:s" , $bookfromdate);
          $from_time = $bookfromdate->format('H:i:s');
       }*/
       // print_r($to_date);
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
