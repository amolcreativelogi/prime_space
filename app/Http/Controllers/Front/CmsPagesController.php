<?php 
namespace App\Http\Controllers\Front;
use App\Models\Tbl_cms_pages as Tbl_cms_pages;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\CmsPagesRequest;

use DB;
class CmsPagesController extends Controller {
   
  //load add/edit cms page form
  public function loadCmsPage($cms_page_urlkey = NULL)
  { 
    $getCMSPageData = DB::table('tbl_cms_pages')->where('url_keyword', '=', $cms_page_urlkey)->where('is_deleted', '=', 0)->first();
    return view('front.cms_pages.view')->with('getCMSPageData', $getCMSPageData); 
    
  }
}