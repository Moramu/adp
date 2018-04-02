@extends('layouts.admin')

@section('content')

    	    <div class="pull-left">
	        <h1 class="pageH1">{{ $sterilizer->name }} </h1>
	    </div>
	    <div class="pull-right">
		<a class="btn btn-primary createButton" href="{{route('sterilizers.index')}}">Back</a>
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
	<td>{{$sterilizer->item_number}}</td>
	<td>{{$sterilizer->name}}</td>
	<td>{{$sterilizer->list_price}}</td>
	<td>{{$sterilizer->extended_price}}</td>
	<td>{{$sterilizer->co_stock}}</td>
	<td>{{$sterilizer->provider}}</td>
	<td>{{$sterilizer->rtl_price}}</td>
	<td>{{$sterilizer->whl_price}}</td>
	<td>{{$sterilizer->quantity}}</td>
    <tr>
</table>

@endsection