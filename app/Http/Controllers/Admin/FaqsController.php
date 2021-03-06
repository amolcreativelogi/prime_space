<?php 

namespace App\Http\Controllers\Admin;

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

    //List cms pages
    public function index()
      { 
        $activeCategoryCount = DB::table('tbl_faqs')->where(['status'=>1,'is_deleted' =>0])->count();
        return view('admin.faq.faqList')->with('activeCategoryCount', $activeCategoryCount);
      }

    //load add/edit cms page form
    public function add($faq_id = NULL)
      { 
        
        $getCategories = DB::table('tbl_mstr_faq_categories')->where(['is_deleted'=>0,'status'=>1,])->get();
        $editFaqs = DB::table('tbl_faqs')->where('faq_id', '=', $faq_id)->first();
        return view('admin.faq.addFaq')->with(['editFaqs'=>$editFaqs,'getCategories'=>$getCategories]); 
        
      }

    //save cms page content to database
    public function saveFaq(FaqRequest $request)
    { 
     
      $url= !empty($request->input('frmSubmitFlag'))?'admin/faq/add?category_id='.$request->input('category_id'):"admin/faq/add";

      //if(!$request->input('id')) {
            //Add new record
            $duplicateEntry = DB::table('tbl_faqs')->where('question', '=', $request->input('question'))->where('category_id', '=', $request->input('category_id'))->where('is_deleted', '=', 0)->count();
           // SELECT IFNULL(MAX(subId), 0) INTO @seq FROM test WHERE id = _id;
            if($duplicateEntry == 0) {

              //add sequence number
             /* $sequence= 0;
              if($request->input('status') != 0){
             
              $seq=DB::table('tbl_faqs')
              ->select(
                DB::raw('(CASE WHEN MAX(sequence) IS NULL THEN 0 ELSE MAX(sequence) END) AS sequence')
                )->where('is_deleted', '=', 0)->where('status', '=', 1)->first();

                $sequence =$seq->sequence+1;
              }*/
             
                $data = array(
                        'question'=>$request->input('question'),
                        'answer'=>$request->input('answer'),
                        'category_id'=>$request->input('category_id'),
                        'status'=>$request->input('status'),
                        'created_by'=>'1',
                        'modified_by'=>'1'
                       );
                $result  = DB::table('tbl_faqs')->insert($data);

                if($result)
                {
                  return redirect($url)->withSuccess('Record has been saved successfully');
                }
            }  else {
 
              return redirect($url)->withWarning('Question already exists');
            }
       // } 
    }

    //get cms page list
    public function getFaqs()
    { 
    $sort = array('faqs','status');
    $myll = $_POST['start'];
    $offset = $_POST['length'];
    if(isset($_POST['order'][0])){
    $orrd = $_POST['order'][0];
    $title=$orrd['column'];
    $order=$orrd['dir'];
    }

    $getFaqsTotalRecord = DB::table('tbl_mstr_faq_categories')->leftJoin('tbl_faqs', 'tbl_mstr_faq_categories.category_id', '=', 'tbl_faqs.category_id')->select(
      'tbl_mstr_faq_categories.category_id',
      'tbl_mstr_faq_categories.category_name',
      'tbl_mstr_faq_categories.status',
      DB::raw('count(tbl_faqs.faq_id) as faqCount'))
    ->where(['tbl_faqs.is_deleted'=>0,'tbl_mstr_faq_categories.is_deleted'=>0])
    ->groupBy('tbl_mstr_faq_categories.category_id')
    ->get()->count();
   

    //$getFaqsCategoryTotalRecord = DB::table('tbl_faqs')->select('category_name','status','sequence','category_id')->where('is_deleted', '=', 0)->get()->count();

    $query = DB::table('tbl_mstr_faq_categories')->leftJoin('tbl_faqs', 'tbl_mstr_faq_categories.category_id', '=', 'tbl_faqs.category_id')->select(
      'tbl_mstr_faq_categories.category_id',
      'tbl_mstr_faq_categories.category_name',
      'tbl_mstr_faq_categories.status',
      DB::raw('count(tbl_faqs.faq_id) as faqCount'))
    ->where(['tbl_faqs.is_deleted'=>0,'tbl_mstr_faq_categories.is_deleted'=>0])
    ->groupBy('tbl_mstr_faq_categories.category_id');
    

    if($_POST['search']['value']) {
      $query->where('category_name', 'like', '%' .  $_POST['search']['value'] . '%');
    }

    if($offset!= -1) {
        $query->skip($myll)->take($offset);
    }
    if(isset($order)){
            $query->orderBy($sort[$title], $order);
        }
        else{
          $query->orderBy('tbl_mstr_faq_categories.category_id','asc');
        }
    $getFaqs = $query->get();
      $data = array();
      $data = array();
      $no = $_POST['start'];
      $sr = 1;
      foreach ($getFaqs as $faqs) {
            $no++;
            $row = array();
            //$row[] = $sr++;
            $row[] = $faqs->category_name;
            $row[] = $faqs->faqCount;
            $row[] = ($faqs->status == 1) ? 'Active' : 'Inactive';
             $row[] ='<a href="'.url('admin/faq/list/'.$faqs->category_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="View All"><i class="fa fa-eye"></i></a>';
            $data[] = $row;
          }
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $getFaqsTotalRecord,
                        "recordsFiltered" => $getFaqsTotalRecord,
                        "data" => $data,
      );
      echo json_encode($output);
    }

   //get all questions list by category
    public function getAllFaqList($category_id = null){

     $getAllFaq= DB::table('tbl_faqs')->leftJoin('tbl_mstr_faq_categories', 'tbl_faqs.category_id', '=', 'tbl_mstr_faq_categories.category_id')->select(
      'tbl_faqs.faq_id',
      'tbl_faqs.question',
      'tbl_faqs.status',
      'tbl_mstr_faq_categories.category_id',
      'tbl_mstr_faq_categories.category_name')
    ->where(['tbl_faqs.category_id'=>$category_id,'tbl_faqs.is_deleted'=>0,'tbl_mstr_faq_categories.is_deleted'=>0])->orderBy('tbl_faqs.faq_id','desc')->get();

     //print_r($getAllFaq);
     $getCategoryName = !empty($getAllFaq)?$getAllFaq[0]->category_name:"";
      return view('admin.faq.allFaqList')->with(['getAllFaq'=>$getAllFaq,'getCategoryName'=>$getCategoryName]);
    }

    //load edit cms page form
    public function edit($faq_id = NULL)
    { 
        
        $getCategories = DB::table('tbl_mstr_faq_categories')->where(['is_deleted'=>0,'status'=>1,])->get();
        $editFaqs = DB::table('tbl_faqs')->where('faq_id', '=', $faq_id)->first();
        return view('admin.faq.editFaq')->with(['editFaqs'=>$editFaqs,'getCategories'=>$getCategories]); 
        
    }


    //edit faq
    public function editFaq(FaqRequest $request)
    { 
     
     
          if($request->input('faq_id')) {
            //edit new record
            $duplicateEntry = DB::table('tbl_faqs')->where('question', '=', $request->input('question'))->where('category_id', '=', $request->input('category_id'))->where('faq_id', '!=', $request->input('faq_id'))->where('is_deleted', '=', 0)->count();
          
            if($duplicateEntry == 0) {
             
                $data = array(
                        'question'=>$request->input('question'),
                        'answer'=>$request->input('answer'),
                        'category_id'=>$request->input('category_id'),
                        'status'=>$request->input('status'),
                        'created_by'=>'1',
                        'modified_by'=>'1'
                       );
                $result  = DB::table('tbl_faqs')->where('faq_id', $request->input('faq_id'))->update($data);
                if($result)
                {
                  return redirect()->back()->withSuccess('Record has been saved successfully');
                }
            }  else {
 
              return redirect()->back()->withWarning('Question already exists');
            }
         } 
    }


