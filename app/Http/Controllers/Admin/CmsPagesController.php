<?php 
namespace App\Http\Controllers\Admin;
use App\Models\Tbl_cms_pages as Tbl_cms_pages;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\CmsPagesRequest;
use App\Http\Controllers\Admin\RolesAndPermissions;

use DB;
class CmsPagesController extends Controller {

    //roles
    private $objRolesPermissions;
    public function __construct(RolesAndPermissions $objRolesPermissions)
    {
        $this->objRolesPermissions = $objRolesPermissions;
       

       
    }
    //List cms pages
    public function index()
      { 
       
        $data['tbl_cms_pagess'] = Tbl_cms_pages::all();
        return view('admin/cms_pages/index',$data);
      }
    //load add/edit cms page form
    public function add($cms_page_id = NULL)
      { 
        $getCMSPages = DB::table('tbl_cms_pages')->where('id', '=', $cms_page_id)->first();
        return view('admin.cms_pages.add')->with('editCMSPage', $getCMSPages); 
        
      }
    //save cms page content to database
    public function saveCmsPage(CmsPagesRequest $request)
    { 

      
      if(!$request->input('cms_page_id')) {
            //Add new record
            $duplicateEntry = DB::table('tbl_cms_pages')->where('title', '=', $request->input('title'))->where('is_deleted', '=', 0)->count();
            if($duplicateEntry == 0) {
                $data = array(
                        'title'=>$request->input('title'),
                        'url_keyword'=>$this->clean($request->input('title')),
                        'description'=>$request->input('description'),
                        'status'=>$request->input('status'),
                        'created_by'=>'1',
                        'modified_by'=>'1'
                       );
                $result  = DB::table('tbl_cms_pages')->insert($data);
                if($result)
                {
                  return redirect()->back()->withSuccess('Record has been saved successfully');
                }
            }  else {
 
              return redirect()->back()->withWarning('CMS Page already exists');
            }
        } else {
            $duplicateEntry = DB::table('tbl_cms_pages')->where('title', '=', $request->input('title'))->where('is_deleted', '=', 0)->where('id', '!=', $request->input('cms_page_id'))->count();
            if($duplicateEntry == 0) {
              //Update new record
              $data = array(
                      'title'=>$request->input('title'),
                      'url_keyword'=>$this->clean($request->input('title')),
                      'description'=>$request->input('description'),
                      'status'=>$request->input('status'),
                      'created_by'=>'1',
                      'modified_by'=>'1'
                     );
            $result  = DB::table('tbl_cms_pages')->where('id', $request->input('cms_page_id'))->update($data);
              if($result)
              {
                return redirect()->back()->withSuccess('Record has been updated successfully');
              } else {
                return redirect('admin/cmspages/add');
              }
            }  else {
 
              return redirect()->back()->withWarning('CMS Page already exists');
            }
        }
    }
    //get cms page list
    public function getCMSPages()
    { 
      $sort = array('cms_pages','status');
    $myll = $_POST['start'];
    $offset = $_POST['length'];
    if(isset($_POST['order'][0])){
    $orrd = $_POST['order'][0];
    $title=$orrd['column'];
    $order=$orrd['dir'];
    }
    $getCMSPagesTotalRecord = DB::table('tbl_cms_pages')->select('title','status','id')->where('is_deleted', '=', 0)->get()->count();
    $query = DB::table('tbl_cms_pages')->select('title','status','id')->where('is_deleted', '=', 0);
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
    $getCMSPages = $query->get();
      $data = array();
      $data = array();
      $no = $_POST['start'];
      // $total_rec = array_pop($getCarType);
      //$total_rec = array_pop($list);
      $sr = 1;
      foreach ($getCMSPages as $cmsPages) {
            $no++;
            $row = array();
            //$row[] = $sr++;
            $row[] = $cmsPages->title;
            $row[] = ($cmsPages->status == 1) ? 'Active' : 'Inactive';

             /**check assigned roles and permission for  loggedin user and restrict edit delete access**/
             $unauthorizedRoles =$this->objRolesPermissions->getUnauthorizedRoles($_SESSION['admin_login_id'],'controller','cms_page');
            
            //create edit delete buttons if roles are assigned else not
            $editButton="";
            $deleteButton="";
            if(!empty($unauthorizedRoles) && in_array('edit',$unauthorizedRoles)){
            $editButton ='<a href="'.url('admin/cmspages/add/'.$cmsPages->id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  ';
            }
              if(!empty($unauthorizedRoles) && in_array('delete',$unauthorizedRoles)){ 
             $deleteButton ='<button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$cmsPages->id.','."'tbl_cms_pages'".','."'id'".');"><i class="fa fa-trash-o"></i></button>';
             }

             if( !empty($editButton) || !empty($deleteButton)){

                $button = $editButton.$deleteButton;
             }else{
                  $button = '-';
             }

             $row[] = $button;

             /**end roles check**/

             /*$row[] ='<a href="'.url('admin/cmspages/add/'.$cmsPages->id.'').'" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>  <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"  data-original-title="Delete"  onclick="DeleteRecord('.$cmsPages->id.','."'tbl_cms_pages'".','."'id'".');"><i class="fa fa-trash-o"></i></button>';*/
            $data[] = $row;
          }
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $getCMSPagesTotalRecord,
                        "recordsFiltered" => $getCMSPagesTotalRecord,
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
        $file->move(public_path().'/images/cms-pages', $filename);
        $url = url('public/images/cms-pages/' . $filename);
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
  public function loadCmsPage($cms_page_urlkey = NULL)
  { 
    $getCMSPageData = DB::table('tbl_cms_pages')->where('url_keyword', '=', $cms_page_urlkey)->first();
    return view('admin.cms_pages.view')->with('getCMSPageData', $getCMSPageData); 
    
  }
}