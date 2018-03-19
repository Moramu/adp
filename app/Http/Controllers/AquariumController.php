<?php

namespace App\Http\Controllers;
use View;
use Auth;
use Session;
use App\Aquarium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class AquariumController extends Controller
{
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
        $aquaria = Aquarium::orderBy('item_number','ASC')->paginate(10);
	return view('aquarium.aquariumIndex',compact('aquaria'))
		->with('i',($request->input('page',1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('aquarium.aquariumCreate');
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
	    'item_number'=>'numeric|required|unique:aquaria',
	    'name'=>'required',	
	    'list_price'=>'required',	
	    'extended_price'=>'required',	
	    'co_stock'=>'required',	
	    'provider'=>'required',	
	    'rtl_price'=>'required',	
	    'whl_price'=>'required',	
	    'quantity'=>'required',	
	    ]);
	
        $aquarium = Aquarium::create($request->all());
	
	return redirect()->route('aquaria.index')
	    ->with('success','Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aquarium  $aquarium
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aquarium = Aquarium::find($id);
	return View::make('aquarium.aquariumShow',compact('aquarium','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aquarium  $aquarium
     * @return \Illuminate\Http\Response
     */
    public function edit(Aquarium $aquarium)
    {
        return view('aquarium.aquariumEdit',compact('aquarium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aquarium  $aquarium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aquarium $aquarium)
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
	
	$aquarium = Aquarium::create($request->all());
	
	return redirect()->route('aquaria.index')
	    ->with('success','Item created successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aquarium  $aquarium
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aquarium::find($id)->delete();
	return redirect()->route('aquaria.index')
	    ->with('success','Item deleted successfuly');
    }

	
    public function updateQuantity (Request $request,$id) {
	Aquarium::where('id',$id)->update(array(
	    'quantity'=>Input::get('quantity'),
	));
    return redirect()->route('aquaria.index')->with('success','Quantity updated successfuly');
    }

}
