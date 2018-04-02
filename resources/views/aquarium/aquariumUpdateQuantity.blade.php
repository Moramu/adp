@extends('layouts.admin')

@section('content')

    	    <div class="pull-left">
	        <h1 class="pageH1">{{ $aquarium->name }} </h1>
	    </div>
	    <div class="pull-right">
		<a class="btn btn-primary createButton" href="{{route('aquariums.index')}}">Back</a>
	    </div>

{!! Form::model($aquarium,['method'=>'POST'])!!} 
    	{!!Form::hidden('aquarium',$aquarium->id)!!}
<table class="table table-bordered">
    <tr>
	<th>Quantity</th>
    </tr>
    <tr>
	<td>{!!Form::number('quantity',null,array('class'=>'form-control'))!!}</td>
    <tr>

</table>

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
{!! Form::close() !!}
@endsection