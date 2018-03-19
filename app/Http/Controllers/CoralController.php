<?php

namespace App\Http\Controllers;
use Session;
use Auth;
use View;
use Image;
use \App\Coral;
use \App\coralColors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class CoralController extends Controller
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
	$corals = Coral::orderBy('item_number','ASC')->paginate(10);

        // load the view and pass the corals
	return view('coral.coralIndex',compact('corals'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        // load the create form (app/views/corals/create.blade.php)
        return view('coral.coralCreate');
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
	//if image attached
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

        $coral = Coral::create($request->all());
	coralColors::create(['coral_id'=>$coral->id]);
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
	 $coral = Coral::with('coralColors')->find($id);
        // show the view and pass the coral to it
	 return View::make('coral.coralShow',compact('coral','id'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$coral = Coral::find($id);
        return view('coral.coralEdit',compact('coral'));
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
	//if photo changed
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

	// Delete coral by id
     public function destroy($id)
	{
        Coral::find($id)->delete();
        return redirect()->route('corals.index')
                        ->with('success','Item deleted successfully');
    }
    
	// updating corals quantity
    public function updateColors(Request $request,$id) {
	    $total = Input::get('blueridge')+Input::get('blue')+Input::get('brick')
		    +Input::get('yellow')+Input::get('dark_red')+Input::get('orange')+Input::get('green')
		    +Input::get('turquoise')+Input::get('purple')+Input::get('pink')+Input::get('mustard');	
	    $request->request->add(['summary' => $total]);
	    $request->except('_token');
	    coralColors::where('coral_id',$id)->update($request->except('_token'));	
	    return redirect()->route('corals.index')
                        ->with('success','Colors updated successfully');
    }
}

