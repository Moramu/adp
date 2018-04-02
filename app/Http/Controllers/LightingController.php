<?php

namespace App\Http\Controllers;

use View;
use Auth;
use Session;
use App\Lighting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


class LightingController extends Controller
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
	$lightings = Lighting::orderBy('item_number','ASC')->paginate(10);
	    return view('lighting.lightingIndex',compact('lightings'))
	    ->with('i',($request->input('page',1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('lighting.lightingCreate');
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
        'item_number'=>'numeric|required|unique:lightings',
        'name'=>'required',	
        'list_price'=>'required',	
        'extended_price'=>'required',	
        'co_stock'=>'required',	
        'provider'=>'required',	
        'rtl_price'=>'required',	
        'whl_price'=>'required',	
        'quantity'=>'required',	
        ]);
    
        $lighting = Lighting::create($request->all());
    
    return redirect()->route('lightings.index')
        ->with('success','Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lighting  $lighting
     * @return \Illuminate\Http\Response
     */
    public function show(Lighting $lighting)
    {
         $lighting = Lighting::find($lighting->id);
	return View::make('lighting.lightingShow',compact('lighting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lighting  $lighting
     * @return \Illuminate\Http\Response
     */
    public function edit(Lighting $lighting)
    {
         return view('lighting.lightingEdit',compact('lighting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lighting  $lighting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lighting $lighting)
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
    
    $lighting = Lighting::find($lighting->id)->update($request->all());
    
    return redirect()->route('lightings.index')
        ->with('success','Item created successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lighting  $lighting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Lighting::find($id)->delete();
	    return redirect()->back()->with('success','Item deleted successfuly');
    }

    public function showQuantity (Request $request,$id) {
    $lighting = Lighting::find($id);
    return View::make('lighting.lightingUpdateQuantity',compact('lighting'));
    }

    //update quantity
    public function updateQuantity (Request $request,$id) {
    Lighting::where('id',$id)->update(array(
        'quantity'=>Input::get('quantity'),
    ));
    return redirect()->route('lightings.index')->with('success','Quantity updated successfuly');
    }

}
