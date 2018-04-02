@extends('layouts.admin')

@section('content')

    	    <div class="pull-left">
	        <h1 class="pageH1">{{ $heater->name }} </h1>
	    </div>
	    <div class="pull-right">
		<a class="btn btn-primary createButton" href="{{route('heaters.index')}}">Back</a>
	    </div>

<table class="table table-bordered">
    <tr>
	<th>Item Number</th>
	<th>Name</th>
	<th>List Price</th>
	<th>Extended Price</th>
	<th>Co Stock</th>
	<th>Provider</th>
	<th>Retail Price</th>
	<th>Wholesale Price</th>
	<th>Quantity</th>
    </tr>
    <tr>
	<td>{{$heater->item_number}}</td>
	<td>{{$heater->name}}</td>
	<td>{{$heater->list_price}}</td>
	<td>{{$heater->extended_price}}</td>
	<td>{{$heater->co_stock}}</td>
	<td>{{$heater->provider}}</td>
	<td>{{$heater->rtl_price}}</td>
	<td>{{$heater->whl_price}}</td>
	<td>{{$heater->quantity}}</td>
    <tr>
</table>

@endsection