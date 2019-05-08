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

   
  //list FAQ's as per category on frontend
  public function index()
  { 
   
    //get faqs
    $getFaqs= DB::table('tbl_faqs')
    ->leftJoin('tbl_mstr_faq_categories', 'tbl_faqs.category_id', '=', 'tbl_mstr_faq_categories.category_id')
    ->leftJoin('tbl_faq_sequence', 'tbl_faqs.faq_id', '=', 'tbl_faq_sequence.faq_id')
    ->select(
      'tbl_faqs.faq_id',
      'tbl_faqs.question',
      'tbl_faqs.answer',
      'tbl_faqs.status',
      'tbl_faq_sequence.sequence',
      'tbl_mstr_faq_categories.category_id',
      'tbl_mstr_faq_categories.category_name')
    ->where(['tbl_faqs.status'=>1,'tbl_faqs.is_deleted'=>0,'tbl_mstr_faq_categories.status'=>1,'tbl_mstr_faq_categories.is_deleted'=>0])
    ->orderBy('tbl_mstr_faq_categories.sequence')
    ->orderBy('tbl_faq_sequence.sequence')->get();

     $arrFaqWithCat=array();
     $faqCategories= array();
    if(!empty($getFaqs)){
      //sort array by category id
        foreach ($getFaqs as $key => $faqs) {

          //get questions
           $arrFaqWithCat[$faqs->category_id][]=array(
            'faq_id'=>$faqs->faq_id,
            'question'=>$faqs->question,
            'answer'=>$faqs->answer,
            'category_id'=>$faqs->category_id
            );

           //get categories
           $faqCategories[$faqs->category_id]=$faqs->category_name;
           
        }
     
    }
   //return result
    return view('front.faq.faq')->with(['faqCategories'=>$faqCategories,'arrFaqWithCat'=>$arrFaqWithCat]); 
    
  }


}