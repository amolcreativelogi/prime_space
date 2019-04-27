<?php 

namespace App\Http\Controllers\Front;

//use App\Models\tbl_mstr_faq_categories as tbl_mstr_faq_categories;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\FaqRequest;
use DB;

class FaqsController extends Controller {

   
      //load add/edit cms page form
  public function index()
  { 
    //get faq categories
    $listFaqCategory = DB::table('tbl_mstr_faq_categories')->where(['is_deleted'=>0,'status'=>1])->orderBy('sequence', 'asc')->get();

    //get faqs
    $getFaqs= DB::table('tbl_faqs')->leftJoin('tbl_mstr_faq_categories', 'tbl_faqs.category_id', '=', 'tbl_mstr_faq_categories.category_id')->select(
      'tbl_faqs.faq_id',
      'tbl_faqs.question',
      'tbl_faqs.status',
      'tbl_mstr_faq_categories.category_id',
      'tbl_mstr_faq_categories.category_name')
    ->where(['tbl_faqs.status'=>1,'tbl_faqs.is_deleted'=>0,'tbl_mstr_faq_categories.status'=>1,'tbl_mstr_faq_categories.is_deleted'=>0])->get();


    
    return view('front.faq.faq')->with(['listFaqCategory'=>$listFaqCategory,'getFaqs'=>$getFaqs]); 
    
  }


}