<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use DB;

//validation file
use App\Http\Requests\Frontend\PropertyRequest;

class SearchPropertyController extends Controller
{
   
    public function SeachProperty()
    {   

        $fromDate = date('Y-m-d');
        $toDate = date('Y-m-d');
        echo $moduleId = 1;
        echo 'test';
        exit;

    }
}
