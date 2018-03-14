@extends('layouts.admin')
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
@section('content')

            <h1 class="pageH1">Add water parameters</h1>
            <a class="btn btn-primary createButton" href="{{route('waterparam.index') }}">Back</a>



    {!! Form::open(array('route' => 'waterparam.store','method'=>'POST')) !!}
    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Line:</strong>
                {!! Form::select('line', array(
					'FreshWater' => array('fresh1'=>'Fresh 1','fresh2'=>'Fresh 2','fresh3'=>'Fresh 3'),
					'SaltWater' => array('salt1'=>'Salt 1','salt2'=>'Salt 2','office'=>'Office')
					),null,['class'=>'form-control select']) !!}
            </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>PH:</strong>
                {!! Form::number('ph', null, array('class' => 'form-control','step'=>'any')) !!}
            </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nitrite:</strong>
	        {!! Form::number('nitrite', null, array('class' => 'form-control')) !!}
	    </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nitrate:</strong>
                {!! Form::number('nitrate', null, array('class' => 'form-control')) !!}
            </div>	
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phosphate:</strong>
                {!! Form::number('phosphate', null, array('class' => 'form-control','step'=>'any')) !!}
            </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12 salt" style="display:none">
            <div class="form-group">
                <strong>Hardness(KH):</strong>
                {!! Form::number('kh', null, array('class' => 'form-control')) !!}
            </div>
        </div>

	<div class="col-xs-12 col-sm-12 col-md-12 salt" style="display:none">
            <div class="form-group">
                <strong>Salt:</strong>
                {!! Form::number('salt', null, array('class' => 'form-control','step'=>'any')) !!}
            </div>
        </div>
	
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary pull-left">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}

<script>
$('.select').on('change',function(){
        if( $(this).val()==="salt1"|| $(this).val()==="salt2"|| $(this).val()==="office"){
        $('.salt').show()
        }
        else{
        $('.salt').hide()
        }
    });
</script>

@endsection
</body>