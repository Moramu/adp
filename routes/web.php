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
Route::get('importExport', 'ExcelController@importExport');
Route::get('downloadExcel/{type}', 'ExcelController@downloadExcel');
Route::post('importExcel', 'ExcelController@importExcel');

Route::post('corals/{id}','CoralController@updateColors');
Route::resource('corals', 'CoralController');
//Route::put('corals/{id}', 'CoralController@updateColors');
//Route::post('corals/show','CoralController@updateColors');
//Route::patch('/corals/{id}',['as' => 'corals.update','uses' => 'CoralController@updateColors']);
//Route::post('/edit/id', [ 'as' => 'corals.update', 'uses' => 'UserController@colorsUpdate']);