@extends('layouts.admin')

@section('content')

    	    <div class="pull-left">
	        <h1 class="pageH1">{{ $lighting->name }} </h1>
	    </div>
	    <div class="pull-right">
		<a class="btn btn-primary createButton" href="{{route('lightings.index')}}">Back</a>
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
	<td>{{$lighting->item_number}}</td>
	<td>{{$lighting->name}}</td>
	<td>{{$lighting->list_price}}</td>
	<td>{{$lighting->extended_price}}</td>
	<td>{{$lighting->co_stock}}</td>
	<td>{{$lighting->provider}}</td>
	<td>{{$lighting->rtl_price}}</td>
	<td>{{$lighting->whl_price}}</td>
	<td>{{$lighting->quantity}}</td>
    <tr>
</table>

@endsection