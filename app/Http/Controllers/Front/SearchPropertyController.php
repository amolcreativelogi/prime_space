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

class SearchPropertyController extends Controller
{
   
   
  //Search properties
    public function SeachProperty()
    {   
      //convert date into mysql format Y-m-d
       $from_date = ''; //date('Y-m-d');
       if(!empty(request()->fromdate)){
          $frm_date = request()->fromdate;
          $frm_date = DateTime::createFromFormat("m.d.Y" , $frm_date);
          $from_date = $frm_date->format('Y-m-d');
       }

       $to_date = '';//date('Y-m-d');
       if(!empty(request()->fromdate)){
          $todate = request()->todate;
          $todate = DateTime::createFromFormat("m.d.Y" , $todate);
          $to_date = $todate->format('Y-m-d');
       }

       $module_id = empty(request()->module_id)?'2':request()->module_id;
       $location = request()->location;
       $latitude = request()->latitude;
       $longitude = request()->longitude;
       $car_type_id = request()->car_type_id;
       $location_type_id = request()->location_type_id;
       $duration_type_id = request()->duration_type_id;
       $land_type_id = request()->land_type_id;

       // time 
       $from_time = request()->fromtime; 
       $to_time = request()->totime;

       if($duration_type_id != 1){
        if($from_time=='00:00'){$from_time = '00:00:01';}
        if($to_time=='23:00'){$to_time = '23:59:00';}
       }

       //get tbl prefix by module id
       $tbl_prefix=$this->getTablePrefix($module_id);


        // when location is not empty build query
        $locationFields="";
        $locationWhr="";
        if(!empty($latitude) && !empty($longitude)){
          $locationFields =",(3959 * acos( cos( radians($latitude) ) * cos( radians(addProperty.latitude ) ) * cos( radians( addProperty.longitude ) - radians($longitude) )+sin( radians(
                         $latitude) ) * sin( radians( addProperty.latitude ) ) ) ) as distance ";
             $locationWhr=' HAVING distance <= 10000000000.10686 ORDER BY distance ';//5 km
        }

        $searchResult=array();

        if($module_id==2){ //parking

          //get  property id's which are available and not booked  
          $getValidPropIds=$this->getValidParkingProperty($module_id,$from_date,$to_date,$from_time,$to_time,$duration_type_id);


          //get location type
          $locationTypeWhere="";
          if(!empty($location_type_id)){

            $locationTypeWhere =" AND addProperty.location_type_id=".$location_type_id;

          }



           //get conditions for car type
          $carTypeJoin="";
          $carTypeWhere="";
          $carTypeSelect="";
          if(!empty($car_type_id)){
            $carTypeSelect=",propRent.rent_amount ";
            $carTypeJoin =" LEFT JOIN  ".$tbl_prefix."add_property_rent  as propRent
          ON propRent.property_id = addProperty.property_id ";

            $carTypeWhere =" AND propRent.status=1 AND propRent.is_deleted=0 AND propRent.car_type_id=".$car_type_id." AND propRent.duration_type_id=".$duration_type_id;

          }

          //serch result for cheapest
         $orderByRentPrice = !empty($carTypeWhere)?$carTypeWhere.',propRent.rent_amount':$carTypeWhere;


         
         //search result for cheapest
        $resultCheapest = DB::select("SELECT
          (SELECT name FROM ".$tbl_prefix."add_property_files papf WHERE papf.property_id = addProperty.property_id AND document_type_id =1 order by file_id limit 1 ) AS image,
          addProperty.latitude,addProperty.longitude,addProperty.location,addProperty.module_manage_id,addProperty.name,addProperty.status,addProperty.property_id ".$locationFields.$carTypeSelect." 
          FROM ".$tbl_prefix."add_property AS addProperty
          ".$carTypeJoin."
          WHERE addProperty.module_manage_id =".$module_id."
          AND addProperty.status = 1 AND addProperty.is_deleted = 0 AND addProperty.property_id IN(".$getValidPropIds.")".$carTypeWhere.$locationTypeWhere.$locationWhr.$orderByRentPrice

         );

          //search result for closest
          $resultClosest = DB::select("SELECT
          (SELECT name FROM ".$tbl_prefix."add_property_files papf WHERE papf.property_id = addProperty.property_id AND document_type_id =1 order by file_id limit 1 ) AS image,
          addProperty.latitude,addProperty.longitude,addProperty.location,addProperty.module_manage_id,addProperty.name,addProperty.status,addProperty.property_id ".$carTypeSelect.$locationFields." 
          FROM ".$tbl_prefix."add_property AS addProperty
          ".$carTypeJoin."
          WHERE addProperty.module_manage_id =".$module_id."
          AND addProperty.status = 1 AND addProperty.is_deleted = 0 AND addProperty.property_id IN(".$getValidPropIds.")".$carTypeWhere.$locationTypeWhere.$locationWhr

         );


         }else if($module_id == 3){

          //get  property id's which are available and not booked  
         $getValidPropIds=$this->getValidLandProperty($module_id,$from_date,$to_date,$from_time,$to_time,$duration_type_id);


          //get conditions for land type
          $landTypeSelect="";
          $landTypeWhere="";
          $landTypeJoin="";
          if(!empty($land_type_id)){
            $landTypeSelect="";
            $landTypeJoin =" LEFT JOIN  lnd_add_land_type  as propLandType
          ON propLandType.property_id = addProperty.property_id ";

            $landTypeWhere =" AND propLandType.status=1 AND propLandType.is_deleted=0 AND propLandType.land_type_id IN(".$land_type_id.")";

          }

          //get result
          $result = DB::select("SELECT
          (SELECT name FROM ".$tbl_prefix."add_property_files papf WHERE papf.property_id = addProperty.property_id AND document_type_id =1 order by file_id limit 1 ) AS image,
          addProperty.latitude,addProperty.longitude,addProperty.location,addProperty.module_manage_id,addProperty.name,addProperty.status,addProperty.property_id,propRent.rent_amount  ".$locationFields." 
          FROM ".$tbl_prefix."add_property AS addProperty
          LEFT JOIN  lnd_add_property_rent  as propRent
          ON propRent.property_id = addProperty.property_id
          ".$landTypeJoin."
          WHERE addProperty.module_manage_id =".$module_id.$landTypeWhere."
          AND addProperty.status = 1 AND addProperty.is_deleted = 0 AND propRent.status=1 AND propRent.is_deleted=0 AND propRent.duration_type_id=".$duration_type_id." AND addProperty.property_id NOT IN(".$getValidPropIds.")");

          $resultClosest = '';
          $resultCheapest = '';
          if(!empty($result)){
                $collection = collect($result);
                $resultClosestSrt=$collection->where('distance','<=','10000000000.10686');//20 km 
                $resultClosest =  $resultClosestSrt->sortBy('distance');
                $resultCheapest = $resultClosest->sortBy('rent_amount');
          }
          

         }else{
           
         }
        // print_r($searchResult);die('in');
        $searchResult['closest']=($resultClosest) ? $resultClosest : array();
        $searchResult['cheapest']=($resultCheapest) ? $resultCheapest : array();
       

        //Count of properties
        $no_of_prop = ($resultClosest)?count($resultClosest):0;

         $searchArr = array(
          'module_id'=>$module_id,
          'from_date'=>$from_date,
          'to_date'=>$to_date
        );

        //get modules
        $getModuleCategories = DB::table('tbl_module_manage')
        ->select('module_manage_id','status','module_manage_name')
        ->where([['is_deleted', '=', 0],
                ['status', '=', 1]])->get();

         $getCarType = DB::table('prk_car_type')
        ->select('status','car_type','car_type_id')
        ->where([['is_deleted', '=', 0],
                ['status', '=', 1]])->get();

        $getlandType = DB::table('lnd_land_type')
        ->select('status','land_type','land_type_id')
        ->where([['is_deleted', '=', 0],
                ['status', '=', 1]])->get();

        $getLocationType = DB::table('tbl_mstr_location_type')
        ->select('status','location_type','location_type_id')
        ->where([['is_deleted', '=', 0],
                ['status', '=', 1]])->get();

        return view('front.pages.all_property')->with(
          ['getModuleCategories'=>$getModuleCategories,'searchArr'=>$searchArr,'searchResult'=>$searchResult,'no_of_prop'=>$no_of_prop,'getCarType'=>$getCarType,'getlandType'=>$getlandType,'getLocationType'=>$getLocationType]
        );
       // exit;



    } 
   //Search properties
    public function SeachPropertysss()
    {   

    	//convert date into mysql format Y-m-d
      // $from_date = date('Y-m-d');
       if(!empty(request()->fromdate)){
       		$frm_date = request()->fromdate;
       		$frm_date = DateTime::createFromFormat("m.d.Y" , $frm_date);
       		$from_date = $frm_date->format('Y-m-d');
       }

       //$to_date = date('Y-m-d');
       if(!empty(request()->fromdate)){
       		$todate = request()->todate;
       		$todate = DateTime::createFromFormat("m.d.Y" , $todate);
       		$to_date = $todate->format('Y-m-d');
       }

        // time 
       $from_time = request()->fromtime; 
       $to_time = request()->totime; 
       $module_id = empty(request()->module_id)?'2':request()->module_id;
       $location = request()->location;
       $latitude = request()->latitude;
       $longitude = request()->longitude;



       	// when location is not empty build query
        $locationFields="";
        $locationWhr="";
        if(!empty($latitude) && !empty($longitude)){
        	$locationFields =",(3959 * acos( cos( radians($latitude) ) * cos( radians(addProperty.latitude ) ) * cos( radians( addProperty.longitude ) - radians($longitude) )+sin( radians(
                         $latitude) ) * sin( radians( addProperty.latitude ) ) ) ) as distance ";
             $locationWhr=' HAVING distance < 500 ORDER BY distance';
        }

        //when land module is selected get hour price default
		$rentAmount="";
        if($module_id == 3)
		{
			$rentAmount ="(SELECT rent_ammount from lnd_add_property_rent papr where papr.property_id = addProperty.property_id and duration_type_id = 1) as rent_amount,";	
        }


        //get modules
        $getModuleCategories = DB::table('tbl_module_manage')
        ->select('module_manage_id','status','module_manage_name')
        ->where([['is_deleted', '=', 0],
                ['status', '=', 1]])->get();

        $searchArr = array(
        	'module_id'=>$module_id,
        	'from_date'=>$from_date,
        	'to_date'=>$to_date
        );

        $tbl_prefix=$this->getTablePrefix($module_id);

        //Search query
        $searchResult = DB::select("select
        	(select name from ".$tbl_prefix."add_property_files papf where papf.property_id = addProperty.property_id and document_type_id =1 order by file_id limit 1 ) as image ,".$rentAmount."
        	addProperty.latitude,addProperty.longitude,addProperty.location,addProperty.module_manage_id,addProperty.name,addProperty.status,addProperty.property_id ".$locationFields." from ".$tbl_prefix."add_property as addProperty
			 INNER JOIN 
			(
			SELECT property_id AS property_id FROM ".$tbl_prefix."add_property_availabilities where 
			(
	             (DATE(`start_date`) <= '".$to_date."') and 
	             (DATE(`end_date`) >= '".$from_date."')
	          )

	          AND(

	             (TIME(`start_time`) < '".$to_time."') and 
	             (TIME(`end_time`) > '".$from_time."')
	          )
			group by property_id
			  ) AS propAvailblty on
           addProperty.property_id = propAvailblty.property_id 
        	where addProperty.module_manage_id =".$module_id."
        	and addProperty.status = 1 and addProperty.is_deleted = 0 

	         and NOT EXISTS (SELECT * from tbl_property_bookings where property_id = addProperty.property_id and module_manage_id = ".$module_id." and
	      		 
	         	( 
	         	    (DATE(`start_date`) <= '".$to_date."') and 
	         		(DATE(`end_date`) >= '".$from_date."') 
	         	)AND 
	            ( 		
	            	(TIME(`start_time`) < '".$to_time."') and 
	         		(TIME(`end_time`) >  '".$from_time."') 
	         		
	         	)
	       

	     ) ".$locationWhr

         );

        //Count of properties
        $no_of_prop = ($searchResult)?count($searchResult):0;

         $getCarType = DB::table('prk_car_type')
        ->select('status','car_type','car_type_id')
        ->where([['is_deleted', '=', 0],
                ['status', '=', 1]])->get();

        $getlandType = DB::table('lnd_land_type')
        ->select('status','land_type','land_type_id')
        ->where([['is_deleted', '=', 0],
                ['status', '=', 1]])->get();

        return view('front.pages.all_property')->with(
        	['getModuleCategories'=>$getModuleCategories,'searchArr'=>$searchArr,'searchResult'=>$searchResult,'no_of_prop'=>$no_of_prop,'getCarType'=>$getCarType,'getlandType'=>$getlandType]
        );
       // exit;



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


   // get duration type by module and property id
    public static function getDurationType($property_id,$module_id=2){

    	 $searchCntrlrObj  = new SearchPropertyController;
         $tbl_prefix = $searchCntrlrObj->getTablePrefix($module_id);

         //get duration types assigned to property
    	$getDurationTypes = DB::select("select duration_type from tbl_mstr_booking_duration_type left join ".$tbl_prefix."add_property_rent on tbl_mstr_booking_duration_type.duration_type_id = ".$tbl_prefix."add_property_rent.duration_type_id where property_id = ".$property_id);

    	$strDurationTypes = "";
    	if(!empty($getDurationTypes)){
    		
    		$arrCount = count($getDurationTypes);
    		
	    	foreach ($getDurationTypes as $key => $durationTypes) {
	    		$strDurationTypes .= $durationTypes->duration_type;
	    		//place dot except end of string
	    		if($key != $arrCount-1){
	    			$strDurationTypes .='•';
	    		}
	    		
	    	}

    	}

    	return empty($strDurationTypes)?"Hourly":$strDurationTypes;
    	

    }


