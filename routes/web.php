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
Route::get('testwater','WaterParamController@fresh1');

/** Excel Controller **/
Route::resource('excel', 'ExcelController');

Route::get('additives/downloadExcel/{type}', 'ExcelController@downloadExcelAdditives');
Route::post('additives/excel', 'ExcelController@storeAdditives')->name('importAdditives');
Route::get('additives/additivesExcelIndex', 'ExcelController@additivesIndex')->name('additivesExcelIndex');

Route::get('corals/downloadExcel/{type}', 'ExcelController@downloadExcelCorals');
Route::post('corals/excel', 'ExcelController@storeCoral')->name('importCorals');
Route::get('corals/coralExcelIndex', 'ExcelController@coralIndex')->name('coralExcelIndex');

Route::get('aquariums/downloadExcel/{type}', 'ExcelController@downloadExcelAquariums');
Route::post('aquariums/excel', 'ExcelController@storeAquariums')->name('importAquariums');
Route::get('aquariums/aquariumsExcelIndex', 'ExcelController@aquariumsIndex')->name('aquariumsExcelIndex');

Route::get('chillers/downloadExcel/{type}', 'ExcelController@downloadExcelChillers');
Route::post('chillers/excel', 'ExcelController@storeChillers')->name('importChillers');
Route::get('chillers/chillersExcelIndex', 'ExcelController@chillersIndex')->name('chillersExcelIndex');

Route::get('filters/downloadExcel/{type}', 'ExcelController@downloadExcelFilters');
Route::post('filters/excel', 'ExcelController@storeFilters')->name('importFilters');
Route::get('filters/filtersExcelIndex', 'ExcelController@filtersIndex')->name('filtersExcelIndex');

Route::get('food/downloadExcel/{type}', 'ExcelController@downloadExcelFood');
Route::post('food/excel', 'ExcelController@storeFood')->name('importFood');
Route::get('food/foodExcelIndex', 'ExcelController@foodIndex')->name('foodExcelIndex');

Route::get('heaters/downloadExcel/{type}', 'ExcelController@downloadExcelHeaters');
Route::post('heaters/excel', 'ExcelController@storeHeaters')->name('importHeaters');
Route::get('heaters/heatersExcelIndex', 'ExcelController@heatersIndex')->name('heatersExcelIndex');

Route::get('lightings/downloadExcel/{type}', 'ExcelController@downloadExcelLightings');
Route::post('lightings/excel', 'ExcelController@storeLightings')->name('importLightings');
Route::get('lightings/lightingsExcelIndex', 'ExcelController@lightingsIndex')->name('lightingsExcelIndex');

Route::get('sterilizers/downloadExcel/{type}', 'ExcelController@downloadExcelSterilizers');
Route::post('sterilizers/excel', 'ExcelController@storeSterilizers')->name('importSterilizers');
Route::get('sterilizers/sterilizersExcelIndex', 'ExcelController@sterilizersIndex')->name('sterilizersExcelIndex');


/** ----------------------------------------------- Services ------------------------------------ **/

/** Project Controller **/
Route::resource('project','ProjectController');

/** Water Parameters Controller **/
Route::resource('waterparam','WaterParamController');


/** ----------------------------------------------- Products ------------------------------------ **/

/** Additives Controller **/
Route::resource('additives','AdditiveController');
Route::post('additives/{id}','AdditiveController@updateQuantity');

/** Aquarium Controller **/
Route::resource('aquariums','AquariumController');
Route::post('aquariums/{id}','AquariumController@updateQuantity');

/** Chiller Controller **/
Route::resource('chillers','ChillerController');
Route::post('chillers/{id}','ChillerController@updateQuantity');

/** Coral Controller **/
Route::resource('corals','CoralController');
Route::post('corals/{id}','CoralController@updateColors');

/** Filter Controller **/
Route::resource('filters','FilterController');
Route::post('filters/{id}','FilterController@updateQuantity');

/** Fish Controller **/
Route::resource('fish', 'FishController');
Route::get('fish/addSizePrice/{id}','FishController@addSizePrice');
Route::post('fish/addSizePrice','FishController@storeSizePrice')->name('storeSizePrice');
Route::get('fish/create/{id}',array('as'=>'myform.ajax','uses'=>'FishController@fishFormAjax'));

/** Food Controller **/
Route::resource('food','FoodController');
Route::post('food/{id}','FoodController@updateQuantity');

/** Heater Controller **/
Route::resource('heaters','HeaterController');
Route::post('heaters/{id}','HeaterController@updateQuantity');

/** Light Controller **/
Route::resource('lightings','LightingController');
Route::post('lightings/{id}','LightingController@updateQuantity');

/** Sterilizer Controller **/
Route::resource('sterilizers','SterilizerController');
Route::post('sterilizers/{id}','SterilizerController@updateQuantity');


/** ----------------------------------------------- Access ------------------------------------ **/

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
