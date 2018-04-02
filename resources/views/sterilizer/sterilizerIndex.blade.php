@extends('layouts.admin') 

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <h1 class="pageH1">Sterilizers</h1>
    <div class="pull-right">
	<a class="btn btn-primary createButton " href="{{ route('sterilizers.create') }}">Add Sterilizer</a>
    </div>
        <div class="pull-right" style="padding-right:5px;">
        <a class="btn btn-primary createButton " href="{{ route('sterilizersExcelIndex') }}">Import/Export Sterilizer</a>
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
    @foreach ($sterilizers as $key => $sterilizer)
    <tr>
        <td>{{ $sterilizer->item_number }}</td>
        <td>{{ $sterilizer->name }}</td>
	<td>{{ $sterilizer->list_price }}</td>
        <td>{{ $sterilizer->extended_price}}</td>
        <td>{{ $sterilizer->co_stock}}</td>
	<td>{{ $sterilizer->provider}}</td>
        <td>{{ $sterilizer->rtl_price}}</td>
        <td>{{ $sterilizer->whl_price}}</td>
	<td>{{ $sterilizer->quantity}}</td> 

        <td>
            <a class="btn btn-info " href="{{ route('sterilizers.show',$sterilizer->id) }}">Show Sterilizer</a>
            <a class="btn btn-primary" href="{{ route('sterilizers.edit',$sterilizer->id) }}">Edit Sterilizer</a>
    	    <a class="btn btn-primary" href="{{ route('sterilizerUpdateQuantity',$sterilizer->id) }}">Update Quantity</a>
    
	    {!! Form::open(['method' => 'DELETE','route' => ['sterilizers.destroy', $sterilizer->id],'style'=>'display:inline','class'=>'confirm']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger delete']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>


    {!! $sterilizers->render() !!}


@endsection