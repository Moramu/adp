@extends('layouts.admin') 

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <h1 class="pageH1">Filters</h1>
    <div class="pull-right">
	<a class="btn btn-primary createButton " href="{{ route('filters.create') }}">Add Filter</a>
    </div>
        <div class="pull-right" style="padding-right:5px;">
        <a class="btn btn-primary createButton " href="{{ route('filtersExcelIndex') }}">Import/Export Filters</a>
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
    @foreach ($filters as $key => $filter)
    <tr>
        <td>{{ $filter->item_number }}</td>
        <td>{{ $filter->name }}</td>
	<td>{{ $filter->list_price }}</td>
        <td>{{ $filter->extended_price}}</td>
        <td>{{ $filter->co_stock}}</td>
	<td>{{ $filter->provider}}</td>
        <td>{{ $filter->rtl_price}}</td>
        <td>{{ $filter->whl_price}}</td>
	<td>{{ $filter->quantity}}</td> 

        <td>
            <a class="btn btn-info " href="{{ route('filters.show',$filter->id) }}">Show Filter</a>
            <a class="btn btn-primary" href="{{ route('filters.edit',$filter->id) }}">Edit Filter</a>
    	    <a class="btn btn-primary" href="{{ route('filterUpdateQuantity',$filter->id) }}">Update Quantity</a>
    	    
	    {!! Form::open(['method' => 'DELETE','route' => ['filters.destroy', $filter->id],'style'=>'display:inline','class'=>'confirm']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger delete']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>


    {!! $filters->render() !!}


@endsection