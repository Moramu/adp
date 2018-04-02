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
    	{!!Form::hidden('coral_id',$coral->id)!!}
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
    	@foreach($coral->coralColors as $cc)
    <tr>
	<td>{!!Form::number('blueridge',$cc->blueridge,null,array(['class'=>'val_input']))!!}</td>
	<td>{!!Form::number('blue',$cc->blue,null,array('class'=>'form-control'))!!}</td>
	<td>{!!Form::number('brick',$cc->brick)!!}</td>
	<td>{!!Form::number('yellow',$cc->yellow)!!}</td>
	<td>{!!Form::number('dark_red',$cc->dark_red)!!}</td>
	<td>{!!Form::number('orange',$cc->orange)!!}</td>
	<td>{!!Form::number('green',$cc->green)!!}</td>
	<td>{!!Form::number('turquoise',$cc->turquoise)!!}</td>
	<td>{!!Form::number('purple',$cc->purple)!!}</td>
	<td>{!!Form::number('pink',$cc->pink)!!}</td>
	<td>{!!Form::number('mustard',$cc->mustard)!!}</td>
	<td>{{$cc->summary}}</td>
    <tr>
	@endforeach


</table>

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
{!! Form::close() !!}
@endsection