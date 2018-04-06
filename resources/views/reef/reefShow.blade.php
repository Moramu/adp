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
	<th colspan="4">Price Summary</th>
    </tr>
    <tr>	
	<th>Material</th>
	<th>Material Quantity</th>	
	<th>Material Price(unit)</th>	
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
	<th>Item Number</th>
	<th>Name</th>
	<th>Picture</th>
	<th>Retail Price</th>
	<th>Wholesale Price</th>
	<th>Quantity</th>
    </tr>
    
    @for($i=0;$i<count($reef->coral_id);$i++)    
	@if($reef->c_quantity[$i]!=0)
    <tr>
	<td>{{$reef->coral_id[$i]}}</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td>{{$reef->c_quantity[$i]}}</td>

    </tr>
	@endif
    @endfor
</table>

@endsection