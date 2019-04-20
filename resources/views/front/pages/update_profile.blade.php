@extends('front/layouts.default')
@section('content')

<div class="site-content">

<div class="site-login  site-form">
<div class="container">
<div class="row">
<div class="col-lg-4 col-md-3 col-sm-2"></div>
<div class="col-lg-4 col-md-6 col-sm-8">
<h1>Update Profile</h1>

<!--  <p class="subtitle">Please fill out the following fields to login:</p>-->

<div class="site-form-box">
<form  action="{{ URL::to('updatesaveprofile') }}" method="post" enctype="multipart/form-data">
@if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {!! \Session::get('success') !!}
        </div>
      @endif
      @if (\Session::has('error'))
        <div class="alert alert-danger">
            <ul>
                <li>{!! \Session::get('error') !!}</li>
            </ul>
        </div>
      @endif
  {!! csrf_field() !!}

  <div class="form-group field-updateprofileform-address required">
    <!-- <label class="control-label">Profile Image</label> -->
    <!-- <input type="file" class="form-control" name="profile_pic" id="profile_pic"> -->
    <div class="box custom-fileinput">
    <input type="file" name="profile_pic" id="profile_pic" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple  />
    <label for="profile_pic"><span></span> <strong>Choose Profile Picture</strong></label>
  </div>
  </div>

  <div class="form-group field-updateprofileform-emailaddress">
    <label class="control-label">Email Address</label>
    <input type="hidden" value="<?php echo $userdetails->user_id; ?>" id="id_user_id" name="user_id">
    <input type="text"  class="form-control"  disabled="" value="<?php echo $userdetails->email_id; ?>">
  </div>
  <div class="form-group field-updateprofileform-firstname ">
    <label class="control-label" >First Name</label>
    <input type="text" class="form-control" name="firstname"  value="<?php echo $userdetails->firstname; ?>">
  </div>
  <div class="form-group field-updateprofileform-lastname ">
    <label class="control-label" >Last Name</label>
    <input type="text" class="form-control" name="lastname"  value="<?php echo $userdetails->lastname; ?>">
  </div>
  <div class="form-group field-updateprofileform-mobile">
    <label class="control-label" >Mobile</label>
    <input type="text" class="form-control"  name="contact_no"  value="<?php echo $userdetails->contact_no; ?>">
  </div>
  <div class="form-group field-updateprofileform-address required">
    <label class="control-label">Address</label>
    <input type="text" class="form-control" name="address" id="update_profile_address"  value="<?php echo $userdetails->address; ?>">
    <input type="hidden" class="form-control" name="city" id="city-profile-address"  value="<?php echo $userdetails->city; ?>">
    <input type="hidden" class="form-control" name="latitude" id="latitude-profile-address"  value="<?php echo $userdetails->user_latitude; ?>">
    <input type="hidden" class="form-control" name="longitude" id="longitude-profile-address"  value="<?php echo $userdetails->user_longitude; ?>">
  </div>

  <div class="form-group field-updateprofileform-address required">
    <label class="control-label">Zip Code</label>
    <input type="text" class="form-control" name="zipcode"  value="<?php echo $userdetails->zipcode; ?>">
  </div>

  <div class="form-group">
    <button type="submit" class="bluebtn" name="update-profile-button">Update Profile</button>                    
  </div>
</form>                
</div>

</div>
<div class="col-lg-4 col-md-3 col-sm-2"></div>
</div>
</div>
</div>

@stop

