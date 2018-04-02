@extends('layouts.admin')

@section('content')

    	    <div class="pull-left">
	        <h1 class="pageH1">{{ $food->name }} </h1>
	    </div>
	    <div class="pull-right">
		<a class="btn btn-primary createButton" href="{{route('food.index')}}">Back</a>
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
	<td>{{$food->item_number}}</td>
	<td>{{$food->name}}</td>
	<td>{{$food->list_price}}</td>
	<td>{{$food->extended_price}}</td>
	<td>{{$food->co_stock}}</td>
	<td>{{$food->provider}}</td>
	<td>{{$food->rtl_price}}</td>
	<td>{{$food->whl_price}}</td>
	<td>{{$food->quantity}}</td>
    <tr>
</table>
@endsection