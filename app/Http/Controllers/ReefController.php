<?php

namespace App\Http\Controllers;

use Auth;
use View;
use App\Reef;
use App\Coral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ReefController extends Controller
{

    // Auth
    public function __construct()
    {
    $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reefs = Reef::orderBy('created_at','ASC')->paginate(10);
        return view('reef.reefIndex',compact ('reefs'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $corals = Coral::where('cost_price','>',0)
	    ->orderBy('item_number','ASC')->get();
	return view('reef.reefCreate',compact('corals'));
    }
	//request value from input fields
    public function reefFormAjax(Request $request)
    {
	$data = $request->all();
	return response()->json($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//	$test = $request->all();
//	dd($test);
	$this->validate($request,[
	'name'=>'required|unique:reefs',
	]);
/**

	$reef = new Reef;
	$reef->name = $request->name;
	$reef->material_id = $request->material_id;
	$reef->m_quantity = $request->m_quantity;
	$reef->m_price = $request->m_price;
	$reef->m_price_rtl = $request->m_price_rtl;
	$reef->m_price_whl = $request->m_price_whl;
	$tmp_coral_quantity = $request->c_quantity;
	$tmp_coral_id = $request->coral_id;
	for($i=0;$i<count($tmp_coral_quantity);$i++){
	    if($tmp_coral_quantity[$i]!=0){
		$new_coral_quantity[] = $tmp_coral_quantity[$i];
		$new_coral_id[]=$tmp_coral_id[$i];
	    }
	}

	$reef->c_quantity = $new_coral_quantity;
	$reef->coral_id = $new_coral_id;
	$reef->c_sum_quantity = $request->c_sum_quantity;
	$reef->c_sum_rtl = $request->c_sum_rtl;
	$reef->c_sum_whl = $request->c_sum_whl;
	$reef->reef_sum_rtl = $request->reef_sum_rtl;
	$reef->reef_sum_whl = $request->reef_sum_whl;
	$reef->username = $request->username;
	$reef->save();
**/
	Reef::create($request->all());
	return redirect()->route('reef.index')
		->with('success','Reef successfuly added');
	
	
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reef  $reef
     * @return \Illuminate\Http\Response
     */
    public function show(Reef $reef)
    {
	$reef = Reef::find($reef->id);
	$corals = Coral::find($reef->coral_id);
	for($i=0;$i<count($reef->c_quantity);$i++){
	if($reef->c_quantity[$i]==0){
	unset($corals[$i]);
    	}
	}
        return View::make('reef.reefShow',compact('reef','corals'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reef  $reef
     * @return \Illuminate\Http\Response
     */
    public function edit(Reef $reef)
    {
	$reef = Reef::find($reef->id);
//	$corals = Coral::find($reef->coral_id);
	$corals = Coral::where('cost_price','>',0)
	    ->orderBy('item_number','ASC')->get();

        return view('reef.reefEdit',compact('reef','corals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reef  $reef
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reef $reef)
    {
	$this->validate($request,[
	'name'=>'required',
	]);

	$tmp_coral_quantity = $request->c_quantity;
	$tmp_coral_id = $request->coral_id;
	for($i=0;$i<count($tmp_coral_quantity);$i++){
	    if($tmp_coral_quantity[$i]!=0){
		$new_coral_quantity[] = $tmp_coral_quantity[$i];
		$new_coral_id[]=$tmp_coral_id[$i];
	    }
	}
	
	
       Reef::find($reef->id)->update($request->all());
/**	array(
	    'name'=>Input::get('name'),
	    'material_id'=>Input::get('material_id'),
	    'm_quantiy'=>Input::get('m_quantity'),
	    'm_price'=>Input::get('m_price'),
	    'm_price_rtl'=>Input::get('m_price_rtl'),
	    'm_price_whl'=>Input::get('m_price_whl'),
	    'c_quantity'=>$new_coral_quantity,
	    'coral_id'=>$new_coral_id,
	    'c_sum_quantity'=>Input::get('c_sum_quantity'),
	    'c_sum_rtl'=>Input::get('c_sum_rtl'),
	    'c_sum_whl'=>Input::get('c_sum_whl'),
	    'reef_sum_rtl'=>Input::get('reef_sum_rtl'),
	    'reef_sum_whl'=>Input::get('reef_sum_whl'),
	    'username'=>Input::get('username'),
	    )
	);
**/
	return redirect()->route('reef.index')
	    ->with('success','Reef updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reef  $reef
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reef $reef)
    {
	Reef::find($reef->id)->delete();
        return redirect()->back();
    }
}