//Delete faq
 function Delete($faq_id = NULL,$category_id = NULL)
  {
    //delete record
    $data = array('is_deleted'=>1);
    $deleteRecord  = DB::table('tbl_faqs')->where('faq_id', $faq_id)->update($data);
      if($deleteRecord)
      {
         return redirect('admin/faq/list/'.$category_id)->withSuccess('Record has been deleted successfully');
      }
      else
      {
          return redirect('admin/faq/list/'.$category_id)->withWarning('Record has not been deleted ');
      }
  }

 
//Delete record
 function DeleteFaqCategory()
  {
      $data = array('is_deleted'=>1);

     /* UPDATE `tbl_mstr_faq_categories` 
      SET sequence = sequence - 1
      WHERE sequence >  1
      AND is_deleted = '0'*/

    $deletedRecordSequence  = DB::table($_POST['table'])->select('sequence','status')->where($_POST['dbid'], $_POST['id'])->where('is_deleted', 0)->first();

    if(!empty($deletedRecordSequence) && ($deletedRecordSequence->status != 0) ){

      //update sequence of left active records
      $updateRecord  = DB::table($_POST['table'])->where(['status'=>1,'is_deleted' =>0])->where('sequence','>',$deletedRecordSequence->sequence)->update(['sequence'=>DB::raw('sequence - 1')]);
    }
    //delete record
    $deleteRecord  = DB::table($_POST['table'])->where($_POST['dbid'], $_POST['id'])->update($data);
      if($deleteRecord)
      {
          echo '{"code":"200"}';
      }
      else
      {
          echo '{"code":"100"}';
      }
  }

 //get FAQ categories
  public function updateFaqSequence($category_id = NULL)
  {
    //get categories
    $getFaqCategories = DB::table('tbl_faqs')->where(['category_id'=>$category_id,'status'=>1,'is_deleted' =>0])->orderBy('sequence', 'asc')->get();

    $sequenceArr=array();
    $i=1;
    if(!empty($getFaqCategories)){
      for($i=1;$i<=count($getFaqCategories);$i++){
        $sequenceArr[]=$i;
      }
    }
    return view('admin.faq.editFaqSequence')->with(['getFaqCategories'=>$getFaqCategories,'sequenceArr'=>$sequenceArr]);
  }


