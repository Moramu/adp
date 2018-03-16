@extends('layouts.admin') 

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <h1 class="pageH1">Corals</h1>
    <div class="pull-right">
	<a class="btn btn-primary createButton " href="{{ route('corals.create') }}">Add Coral</a>
    </div>
        <div class="pull-right" style="padding-right:5px;">
        <a class="btn btn-primary createButton " href="{{ route('coralExcelIndex') }}">Import/Export Corals</a>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Item Number</th>
            <th>Name</th>
            <th>Photo</th>
	    <th>Plastic Quantity</th>
            <th>Cost Price</th>
            <th>Prduct Weight</th>
	    <th>Retail Price</th>
            <th>Wholesale Price</th>
            <th>Barcode</th>
	    <th>Summary Quantity</th>
            <th>Description</th> 
            <th width="280px">Action</th>
        </tr>
    @foreach ($corals as $key => $coral)
    <tr>
        <td>{{ $coral->item_number }}</td>
        <td>{{ $coral->name }}</td>
    	<td><img src="{{ $coral->photo }}"></td>
	<td>{{ $coral->plastic_quantity }}</td>
        <td>{{ $coral->cost_price}}</td>
        <td>{{ $coral->product_weight}}</td>
	<td>{{ $coral->retail_price}}</td>
        <td>{{ $coral->wholesale_price }}</td>
        <td>{{ $coral->barcode }}</td>
	<td>{{ $coral->summary }}</td> 
	<td>{{str_limit($coral->description) }}</td> 

        <td>
            <a class="btn btn-info " href="{{ route('corals.show',$coral->id) }}">Show Qtty</a>
            <a class="btn btn-primary" href="{{ route('corals.edit',$coral->id) }}">Edit Coral</a>
            {!! Form::open(['method' => 'DELETE','route' => ['corals.destroy', $coral->id],'style'=>'display:inline','class'=>'confirm']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger delete']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>


    {!! $corals->render() !!}


@endsection