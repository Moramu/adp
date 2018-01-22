<?php

namespace App\Http\Controllers;
use Session;

use View;
use Image;
use \App\Coral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class CoralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index (Request $request)
    {
	// get all sorted from 1... X corals, by 10 on page with pagination
	$corals = Coral::orderBy('item_number','ASC')->paginate(10);

        // load the view and pass the corals
	return view('index',compact('corals'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        // load the create form (app/views/corals/create.blade.php)
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Image $image)
    {
	$coral = new Coral;
	//fields validation
        $this->validate($request, [
           'item_number' => 'numeric|required|unique:corals',
	    'name' => 'required|unique:corals',
        ]);

	if(Input::file()){
	$image = Input::file('photo');
    	$fileName  = time() . '.' . $image->getClientOriginalExtension();
    	$path = public_path('/uploads/photo/' . $fileName);
	Image::make(Input::file('photo'))->resize(100,100)->save($fileName);
	$coral->item_number = $request -> item_number;
	$coral->name = $request -> name;
	$coral->photo = $fileName;
	$coral->plastic_quantity = $request -> plastic_quantity;
	$coral->cost_price = $request -> cost_price;
	$coral->product_weight = $request -> product_weight;
	$coral->retail_price = $request -> retail_price;
	$coral->wholesale_price = $request -> wholesale_price;
	$coral->barcode = $request -> barcode;
	$coral->description = $request -> description;
	$coral->save();
	return redirect()->route('corals.index')
                        ->with('success','Item created successfully');
	} else {	

        Coral::create($request->all());
        return redirect()->route('corals.index')
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
	
        // get the coral
	 $coral = Coral::find($id);
        // show the view and pass the coral to it
	 return View::make('show')
         ->with('coral', $coral);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the coral
        ///$coral = Coral::find($id);

        // show the edit form and pass the coral
        //return View::make('edit')
            //->with('coral', $coral);
	$coral = Coral::find($id);
        return view('edit',compact('coral'));
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
        ]);

	if(Input::file()){
	$image = Input::file('photo');
    	$fileName  = time() . '.' . $image->getClientOriginalExtension();
    	$path = public_path('/uploads/photo/$id/' . $fileName);
	Image::make(Input::file('photo'))->resize(100,100)->save($fileName);
	Coral::where('id', $id)->update(array('photo' => $fileName,
			'item_number'=>Input::get('item_number'),
			'name'=>Input::get('name'),
			'plastic_quantity'=>Input::get('plastic_quantity'), 
			'cost_price'=>Input::get('cost_price'), 
			'product_weight'=>Input::get('product_weight'), 
			'retail_price'=>Input::get('retail_price'), 
			'wholesale_price'=>Input::get('wholesale_price'), 
			'barcode'=>Input::get('barcode'), 
			'description'=>Input::get('description'),
			));
	return redirect()->route('corals.index')
                        ->with('success','Item updated successfully');
	
	} 
	
        Coral::find($id)->update($request->all());
        return redirect()->route('corals.index')
                        ->with('success','Item updated successfully');
    }


     public function destroy($id)
    {
        Coral::find($id)->delete();
        return redirect()->route('corals.index')
                        ->with('success','Item deleted successfully');
    }
    
    public function updateColors(Request $request,$id) {
		$coral = Coral::find($id);
	    
		Coral::where('id', $id)->update(array(
			'blueridge'=>Input::get('blueridge'),
			'blue'=>Input::get('blue'),			
			'brick'=>Input::get('brick'),
			'yellow'=>Input::get('yellow'),
			'dark_red'=>Input::get('dark_red'),
			'orange'=>Input::get('orange'),
			'green'=>Input::get('green'),
			'turquoise'=>Input::get('turquoise'),
			'purple'=>Input::get('purple'),
			'pink'=>Input::get('pink'),
			'mustard'=>Input::get('mustard'),
			));
	return redirect()->route('corals.index')
                        ->with('success','Colors updated successfully');

//return $coral;
    
}
}

