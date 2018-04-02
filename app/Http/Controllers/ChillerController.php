<?php

namespace App\Http\Controllers;

use App\Chiller;

use View;
use Auth;
use Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class ChillerController extends Controller
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
        $chillers = Chiller::orderBy('item_number','ASC')->paginate(10);
	    return view('chiller.chillerIndex',compact('chillers'))
	->with('i',($request->input('page',1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('chiller.chillerCreate');
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
        'item_number'=>'numeric|required|unique:chillers',
        'name'=>'required',	
        'list_price'=>'required',	
        'extended_price'=>'required',	
        'co_stock'=>'required',	
        'provider'=>'required',	
        'rtl_price'=>'required',	
        'whl_price'=>'required',	
        'quantity'=>'required',	
        ]);
    
        $chiller = Chiller::create($request->all());
    
    return redirect()->route('chillers.index')
        ->with('success','Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chiller  $chiller
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chiller = Chiller::find($id);
        return View::make('chiller.chillerShow',compact('chiller','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chiller  $chiller
     * @return \Illuminate\Http\Response
     */
    public function edit(Chiller $chiller)
    {
         return view('chiller.chillerEdit',compact('chiller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chiller  $chiller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chiller $chiller)
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
    
    Chiller::find($chiller->id)->update($request->all());
    
    return redirect()->route('chiller.index')
        ->with('success','Item created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chiller  $chiller
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chiller::find($id)->delete();
	return redirect()->route('chillers.index')
        ->with('success','Item deleted successfuly');
    }
    
    public function showQuantity (Request $request, $id) {
    $chiller = Chiller::find($id);
    return View::make('chiller.chillerUpdateQuantity',compact('chiller'));
    }

    /** Update Quantity **/
    public function updateQuantity (Request $request,$id) {
    Chiller::where('id',$id)->update(array(
        'quantity'=>Input::get('quantity'),
    ));
    return redirect()->route('chillers.index')->with('success','Quantity updated successfuly');
    }
}
