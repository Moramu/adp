<?php

namespace App\Http\Controllers;
use Session;

use DB;
use Auth;
use View;
use Image;
use \App\Fish;
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
	return view('fishIndex',compact('fish'))
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
        return view('fishCreate',compact('types'));
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
//	$fish = Fish::with("fishPrices")->find($id);
	return View::make('fishShow')->with('fish',$fish);
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
        return view('fishEdit',compact('fish','types'));
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


     public function destroy($id)
    {
        Fish::find($id)->delete();
        return redirect()->route('fish.index')
                        ->with('success','Item deleted successfully');
    }

    public function addSizePrice ($id) {
	$fishPrice = new fishPrice;
/**	$fish->item_number = $request -> item_number;
	$fish->name = $request -> name;
	$fish->photo = $fileName;
	$fish->barcode = $request -> barcode;
	$fish->type = $request -> type;
	$fish->category = $request -> category;
	$fish->description = $request -> description;
	$fish->save();
	return redirect()->route('fish.index')
                        ->with('success','Item created successfully');
**/    }
    


//    public function test (Request $request,$id) {
//
//    $fish = Fish::with("fishSizes")->find($id);
//    $fishPrice = Fish::with("fishPrices")->find($id);
//    foreach ($fish->fishSizes as $fishSize) {
//      $fz[] = array( 
//            "fish_id" =>$fish->fish_id,
//            "size" =>$fish->size, 
//      );
//    }    
//    return view('test')->with('fish', $fish);
//    }

}

