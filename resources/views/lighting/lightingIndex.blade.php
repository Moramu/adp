@extends('layouts.admin') 

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <h1 class="pageH1">Chillers</h1>
    <div class="pull-right">
	<a class="btn btn-primary createButton " href="{{ route('lightings.create') }}">Add Lighting</a>
    </div>
        <div class="pull-right" style="padding-right:5px;">
        <a class="btn btn-primary createButton " href="{{ route('lightingsExcelIndex') }}">Import/Export Lightings</a>
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
    @foreach ($lightings as $key => $lighting)
    <tr>
        <td>{{ $lighting->item_number }}</td>
        <td>{{ $lighting->name }}</td>
	<td>{{ $lighting->list_price }}</td>
        <td>{{ $lighting->extended_price}}</td>
        <td>{{ $lighting->co_stock}}</td>
	<td>{{ $lighting->provider}}</td>
        <td>{{ $lighting->rtl_price}}</td>
        <td>{{ $lighting->whl_price}}</td>
	<td>{{ $lighting->quantity}}</td> 

        <td>
            <a class="btn btn-info " href="{{ route('lightings.show',$lighting->id) }}">Edit Quantity</a>
            <a class="btn btn-primary" href="{{ route('lightings.edit',$lighting->id) }}">Edit Lighting</a>
            {!! Form::open(['method' => 'DELETE','route' => ['lightings.destroy', $lighting->id],'style'=>'display:inline','class'=>'confirm']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger delete']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>


    {!! $lightings->render() !!}


@endsection