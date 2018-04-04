@extends('layouts.admin')


@section('content')

    @if ($message = Session::get('error'))
        <div class="alert alert-error">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-succes">
            <p>{{ $message }}</p>
        </div>
    @endif
                <h1 class="pageH1">Update Size Price <b>{{$fishPrice->fish_size_id}}</b></h2>
                <a class="btn btn-primary createButton" href="{{url('fish/quantity/'.$fishPrice->fish_id)}}">Back</a>
        


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
		
{!! Form::model($fishPrice,['method'=>'POST'])!!} 
    <div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                {!! Form::number('price', null, array('class' => 'form-control','step'=>'any')) !!}
            </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Retail Price:</strong>
                {!! Form::number('rtl_price', null, array('class' => 'form-control','step'=>'any')) !!}
            </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Wholesale price:</strong>
                {!! Form::number('wholesale_price', null, array('class' => 'form-control','step'=>'any')) !!}
            </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Special Price:</strong>
                {!! Form::number('special_price', null, array('class' => 'form-control','step'=>'any')) !!}
            </div>
       </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity:</strong>
                {!! Form::number('quantity', null, array('class' => 'form-control')) !!}
            </div>
        </div>
	
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary pull-left">Submit</button>
        </div>


    </div>
    {!! Form::close() !!}


@endsection