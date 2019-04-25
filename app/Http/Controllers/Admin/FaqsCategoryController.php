<?php 

namespace App\Http\Controllers\Admin;

//use App\Models\tbl_mstr_faq_categories as tbl_mstr_faq_categories;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\FaqCategoryRequest;
use App\Http\Requests\FaqCategorySequenceUpdate;
use DB;

class FaqsCategoryController extends Controller {

    //List cms pages
    public function index()
      { 
        $activeCategoryCount = DB::table('tbl_mstr_faq_categories')->where(['status'=>1,'is_deleted' =>0])->count();
        return view('admin.faq.index')->with('activeCategoryCount', $activeCategoryCount);
      }

    //load add/edit cms page form
    public function add($faq_cat_id = NULL)
      { 
        $editFaqs = DB::table('tbl_mstr_faq_categories')->where('category_id', '=', $faq_cat_id)->first();
        return view('admin.faq.add')->with('editFaqs', $editFaqs); 
        
      }

    //save cms page content to database
    public function saveFaqsCategory(FaqCategoryRequest $request)
    { 
      
      
      if(!$request->input('category_id')) {
            //Add new record
            $duplicateEntry = DB::table('tbl_mstr_faq_categories')->where('category_name', '=', $request->input('category_name'))->where('is_deleted', '=', 0)->count();

            

           // SELECT IFNULL(MAX(subId), 0) INTO @seq FROM test WHERE id = _id;
            if($duplicateEntry == 0) {

              //add sequence number
              $sequence= 0;
              if($request->input('status') != 0){
             
              $seq=DB::table('tbl_mstr_faq_categories')
              ->select(
                DB::raw('(CASE WHEN MAX(sequence) IS NULL THEN 0 ELSE MAX(sequence) END) AS sequence')
                )->where('is_deleted', '=', 0)->where('status', '=', 1)->first();

                $sequence =$seq->sequence+1;
              }
             
                $data = array(
                        'category_name'=>$request->input('category_name'),
                        'sequence'=>$sequence,
                        'status'=>$request->input('status'),
                        'created_by'=>'1',
                        'modified_by'=>'1'
                       );
                $result  = DB::table('tbl_mstr_faq_categories')->insert($data);

                if($result)
                {
                  return redirect()->back()->withSuccess('Record has been saved successfully');
                }
            }  else {
 
              return redirect()->back()->withWarning('Category name already exists');
            }
        } else {
            $duplicateEntry = DB::table('tbl_mstr_faq_categories')->where('category_name', '=', $request->input('category_name'))->where('is_deleted', '=', 0)->where('category_id', '!=', $request->input('category_id'))->count();
            if($duplicateEntry == 0) {
              //Update new record
              $data = array(
                      'category_name'=>$request->input('category_name'),
                      'status'=>$request->input('status'),
                      'created_by'=>'1',
                      'modified_by'=>'1'
                     );

               //add sequence number

               $getRecordTobeEdited  = DB::table('tbl_mstr_faq_categories')->select('status','sequence')->where('category_id',$request->input('category_id'))->where('is_deleted', 0)->first();

              //if changing status of category
              if( $getRecordTobeEdited->status != $request->input('status') ){
           
                if($request->input('status') == 0){
                  $data['sequence'] = 0;
                   /* UPDATE `tbl_mstr_faq_categories` 
                    SET sequence = sequence - 1
                    WHERE sequence >  1
                    AND is_deleted = '0'*/

                  $inactiveRecordSequence  = DB::table('tbl_mstr_faq_categories')->select('sequence')->where('category_id',$request->input('category_id'))->where('is_deleted', 0)->first();

                  if(!empty($getRecordTobeEdited)){

                    //update sequence of left active records
                    $updateRecord  = DB::table('tbl_mstr_faq_categories')->where(['status'=>1,'is_deleted' =>0])->where('sequence','>',$getRecordTobeEdited->sequence)->update(['sequence'=>DB::raw('sequence - 1')]);
                  }
               
               
                }else{
                   $seq=DB::table('tbl_mstr_faq_categories')
                  ->select(
                    DB::raw('(CASE WHEN MAX(sequence) IS NULL THEN 0 ELSE MAX(sequence) END) AS sequence')
                    )->where('is_deleted', '=', 0)->where('status', '=', 1)->first();

                    $data['sequence'] =$seq->sequence+1;
                }

              }
              

            $result  = DB::table('tbl_mstr_faq_categories')->where('category_id', $request->input('category_id'))->update($data);
              if($result)
              {
                return redirect()->back()->withSuccess('Record has been updated successfully');
              } else {
                return redirect('admin/faqs/add');
              }
            }  else {
 
              return redirect()->back()->withWarning('Category name already exists');
            }
        }
    }

