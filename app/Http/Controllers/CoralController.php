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
    public function store(Request $request)
    {
	//fields validation
        $this->validate($request, [
           'item_number' => 'numeric|required|unique:corals',
	    'name' => 'required|unique:corals',
	//    'retail_price' => 'numeric|required',
        ]);

        Coral::create($request->all());
        return redirect()->route('corals.index')
                        ->with('success','Item created successfully');
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get the nerd
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
            'item_number' => 'required',
        ]);


        Coral::find($id)->update($request->all());
        return redirect()->route('corals.index')
                        ->with('success','Item updated successfully');
    }
    
/**     public function store(Request $request)
    {
        // validate
    
        $rules = array(
            'item_number'       => 'required',
        //    'name'      => 'required',
	//    'photo' => 'sometimes|mimes:jpeg,jpg,png,gif|max:100000',
        //    'plastic_quantity' => 'required|numeric',
	//    'cost_price'       => 'required|numeric',
        //    'product_weight'      => 'required|numeric',
	//    'retail_price'      => 'required|numeric',
	//    'wholesale_price'      => 'required|numeric',
	//    'barcode'      => 'required|numeric',
	//    'description'      => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('corals/create')
                ->withErrors($validator);
        } else {
            // store
            $coral = new Coral;
            $coral->item_number = Input::get('item_number');
        //    $coral->name = Input::get('name');
        //    $coral->plastic_quantity = Input::get('plastic_quantity');
	//    $coral->cost_price = Input::get('cost_price');
	//    $coral->product_weight = Input::get('product_weight');
	//    $coral->retail_price = Input::get('retail_price');
	//    $coral->wholesale_price = Input::get('wholesale_price');
	//    $coral->barcode = Input::get('barcode');
	//    $coral->description = Input::get('description');
            $coral->save();

            // redirect
            Session::flash('message', 'Successfully created Coral!');
            return Redirect::to('corals');
        }
    }
**/ 
/**   
     public function update(Request $request, $id)
    {
        $this->validate($request, [
            'item_number'       => 'required',
            'name'      => 'required',
	//    'photo' => 'nullable|mimes:jpeg,jpg,png,gif|max:100000',
            'plastic_quantity' => 'required|numeric',
	    'cost_price'       => 'required|numeric',
            'product_weight'      => 'required|numeric',
	    'retail_price'      => 'required|numeric',
	    'wholesale_price'      => 'required|numeric',
	    'barcode'      => 'required|numeric',
	    'description'      => 'required'
        ]);
//	if (!'photo')  { 'photo'='no_image.jpg'};
//	if ($this->photo=(is_null('photo'))){return $this->'photo';}
        Coral::find($id)->update($request->all());
        return redirect()->route('corals.index')
                       ->with('success','Coral updated successfully');
    }
**/
/**    public function updatePhoto (Request $request)
    {
	 $this->validate($request, [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
	if($request->hasFile('photo')){
	$photo = $request->file('photo');
	$filenme = time() . '.' . $photo->getClientOriginalExtension();
	Image::make($photo)->resize(300, 300)->save(public_path('uploads/photo/'. $filename));
	}
    return redirect()->route('corals.index')
                       ->with('success','Coral updated successfully');
    
    }
**/    
/**    public function updatePhoto (Request $request)
    {
	 $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
	if($request->hasFile('image')){
	$photo = $request->file('image');
	$filenme = time() . '.' . $photo->getClientOriginalExtension();
	Image::make($photo)->resize(300, 300)->save(public_path('uploads/photo/'. $filename));
	}
    return redirect()->route('corals.index')
                       ->with('success','Coral updated successfully');
    
    }
**/    
/**    
     public function update($id, Request $request)
    {
        // validate
        $rules = array(
            'item_number'       => 'required',
            'name'      => 'required',
            'plastic_quantity' => 'required|numeric',
	    'cost_price'       => 'required|numeric',
            'product_weight'      => 'required|numeric',
	    'retail_price'      => 'required|numeric',
	    'wholesale_price'      => 'required|numeric',
	    'barcode'      => 'required|numeric',
	    'description'      => 'required'
        );
    //    $validator = Validator::make($request->all(),$rules);
	 $validator = Validator::make(Input::all(), $rules);
        // process the login
        if ($validator->fails()) {
            return Redirect::to('corals/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // store
            $coral = Coral::find($id);

            $coral->item_number = Input::get('item_number');
            $coral->name = Input::get('name');
            $coral->plastic_quantity = Input::get('plastic_quantity');
	    $coral->cost_price = Input::get('cost_price');
	    $coral->product_weight = Input::get('product_weight');
	    $coral->retail_price = Input::get('retail_price');
	    $coral->wholesale_price = Input::get('wholesale_price');
	    $coral->barcode = Input::get('barcode');
	    $coral->description = Input::get('description');
            $coral->save();


            // redirect
            Session::flash('message', 'Successfully updated Coral!');
            return Redirect::to('corals');
        }
    }
**/
}
