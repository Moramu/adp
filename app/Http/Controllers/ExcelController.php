<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Input;
use App\Coral;
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

    public function coralIndex () {
    return view('excel.coralExcelIndex');
    }

    public function downloadExcelCorals($type)
    {
	$data = Coral::get()->toArray();
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
		    'summary' => $value->summary,
		    'description' => $value->description];	
	    }
		if(!empty($insert)){
		    DB::table('corals')->insert($insert);
		    //dd('Insert Record successfully.');
		// return Redirect::route('login');
		//    return redirect()->route('corals.index')
		//	->with('succes','Corals imported succesfuly');
		return redirect()->back()->with('succes', 'Corals import succesfuly!');
		}
	    }
	}
	return back();
    }

}