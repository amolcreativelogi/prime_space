<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

use DB;

class UsersController extends Controller
{
    public function Host_Users()
    {
    	return view('admin.master.Host_Users');
    }
}