    //get cms page list
    public function getFaqCategories()
    { 
    $sort = array('faqs','status');
    $myll = $_POST['start'];
    $offset = $_POST['length'];
    if(isset($_POST['order'][0])){
    $orrd = $_POST['order'][0];
    $title=$orrd['column'];
    $order=$orrd['dir'];
    }

    $getFaqsCategoryTotalRecord = DB::table('tbl_mstr_faq_categories')->select('category_name','status','sequence','category_id')->where('is_deleted', '=', 0)->get()->count();

    $query = DB::table('tbl_mstr_faq_categories')->select('category_name','sequence','status','category_id')->where('is_deleted', '=', 0);
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
          $query->orderBy('sequence','asc');
        }
    $getFaqsCategory = $query->get();
      $data = array();
      $data = array();
      $no = $_POST['start'];
      $sr = 1;
      foreach ($getFaqsCategory as $faqsCategory) {
            $no++;
            $row = array();
            //$row[] = $sr++;
            $row[] = $faqsCategory->category_name;
            $row[] = $faqsCategory->sequence;
            $row[] = ($faqsCategory->status == 1) ? 'Active' : 'Inactive';
             $row[] ='<a href="'.url('admin/faqs/categories/add/'.$faqsCategory->category_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteFaqCategory('.$faqsCategory->category_id.','."'tbl_mstr_faq_categories'".','."'category_id'".');"><i class="fa fa-trash-o"></i></button>';
            $data[] = $row;
          }
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $getFaqsCategoryTotalRecord,
                        "recordsFiltered" => $getFaqsCategoryTotalRecord,
                        "data" => $data,
      );
      echo json_encode($output);
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
  public function updateCategorySequence()
  {
    //get categories
    $getFaqCategories = DB::table('tbl_mstr_faq_categories')->where(['status'=>1,'is_deleted' =>0])->orderBy('sequence', 'asc')->get();

    $sequenceArr=array();
    $i=1;
    if(!empty($getFaqCategories)){
      for($i=1;$i<=count($getFaqCategories);$i++){
        $sequenceArr[]=$i;
      }
    }
    return view('admin.faq.editSequence')->with(['getFaqCategories'=>$getFaqCategories,'sequenceArr'=>$sequenceArr]);
  }


//Update category sequence
   public function saveFaqsCategorySequece(FaqCategorySequenceUpdate $request)
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

                 $updateRecord  = DB::table('tbl_mstr_faq_categories')->where(['status'=>1,'is_deleted' =>0])->where('category_id',$categoryId)->update(['sequence'=>$sequenceVal]);
                
               }

              return redirect()->back()->withSuccess('Category sequence has been updated successfully');

           }   

       }

     }




  //load add/edit cms page form
  public function listFaqs()
  { 
    $listFaqCategory = DB::table('tbl_mstr_faq_categories')->where(['is_deleted'=>0,'status'=>1])->orderBy('sequence', 'asc')->get();
    return view('front.faq.faq')->with('listFaqCategory', $listFaqCategory); 
    
  }

  //load add/edit cms page form
  public function loadBlogPage($blog_id = NULL)
  { 
    $getBlogPageData = DB::table('tbl_mstr_faq_categories')->where('id', '=', $blog_id)->first();
    return view('front.blog.view')->with('getBlogPageData', $getBlogPageData); 
    
  }

}