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

class SearchPropertyController extends Controller
{
   
   //Search properties
    public function SeachProperty()
    {   

    	//convert date into mysql format Y-m-d
       $from_date = date('Y-m-d');
       if(!empty(request()->fromdate)){
       		$frm_date = request()->fromdate;
       		$frm_date = DateTime::createFromFormat("m.d.Y" , $frm_date);
       		$from_date = $frm_date->format('Y-m-d');
       }

       $to_date = date('Y-m-d');
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
}
