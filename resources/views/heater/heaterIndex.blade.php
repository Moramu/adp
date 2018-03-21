@extends('layouts.admin') 

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <h1 class="pageH1">Heaters</h1>
    <div class="pull-right">
	<a class="btn btn-primary createButton " href="{{ route('heaters.create') }}">Add Heater</a>
    </div>
        <div class="pull-right" style="padding-right:5px;">
        <a class="btn btn-primary createButton " href="{{ route('heatersExcelIndex') }}">Import/Export Heaters</a>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Item Number</th>
            <th>Name</th>
	    <th>List Price</th>
            <th>Extended Price</th>
            <th>Co stock</th>
	    <th>Provider</th>
            <th>Retail Price</th>
            <th>Wholesale Price</th>
	    <th>Quantity</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($heaters as $key => $heater)
    <tr>
        <td>{{ $heater->item_number }}</td>
        <td>{{ $heater->name }}</td>
	<td>{{ $heater->list_price }}</td>
        <td>{{ $heater->extended_price}}</td>
        <td>{{ $heater->co_stock}}</td>
	<td>{{ $heater->provider}}</td>
        <td>{{ $heater->rtl_price}}</td>
        <td>{{ $heater->whl_price}}</td>
	<td>{{ $heater->quantity}}</td> 

        <td>
            <a class="btn btn-info " href="{{ route('heaters.show',$heater->id) }}">Edit Quantity</a>
            <a class="btn btn-primary" href="{{ route('heaters.edit',$heater->id) }}">Edit Heater</a>
            {!! Form::open(['method' => 'DELETE','route' => ['heaters.destroy', $heater->id],'style'=>'display:inline','class'=>'confirm']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger delete']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>


    {!! $heaters->render() !!}


@endsection