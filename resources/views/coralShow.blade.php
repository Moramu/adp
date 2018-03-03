@extends('layouts.admin')

@section('content')

    	    <div class="pull-left">
	        <h1 class="pageH1">{{ $coral->name }} </h1>
	    <img class="product_picture" src="{{asset($coral->photo)}}">
	    </div>
	    <div class="pull-right">
		<a class="btn btn-primary createButton" href="{{route('corals.index')}}">Back</a>
	    </div>

{!! Form::model($coral,['method'=>'POST'])!!} 

<table class="table table-bordered">
    <tr>
	<th>BlueRidge</th>
	<th>Blue</th>
	<th>Brick</th>
	<th>Yellow</th>
	<th>Red</th>
	<th>Orange</th>
	<th>Green</th>
	<th>Turquoise</th>
	<th>Purple</th>
	<th>Pink</th>
	<th>Mustard</th>
	<th>Summary</th>
    </tr>
    <tr>
	<td>{!!Form::number('blueridge',null,array('style'=>'width:50px'))!!}</td>
	<td>{!!Form::number('blue',null,array('style'=>'width:50px'))!!}</td>
	<td>{!!Form::number('brick',null,array('style'=>'width:50px'))!!}</td>
	<td>{!!Form::number('yellow',null,array('style'=>'width:50px'))!!}</td>
	<td>{!!Form::number('dark_red',null,array('style'=>'width:50px'))!!}</td>
	<td>{!!Form::number('orange',null,array('style'=>'width:50px'))!!}</td>
	<td>{!!Form::number('green',null,array('style'=>'width:50px'))!!}</td>
	<td>{!!Form::number('turquoise',null,array('style'=>'width:50px'))!!}</td>
	<td>{!!Form::number('purple',null,array('style'=>'width:50px'))!!}</td>
	<td>{!!Form::number('pink',null,array('style'=>'width:50px'))!!}</td>
	<td>{!!Form::number('mustard',null,array('style'=>'width:50px'))!!}</td>
	<td>{{$coral->summary}}</td>
    <tr>
</table>

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
{!! Form::close() !!}
@endsection