<?php

namespace App\Http\Controllers;

use App\Reef;
use App\Coral;
use Illuminate\Http\Request;

class ReefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reef = Reef::orderBy('created_at','ASC')->paginate(10);
        return view('reef.reefIndex',compact ('reef'))
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reef  $reef
     * @return \Illuminate\Http\Response
     */
    public function show(Reef $reef)
    {
        //
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
        //
    }
}
