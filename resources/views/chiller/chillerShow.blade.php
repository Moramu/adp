@extends('layouts.admin')

@section('content')

    	    <div class="pull-left">
	        <h1 class="pageH1">{{ $chiller->name }} </h1>
	    </div>
	    <div class="pull-right">
		<a class="btn btn-primary createButton" href="{{route('chillers.index')}}">Back</a>
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
	<td>{{$chiller->item_number}}</td>
	<td>{{$chiller->name}}</td>
	<td>{{$chiller->list_price}}</td>
	<td>{{$chiller->extended_price}}</td>
	<td>{{$chiller->co_stock}}</td>
	<td>{{$chiller->provider}}</td>
	<td>{{$chiller->rtl_price}}</td>
	<td>{{$chiller->whl_price}}</td>
	<td>{{$chiller->quantity}}</td>
    <tr>
</table>

@endsection