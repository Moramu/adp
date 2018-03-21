<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Input;
use App\Coral;
use App\Aquarium;
use App\Chiller;
use App\Filter;
use App\Food;
use App\Sterilizer;
use App\Additive;
use App\Heater;
use App\Lighting;
use DB;
use Excel;
use Auth;

class ExcelController extends Controller
{


    public function __construct() {
    $this->middleware('auth');
    }

    public function index() {
    return view('excel.excelIndex');
    }


//** ------------------- Coral Excel ----------------- **/


    public function coralIndex () {
    return view('excel.coralExcelIndex');
    }

    public function downloadExcelCorals($type)
    {
	$data = Coral::select('item_number','name','retail_price','wholesale_price','barcode','description')->get();
	return Excel::create('AquaDesignCorals', function($excel) use ($data) {
	    $excel->sheet('corals', function($sheet) use ($data)
            {
		$sheet->fromArray($data);
            });
	})->download($type);
    }


    public function storeCoral(Request $request)
    {	
	if($request->hasFile('import_file')){
	    $path = $request->file('import_file')->getRealPath();
	    $data = Excel::load($path, function($reader) {
	    })->get();
	    if(!empty($data) && $data->count()){
		foreach ($data as $key => $value) {
		$insert[] = [
		    'item_number' => $value->item_number,
		    'name' => $value->name, 
		    'photo' => $value->photo,
		    'plastic_quantity'=> $value->plastic_quantity,
		    'cost_price' => $value->cost_price,
		    'product_weight' => $value->product_weight,
		    'retail_price' => $value->retail_price,
		    'wholesale_price' => $value->wholesale_price,
		    'barcode' => $value->barcode,
		    'description' => $value->description];		    
		}	    
		if(!empty($insert)){
		    DB::table('corals')->insert($insert);
		    $id = DB::getPdo()->lastInsertId();
		    $count = $data->count();
		//    dd($count." ".$id );
		    $color_id = $id - $count + 1;
		    foreach ($data as $key => $value) {
		$insert2[] = [
		    'coral_id' => $color_id++,
		    'blueridge' => $value->blueridge,
		    'blue' => $value->blue,
		    'brick' => $value->brick,
		    'yellow' => $value->yellow,
		    'dark_red' => $value->dark_red,
		    'orange' => $value->orange,
		    'green' => $value->green,
		    'turquoise' => $value->turquoise,
		    'purple' => $value->purple,
		    'pink' => $value->pink,
		    'mustard' => $value->mustard,
		    'summary' => $value->summary
		    ];	    
		    }
		    DB::table('coral_colors')->insert($insert2);
		return redirect()->back()->with('succes', 'Corals import successfuly!');
		}
	    }
	}
    }
//** ------------------- Additives Excel ----------------- **/

    public function additivesIndex () {
	return view('excel.additivesExcelIndex');
    }
    
    public function downloadExcelAdditives($type)
    {
	$data = Additive::select('item_number','name','rtl_price','whl_price','quantity')->get();
	return Excel::create('AquaDesignAdditives', function($excel) use ($data) {
	    $excel->sheet('additives', function($sheet) use ($data)
            {
		$sheet->fromArray($data);
            });
	})->download($type);
    }


    public function storeAdditives(Request $request)
    {	
	if($request->hasFile('import_file')){
	    $path = $request->file('import_file')->getRealPath();
	    $data = Excel::load($path, function($reader) {
	    })->get();
	    if(!empty($data) && $data->count()){
		foreach ($data as $key => $value) {
		$insert[] = [
		    'item_number' => $value->item_number,
		    'name' => $value->name, 
		    'list_price' => $value->list_price,
		    'extended_price'=> $value->extended_price,
		    'co_stock' => $value->co_stock,
		    'provider' => $value->provider,
		    'rtl_price' => $value->retail_price,
		    'whl_price' => $value->wholesale_price,
		    'quantity' => $value->quantity,
		];
		}	    
		if(!empty($insert)){
		    DB::table('additives')->insert($insert);
		return redirect()->back()->with('succes', 'Additives import successfuly!');
		}
	    }
	}
    }


//** ------------------- Aquariums Excel ----------------- **/

    public function aquariumsIndex () {
	return view('excel.aquariumsExcelIndex');
    }
    
    public function downloadExcelAquariums($type)
    {
	$data = Aquarium::select('item_number','name','rtl_price','whl_price','quantity')->get();
	return Excel::create('AquaDesignAquariums', function($excel) use ($data) {
	    $excel->sheet('aquariums', function($sheet) use ($data)
            {
		$sheet->fromArray($data);
            });
	})->download($type);
    }


