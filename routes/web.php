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

Route::any('sadmin/search','SearchController@search')->name('search');


/** Test Routes **/

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
/** Reef Controller **/
Route::resource('reef','ReefController');
Route::post('reef/create/reefFormAjax','ReefController@reefFormAjax');
Route::patch('reef/{id}/edit/reefFormAjax','ReefController@reefFormAjax');

/** Project Controller **/
Route::resource('project','ProjectController');

/** Water Parameters Controller **/
Route::resource('waterparam','WaterParamController');


/** ----------------------------------------------- Products ------------------------------------ **/

/** Additives Controller **/
Route::resource('additives','AdditiveController');
Route::get('additives/quantity/{id}','AdditiveController@showQuantity');
Route::post('additives/quantity/{id}','AdditiveController@updateQuantity')->name('additiveUpdateQuantity');

/** Aquarium Controller **/
Route::resource('aquariums','AquariumController');
Route::get('aquariums/quantity/{id}','AquariumController@showQuantity');
Route::post('aquariums/quantity/{id}','AquariumController@updateQuantity')->name('aquariumUpdateQuantity');

/** Chiller Controller **/
Route::resource('chillers','ChillerController');
Route::get('chillers/quantity/{id}','ChillerController@showQuantity');
Route::post('chillers/quantity/{id}','ChillerController@updateQuantity')->name('chillerUpdateQuantity');

/** Coral Controller **/
Route::resource('corals','CoralController');
Route::get('corals/quantity/{id}','CoralController@showColors');
Route::post('corals/quantity/{id}','CoralController@updateColors')->name('coralUpdateQuantity');


/** Filter Controller **/
Route::resource('filters','FilterController');
Route::get('filters/quantity/{id}','FilterController@showQuantity');
Route::post('filters/quantity/{id}','FilterController@updateQuantity')->name('filterUpdateQuantity');

/** Fish Controller **/
Route::resource('fish', 'FishController');
Route::get('fish/addSizePrice/{id}','FishController@addSizePrice');
Route::post('fish/addSizePrice','FishController@storeSizePrice')->name('storeSizePrice');
Route::get('fish/updateSizePrice/{id}','FishController@showSizePrice');
Route::post('fish/updateSizePrice/{id}','FishController@updateSizePrice')->name('updateSizePrice');
Route::get('fish/destroySize/{id}','FishController@destroySize')->name('destroySize');
Route::get('fish/create/{id}','FishController@fishFormAjax');
Route::get('fish/quantity/{id}','FishController@showQuantity')->name('fishShowQuantity');

/** Food Controller **/
Route::resource('food','FoodController');
Route::get('food/quantity/{id}','FoodController@showQuantity');
Route::post('food/quantity/{id}','FoodController@updateQuantity')->name('foodUpdateQuantity');

/** Heater Controller **/
Route::resource('heaters','HeaterController');
Route::get('heaters/quantity/{id}','HeaterController@showQuantity');
Route::post('heaters/quantity/{id}','HeaterController@updateQuantity')->name('heaterUpdateQuantity');

/** Light Controller **/
Route::resource('lightings','LightingController');
Route::get('lightings/quantity/{id}','LightingController@showQuantity');
Route::post('lightings/quantity/{id}','LightingController@updateQuantity')->name('lightingUpdateQuantity');

/** Sterilizer Controller **/
Route::resource('sterilizers','SterilizerController');
Route::get('sterilizers/quantity/{id}','SterilizerController@showQuantity');
Route::post('sterilizers/quantity/{id}','SterilizerController@updateQuantity')->name('sterilizerUpdateQuantity');


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
