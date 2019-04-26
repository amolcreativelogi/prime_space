
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
@if(!empty($getBlogPageData))
 <div class="row">
  <div class="col-xs-12 col-md-10 well">
   id  :  <?php echo $getBlogPageData->id ?>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-10 well">
   title  :  <?php echo $getBlogPageData->title ?>
  </div>
</div>
<?php 
$image='';
  if (isset($getBlogPageData->image) && file_exists(public_path() . '/images/blogs/' . $getBlogPageData->image. '')) {
      $image = '<a target="_blank" href="'.url('/public/images/blogs/'.$getBlogPageData->image.'').'"><img src="'.url('/public/images/blogs/'.$getBlogPageData->image.'').'" width="50"></a>';
    } 
?> 
<div class="row">
  <div class="col-xs-12 col-md-10 well">
   Image  :  <?php echo $image ?>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-md-10 well">
   description  :  <?php echo $getBlogPageData->short_description ?>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-10 well">
   description  :  <?php echo $getBlogPageData->description ?>
  </div>
</div>
@endif
</div>

</body>
</html>