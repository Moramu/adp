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
Route::get('myform/ajax/{id}',array('as'=>'myform.ajax','uses'=>'FishController@fishFormAjax'));

Route::resource('excel', 'ExcelController');
Route::resource('corals', 'CoralController');
Route::resource('fish', 'FishController');

Route::get('test','FishController@test');

//Route::get('importExcel','CoralController@importExcel');
//Route::post('updateColors', 'CoralController@updateColors');
//Route::put('corals/{id}', 'CoralController@updateColors');
//Route::post('corals/show','CoralController@updateColors');
//Route::patch('/corals/{id}',['as' => 'corals.update','uses' => 'CoralController@updateColors']);
//Route::post('/edit/id', [ 'as' => 'corals.update', 'uses' => 'UserController@colorsUpdate']);
//Route::get('importExport', 'ExcelController@importExport');
//Route::get('downloadExcel/{type}', 'ExcelController@downloadExcel');
//Route::post('importExcel', 'ExcelController@importExcel');
//Route::get('corals/search/{s?}', 'CoralController@getIndex')->where('s', '[\w\d]+')->name('coralSearch');
