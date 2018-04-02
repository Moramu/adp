<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Additive;
use App\Aquarium;
use App\Chiller;
use App\Coral;
use App\Filter;
use App\Fish;
use App\Food;
use App\Heater;
use App\Lighting;
use App\Sterilizer;

    class SearchController extends Controller
    {
	public function search(){
	$query = Input::get ( 'search' );
	
	$additives = Additive::where('name','ilike','%'.$query.'%')->get();

	$aquariums = Aquarium::where('name','ilike','%'.$query.'%')->get();

	$chillers = Chiller::where('name','ilike','%'.$query.'%')->get();
//	dd($chillers);
	$corals = Coral::where('name','ilike','%'.$query.'%')->get();

	$filters = Filter::where('name','ilike','%'.$query.'%')->get();

	$fish = Fish::where('name','ilike','%'.$query.'%')->get();

	$foods = Food::where('name','ilike','%'.$query.'%')->get();
    
	$heaters = Heater::where('name','ilike','%'.$query.'%')->get();
	
	$lights = Lighting::where('name','ilike','%'.$query.'%')->get();

	$sterilizers = Sterilizer::where('name','ilike','%'.$query.'%')->get();


        return view('search.search',compact('query','additives','aquariums','chillers','corals','filters','fish','foods','heaters','lights','sterilizers'));
    }

    }
