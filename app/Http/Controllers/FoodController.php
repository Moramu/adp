<?php

namespace App\Http\Controllers;

use View;
use Auth;
use Session;
use App\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


class FoodController extends Controller
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
        $foods = Food::orderBy('item_number','ASC')->paginate(10);
    return view('food.foodIndex',compact('foods'))
	->with('i',($request->input('page',1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('food.foodCreate');
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
        'item_number'=>'numeric|required|unique:foods',
        'name'=>'required',	
        'list_price'=>'required',	
        'extended_price'=>'required',	
        'co_stock'=>'required',	
        'provider'=>'required',	
        'rtl_price'=>'required',	
        'whl_price'=>'required',	
        'quantity'=>'required',	
        ]);
    
        $foods = Food::create($request->all());
    
	return redirect()->route('food.index')
        ->with('success','Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	$food = Food::find($id);
	return View::make('food.foodShow',compact('food','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        return view('food.foodEdit',compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Food $food)
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
    
    Food::find($food->id)->update($request->all());
    
    return redirect()->route('food.index')
        ->with('success','Item created successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Food::find($id)->delete();
	return redirect()->back()
        ->with('success','Item deleted successfuly');
    }

    public function showQuantity (Request $request,$id) {
    $food = Food::find($id);
    return View::make('food.foodUpdateQuantity',compact('food'));
    }
    //Update quantity
    public function updateQuantity (Request $request,$id) {
    Food::where('id',$id)->update(array(
        'quantity'=>Input::get('quantity'),
    ));
    return redirect()->route('food.index')->with('success','Quantity updated successfuly');
    }
}
