@extends('layouts.app')
 

@section('content')

    <div class="row">
	<div class="col-lg-12 margin-tb">
	    <div class="pull-left">
		<h2>Edit Coral</h2>
	    </div>
	    <div class="pull-right">
		<a class="btn btn`-primary" href="{{route('corals.index') }}">Back</a>
	    </div>
	</div>
    </div>


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


    {!! Form::model($coral, ['method' => 'PATCH','route' => ['corals.update', $coral->id],'files'=>'true']) !!}
    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Item Number:</strong>
                {!! Form::number('item_number', null, array('placeholder' => 'Item Number','class' => 'form-control')) !!}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Photo:</strong>
                {!! Form::file('photo', array('files'=>true,'class' => 'form-control')) !!}
		<img src="{{ asset($coral->photo) }}">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Plastic Quantity:</strong>
                {!! Form::number('plastic_quantity', null, array('placeholder' => 'Plastic Quantity','class' => 'form-control','step'=>'any')) !!}
            </div>
        </div>
	
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cost Price:</strong>
                {!! Form::number('cost_price', null, array('placeholder' => 'Cost Price','class' => 'form-control','step'=>'any')) !!}
            </div>
        </div>

	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Weight:</strong>
                {!! Form::number('product_weight', null, array('placeholder' => 'Product Weight','class' => 'form-control','step'=>'any')) !!}
            </div>
        </div>
	
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Retail Price:</strong>
                {!! Form::number('retail_price', null, array('placeholder' => 'Retail Price','class' => 'form-control','step'=>'any')) !!}
            </div>
        </div>

	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Wholesale Price:</strong>
                {!! Form::number('wholesale_price', null, array('placeholder' => 'Wholesale Price','class' => 'form-control','step'=>'any')) !!}
            </div>
        </div>
	
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Barcode:</strong>
                {!! Form::number('barcode', null, array('placeholder' => 'Barcode','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>


    </div>
    {!! Form::close() !!}


@endsection