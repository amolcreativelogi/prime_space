
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laravel Crud By Crud Generator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://crudegenerator.in">Laravel Crud By Crud Generator</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="{{Request::root()}}/tbl_cms_pages/manage-tbl_cms_pages">Manage Tbl_cms_pages</a></li>
        <li><a href="{{Request::root()}}/tbl_cms_pages/add-tbl_cms_pages">Add Tbl_cms_pages</a></li>
      </ul>
  </div>
</nav>

<div class="container">
@if(!empty($getBlogs))
@foreach($getBlogs as $blogs)

 <div class="row">
  <div class="col-xs-12 col-md-10 well">
   id  :  <?php echo $blogs->id ?>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-10 well">
   title  :  <?php echo $blogs->title ?>
  </div>
</div>
<?php 
$image='';
  if (isset($blogs->image) && file_exists(public_path() . '/images/blogs/' . $blogs->image. '')) {
        $image = '<a target="_blank" href="'.url('/public/images/blogs/'.$blogs->image.'').'"><img src="'.url('/public/images/blogs/'.$blogs->image.'').'" width="50"></a>';
    } 
?> 
<div class="row">
  <div class="col-xs-12 col-md-10 well">
   Image  :  <?php echo $image ?>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-md-10 well">
   description  :  <?php echo $blogs->short_description ?>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-10 well">
   description  :  <?php echo $blogs->description ?>
  </div>
</div>
@endforeach
@endif
</div>

</body>
</html>