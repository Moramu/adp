@extends('layouts.admin')


@section('content')

                <h1 class="pageH1">Add Size Price</h2>
                <a class="btn btn-primary createButton" href="{{url('fish/'.$id)}}">Back</a>
        


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
		
	
    {!! Form::open(array('route'=>'storeSizePrice','method'=>'POST')) !!}
		{{ Form::hidden('fish_id', $id) }}
    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Size:</strong>
		{!! Form::select('fish_size_id', $size, null, ['placeholder' => 'Select Size','class'=>'form-control']) !!}
	    </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                {!! Form::number('price', null, array('placeholder' => '1.24','class' => 'form-control','step'=>'any')) !!}
            </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Retail Price:</strong>
                {!! Form::number('rtl_price', null, array('placeholder' => '55.31','class' => 'form-control','step'=>'any')) !!}
            </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Wholesale price:</strong>
                {!! Form::number('wholesale_price', null, array('placeholder' => '1.11','class' => 'form-control','step'=>'any')) !!}
            </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Special Price:</strong>
                {!! Form::number('special_price', null, array('placeholder' => '','class' => 'form-control','step'=>'any')) !!}
            </div>
       </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity:</strong>
                {!! Form::number('quantity', null, array('placeholder' => '33','class' => 'form-control')) !!}
            </div>
        </div>
	
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary pull-left">Submit</button>
        </div>


    </div>
    {!! Form::close() !!}


@endsection