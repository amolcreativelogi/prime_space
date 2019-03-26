<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
session_start();
Route::get('/', function () {
    return view('welcome');
});



Route::view('admin', 'admin/login');
Route::post('/admin/checkLogin','Admin\MainController@checkLogin');

Route::get('/admin/adminLogout','Admin\MainController@adminLogout');

Route::get('/admin/dashboard','Admin\DashboardController@index');
Route::get('/admin/carTypeExecute','Admin\MasterController@carTypeExecute');

Route::get('/admin/addCarType/{id?}','Admin\MasterController@addCarType');
Route::post('/admin/saveCarType','Admin\MasterController@saveCarType');
Route::post('/admin/getCarType','Admin\MasterController@getCarType');
Route::post('/admin/DeteteRecord','Admin\MasterController@DeteteRecord');



/**** Priyanka : ROUTES ****/


/* AMENITY CATEGORIES */

//Route to load categories listing for amenity
Route::get('/admin/amenityCategoriesExecute','Admin\MasterController@amenityCategoriesExecute');

//Route to add categories  for amenity
Route::get('/admin/addAmenityCategories/{id?}','Admin\MasterController@addAmenityCategories');

//Route to save categories  for amenity
Route::post('/admin/saveAmenityCategory','Admin\MasterController@saveAmenityCategory');

//Route to get category list
Route::post('/admin/getAmenityCategories','Admin\MasterController@getAmenityCategories');


/* AMENITTY */

//Route to load amenities listing
Route::get('/admin/amenitiesExecute','Admin\MasterController@amenitiesExecute');

//Route to add amenity
Route::get('/admin/addAmenity/{id?}','Admin\MasterController@addAmenity');

//Route to save amenity
Route::post('/admin/saveAmenity','Admin\MasterController@saveAmenity');

//Route to get amenity type list
Route::post('/admin/getAmenities','Admin\MasterController@getAmenities');

Route::get('/admin/testJoin','Admin\MasterController@testJoin');


/* LOCATION TYPE */

//Route to load location type listing 
Route::get('/admin/locationTypeExecute','Admin\MasterController@locationTypeExecute');

//Route to add location type
Route::get('/admin/addLocationType/{id?}','Admin\MasterController@addLocationType');

//Route to save location type
Route::post('/admin/saveLocationType','Admin\MasterController@saveLocationType');

//Route to get location type list
Route::post('/admin/getLocationTypes','Admin\MasterController@getLocationTypes');


/* PARKING TYPE */

//Route to load parking type listing 
Route::get('/admin/parkingTypeExecute','Admin\MasterController@parkingTypeExecute');

//Route to add parking type
Route::get('/admin/addParkingType/{id?}','Admin\MasterController@addParkingType');

//Route to save parking type
Route::post('/admin/saveParkingType','Admin\MasterController@saveParkingType');

//Route to get parking type list
Route::post('/admin/getParkingTypes','Admin\MasterController@getParkingTypes');


/* BOOKING DURATION TYPE*/

//Route to load booking duration type listing 
Route::get('/admin/bookingDurationTypeExecute','Admin\MasterController@bookingDurationTypeExecute');

//Route to add booking duration type
Route::get('/admin/addBookingDurationType/{id?}','Admin\MasterController@addBookingDurationType');

//Route to save booking duration type
Route::post('/admin/saveBookingDurationType','Admin\MasterController@saveBookingDurationType');

//Route to get booking duration type list
Route::post('/admin/getBookingDurationTypes','Admin\MasterController@getBookingDurationTypes');



//Route for users dashbaord
Route::get('/admin/Host_Users','Admin\UsersController@Host_Users');
Route::post('/admin/getUserandHost','Admin\UsersController@getUserandHost');
Route::get('/admin/viewUsersProfile','Admin\UsersController@viewUsersProfile');
Route::get('/admin/viewUsersProfile/{id?}','Admin\UsersController@viewUsersProfile');


