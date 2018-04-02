<?php

namespace App\Http\Controllers;

use View;
use Auth;
use Session;
use App\Filter;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


class FilterController extends Controller
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
     $filters = Filter::orderBy('item_number','ASC')->paginate(10);
	return view('filter.filterIndex',compact('filters'))
	    ->with('i',($request->input('page',1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	return view ('filter.filterCreate');
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
        'item_number'=>'numeric|required|unique:filters',
        'name'=>'required',	
        'list_price'=>'required',	
        'extended_price'=>'required',	
        'co_stock'=>'required',	
        'provider'=>'required',	
        'rtl_price'=>'required',	
        'whl_price'=>'required',	
        'quantity'=>'required',	
        ]);
    
        $filter = Filter::create($request->all());
    
	return redirect()->route('filters.index')
        ->with('success','Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$filter = Filter::find($id);
        return View::make('filter.filterShow',compact('filter','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function edit(Filter $filter)
    {
         return view('filter.filterEdit',compact('filter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filter $filter)
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
    
    Filter::find($filter->id)->update($request->all());
    
    return redirect()->route('filters.index')
        ->with('success','Item created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Filter::find($id)->delete();
	    return redirect()->back()
	    ->with('success','Item deleted successfuly');
    }
    
    public function showQuantity (Request $request,$id) {
    $filter = Filter::find($id);
    return View::make('filter.filterUpdateQuantity',compact('filter'));
    }
    
    // update Quantity
    public function updateQuantity (Request $request,$id) {
    Filter::where('id',$id)->update(array(
        'quantity'=>Input::get('quantity'),
    ));
    return redirect()->route('filters.index')->with('success','Quantity updated successfuly');
    }
}
