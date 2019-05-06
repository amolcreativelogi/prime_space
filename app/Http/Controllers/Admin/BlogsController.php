<?php 

namespace App\Http\Controllers\Admin;

use App\Models\tbl_blogs as tbl_blogs;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Admin\RolesAndPermissions;

use DB;
use Session;

class BlogsController extends Controller {

    
     //roles
    private $objRolesPermissions;
    public function __construct(RolesAndPermissions $objRolesPermissions)
    {
        $this->objRolesPermissions = $objRolesPermissions;
       

       
    }

    //List cms pages
    public function index()
      { 
       
        $data['blogs'] = Tbl_blogs::all();
        return view('admin/blog/index',$data);
      }

    //load add/edit cms page form
    public function add($cms_page_id = NULL)
      { 
        $editBlogs = DB::table('tbl_blogs')->where('id', '=', $cms_page_id)->first();
        return view('admin.blog.add')->with('editBlogs', $editBlogs); 
        
      }

    //save cms page content to database
    public function saveBlog(Request $request)
    { 
      
      $rules =array();
      $rules =  [
            'title' => 'required',
            'image' => 'required',
            'short_description' => 'required',
            'description' => 'required'
       ];
       //if image is alredy exist in db
      if(!empty($request->input('edit_blog_image'))){
      
          unset($rules['image']);
      }else{
          $rules['image']='required';
        
      }
       $validator = Validator::make($request->all(), $rules);
        
       if($validator->fails()) {
           return redirect()->back()->withErrors($validator->errors());
       }else{

          //store blog image
           $image = $request->file('image');
           if($image)
           {
            $ext = $image->getClientOriginalExtension();
            //if not image
            if(!in_array($ext, ['jpg','png','png'])){
              return redirect()->back()->withWarning('Uploaded file should be image');
            }
             $imagename = strtolower(trim($request->input('title'))).'.'.$image->getClientOriginalExtension();
              $destinationPath = public_path('/images/blogs');
              $amenities_image = $image->move($destinationPath,$imagename);
              $image = $imagename;
            
           } else {
              $image = $request->input('edit_blog_image');
           }

         
          if(!$request->input('blog_id')) {
                //Add new record
                $duplicateEntry = DB::table('tbl_blogs')->where('title', '=', $request->input('title'))->where('is_deleted', '=', 0)->count();
                if($duplicateEntry == 0) {
                    $data = array(
                            'title'=>$request->input('title'),
                            'image'=>$image,
                            'short_description'=>$request->input('short_description'),
                            'description'=>$request->input('description'),
                            'status'=>$request->input('status'),
                            'created_by'=>'1',
                            'modified_by'=>'1'
                           );
                    $result  = DB::table('tbl_blogs')->insert($data);
                    if($result)
                    {
                      return redirect()->back()->withSuccess('Record has been saved successfully');
                    }
                }  else {
     
                  return redirect()->back()->withWarning('Blog title already exists');
                }
            } else {
                $duplicateEntry = DB::table('tbl_blogs')->where('title', '=', $request->input('title'))->where('is_deleted', '=', 0)->where('id', '!=', $request->input('blog_id'))->count();
                if($duplicateEntry == 0) {
                  //Update new record
                  $data = array(
                          'title'=>$request->input('title'),
                          'image'=>$image,
                          'short_description'=>$request->input('short_description'),
                          'description'=>$request->input('description'),
                          'status'=>$request->input('status'),
                          'created_by'=>'1',
                          'modified_by'=>'1'
                         );
                $result  = DB::table('tbl_blogs')->where('id', $request->input('blog_id'))->update($data);
                  if($result)
                  {
                    return redirect()->back()->withSuccess('Record has been updated successfully');
                  } else {
                    return redirect('admin/blogs/add');
                  }
                }  else {
     
                  return redirect()->back()->withWarning('Blog title already exists');
                }
            }
       }
        //print_r($rules);die;
    }

    //get cms page list
    public function getBlogs()
    { 
    $sort = array('blogs','status');
    $myll = $_POST['start'];
    $offset = $_POST['length'];
    if(isset($_POST['order'][0])){
    $orrd = $_POST['order'][0];
    $title=$orrd['column'];
    $order=$orrd['dir'];
    }

    $getBlogsTotalRecord = DB::table('tbl_blogs')->select('title','status','id')->where('is_deleted', '=', 0)->get()->count();

    $query = DB::table('tbl_blogs')->select('title','status','id')->where('is_deleted', '=', 0);
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
    $getBlogs = $query->get();
      $data = array();
      $data = array();
      $no = $_POST['start'];
      $sr = 1;
      foreach ($getBlogs as $blogs) {
            $no++;
            $row = array();
            //$row[] = $sr++;
            $row[] = $blogs->title;
            $row[] = ($blogs->status == 1) ? 'Active' : 'Inactive';

            /**check assigned roles and permission for  loggedin user and restrict edit delete access**/
             $unauthorizedRoles =$this->objRolesPermissions->getUnauthorizedRoles($_SESSION['admin_login_id'],'controller','blog');
            
            //create edit delete buttons if roles are assigned else not
            if(!empty($unauthorizedRoles)){
            $editButton="";
            $deleteButton="";
            if(in_array('edit',$unauthorizedRoles)){
            $editButton ='<a href="'.url('admin/blogs/add/'.$blogs->id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  ';
            }
              if(in_array('delete',$unauthorizedRoles)){ 
             $deleteButton ='<button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$blogs->id.','."'tbl_blogs'".','."'id'".');"><i class="fa fa-trash-o"></i></button>';
             }

             if( !empty($editButton) || !empty($deleteButton)){

                $button = $editButton.$deleteButton;
             }else{
                  $button = '-';
             }

             $row[] = $button;
            }else{
              $row[] ='<a href="'.url('admin/blogs/add/'.$blogs->id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$blogs->id.','."'tbl_blogs'".','."'id'".');"><i class="fa fa-trash-o"></i></button>';

            }

             /**end roles check**/

             /*$row[] ='<a href="'.url('admin/blogs/add/'.$blogs->id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$blogs->id.','."'tbl_blogs'".','."'id'".');"><i class="fa fa-trash-o"></i></button>';*/
            $data[] = $row;
          }
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $getBlogsTotalRecord,
                        "recordsFiltered" => $getBlogsTotalRecord,
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
    $getBlogs = DB::table('tbl_blogs')->where(['is_deleted'=> 0,'status'=>1])->orderby('id','desc')->get();
    return view('front.blog.list')->with('getBlogs', $getBlogs); 
    
  }

  //load add/edit cms page form
  public function loadBlogPage($blog_id = NULL)
  { 
    $getBlogPageData = DB::table('tbl_blogs')->where('id', '=', $blog_id)
    ->where(['is_deleted'=> 0,'status'=>1])->first();
    return view('admin.blog.view')->with('getBlogPageData', $getBlogPageData); 
    
  }


}