@extends('layouts.app')
@section('title', 'Page Title')

@section('content')

    <div class="row">
	<div class="col-lg-12 margin-tb">
	    <div class="pull-left">
		<h2>View/Edit Colors Quantity</h2>
	    <img src="{{asset($coral->photo)}}">
	    </div>
	    <div class="pull-right">
		<a class="btn btn-primary" href="{{route('corals.index')}}">Back</a>
	    </div>
	</div>
    </div>
    <h1>Showing - {{ $coral->name }} </h1>

//{!! Form::model($coral,['method'=>'PATCH','route'=>['CorallController@updateColors',$coral->id]])!!} 
    {!! Form::model(array('action' => 'CoralControlles@updateColors'))!!} 
//{!! Form::model($coral, ['method' => 'PATCH', 'action' => ['CoralController@updateColors',$coral->id]]) !!}

<table class="table table-bordered">
    <tr>
	<th>BlueRidge</th>
	<th>Blue</th>
	<th>Brick</th>
	<th>Yellow</th>
	<th>Red</th>
	<th>Orange</th>
	<th>Greeb</th>
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