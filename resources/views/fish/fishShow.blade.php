@extends('layouts.admin')

@section('content')

	<h1 class="pageH1"> {{ $fish->name }}</h1>	
        <div class="pull-right">
		<a class="btn btn-primary" href="{{route('fish.index')}}">Back</a>
	</div>

<table class="table table-bordered">
    <tr>
	<th>Item Number</th>
	<th>Name</th>
	<th>Photo</th>
	<th>Barcode</th>
	<th>Type </th>
	<th>Category</th>
	<th>Description</th>	
    </tr>
    <tr>
	<td>{{$fish->item_number}}</td>
	<td>{{$fish->name}}</td>
    	<td><img src="{{asset($fish->photo)}}"></td>
	<td>{{$fish->barcode}}</td>
	<td>{{$fish->type}}</td>
	<td>{{$fish->category}}</td>
	<td>{{$fish->description}}</td>
    </tr>
</table>

	<h1 class="pageH1"> Available Sizes</h1>

<table class="table table-bordered">
    <tr>
	<th>Size</th>
	<th>Price</th>
	<th>Retail Price</th>
	<th>Wholesale price</th>
	<th>Special Price</th>
	<th>Quantity</th>
    </tr>
    @foreach ($fish->fishPrice as $fz)
    <tr>
	<td>{{$fz->fish_size_id}}</td>
	<td>{{$fz->price}}</td>
	<td>{{$fz->rtl_price}}</td>
	<td>{{$fz->wholesale_price}}</td>
	<td>{{$fz->pecial_price}}</td>
	<td>{{$fz->quantity}}</td>
    </tr>
    @endforeach
</table>
@endsection