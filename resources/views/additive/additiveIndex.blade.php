@extends('layouts.admin') 

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <h1 class="pageH1">Additives</h1>
    <div class="pull-right">
	<a class="btn btn-primary createButton " href="{{ route('additives.create') }}">Add Additive</a>
    </div>
        <div class="pull-right" style="padding-right:5px;">
        <a class="btn btn-primary createButton " href="{{ route('additivesExcelIndex') }}">Import/Export Additives</a>
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
    @foreach ($additives as $key => $additive)
    <tr>
        <td>{{ $additive->item_number }}</td>
        <td>{{ $additive->name }}</td>
	<td>{{ $additive->list_price }}</td>
        <td>{{ $additive->extended_price}}</td>
        <td>{{ $additive->co_stock}}</td>
	<td>{{ $additive->provider}}</td>
        <td>{{ $additive->rtl_price}}</td>
        <td>{{ $additive->whl_price}}</td>
	<td>{{ $additive->quantity}}</td> 

        <td>
            <a class="btn btn-info " href="{{ route('additives.show',$additive->id) }}">Edit Quantity</a>
            <a class="btn btn-primary" href="{{ route('additives.edit',$additive->id) }}">Edit Additive</a>
            {!! Form::open(['method' => 'DELETE','route' => ['additives.destroy', $additive->id],'style'=>'display:inline','class'=>'confirm']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger delete']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>


    {!! $additives->render() !!}


@endsection