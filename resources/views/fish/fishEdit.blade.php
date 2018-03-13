@extends('layouts.admin')
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@section('content')

		<h1 class="pageH1">Edit Fish</h1>
	    <div class="pull-right">
		<a class="btn btn-primary createButton" href="{{route('fish.index') }}">Back</a>
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
		<img class="product_picture" src="{{ asset($fish->photo) }}">
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
            	    <select name="type" class="form-control" style="width:350px">
            		    <option value='type'>--- Select Water Type ---</option>
            			@foreach ($types as $key => $value)
                	    <option value="{{ $key }}">{{ $value }}</option>
            			@endforeach
        	    </select>
    	    </div>
	</div>
    
    	<div class="col-xs-12 col-sm-12 col-md-12">
    	    <div class="form-group">
    		<strong>Category:</strong>
	    	    <select name="category" class="form-control" style="width:350px">
	    		<option value='category'>--- Select Category ---</option>
        	    </select>
    	    </div>
	</div>
	
	
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary pull-left">Submit</button>
        </div>


    </div>
    {!! Form::close() !!}


@endsection
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="type"]').on('change', function() {
            var typeID = $(this).val();
            if(typeID) {
                $.ajax({
                    url: '/adp/public/fish/create/'+typeID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        
                        $('select[name="category"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="category"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="category"]').empty();
            }
        });
    });
</script>