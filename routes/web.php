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
/*Route::get('/', function () {
    return view('front/pages/home');
});*/

Route::get('/','Front\HomeController@Home');

//frontend route
Route::get('/login','Front\HomeController@Login');
Route::get('/sign_up','Front\HomeController@Signup');
Route::get('/forgot_password','Front\HomeController@Forgot_password');
Route::get('/all_property','Front\HomeController@Allproperty');




//admin route


Route::view('admin', 'admin/login');
Route::post('/admin/checkLogin','Admin\MainController@checkLogin');

Route::get('/admin/adminLogout','Admin\MainController@adminLogout');

Route::get('/admin/dashboard','Admin\DashboardController@index');
Route::get('/admin/carTypeExecute','Admin\MasterController@carTypeExecute');

Route::get('/admin/addCarType/{id?}','Admin\MasterController@addCarType');
Route::post('/admin/saveCarType','Admin\MasterController@saveCarType');
Route::post('/admin/getCarType','Admin\MasterController@getCarType');

/*DELETE RECORDS*/

Route::post('/admin/DeteteRecord','Admin\MasterController@DeteteRecord');

Route::post('/admin/DeleteRecordWithChild','Admin\MasterController@DeleteRecordWithChild');




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



//Route to load parking type listing 
Route::get('/admin/parkingList','Admin\ParkingController@parkingList');
Route::post('/admin/getParkingList','Admin\ParkingController@getParkingList');


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
 


Route::get('/admin/Users','Admin\UsersController@Users');
Route::get('/admin/Host_Users','Admin\UsersController@Host_Users');
Route::get('/admin/Hosts','Admin\UsersController@Hosts');
Route::post('/admin/AssignPermission','Admin\UsersController@AssignPermission');

Route::post('/admin/getUser','Admin\UsersController@getUser');
Route::post('/admin/getHost','Admin\UsersController@getHost');

Route::post('/admin/getUserandHost','Admin\UsersController@getUserandHost');
Route::get('/admin/viewUsersProfile','Admin\UsersController@viewUsersProfile');
Route::get('/admin/viewUsersProfile/{id?}','Admin\UsersController@viewUsersProfile');



/* DOCUMENT TYPE */

//Route to load booking duration type listing 
Route::get('/admin/documentTypeExecute','Admin\MasterController@documentTypeExecute');

//Route to add booking duration type
Route::get('/admin/addDocumentType/{id?}','Admin\MasterController@addDocumentType');

//Route to save booking duration type
Route::post('/admin/saveDocumentType','Admin\MasterController@saveDocumentType');

//Route to get booking duration type list
Route::post('/admin/getDocumentTypes','Admin\MasterController@getDocumentTypes');



/* UNIT TYPE */

//Route to load booking duration type listing 
Route::get('/admin/unitTypeExecute','Admin\MasterController@unitTypeExecute');

//Route to add booking duration type
Route::get('/admin/addUnitType/{id?}','Admin\MasterController@addUnitType');

//Route to save booking duration type
Route::post('/admin/saveUnitType','Admin\MasterController@saveUnitType');

//Route to get booking duration type list
Route::post('/admin/getUnitTypes','Admin\MasterController@getUnitTypes');


/* CANCELLATION TYPE */

//Route to load booking duration type listing 
Route::get('/admin/cancellationTypeExecute','Admin\MasterController@cancellationTypeExecute');

//Route to add booking duration type
Route::get('/admin/addCancellationType/{id?}','Admin\MasterController@addCancellationType');

//Route to save booking duration type
Route::post('/admin/saveCancellationType','Admin\MasterController@saveCancellationType');

//Route to get booking duration type list
Route::post('/admin/getCancellationTypes','Admin\MasterController@getCancellationTypes');

/* CANCELLATION POLICIES */

//Route to load booking duration type listing 
Route::get('/admin/cancellationPoliciesExecute','Admin\MasterController@cancellationPoliciesExecute');

//Route to add booking duration type
Route::get('/admin/addCancellationPolicies/{id?}','Admin\MasterController@addCancellationPolicies');

//Route to save booking duration type
Route::post('/admin/saveCancellationPolicies','Admin\MasterController@saveCancellationPolicies');

//Route to get booking duration type list
Route::post('/admin/getCancellationPolicies','Admin\MasterController@getCancellationPolicies');

/* LAND TYPES */

//Route to load  land type listing 
Route::get('/admin/landTypeExecute','Admin\LandController@landTypeExecute');

//Route to add  land type
Route::get('/admin/addLandType/{id?}','Admin\LandController@addLandType');

//Route to save  land type
Route::post('/admin/saveLandType','Admin\LandController@saveLandType');

//Route to get land  type list
Route::post('/admin/getLandTypes','Admin\LandController@getLandTypes');


Route::get('/admin/mail','Admin\UsersController@mail');


/*FRONTEND USER ROUTES*/

//
Route::post('/userRegistration','Front\UserController@userRegistration');
Route::post('/userLogin','Front\UserController@userLogin');
Route::post('/resetPassword','Front\UserController@resetPassword');

Route::get('/user/host','Front\HostController@hostDashboard')->middleware('UserAuth');
Route::get('/user/customer','Front\CustomerController@customerDashboard')->middleware('UserAuth');
Route::get('/user/logout','Front\UserController@userlogout');

Route::get('/user/switchtohost','Front\UserController@switchtohost');
Route::get('/user/switchtocustomer','Front\UserController@switchtocustomer');
Route::get('/user/switchtohost','Front\UserController@switchtohost');
Route::get('/addproperty','Front\PropertyController@addProperty')->middleware('UserAuth');




//Pages
Route::get('/faq','Front\PagesController@faq');
Route::get('/general-faq','Front\PagesController@general_faq');
Route::get('/host-faq','Front\PagesController@host_faq');
Route::get('/general-faq','Front\PagesController@general_faq');

Route::get('/payments-faq','Front\PagesController@payments_faq');
Route::get('/pricing-faq','Front\PagesController@pricing_faq');
Route::get('/refund-faq','Front\PagesController@refund_faq');
Route::get('/renter-faq','Front\PagesController@renter_faq');
















//Route to get masters details on add property form
Route::post('/frontend/getPropertyMasters','Front\PropertyController@getPropertyMasters');
//Route to save property
Route::post('/frontend/saveProperty','Front\PropertyController@saveProperty');


//Route to Search Property
Route::get('/searchproperty/{module_id?}','Front\SearchPropertyController@SeachProperty');

//Route to load single property
Route::get('/propertydetails/{module_id?}','Front\BookingController@propertyDetails');

//Route to book property
Route::post('/frontend/bookProperty','Front\BookingController@bookProperty');


