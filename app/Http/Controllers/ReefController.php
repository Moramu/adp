<?php

namespace App\Http\Controllers;

use Auth;
use View;
use App\Reef;
use App\Coral;
use Illuminate\Http\Request;

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
	$reef = new Reef;
	$this->validate($request,[
	'name'=>'required|unique:reefs',
	]);
	$reef->name = $request->name;
	$reef->material_id = $request->material_id;
	$reef->m_quantity = $request->m_quantity;
	$reef->m_price = $request->m_price;
	$reef->m_price_rtl = $request->m_price_rtl;
	$reef->m_price_whl = $request->m_price_whl;
	$reef->coral_id = $request->coral_id;
	$reef->c_quantity = $request->c_quantity;
	$reef->c_sum_quantity = $request->c_sum_quantity;
	$reef->reef_sum_rtl = $request->reef_sum_rtl;
	$reef->reef_sum_whl = $request->reef_sum_whl;
	$reef->username = $request->username;
	$reef->save();
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
//	$coral= Coral::with('reef')->find($reef->coral_id);
//	dd($coral);
        return View::make('reef.reefShow',compact('reef'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reef  $reef
     * @return \Illuminate\Http\Response
     */
    public function edit(Reef $reef)
    {
        //
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
        //
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
