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

/** Main Routes **/
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/** Test Routes **/
Route::get('test/{id}','FishController@test');

/** Water Parameters Controller **/
Route::resource('waterparam','WaterParamController');

/** Excel Controller **/
Route::resource('excel', 'ExcelController');
Route::get('downloadExcel/{type}', 'ExcelController@downloadExcelCorals');
Route::post('excel', 'ExcelController@storeCoral')->name('importCorals');
Route::get('corals/coralExcelIndex', 'ExcelController@coralIndex')->name('coralExcelIndex');

/** Coral Controller **/
Route::resource('corals', 'CoralController');
Route::post('corals/{id}','CoralController@updateColors');

/** Fish Controller **/
Route::resource('fish', 'FishController');
Route::get('fish/addSizePrice/{id}','FishController@addSizePrice');
Route::post('fish/addSizePrice','FishController@storeSizePrice')->name('storeSizePrice');
Route::get('fish/create/{id}',array('as'=>'myform.ajax','uses'=>'FishController@fishFormAjax'));

/** Super_admin acces **/
Route::get('/sadmin', 'SuperAdminController@index')->name('sadmin');
 
Route::group( ['middleware' => ['auth','role:super_admin']], function()
{     
Route::get('sadmin/products', function () {
    return view('/superadmin/products');
})->name('products');

Route::get('sadmin/services', function () {
    return view('/superadmin/services');
})->name('services');

Route::get('sadmin/settings', function () {
    return view('/superadmin/settings');
})->name('settings');
});

/** Admin acces **/
Route::get('/admin', 'AdminController@index');
