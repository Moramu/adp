<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\waterParam;
use Charts;
use DB;

class WaterParamController extends Controller
{

    public function __construct()
    {
    $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('waterparams.waterParamIndex');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('waterparams.waterParamCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	$this->validate($request,[
	    'ph' => 'numeric|required',
	    'nitrite' => 'numeric|required',
	    'nitrate' => 'numeric|required',
	    'phosphate' => 'numeric|required',	
	    ]);
        waterParam::create($request->all());
	return redirect()->route('waterparam.index')
		->with('succes','Parameters successfuly added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fresh1()
    {

    $data = DB::table('water_params')
            ->where('line', '=', 'fresh1')->latest()->take(7)
            ->get();
    $dataNew = $data->reverse()->values(); 
    $chart = Charts::multi('area', 'highcharts')
	->title('Fresh line 1')
	->colors(['#ff0000', '#ffff44','#99ccff','#99ff99'])
	->labels($dataNew->pluck('created_at'))
	->dataset('Ph', $dataNew->pluck('ph'))
	->dataset('Nitrite',$dataNew->pluck('nitrite'))
	->dataset('Nitrate',$dataNew->pluck('nitrate'))
	->dataset('Phosphate',$dataNew->pluck('phosphate'))
	->responsive(false);    
    return view('waterparams.test', ['chart' => $chart]);
    }
}
