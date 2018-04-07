@extends('layouts.admin')

@section('content')

    	    <div class="pull-left">
	        <h1 class="pageH1">{{ $reef->name }} </h1>
	    </div>
	    <div class="pull-right">
		<a class="btn btn-primary createButton" href="{{route('reef.index')}}">Back</a>
	    </div>
<table class="table table-bordered">
    <tr>
	<th colspan="4">Price Summary</th>
    </tr>
    <tr>	
	<td>Retail Price</td>
	<td>{{$reef->reef_sum_rtl}}</td>	
	<td>Wolesale Price</td>
	<td>{{$reef->reef_sum_whl}}</td>
    </tr>
</table>

<table class="table table-bordered">
    <tr>	
	<th>Material</th>
	<th>Material Quantity(unit)</th>	
	<th>Material Price</th>	
	<th>Retail Price</th>
	<th>Wholesale Price</th>
    </tr>
    <tr>
	<td>{{$reef->material_id}}</td>
	<td>{{$reef->m_quantity}}</td>
	<td>{{$reef->m_price}}</td>
	<td>{{$reef->m_price_rtl}}</td>
	<td>{{$reef->m_price_whl}}</td>
    </tr>
</table>

<table class="table table-bordered">
    <tr>
	<th colspan="4">Corals Price Summary</th>
    </tr>
    <tr>
	<th>Retail Price</th>
	<th>{{$reef->c_sum_rtl}}</th>
	<th>Wholesale Price</th>
	<th>{{$reef->c_sum_whl}}</th>	
    </tr>
</table>

<table class="table table-bordered">
    <tr>
	<th>Item Number</th>
	<th>Name</th>
	<th>Picture</th>
	<th>Retail Price</th>
	<th>Wholesale Price</th>
	<th>Quantity</th>
    </tr>
	@foreach($corals as $index=> $coral)
    <tr>    
	<td>{{$coral->item_number}}</td>	
	<td>{{$coral->name}}</td>
	<td><img src="{{asset($coral->photo)}}"></td>
	<td>{{$coral->retail_price}}</td>
	<td>{{$coral->wholesale_price}}</td>
	<td>{{$reef->c_quantity[$index]}}</td>
    </tr>
	@endforeach    
</table>

@endsection