    public function storeAquariums(Request $request)
    {	
	if($request->hasFile('import_file')){
	    $path = $request->file('import_file')->getRealPath();
	    $data = Excel::load($path, function($reader) {
	    })->get();
	    if(!empty($data) && $data->count()){
		foreach ($data as $key => $value) {
		$insert[] = [
		    'item_number' => $value->item_number,
		    'name' => $value->name, 
		    'list_price' => $value->list_price,
		    'extended_price'=> $value->extended_price,
		    'co_stock' => $value->co_stock,
		    'provider' => $value->provider,
		    'rtl_price' => $value->retail_price,
		    'whl_price' => $value->wholesale_price,
		    'quantity' => $value->quantity,
		];
		}	    
		if(!empty($insert)){
		    DB::table('aquaria')->insert($insert);
		return redirect()->back()->with('succes', 'Aquariums import successfuly!');
		}
	    }
	}
    }

//** ------------------- Chillers Excel ----------------- **/

    public function chillersIndex () {
	return view('excel.chillersExcelIndex');
    }
    
    public function downloadExcelChillers($type)
    {
	$data = Chiller::select('item_number','name','rtl_price','whl_price','quantity')->get();
	return Excel::create('AquaDesignChillers', function($excel) use ($data) {
	    $excel->sheet('chillers', function($sheet) use ($data)
            {
		$sheet->fromArray($data);
            });
	})->download($type);
    }


    public function storeChillers(Request $request)
    {	
	if($request->hasFile('import_file')){
	    $path = $request->file('import_file')->getRealPath();
	    $data = Excel::load($path, function($reader) {
	    })->get();
	    if(!empty($data) && $data->count()){
		foreach ($data as $key => $value) {
		$insert[] = [
		    'item_number' => $value->item_number,
		    'name' => $value->name, 
		    'list_price' => $value->list_price,
		    'extended_price'=> $value->extended_price,
		    'co_stock' => $value->co_stock,
		    'provider' => $value->provider,
		    'rtl_price' => $value->retail_price,
		    'whl_price' => $value->wholesale_price,
		    'quantity' => $value->quantity,
		];
		}	    
		if(!empty($insert)){
		    DB::table('chillers')->insert($insert);
		return redirect()->back()->with('succes', 'Chillers import successfuly!');
		}
	    }
	}
    }

    //** ------------------- Filters Excel ----------------- **/

    public function filtersIndex () {
	return view('excel.filtersExcelIndex');
    }
    
    public function downloadExcelFilters($type)
    {
	$data = Filter::select('item_number','name','rtl_price','whl_price','quantity')->get();
	return Excel::create('AquaDesignFilters', function($excel) use ($data) {
	    $excel->sheet('filters', function($sheet) use ($data)
            {
		$sheet->fromArray($data);
            });
	})->download($type);
    }


    public function storeFilters(Request $request)
    {	
	if($request->hasFile('import_file')){
	    $path = $request->file('import_file')->getRealPath();
	    $data = Excel::load($path, function($reader) {
	    })->get();
	    if(!empty($data) && $data->count()){
		foreach ($data as $key => $value) {
		$insert[] = [
		    'item_number' => $value->item_number,
		    'name' => $value->name, 
		    'list_price' => $value->list_price,
		    'extended_price'=> $value->extended_price,
		    'co_stock' => $value->co_stock,
		    'provider' => $value->provider,
		    'rtl_price' => $value->retail_price,
		    'whl_price' => $value->wholesale_price,
		    'quantity' => $value->quantity,
		];
		}	    
		if(!empty($insert)){
		    DB::table('filters')->insert($insert);
		return redirect()->back()->with('succes', 'Filters import successfuly!');
		}
	    }
	}
    }
    

    //** ------------------- Food Excel ----------------- **/

    public function foodIndex () {
	return view('excel.foodExcelIndex');
    }
    
    public function downloadExcelFood($type)
    {
	$data = Food::select('item_number','name','rtl_price','whl_price','quantity')->get();
	return Excel::create('AquaDesignFood', function($excel) use ($data) {
	    $excel->sheet('food', function($sheet) use ($data)
            {
		$sheet->fromArray($data);
            });
	})->download($type);
    }


    public function storeFood(Request $request)
    {	
	if($request->hasFile('import_file')){
	    $path = $request->file('import_file')->getRealPath();
	    $data = Excel::load($path, function($reader) {
	    })->get();
	    if(!empty($data) && $data->count()){
		foreach ($data as $key => $value) {
		$insert[] = [
		    'item_number' => $value->item_number,
		    'name' => $value->name, 
		    'list_price' => $value->list_price,
		    'extended_price'=> $value->extended_price,
		    'co_stock' => $value->co_stock,
		    'provider' => $value->provider,
		    'rtl_price' => $value->retail_price,
		    'whl_price' => $value->wholesale_price,
		    'quantity' => $value->quantity,
		];
		}	    
		if(!empty($insert)){
		    DB::table('foods')->insert($insert);
		return redirect()->back()->with('succes', 'Food import successfuly!');
		}
	    }
	}
    }