//get valid parking property ids
  public function getValidParkingProperty($module_id,$from_date,$to_date,$from_time,$to_time,$duration_type_id){

    $getValidPropertyIds='0';
   
    if(!empty($from_date) && !empty($to_date)){

    //get no. of days
    $days = $this->dateDiffInDays($from_date, $to_date);

    if($days <= 6){ //if duration is daily and hourly

      //get days in selected time range

     $getAvailableProperty = DB::select("SELECT property_id, group_concat(days) as aday FROM `prk_property_days_time_availability` WHERE (TIME('".$from_time."') BETWEEN start_time AND end_time) AND (TIME('".$to_time."') BETWEEN start_time AND end_time ) AND is_deleted = 0 and status = 1 group by property_id");

     $days = array();
     $strAvailablePropId='0';
     $propId=array();
      if(!empty($getAvailableProperty)){

          //get daynames array from dates
          $days=$this->getDays($from_date,$to_date); //return ex :(monday,tuesday)
          //print_r($days);

         //check if each day ex :(monday,tuesday) exist in string of daysname col aday from tbl
          foreach($getAvailableProperty as $k=>$v){

            foreach ($days as $key => $value) {

            if(strpos($v->aday, $value) !== false) {
                
                $propId[$v->property_id][]=1; //if exist assign 1
            }else{
                $propId[$v->property_id][]=0; //if not exist assign 0
            }

          }
          
         }


         if(!empty($propId)){ 

            $arrStrAvailablePropId=array();
            foreach ($propId as $pid => $value) {

              if((reset($value) == 1 && count(array_unique($value)) == 1)) //check if each array element contain same value as 1 .i,e each day in search date range is available on search time range
              {
                
                $arrStrAvailablePropId[]=$pid;
              }
            }

            if(!empty($arrStrAvailablePropId)){
              $strAvailablePropId=implode(',',$arrStrAvailablePropId);
            }

          }

      }
      //pass as property id string as ex.23,24
      $avaibilityCondition=$strAvailablePropId;
    /*
       //get day names string from daterange to check day wise avaibility 
       $dayNameString=$this->getDateRangeWithDayName($from_date,$to_date);
       $avaibilityCondition = empty($dayNameString)?"":" AND days IN(".$dayNameString.")";*/
      
    }else{ //if duration is daily and monthly

        //if searching daily then property must be available for 7 days(sun-fri)
        //if searching monthly then property should be available for 6 days i,e can be off for single day in week
        $weekCount=($duration_type_id == 2)?7:6;

        $avaibilityCondition = "SELECT property_id FROM `prk_property_days_time_availability` WHERE (TIME('".$to_time."') > start_time ) AND (TIME('".$from_time."') < end_time  ) AND is_deleted = 0 and status = 1 AND property_id IN 
        (
            SELECT property_id  FROM `prk_property_days_time_availability` WHERE is_deleted = 0 and status = 1
            GROUP BY property_id HAVING COUNT(*) >= ".$weekCount."
         ) ";
    }


    //return property id's  which are available and not booked
    $getValidProperty = DB::select("
    SELECT GROUP_CONCAT(property_id) as property_ids FROM 
    (
    SELECT   A.property_id, A.name, 
     MIN(A.total_slots - (CASE WHEN B.CNT IS NULL THEN 0 ELSE B.CNT END) ) AS Difference
    FROM 

    (
    SELECT 

    (SELECT SUM(total_parking_spots) FROM  prk_add_property_floors as propFloor WHERE propFloor.property_id = prop.property_id AND propFloor.status=1 AND propFloor.is_deleted=0) AS total_slots,

    prop.property_id AS property_id ,
    prop.name as name 
    FROM prk_add_property as prop  WHERE  prop.status=1 AND prop.is_deleted=0 AND prop.property_id IN 
    (
        ".$avaibilityCondition."
     )
     
     ) AS A
     LEFT JOIN 
     
     (
     
     select 
    start_date , end_date ,start_time,end_time,property_id,  COUNT(*) AS CNT
    from tbl_property_bookings as propBooking where ( ((start_date <= '".$to_date."') and (end_date >= '".$from_date."'))  AND  (start_time < '".$to_time."') and (end_time > '".$from_time."' ) ) 
    AND propBooking.booking_status IN('confirm','onhold') AND propBooking.is_deleted=0 AND propBooking.module_manage_id = ".$module_id." GROUP BY start_date, end_date,start_time,end_time,property_id 
         
     ) 
         B  ON A.property_id = B.property_id
         GROUP BY A.property_id, A.name
         
     ) AS  Z
     WHERE (Difference > 0 OR Difference IS NULL)");


    }

   //return property id's
    
    if(isset($getValidProperty[0]->property_ids) && !empty($getValidProperty[0]->property_ids)){
      $getValidPropertyIds=$getValidProperty[0]->property_ids;
    }
    
    return $getValidPropertyIds;


  }

  //get valid land property ids
  public function getValidLandProperty($module_id,$from_date,$to_date,$from_time,$to_time,$duration_type_id){
    //return property id's  which are available and not booked
    $getValidProperty = DB::select("SELECT GROUP_CONCAT(property_id) as property_ids
    FROM tbl_property_bookings AS propBooking WHERE ( ((start_date <= '".$to_date."') AND (end_date >= '".$from_date."'))  AND  (start_time < '".$to_time."') and (end_time > '".$from_time."' ) ) 
    AND propBooking.booking_status IN('confirm','onhold') AND propBooking.is_deleted=0 AND module_manage_id = ".$module_id."");

    //return property id's
    $getValidPropertyIds='0';
    if(isset($getValidProperty[0]->property_ids) && !empty($getValidProperty[0]->property_ids)){
      $getValidPropertyIds=$getValidProperty[0]->property_ids;
    }

    return $getValidPropertyIds;
  }

  

  //get total no. of days from from and to dates
  public function dateDiffInDays($date1, $date2)  
    { 
        // Calulating the difference in timestamps 
        $diff = strtotime($date2) - strtotime($date1); 
        // 24 * 60 * 60 = 86400 seconds 
        return abs(round($diff / 86400)) +1; 
    } 




//get string of daterange
  public function getDateRangeWithDayName($from_date,$to_date){

    $begin = new DateTime($from_date);
    $end = new DateTime($to_date);
    $end = $end->modify( '+1 day' ); 
    $interval = new DateInterval('P1D');
    $daterange = new DatePeriod($begin, $interval ,$end);
    $str="";
    $len= iterator_count($daterange);
    
    foreach($daterange as $k=>$date){
        $str.= "DAYNAME('".$date->format("Y-m-d")."')";
        if($k != $len-1){
          $str.=",";
        }
    }

    return $str;
  }

  //get string of daterange
  public function getDays($from_date,$to_date){

    $begin = new DateTime($from_date);
    $end = new DateTime($to_date);
    $end = $end->modify( '+1 day' ); 
    $interval = new DateInterval('P1D');
    $daterange = new DatePeriod($begin, $interval ,$end);

    $days=array();
    foreach($daterange as $k=>$date){
       $days[]= $date->format('l');
    }

    return $days;
  }

    //get module list
  public function getModuleList()
  {
    
    //get modules
    $getModuleCategories = DB::table('tbl_module_manage')
    ->select('module_manage_id','module_manage_name')
    ->where([['is_deleted', '=', 0],
                ['status', '=', 1]])->get();

    return json_encode($getModuleCategories);
  }
   



}
