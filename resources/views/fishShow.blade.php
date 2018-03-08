@extends('layouts.admin')

@section('content')

	<h1 class="pageH1"> {{ $fish->name }}</h1>
	<img class="product_picture" src="{{asset($fish->photo)}}">
	
        <div class="pull-right">
		<a class="btn btn-primary" href="{{route('fish.index')}}">Back</a>
	</div>
	<div class="pull-right">
		<a class="btn btn-primary" href="{{url('fish/addSizePrice/'.$fish->id)}}">Add Size Price</a>
	</div>


{!! Form::model($fish,['method'=>'POST'])!!} 
<table class="table table-bordered">
    <tr>
	<th>Js/T</th>
	<th>S</th>
	<th>SM</th>
	<th>M</th>
	<th>ML</th>
	<th>L</th>
	<th>XL</th>
	<th>N/A</th>
	
    </tr>
    <tr>
    <tr>
</table>

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
{!! Form::close() !!}
@endsection