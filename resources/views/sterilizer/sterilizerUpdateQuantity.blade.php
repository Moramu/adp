@extends('layouts.admin')

@section('content')

    	    <div class="pull-left">
	        <h1 class="pageH1">{{ $sterilizer->name }} </h1>
	    </div>
	    <div class="pull-right">
		<a class="btn btn-primary createButton" href="{{route('sterilizers.index')}}">Back</a>
	    </div>

{!! Form::model($sterilizer,['method'=>'POST'])!!} 
    	{!!Form::hidden('sterilizer',$sterilizer->id)!!}
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