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

    /**  Fresh Line 1 Chart **/ 
	$data1 = DB::table('water_params')
            ->where('line', '=', 'fresh1')->latest()->take(7)
            ->get();
	$dataNew = $data1->reverse()->values(); 
	$fresh1 = Charts::multi('area', 'highcharts')
	    ->title('Fresh line 1 (Last 7 records)')
    	    ->colors(['#ff0000', '#ffff44','#99ccff','#99ff99'])
	    ->labels($dataNew->pluck('created_at'))
	    ->dataset('Ph', $dataNew->pluck('ph'))
	    ->dataset('Nitrite',$dataNew->pluck('nitrite'))
	    ->dataset('Nitrate',$dataNew->pluck('nitrate'))
	    ->dataset('Phosphate',$dataNew->pluck('phosphate'))
	    ->dimensions(0, 300)
	    ->responsive(false); 
    
    /** Fresh Line 2 Chart **/
      $data2 = DB::table('water_params')
            ->where('line', '=', 'fresh2')->latest()->take(7)
            ->get();
	$dataNew = $data2->reverse()->values(); 
	$fresh2 = Charts::multi('area', 'highcharts')
	    ->title('Fresh line 2 (Last 7 records)')
    	    ->colors(['#ff0000', '#ffff44','#99ccff','#99ff99'])
	    ->labels($dataNew->pluck('created_at'))
	    ->dataset('Ph', $dataNew->pluck('ph'))
	    ->dataset('Nitrite',$dataNew->pluck('nitrite'))
	    ->dataset('Nitrate',$dataNew->pluck('nitrate'))
	    ->dataset('Phosphate',$dataNew->pluck('phosphate'))
	    ->dimensions(0, 300)
	    ->responsive(false); 
    
    /** Fresh Line 3 Chart **/
      $data3 = DB::table('water_params')
            ->where('line', '=', 'fresh3')->latest()->take(7)
            ->get();
	$dataNew = $data3->reverse()->values(); 
	$fresh3 = Charts::multi('area', 'highcharts')
	    ->title('Fresh line 3 (Last 7 records)')
    	    ->colors(['#ff0000', '#ffff44','#99ccff','#99ff99'])
	    ->labels($dataNew->pluck('created_at'))
	    ->dataset('Ph', $dataNew->pluck('ph'))
	    ->dataset('Nitrite',$dataNew->pluck('nitrite'))
	    ->dataset('Nitrate',$dataNew->pluck('nitrate'))
	    ->dataset('Phosphate',$dataNew->pluck('phosphate'))
	    ->dimensions(0, 300)
	    ->responsive(false); 
       
	/** Salt Line 1 Chart **/
      $data4 = DB::table('water_params')
            ->where('line', '=', 'salt1')->latest()->take(7)
            ->get();
	$dataNew = $data4->reverse()->values(); 
	$salt1 = Charts::multi('area', 'highcharts')
	    ->title('Salt line 1 (Last 7 records)')
    	    ->colors(['#ff0000', '#ffff44','#99ccff','#99ff99','#0033cc','#cc00cc'])
	    ->labels($dataNew->pluck('created_at'))
	    ->dataset('Ph', $dataNew->pluck('ph'))
	    ->dataset('Nitrite',$dataNew->pluck('nitrite'))
	    ->dataset('Nitrate',$dataNew->pluck('nitrate'))
	    ->dataset('Phosphate',$dataNew->pluck('phosphate'))
	    ->dataset('Hardness(KH)',$dataNew->pluck('kh'))
	    ->dataset('Salt',$dataNew->pluck('salt'))
	    ->dimensions(0, 300)
	    ->responsive(false); 
        
	/** Salt Line 2 Chart **/
      $data5 = DB::table('water_params')
            ->where('line', '=', 'salt2')->latest()->take(7)
            ->get();
	$dataNew = $data5->reverse()->values(); 
	$salt2 = Charts::multi('area', 'highcharts')
	    ->title('Salt line 2 (Last 7 records)')
    	    ->colors(['#ff0000', '#ffff44','#99ccff','#99ff99','#0033cc','#cc00cc'])
	    ->labels($dataNew->pluck('created_at'))
	    ->dataset('Ph', $dataNew->pluck('ph'))
	    ->dataset('Nitrite',$dataNew->pluck('nitrite'))
	    ->dataset('Nitrate',$dataNew->pluck('nitrate'))
	    ->dataset('Phosphate',$dataNew->pluck('phosphate'))
	    ->dataset('Hardness(KH)',$dataNew->pluck('kh'))
	    ->dataset('Salt',$dataNew->pluck('salt'))
	    ->dimensions(0, 300)
	    ->responsive(false); 
	
	/** Office Chart **/
      $data6 = DB::table('water_params')
            ->where('line', '=', 'office')->latest()->take(7)
            ->get();
	$dataNew = $data6->reverse()->values(); 
	$office = Charts::multi('area', 'highcharts')
	    ->title('Office (Last 7 records)')
    	    ->colors(['#ff0000', '#ffff44','#99ccff','#99ff99','#0033cc','#cc00cc'])
	    ->labels($dataNew->pluck('created_at'))
	    ->dataset('Ph', $dataNew->pluck('ph'))
	    ->dataset('Nitrite',$dataNew->pluck('nitrite'))
	    ->dataset('Nitrate',$dataNew->pluck('nitrate'))
	    ->dataset('Phosphate',$dataNew->pluck('phosphate'))
	    ->dataset('Hardness(KH)',$dataNew->pluck('kh'))
	    ->dataset('Salt',$dataNew->pluck('salt'))
	    ->dimensions(0, 300)
	    ->responsive(false); 
	
	    

        return view ('waterParams.waterParamIndex',compact('fresh1','fresh2','fresh3','salt1','salt2','office'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('waterParams.waterParamCreate');
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

}
