@extends('layouts.admin')

@section('content')

	@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
	@endif	

	<h1 class="pageH1"> {{ $fish->name }}</h1>
	<img class="product_picture" src="{{asset($fish->photo)}}">
	
        <div class="pull-right">
		<a class="btn btn-primary" href="{{route('fish.index')}}">Back</a>
	</div>
	<div class="pull-right" style="padding-right:5px">
		<a class="btn btn-primary" href="{{url('fish/addSizePrice/'.$fish->id)}}">Add Size Price</a>
	</div>

{!! Form::open()!!} 
<table class="table table-bordered">
    <tr>
	<th>Size</th>
	<th>Price</th>
	<th>Retail Price</th>
	<th>Wholesale price</th>
	<th>Special Price</th>
	<th>Quantity</th>
	<th>Functions</th>
    </tr>
    
    @foreach ($fish->fishPrice as $fz)
    <tr>
	<td>{{$fz->fish_size_id}}</td>
	<td>{{$fz->price}}</td>
	<td>{{$fz->rtl_price}}</td>
	<td>{{$fz->wholesale_price}}</td>
	<td>{{$fz->special_price}}</td>
	<td>{{$fz->quantity}}</td>
	<td>
	<a class="btn btn-primary" href="{{url('fish/updateSizePrice/'.$fz->id)}}">Edit Size</a>
	<a class="btn btn-danger" href="{{url('fish/destroySize/'.$fz->id)}}">Delete Size</a>
	</td>

    </tr>
    @endforeach
</table>
{!! Form::close() !!}
@endsection