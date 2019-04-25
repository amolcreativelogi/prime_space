<?php 

namespace App\Http\Controllers\Admin;

//use App\Models\tbl_mstr_faq_categories as tbl_mstr_faq_categories;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\FaqsRequest;

use DB;

class FaqsCategoryController extends Controller {

    //List cms pages
    public function index()
      { 
       
        $data['blogs'] = tbl_mstr_faq_categories::all();
        return view('admin/faqs/index',$data);
      }

    //load add/edit cms page form
    public function add($faq_cat_id = NULL)
      { 
        $editFaqs = DB::table('tbl_mstr_faq_categories')->where('category_id', '=', $faq_cat_id)->first();
        return view('admin.faqs.add')->with('editFaqs', $editFaqs); 
        
      }

    //save cms page content to database
    public function saveFaqsCategory(BlogRequest $request)
    { 
      
      
      if(!$request->input('category_id')) {
            //Add new record
            $duplicateEntry = DB::table('tbl_mstr_faq_categories')->where('category_name', '=', $request->input('category_name'))->where('is_deleted', '=', 0)->count();
            if($duplicateEntry == 0) {
                $data = array(
                        'category_name'=>$request->input('category_name'),
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
    public function getFaqsCategory()
    { 
    $sort = array('faqs','status');
    $myll = $_POST['start'];
    $offset = $_POST['length'];
    if(isset($_POST['order'][0])){
    $orrd = $_POST['order'][0];
    $title=$orrd['column'];
    $order=$orrd['dir'];
    }

    $getFaqsCategoryTotalRecord = DB::table('tbl_mstr_faq_categories')->select('title','status','category_id')->where('is_deleted', '=', 0)->get()->count();

    $query = DB::table('tbl_mstr_faq_categories')->select('category_name','status','category_id')->where('is_deleted', '=', 0);
    if($_POST['search']['value']) {
      $query->where('title', 'like', '%' .  $_POST['search']['value'] . '%');
    }

    if($offset!= -1) {
        $query->skip($myll)->take($offset);
    }
    if(isset($order)){
            $query->orderBy($sort[$title], $order);
        }
        else{
          $query->orderBy('id','desc');
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
            $row[] = ($faqsCategory->status == 1) ? 'Active' : 'Inactive';
             $row[] ='<a href="'.url('admin/blogs/add/'.$faqsCategory->category_id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$faqsCategory->category_id.','."'tbl_mstr_faq_categories'".','."'id'".');"><i class="fa fa-trash-o"></i></button>';
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

 //clean and create url keyword from cms page title
  function clean($string) {
     $string = strtolower(str_replace(' ', '-', $string)); // Replaces all spaces with hyphens.
     return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
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
        $file->move(public_path().'/images/blogs', $filename);
        $url = url('public/images/blogs/' . $filename);
      } else {
        $message = 'An error occurred while uploading the file.';
      }
    } else {
      $message = 'No file uploaded.';
    }
    return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
}

//Delete record
 function DeteteRecord()
  {
      $data = array('is_deleted'=>1);
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

  //load add/edit cms page form
  public function listBlogs()
  { 
    $getBlogs = DB::table('tbl_mstr_faq_categories')->orderBy('id', 'desc')->get();//tbl_mstr_faq_categories::all();
    return view('front.blog.list')->with('getBlogs', $getBlogs); 
    
  }

  //load add/edit cms page form
  public function loadBlogPage($blog_id = NULL)
  { 
    $getBlogPageData = DB::table('tbl_mstr_faq_categories')->where('id', '=', $blog_id)->first();
    return view('front.blog.view')->with('getBlogPageData', $getBlogPageData); 
    
  }

}