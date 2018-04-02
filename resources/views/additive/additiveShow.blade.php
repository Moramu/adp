@extends('layouts.admin')

@section('content')

    	    <div class="pull-left">
	        <h1 class="pageH1">{{ $additive->name }} </h1>
	    </div>
	    <div class="pull-right">
		<a class="btn btn-primary createButton" href="{{route('additives.index')}}">Back</a>
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
	<td>{{$additive->item_number}}</td>
	<td>{{$additive->name}}</td>
	<td>{{$additive->list_price}}</td>
	<td>{{$additive->extended_price}}</td>
	<td>{{$additive->co_stock}}</td>
	<td>{{$additive->provider}}</td>
	<td>{{$additive->rtl_price}}</td>
	<td>{{$additive->whl_price}}</td>
	<td>{{$additive->quantity}}</td>
    <tr>
</table>

@endsection