@extends('layouts.admin') 

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <h1 class="pageH1">Chillers</h1>
    <div class="pull-right">
	<a class="btn btn-primary createButton " href="{{ route('chillers.create') }}">Add Chiller</a>
    </div>
        <div class="pull-right" style="padding-right:5px;">
        <a class="btn btn-primary createButton " href="{{ route('chillersExcelIndex') }}">Import/Export Chillers</a>
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
    @foreach ($chillers as $key => $chiller)
    <tr>
        <td>{{ $chiller->item_number }}</td>
        <td>{{ $chiller->name }}</td>
	<td>{{ $chiller->list_price }}</td>
        <td>{{ $chiller->extended_price}}</td>
        <td>{{ $chiller->co_stock}}</td>
	<td>{{ $chiller->provider}}</td>
        <td>{{ $chiller->rtl_price}}</td>
        <td>{{ $chiller->whl_price}}</td>
	<td>{{ $chiller->quantity}}</td> 

        <td>
            <a class="btn btn-info " href="{{ route('chillers.show',$chiller->id) }}">Show Chiller</a>
            <a class="btn btn-primary" href="{{ route('chillers.edit',$chiller->id) }}">Edit Chiller</a>
    	    <a class="btn btn-primary" href="{{ route('chillerUpdateQuantity',$chiller->id) }}">Update Quantity</a>
    
	    {!! Form::open(['method' => 'DELETE','route' => ['chillers.destroy', $chiller->id],'style'=>'display:inline','class'=>'confirm']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger delete']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>


    {!! $chillers->render() !!}


@endsection