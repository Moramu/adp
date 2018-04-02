<?php

namespace App\Http\Controllers;

use App\Sterilizer;
use View;
use Auth;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


class SterilizerController extends Controller
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
         $sterilizers = Sterilizer::orderBy('item_number','ASC')->paginate(10);
	    return view('sterilizer.sterilizerIndex',compact('sterilizers'))
	    ->with('i',($request->input('page',1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('sterilizer.sterilizerCreate');
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
        'item_number'=>'numeric|required|unique:sterilizers',
        'name'=>'required',	
        'list_price'=>'required',	
        'extended_price'=>'required',	
        'co_stock'=>'required',	
        'provider'=>'required',	
        'rtl_price'=>'required',	
        'whl_price'=>'required',	
        'quantity'=>'required',	
        ]);
    
        $sterilizer = Sterilizer::create($request->all());
    
    return redirect()->route('sterilizers.index')
        ->with('success','Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sterilizer  $sterilizer
     * @return \Illuminate\Http\Response
     */
    public function show(Sterilizer $sterilizer)
    {
        $sterilizer = Sterilizer::find($sterilizer->id);
	return View::make('sterilizer.sterilizerShow',compact('sterilizer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sterilizer  $sterilizer
     * @return \Illuminate\Http\Response
     */
    public function edit(Sterilizer $sterilizer)
    {
         return view('sterilizer.sterilizerEdit',compact('sterilizer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sterilizer  $sterilizer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sterilizer $sterilizer)
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
    
     Sterilizer::find($sterilizer->id)->update($request->all());
    
    return redirect()->route('sterilizers.index')
        ->with('success','Item created successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sterilizer  $sterilizer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sterilizer $sterilizer)
    {
        Sterilizer::find($sterilizer->id)->delete();
	return redirect()->back()
        ->with('success','Item deleted successfuly');
    }
    
    public function showQuantity (Request $request,$id) {
    $sterilizer = Sterilizer::find($id);
    return View::make('sterilizer.sterilizerUpdateQuantity',compact('sterilizer'));
    }

    //update quantity
    public function updateQuantity (Request $request,$id) {
    Sterilizer::where('id',$id)->update(array(
        'quantity'=>Input::get('quantity'),
    ));
    return redirect()->route('sterilizers.index')->with('success','Quantity updated successfuly');
    }
}
