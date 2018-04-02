@extends('layouts.admin')

@section('content')

    	    <div class="pull-left">
	        <h1 class="pageH1">{{ $filter->name }} </h1>
	    </div>
	    <div class="pull-right">
		<a class="btn btn-primary createButton" href="{{route('filters.index')}}">Back</a>
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
	<td>{{$filter->item_number}}</td>
	<td>{{$filter->name}}</td>
	<td>{{$filter->list_price}}</td>
	<td>{{$filter->extended_price}}</td>
	<td>{{$filter->co_stock}}</td>
	<td>{{$filter->provider}}</td>
	<td>{{$filter->rtl_price}}</td>
	<td>{{$filter->whl_price}}</td>
	<td>{{$filter->quantity}}</td>
    <tr>
</table>

@endsection