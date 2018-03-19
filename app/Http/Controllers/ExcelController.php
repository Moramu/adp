<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Input;
use App\Coral;
use App\Aquarium;
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


//** ------------------- Aquaria Excel ----------------- **/

    public function aquariaIndex () {
	return view('excel.aquariaExcelIndex');
    }
    
    public function downloadExcelAquaria($type)
    {
	$data = Aquarium::select('item_number','name','rtl_price','whl_price','quantity')->get();
	return Excel::create('AquaDesignAquaria', function($excel) use ($data) {
	    $excel->sheet('aquaria', function($sheet) use ($data)
            {
		$sheet->fromArray($data);
            });
	})->download($type);
    }


    public function storeAquaria(Request $request)
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
		return redirect()->back()->with('succes', 'Aquaria import successfuly!');
		}
	    }
	}
    }

    


}