//Update category sequence
   public function saveFaqSequece(FaqCategorySequenceUpdate $request)
     { 
       if(!empty($request->input('sequence'))){

           $sequenceCatArr = $request->input('sequence');

           if(   count(array_unique($sequenceCatArr)) < count($sequenceCatArr) )
           {
                 //  "Array have some duplicates";
                return redirect()->back()->withWarning('Category should not have duplicate sequence');
           }else{ //   "Array have unique elements";
           
              //Update sequence of category by category id
               foreach ($sequenceCatArr as $categoryId => $sequenceVal) {

                 $updateRecord  = DB::table('tbl_faqs')->where(['status'=>1,'is_deleted' =>0])->where('category_id',$categoryId)->update(['sequence'=>$sequenceVal]);
                
               }

              return redirect()->back()->withSuccess('Category sequence has been updated successfully');

           }   

       }

     }




  //load add/edit cms page form
  public function listFaqs()
  { 
    $listFaqCategory = DB::table('tbl_faqs')->where(['is_deleted'=>0,'status'=>1])->orderBy('sequence', 'asc')->get();
    return view('front.faq.faq')->with('listFaqCategory', $listFaqCategory); 
    
  }

  //load add/edit cms page form
  public function loadBlogPage($blog_id = NULL)
  { 
    $getBlogPageData = DB::table('tbl_faqs')->where('id', '=', $blog_id)->first();
    return view('front.blog.view')->with('getBlogPageData', $getBlogPageData); 
    
  }


  //upload ckeditor image
  public function uploadImage(Request $request) {
    $CKEditor = $request->input('CKEditor');
    $funcNum  = $request->input('CKEditorFuncNum');
    $message  = $url = '';
    if (Input::hasFile('upload')) {
      $file = Input::file('upload');
      if ($file->isValid()) {
        $filename =rand(1000,9999).$file->getClientOriginalName();
        //public_path('/images/amenity')
        $file->move(public_path().'/images/faqs', $filename);
        $url = url('public/images/faqs/' . $filename);
      } else {
        $message = 'An error occurred while uploading the file.';
      }
    } else {
      $message = 'No file uploaded.';
    }
    return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
}

}