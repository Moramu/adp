@extends('layouts.admin')


@section('content')

                <h1 class="pageH1">Add New Project</h2>
            


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
			<strong>Support System:</strong>	    
		    {!! Form::checkbox('system','yes',null,array('class'=>'system')) !!}
			<strong>Cabinet:</strong>
		    {!! Form::checkbox('cabinet','yes',null,array('class'=>'cabinet')) !!}
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
	<div class="col-xs-12 col-sm-12 col-md-12 systemdiv" style="display:none" >
            <div class="form-group">
    	        <strong>Chiller:</strong>
                {!! Form::checkbox('chiller','yes', null, array('class' => 'chiller sselect')) !!}
		<strong>Filter:</strong>
		{!! Form::checkbox('filter','yes' ,null, array('class' => 'filter sselect')) !!}
		<strong>Heater:</strong>
		{!! Form::checkbox('heater','yes' ,null, array('class' => 'heater sselect')) !!}
		<strong>Light:</strong>
		{!! Form::checkbox('light','yes' ,null, array('class' => 'light sselect')) !!}
		<strong>Sterilizer:</strong>
		{!! Form::checkbox('sterilizer','yes' ,null, array('class' => 'sterilizer sselect')) !!}
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
$('.system').change(function(){
   $('.systemdiv').toggle();
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