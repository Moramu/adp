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
//	Image::update('photo'->$fileName);
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
        //    'item_number' => 'required',
	 'item_number' => 'numeric|required',
	    'name' => 'required',
        ]);


        Coral::find($id)->update($request->all());
        return redirect()->route('corals.index')
                        ->with('success','Item updated successfully');
    }

    

}
