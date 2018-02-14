@extends('layouts.app')
 

@section('content')

    <div class="row">
	<div class="col-lg-12 margin-tb">
	    <div class="pull-left">
		<h2>Edit Fish</h2>
	    </div>
	    <div class="pull-right">
		<a class="btn btn-primary" href="{{route('fish.index') }}">Back</a>
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


    {!! Form::model($fish, ['method' => 'PATCH','route' => ['fish.update', $fish->id],'files'=>'true']) !!}
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
		<img src="{{ asset($fish->photo) }}">
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
                <strong>Type:</strong>
                {!! Form::select('type',['Salt'=>'Salt Water','Fresh'=>'Fresh Water'], null, array('placeholder' => 'Select type...','class' => 'form-control')) !!}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                {!! Form::select('category',['Gobby'=> 'Gobby', 'Puffer'=>'Puffer'], null, array('placeholder' => 'Select category...','class' => 'form-control')) !!}
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