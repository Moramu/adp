@extends('layouts.admin')

@section('content')

    	    <div class="pull-left">
	        <h1 class="pageH1">{{ $coral->name }} </h1>
	    </div>
	    <div class="pull-right">
		<a class="btn btn-primary createButton" href="{{route('corals.index')}}">Back</a>
	    </div>

<table class="table table-bordered">
    <tr>
	<th>Item Number</th>
	<th>Name</th>
	<th>Photo</th>
	<th>Plastic Quantity</th>
	<th>Cost Price</th>
	<th>Product Weight</th>
	<th>Retail Price</th>
	<th>Wholesale Price</th>
	<th>Barcode</th>
	<th>Description</th>
    </tr>
    <tr>
	<td>{{$coral->item_number}}</td>
	<td>{{$coral->name}}</td>
	<td><img src="{{ asset($coral->photo)}}"></td>
	<td>{{$coral->plastic_quantity}}</td>
	<td>{{$coral->cost_price}}</td>
	<td>{{$coral->product_weight}}</td>
	<td>{{$coral->retail_price}}</td>
	<td>{{$coral->wholesale_price}}</td>
	<td>{{$coral->barcode}}</td>
	<td>{{$coral->description}}</td>
    <tr>
</table>
	    <div class="pull-left">
	        <h1 class="pageH1"> Availible Colors </h1>
	    </div>
	
<table class="table table-bordered">
    <tr>
	<th>BlueRidge</th>
	<th>Blue</th>
	<th>Brick</th>
	<th>Yellow</th>
	<th>DarkRed</th>
	<th>Orange</th>
	<th>Green</th>
	<th>Turquoise</th>
	<th>Purple</th>
	<th>Pink</th>
	<th>Mustard</th>
	<th>Summary</th>
    </tr>
    <tr>
	@foreach($coral->coralColors as $cc)
	<td>{{$cc->blueridge}}</td>
	<td>{{$cc->blue}}</td>
	<td>{{$cc->brick}}</td>
	<td>{{$cc->yellow}}</td>
	<td>{{$cc->dark_red}}</td>
	<td>{{$cc->orange}}</td>
	<td>{{$cc->green}}</td>
	<td>{{$cc->turquoise}}</td>
	<td>{{$cc->purple}}</td>
	<td>{{$cc->pink}}</td>
	<td>{{$cc->mustard}}</td>
	<td>{{$cc->summary}}</td>
    	@endforeach
    <tr>
</table>
    
{!! Form::close() !!}
@endsection