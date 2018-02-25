@extends('layouts.app')
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add new Fish!</h2>
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


    {!! Form::open(array('route' => 'fish.store','method'=>'POST','files' => true)) !!}
    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Item Number:</strong>
                {!! Form::number('item_number', null, array('placeholder' => '1.....','class' => 'form-control')) !!}
            </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Example','class' => 'form-control')) !!}
            </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Photo:</strong>
	        {!! Form::file('photo', array('files' => true, 'class' => 'form-control')) !!}
	    </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Barcode:</strong>
                {!! Form::number('barcode', null, array('placeholder' => '9332233453','class' => 'form-control')) !!}
            </div>
        </div>

    




{{--
	<div class="col-xs-12 col-sm-12 col-md-12">
	<div class="form-group">
            <strong>Type/Category:</strong>
	    {!! Form::select('type',array(
		 'Salt Water' => array('Joyous', 'Glad', 'Ecstatic'),
		 'Fresh Water' => array('Bereaved', 'Pensive', 'Down'),
		), null, ['id' => 'type', 'class' => 'form-control']) !!}
	    </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Type:</strong>
            	{!! Form::select('type',array( 'Salt' => 'Salt Water', 'Fresh' => 'Fresh Water'), null,['id' => 'cities', 'class' => 'form-control'] ) !!}
            </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                {!! Form::select('category',array('Gobby' => 'Gobby', 'Puffer' => 'Puffer'), null, ['id' => 'cities', 'class' => 'form-control']) !!}
	    </div>
        </div>
--}}


	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'This coral made by....','class' => 'form-control')) !!}
            </div>
        </div>
	
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>


    </div>
    {!! Form::close() !!}


@endsection
<script>
$(function () { // wait for page to load
    var typeDropdown = $("#type"),
        subDropdown = $('<select></select>'), // create a country dropdown
        types = []; // ordered list of countries
    
    // parse the nested dropdown
    typeDropdown.children().each(function () {
        var group = $(this),
            typeName = group.attr('label'),
            option;
        
        // create an option for the country
        option = $('<option></option>').text(typeName);
        
        // store the associated city options
        option.data('type', group.children());
        
        // check if the country should be selected
        if( group.find(':selected').length > 0 ) {
            option.prop('selected', true);
        }
        
        // add the country to the dropdown
        subDropdown.append(option);
    });
    
    // add the country dropdown to the page
    typeDropdown.before(subDropdown);
    
    // this function updates the city dropdown based on the selected country
    function updateSubs() {
        var type = subDropdown.find(':selected');
        typeDropdown.empty().append(type.data('type'));
    }
    
    // call the function to set the initial cities
    updateSubs();
    
    // and add the change handler
    subDropdown.on('change', updateSubs);
});
</script>
</body>