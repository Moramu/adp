@extends('layouts.admin') 

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <h1 class="pageH1">Aquaria</h1>
    <div class="pull-right">
	<a class="btn btn-primary createButton " href="{{ route('aquaria.create') }}">Add Aquarium</a>
    </div>
        <div class="pull-right" style="padding-right:5px;">
        <a class="btn btn-primary createButton " href="{{ route('aquariaExcelIndex') }}">Import/Export Aquariums</a>
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
    @foreach ($aquaria as $key => $aqua)
    <tr>
        <td>{{ $aqua->item_number }}</td>
        <td>{{ $aqua->name }}</td>
	<td>{{ $aqua->list_price }}</td>
        <td>{{ $aqua->extended_price}}</td>
        <td>{{ $aqua->co_stock}}</td>
	<td>{{ $aqua->provider}}</td>
        <td>{{ $aqua->rtl_price}}</td>
        <td>{{ $aqua->whl_price}}</td>
	<td>{{ $aqua->quantity}}</td> 

        <td>
            <a class="btn btn-info " href="{{ route('aquaria.show',$aqua->id) }}">Edit Quantity</a>
            <a class="btn btn-primary" href="{{ route('aquaria.edit',$aqua->id) }}">Edit Aquarium</a>
            {!! Form::open(['method' => 'DELETE','route' => ['aquaria.destroy', $aqua->id],'style'=>'display:inline','class'=>'confirm']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger delete']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>


    {!! $aquaria->render() !!}


@endsection