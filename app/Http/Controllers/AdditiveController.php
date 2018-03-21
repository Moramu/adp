<?php

namespace App\Http\Controllers;

use View;
use Auth;
use Session;
use App\Additive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


class AdditiveController extends Controller
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
	$additives = Additive::orderBy('item_number','ASC')->paginate(10);
	return view('additive.additiveIndex',compact('additives'))
	->with('i',($request->input('page',1)-1)*10);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('additive.additiveCreate');
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
        'item_number'=>'numeric|required|unique:additives',
        'name'=>'required',	
        'list_price'=>'required',	
        'extended_price'=>'required',	
        'co_stock'=>'required',	
        'provider'=>'required',	
        'rtl_price'=>'required',	
        'whl_price'=>'required',	
        'quantity'=>'required',	
        ]);
    
        $additive = Additive::create($request->all());
    
    return redirect()->route('additives.index')
        ->with('success','Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Additive  $additive
     * @return \Illuminate\Http\Response
     */
    public function show(Additive $additive)
    {
        Additive::find($additive->id);
	return View::make('additive.additiveShow',compact('additive'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Additive  $additive
     * @return \Illuminate\Http\Response
     */
    public function edit(Additive $additive)
    {
        return view('additive.additiveEdit',compact('additive'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Additive  $additive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Additive $additive)
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
    
    Additive::find($additive->id)->update($request->all());
    
    return redirect()->route('additives.index')
        ->with('success','Item created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Additive  $additive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Additive $additive)
    {
        Additive::find($additive->id)->delete();
    return redirect()->back()->with('success','Item deleted successfuly');
    }
    //update quantity
    public function updateQuantity (Request $request,$id) {
    Additive::where('id',$id)->update(array(
        'quantity'=>Input::get('quantity'),
    ));
    return redirect()->route('additives.index')->with('success','Quantity updated successfuly');
    }
}
