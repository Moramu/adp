@extends('layouts.admin')

@section('content')

    	    <div class="pull-left">
	        <h1 class="pageH1">{{ $aquarium->name }} </h1>
	    </div>
	    <div class="pull-right">
		<a class="btn btn-primary createButton" href="{{route('aquariums.index')}}">Back</a>
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
	<td>{{$aquarium->item_number}}</td>
	<td>{{$aquarium->name}}</td>
	<td>{{$aquarium->list_price}}</td>
	<td>{{$aquarium->extended_price}}</td>
	<td>{{$aquarium->co_stock}}</td>
	<td>{{$aquarium->provider}}</td>
	<td>{{$aquarium->rtl_price}}</td>
	<td>{{$aquarium->whl_price}}</td>
	<td>{{$aquarium->quantity}}</td>
    <tr>
</table>

@endsection