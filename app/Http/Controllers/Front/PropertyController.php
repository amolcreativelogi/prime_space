<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use DB;

class PropertyController extends Controller
{
    public function addproperty()
    {
    	return view('front.property.add_property');
    }
}
