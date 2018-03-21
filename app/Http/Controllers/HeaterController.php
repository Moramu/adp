<?php

namespace App\Http\Controllers;

use Auth;
use View;
use Session;
use App\Heater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


class HeaterController extends Controller
{
    //Auth
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
        // get all sorted from 1... X corals, by 10 on page with pagination
	$heaters = Heater::orderBy('item_number','ASC')->paginate(10);
        // load the view and pass the heaters
	return view('heater.heaterIndex',compact('heaters'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('heater.heaterCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'item_number'=>'numeric|required|unique:heaters',
        'name'=>'required',	
        'list_price'=>'required',	
        'extended_price'=>'required',	
        'co_stock'=>'required',	
        'provider'=>'required',	
        'rtl_price'=>'required',	
        'whl_price'=>'required',	
        'quantity'=>'required',	
        ]);
    
        $heater = Heater::create($request->all());
    
    return redirect()->route('heaters.index')
        ->with('success','Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Heater  $heater
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $heater = Heater::find($id);
	return View::make('heater.heaterShow',compact('heater','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Heater  $heater
     * @return \Illuminate\Http\Response
     */
    public function edit(Heater $heater)
    {
        return view('heater.heaterEdit',compact('heater'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Heater  $heater
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Heater $heater)
    {
        $this->validate($request, [
        'item_number'=>'numeric|required',
        'name'=>'required',	
        'list_price'=>'required',	
        'extended_price'=>'required',	
        'co_stock'=>'required',	
        'provider'=>'required',	
        'rtl_price'=>'required',	
        'whl_price'=>'required',	
        'quantity'=>'required',	
        ]);
    
    Heater::find($heater->id)->update($request->all());
    
    return redirect()->route('heaters.index')
        ->with('success','Item created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Heater  $heater
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Heater::find($id)->delete();
	return redirect()->back()->with('success','Item deleted successfuly');
    }
    
    //update quantity
    public function updateQuantity (Request $request,$id) {
	Heater::where('id',$id)->update(array(
        'quantity'=>Input::get('quantity'),
	));
	return redirect()->route('heaters.index')->with('success','Quantity updated successfuly');
    }
}
