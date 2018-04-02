@extends('layouts.admin') 

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <h1 class="pageH1">Food</h1>
    <div class="pull-right">
	<a class="btn btn-primary createButton " href="{{ route('food.create') }}">Add Food</a>
    </div>
        <div class="pull-right" style="padding-right:5px;">
        <a class="btn btn-primary createButton " href="{{ route('foodExcelIndex') }}">Import/Export Food</a>
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
    @foreach ($foods as $key => $food)
    <tr>
        <td>{{ $food->item_number }}</td>
        <td>{{ $food->name }}</td>
	<td>{{ $food->list_price }}</td>
        <td>{{ $food->extended_price}}</td>
        <td>{{ $food->co_stock}}</td>
	<td>{{ $food->provider}}</td>
        <td>{{ $food->rtl_price}}</td>
        <td>{{ $food->whl_price}}</td>
	<td>{{ $food->quantity}}</td> 

        <td>
            <a class="btn btn-info " href="{{ route('food.show',$food->id) }}">Show food</a>
            <a class="btn btn-primary" href="{{ route('food.edit',$food->id) }}">Edit Food</a>
    	    <a class="btn btn-primary" href="{{ route('foodUpdateQuantity',$food->id) }}">Update Quantity</a>
    	    
	    {!! Form::open(['method' => 'DELETE','route' => ['food.destroy', $food->id],'style'=>'display:inline','class'=>'confirm']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger delete']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>


    {!! $foods->render() !!}


@endsection