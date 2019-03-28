@extends('front/layouts.default')
@section('content')


<div class="site-content">

<section class="add-property">
    <div class="container">
          <h2>add property</h2>
<!-- multistep form -->
<form id="msform">
<!-- progressbar -->
<ul id="progressbar">
<li class="active"></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
</ul>

<!-- fieldsets -->
<fieldset>
<h2 class="fs-title">Prpoerty Information</h2>
<input type="text" name="" placeholder="Property Name ">
<input type="text" name="" placeholder="Location">
<input type="text" name="" placeholder="Enter Property Zip Code">
<textarea placeholder="Property description" cols="6"></textarea>
<!-- <input type="file" name="" placeholder="Property Images " /> -->
<div class="box">
  <input type="file" name="property-images" id="property-images" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple="" style="display: none;">
  <label for="property-images"><span></span> <strong>Choose Property Images</strong></label>
</div>
<input type="button" name="next" class="next action-button" value="Next">
</fieldset>

<fieldset>
<h2 class="fs-title">Property Floor Map</h2>
<div class="box">
  <input type="file" name="property-map" id="property-map" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple="" style="display: none;">
  <label for="property-map"><span></span> <strong>Choose Property Floor Map</strong></label>
</div>
<input type="button" name="previous" class="previous action-button" value="Previous">
<input type="button" name="next" class="next action-button" value="Next">
</fieldset>

<fieldset>
<h2 class="fs-title">Cars and Pricing</h2>
<div class="form-field">
  <label>Enter Property Floors Parking spots</label>
  <table id="myTable" class=" table order-list1">
    <tbody>
        <tr>
            <td class="col-sm-4">
                <input type="text" name="" placeholder="Enter floor name">
            </td>
            <td class="col-sm-4">
                <select>
                  <option>Parking Type </option>
                  <option>Self </option>
                  <option>Valet </option>
                  <option>Reserved </option>
                  <option>Handicap </option>
                </select>
            </td>
            <td class="col-sm-3">
                <input type="text" name="" placeholder="Total Parking spots ">
            </td>
            <td class="col-sm-2"><a class="deleteRow"></a>

            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: left;">
                <input type="button" class="btn btn-lg btn-block " id="addrow" value="Add Row">
            </td>
        </tr>
        <tr>
        </tr>
    </tfoot>
</table>
</div>
<div class="form-field">
  <label>Select Booking Duration Type and Enter Property Rent</label>
  <table id="myTable" class=" table order-list">
    <tbody>
        <tr>
            <td class="col-sm-3">
              <select>
                  <option>Car Type</option>
                  <option>Hatchback  </option>
                  <option>Sedan  </option>
                  <option>MPV  </option>
                  <option>SUV </option>
                  <option>Crossover </option>
                  <option>Coupe  </option>
                  <option>Convertibl </option>
                </select>
            </td>
            <td class="col-sm-3">
                <input type="text" name="" placeholder="Hourly Price">
            </td>
            <td class="col-sm-3">
                <input type="text" name="" placeholder="Daily Price">
            </td>
            <td class="col-sm-3">
                <input type="text" name="" placeholder="Monthly  Price">
            </td>
            <td class="col-sm-2"><a class="deleteRow"></a>

            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: left;">
                <input type="button" class="btn btn-lg btn-block " id="second-addrow" value="Add Row">
            </td>
        </tr>
        <tr>
        </tr>
    </tfoot>
</table>
</div>

<input type="button" name="previous" class="previous action-button" value="Previous">
<input type="button" name="next" class="next action-button" value="Next">
</fieldset>

<fieldset>
<h2 class="fs-title">Aminities and Other</h2>
<ul class="aminities-list">
  <li>
    <input type="checkbox" name="aminities" id="Security">
    <label for="Security">Security</label>
  </li>
  <li>
    <input type="checkbox" name="aminities" id="EV-Charging">
    <label for="EV-Charging ">EV Charging </label>
  </li>
  <li>
    <input type="checkbox" name="aminities" id="wheelchair">
    <label for="wheelchair">Wheelchair Accessible </label>
  </li>
  <li>
    <input type="checkbox" name="aminities" id="Security">
    <label for="Security">Security</label>
  </li>
  <li>
    <input type="checkbox" name="aminities" id="washing">
    <label for="washing">Washing center</label>
  </li>
  <li>
    <input type="checkbox" name="aminities" id="loundge">
    <label for="loundge">loundge</label>
  </li>
  <li>
    <input type="checkbox" name="aminities" id="fire-services">
    <label for="fire-services">Fire Services</label>
  </li>
  <li>
    <input type="checkbox" name="aminities" id="wheelchair">
    <label for="wheelchair">Wheelchair Accessible </label>
  </li>
  <li>
    <input type="checkbox" name="aminities" id="washing">
    <label for="washing">Washing center</label>
  </li>
</ul>
<input type="button" name="previous" class="previous action-button" value="Previous">
<input type="button" name="next" class="next action-button" value="Next">
</fieldset>

<fieldset>
<h2 class="fs-title">Documents</h2>
<div class="box">
  <input type="file" name="property-documents" id="property-documents" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple="" style="display: none;">
  <label for="property-documents"><span></span> <strong>Choose Property Documents</strong></label>
</div>
<input type="button" name="previous" class="previous action-button" value="Previous">
<input type="button" name="next" class="next action-button" value="Next">
</fieldset>

<fieldset>
<h2 class="fs-title">Thank you</h2>
<h3 class="fs-subtitle">Thank you for adding Parking. Please wait for Admin approval.</h3>

<input type="button" name="previous" class="previous action-button" value="Previous">
<input type="submit" name="submit" class="submit action-button" value="Submit">
</fieldset>
</form>
</div>
</section>
</div>

<link href="http://alkurn.info/html/Prymespace/css/component.css" rel="stylesheet" id="abootstrap-css">
<link href="http://alkurn.info/html/Prymespace/css/custom.css" rel="stylesheet" id="bootstrap-css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="aabootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
@stop




