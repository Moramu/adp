@extends('layouts.admin')


@section('content')

                <h1 class="pageH1">Add New Project</h2>
                <a class="btn btn-primary createButton" href="{{route('project.index') }}">Back</a>
        


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
    

    {!! Form::open(array('route' => 'project.store','method'=>'POST','files' => true)) !!}
    <div class="row">
	

	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('Name', null, array('class' => 'form-control')) !!}
            </div>
        </div>
	<div class="options col-xs-12 col-sm-12 col-md-12">
	    <div class="form-group">
		    <strong>Aquarium:</strong>
		    {!! Form::checkbox('aquarium','yes',null,array('class'=>'aquarium')) !!}
			<strong>Custom Reef:</strong>
		    {!! Form::checkbox('reef','yes') !!}
			<strong>Support System:</strong>	    
		    {!! Form::checkbox('system','yes') !!}
			<strong>Cabinet:</strong>
		    {!! Form::checkbox('cabinet','yes') !!}
	    </div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 aquariumdiv" style="display:none" >
            <div class="form-group">
                <strong>Custom:</strong>
                {!! Form::checkbox('aquariumcustom','yes', null, array('class' => 'acustom aselect')) !!}
		<strong>Stock:</strong>
		{!! Form::checkbox('aquariumstock','yes' ,null, array('class' => 'astock aselect')) !!}
            </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12 customdiv" style="display:none">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('custom_tank', null, array('class' => 'form-control')) !!}
            </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12 stockdiv" style="display:none">
            <div class="form-group">
                <strong>Select from stock:</strong>
                {!! Form::select('stock_tank',$aquariums, null, array('class' => 'form-control')) !!}
            </div>
        </div>
	
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary pull-left">Submit</button>
        </div>


    </div>
    {!! Form::close() !!}

<script>

$('.aquarium').change(function(){
   $('.aquariumdiv').toggle();
});
$('.acustom').change(function(){
   $('.customdiv').toggle();
});
$('.astock').change(function(){
   $('.stockdiv').toggle();
});

//$('input[type="checkbox"]').on('change', function() {
// $(this).siblings('input[type="checkbox"]').not(this).prop('checked', false);    
//});



</script>

@endsection