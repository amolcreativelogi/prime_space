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

Route::get('/', function () {
    return view('welcome');
});


Route::view('admin', 'admin/login');

Route::get('/admin/dashboard','Admin\DashboardController@index');
Route::get('/admin/carTypeExecute','Admin\MasterController@carTypeExecute');

Route::get('/admin/addCarType/{id?}','Admin\MasterController@addCarType');
Route::post('/admin/saveCarType','Admin\MasterController@saveCarType');
Route::post('/admin/getCarType','Admin\MasterController@getCarType');
Route::post('/admin/DeteteRecord','Admin\MasterController@DeteteRecord');
