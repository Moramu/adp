@extends('layouts.admin')

@section('content')

	<h1 class="pageH1"> {{ $fishSizes->name }}</h1>
	<img class="product_picture" src="{{asset($fishSizes->photo)}}">
	
        <div class="pull-right">
		<a class="btn btn-primary" href="{{route('fish.index')}}">Back</a>
	</div>


{!! Form::model($fishSizes,['method'=>'POST'])!!} 

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
	<td>{!!Form::number('js',null,array('style'=>'width:50px'))!!}</td>
	<td>{!!Form::number('s',null,array('style'=>'width:50px'))!!}</td>
	<td>{!!Form::number('sm',null,array('style'=>'width:50px'))!!}</td>
	<td>{!!Form::number('m',null,array('style'=>'width:50px'))!!}</td>
	<td>{!!Form::number('ml',null,array('style'=>'width:50px'))!!}</td>
	<td>{!!Form::number('l',null,array('style'=>'width:50px'))!!}</td>
	<td>{!!Form::number('xl',null,array('style'=>'width:50px'))!!}</td>
	<td>{!!Form::number('n/a',null,array('style'=>'width:50px'))!!}</td>
    <tr>
</table>


<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
{!! Form::close() !!}
@endsection