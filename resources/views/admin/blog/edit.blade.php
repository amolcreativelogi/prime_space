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
        <li><a href="{{Request::root()}}/tbl_cms_pages">Manage Tbl_cms_pages</a></li>
        <li><a href="{{Request::root()}}/tbl_cms_pages/add-tbl_cms_pages">Add Tbl_cms_pages</a></li>
      </ul>
  </div>
</nav>

<div class="container">

  <h2>Update Tbl_cms_pages</h2>  
<form role="form" method="post" action="{{Request::root()}}/admin/cmspages/edit_post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input type="hidden" value="<?php echo $tbl_cms_pages->id ?>"   name="tbl_cms_pages_id">


      <div class="form-group">
    <label for="id">Id:</label>
    <input type="number" value="<?php echo $tbl_cms_pages->id ?>" class="form-control" id="id" name="id">
  </div>
    <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" value="<?php echo $tbl_cms_pages->title ?>" class="form-control" id="title" name="title">
  </div>
    <div class="form-group">
    <label for="url_keyword">Url_keyword:</label>
    <input type="text" value="<?php echo $tbl_cms_pages->url_keyword ?>" class="form-control" id="url_keyword" name="url_keyword">
  </div>
      <div class="form-group">
  <label for="description">Description:</label>
<textarea  class="form-control" id="description" name="description">     <?php echo $tbl_cms_pages->description ?>       </textarea>
 </div>
      <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>