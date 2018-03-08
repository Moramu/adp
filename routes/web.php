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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('downloadExcel/{type}', 'ExcelController@downloadExcel');
Route::post('corals/{id}','CoralController@updateColors');
Route::get('fish/create/{id}',array('as'=>'myform.ajax','uses'=>'FishController@fishFormAjax'));
Route::get('/admin', 'AdminController@index');
Route::get('/sadmin', 'SuperAdminController@index')->name('sadmin');
Route::get('fish/addSizePrice/{id}','FishController@addSizePrice');
Route::post('fish/addSizePrice','FishController@storeSizePrice')->name('storeSizePrice');

/** Test Routes **/

Route::get('test/{id}','FishController@test');

/** Controller's Routes **/

Route::resource('excel', 'ExcelController');
Route::resource('corals', 'CoralController');
Route::resource('fish', 'FishController');

/** Super_admin acces **/ 
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