    //** ------------------- Heater Excel ----------------- **/

    public function heatersIndex () {
	return view('excel.heatersExcelIndex');
    }
    
    public function downloadExcelHeaters($type)
    {
	$data = Heater::select('item_number','name','rtl_price','whl_price','quantity')->get();
	return Excel::create('AquaDesignHeaters', function($excel) use ($data) {
	    $excel->sheet('heaters', function($sheet) use ($data)
            {
		$sheet->fromArray($data);
            });
	})->download($type);
    }


    public function storeHeaters(Request $request)
    {	
	if($request->hasFile('import_file')){
	    $path = $request->file('import_file')->getRealPath();
	    $data = Excel::load($path, function($reader) {
	    })->get();
	    if(!empty($data) && $data->count()){
		foreach ($data as $key => $value) {
		$insert[] = [
		    'item_number' => $value->item_number,
		    'name' => $value->name, 
		    'list_price' => $value->list_price,
		    'extended_price'=> $value->extended_price,
		    'co_stock' => $value->co_stock,
		    'provider' => $value->provider,
		    'rtl_price' => $value->retail_price,
		    'whl_price' => $value->wholesale_price,
		    'quantity' => $value->quantity,
		];
		}	    
		if(!empty($insert)){
		    DB::table('heaters')->insert($insert);
		return redirect()->back()->with('succes', 'Heaters import successfuly!');
		}
	    }
	}
    }
    //** ------------------- Lightings Excel ----------------- **/

    public function lightingsIndex () {
	return view('excel.lightingsExcelIndex');
    }
    
    public function downloadExcelLightings($type)
    {
	$data = Lighting::select('item_number','name','rtl_price','whl_price','quantity')->get();
	return Excel::create('AquaDesignLighting', function($excel) use ($data) {
	    $excel->sheet('lightings', function($sheet) use ($data)
            {
		$sheet->fromArray($data);
            });
	})->download($type);
    }


    public function storeLightings(Request $request)
    {	
	if($request->hasFile('import_file')){
	    $path = $request->file('import_file')->getRealPath();
	    $data = Excel::load($path, function($reader) {
	    })->get();
	    if(!empty($data) && $data->count()){
		foreach ($data as $key => $value) {
		$insert[] = [
		    'item_number' => $value->item_number,
		    'name' => $value->name, 
		    'list_price' => $value->list_price,
		    'extended_price'=> $value->extended_price,
		    'co_stock' => $value->co_stock,
		    'provider' => $value->provider,
		    'rtl_price' => $value->retail_price,
		    'whl_price' => $value->wholesale_price,
		    'quantity' => $value->quantity,
		];
		}	    
		if(!empty($insert)){
		    DB::table('lightings')->insert($insert);
		return redirect()->back()->with('succes', 'Lightings import successfuly!');
		}
	    }
	}
    }

    //** ------------------- Sterilizer Excel ----------------- **/

    public function sterilizersIndex () {
	return view('excel.sterilizersExcelIndex');
    }
    
    public function downloadExcelSterilizers($type)
    {
	$data = Sterilizer::select('item_number','name','rtl_price','whl_price','quantity')->get();
	return Excel::create('AquaDesignSterilizers', function($excel) use ($data) {
	    $excel->sheet('sterilizers', function($sheet) use ($data)
            {
		$sheet->fromArray($data);
            });
	})->download($type);
    }


    public function storeSterilizers(Request $request)
    {	
	if($request->hasFile('import_file')){
	    $path = $request->file('import_file')->getRealPath();
	    $data = Excel::load($path, function($reader) {
	    })->get();
	    if(!empty($data) && $data->count()){
		foreach ($data as $key => $value) {
		$insert[] = [
		    'item_number' => $value->item_number,
		    'name' => $value->name, 
		    'list_price' => $value->list_price,
		    'extended_price'=> $value->extended_price,
		    'co_stock' => $value->co_stock,
		    'provider' => $value->provider,
		    'rtl_price' => $value->retail_price,
		    'whl_price' => $value->wholesale_price,
		    'quantity' => $value->quantity,
		];
		}	    
		if(!empty($insert)){
		    DB::table('sterilizers')->insert($insert);
		return redirect()->back()->with('succes', 'Sterilizers import successfuly!');
		}
	    }
	}
    }


}


