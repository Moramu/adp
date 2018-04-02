<?php

namespace App\Http\Controllers;
use Session;

use DB;
use Auth;
use View;
use Image;
use \App\Fish;
use \App\fishPrice;
use \App\fishSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
//use Illuminate\Support\Facades\DB;

class FishController extends Controller
{
    
    public function __construct()
    {
    $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index (Request $request)
    {
	// get all sorted from 1... X corals, by 10 on page with pagination
	$fish = Fish::orderBy('item_number','ASC')->paginate(10);

        // load the view and pass the corals
	return view('fish.fishIndex',compact('fish'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        // load the create form 
	//$types = DB::table("water_type")->lists("name","id");
	$types = DB::table("water_type")->pluck("type","id");
        return view('fish.fishCreate',compact('types'));
    }

    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function fishFormAjax($id)
    {
        $categories = DB::table("fish_categories")
                    ->where("type_id",$id)
                    ->pluck("category","id");
//	echo json_encode($categories);
        return json_encode($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Image $image)
    {
	$fish = new Fish;
	//fields validation
        $this->validate($request, [
           'item_number' => 'numeric|required|unique:fish',
	    'name' => 'required|unique:fish',
	    'type'=> 'required',
	    'category' => 'required',
        ]);

	if(Input::file()){
	$image = Input::file('photo');
    	$fileName  = time() . '.' . $image->getClientOriginalExtension();
    	$path = public_path('/uploads/photo/' . $fileName);
	Image::make(Input::file('photo'))->resize(100,100)->save($fileName);
	$fish->item_number = $request -> item_number;
	$fish->name = $request -> name;
	$fish->photo = $fileName;
	$fish->barcode = $request -> barcode;
	$fish->type = $request -> type;
	$fish->category = $request -> category;
	$fish->description = $request -> description;
	$fish->save();
	return redirect()->route('fish.index')
                        ->with('success','Item created successfully');
	} else {	

        Fish::create($request->all());
        return redirect()->route('fish.index')
                        ->with('success','Item created successfully');
    }
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get the fish
	$fish = Fish::find($id);
//	dd($fish);

//	$fish = Fish::with("fishPrices")->find($id);
	$size = fishSize::with('fishPrice')->find($id);
//	$size = DB::table('fish_sizes')->pluck('id','size');
	return View::make('fish.fishShow',compact('fish','size'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fish = Fish::find($id);
	$types = DB::table("water_type")->pluck("type","id");
	$categories = DB::table("fish_categories")->pluck("category","type_id");
        return view('fish.fishEdit',compact('fish','types','categories'));
    }
    
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
    	    'item_number' => 'numeric|required',
	    'name' => 'required',
	    'type' => 'required',
	    'category' => 'required',
        ]);

	if(Input::file()){
	$image = Input::file('photo');
    	$fileName  = time() . '.' . $image->getClientOriginalExtension();
    	$path = public_path('/uploads/photo/$id/' . $fileName);
	Image::make(Input::file('photo'))->resize(100,100)->save($fileName);
	Fish::where('id', $id)->update(array('photo' => $fileName,
			'item_number'=>Input::get('item_number'),
			'name'=>Input::get('name'),
			'type'=>Input::get('type'), 
			'category'=>Input::get('category'), 
			'barcode'=>Input::get('barcode'), 
			'description'=>Input::get('description'),
			));
	return redirect()->route('fish.index')
                        ->with('success','Item updated successfully');
	
	} 
	
        Fish::find($id)->update($request->all());
        return redirect()->route('fish.index')
                        ->with('success','Item updated successfully');
    }


     public function destroy($id) {
        Fish::find($id)->delete();
        return redirect()->route('fish.index')
                        ->with('success','Item deleted successfully');
    }

    public function showQuantity(Request $request,$id) {
	$fish = Fish::find($id);
	return View::make('fish.fishUpdateQuantity',compact('fish'));
    }

    public function addSizePrice (Request $request,$id) {
	$size = DB::table('fish_sizes')->pluck("size");
//	dd($size);
	return view('fish.fishAddSizePrice', compact('id','size'));
    }


    public function storeSizePrice (Request $request){
    	//$fishPrice = new fishPrice;

	    $this->validate($request, [
    	    'fish_size_id' => 'required',
	    'price' => 'required',
	    'rtl_price' => 'required',
	    'wholesale_price' => 'required',
	    'quantity' => 'required',
        ]);
	$fish_id = $request->fish_id;
	$fish_size_id = $request->fish_size_id;
	$check = DB::table('fish_prices')->where('fish_id',$fish_id)
					->where('fish_size_id',$fish_size_id)
				->get();		
//		dd($count);
	if(!$check->isEmpty()){
	    return redirect()->back()->with('error','Size already added!');
	}
	else {
	fishPrice::create($request->all());
	    return redirect('fish/quantity/'.$fish_id)->with('success','Price added successfully');
	}
    }

    public function showSizePrice (Request $request,$id){
	$fish_size_id = $request->id;
	$fishPrice = fishPrice::find($fish_size_id);
	return View::make('fish.fishUpdateSizePrice',compact('fishPrice'));
    }

    public function updateSizePrice (Request $request,$id){

	    $this->validate($request, [
	    'price' => 'required',
	    'rtl_price' => 'required',
	    'wholesale_price' => 'required',
	    'quantity' => 'required',
        ]);
	fishPrice::find($id)->update($request->all());
	$fp = fishPrice::find($id);
	    return redirect('fish/quantity/'.$fp->fish_id)
    		->with('success','Price updated successfully');
    }

    public function destroySize(Request $request,$id) {
	$fp = fishPrice::find($id);
        fishPrice::find($id)->delete();
        return redirect('fish/quantity/'.$fp->fish_id)
                        ->with('success','Item deleted successfully');
    }
    
}

