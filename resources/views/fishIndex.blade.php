@extends('layouts.admin')
 

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <h1 class="pageH1">Fish</h1>
    <table class="table table-bordered">
        <tr>
            <th>Item Number</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Barcode</th>
	    <th>Type</th>
	    <th>Category</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($fish as $key => $fishes)
    <tr>
        <td>{{ $fishes->item_number }}</td>
        <td>{{ $fishes->name }}</td>
    	<td><img src="{{ $fishes->photo }}"></td>
        <td>{{ $fishes->barcode }}</td>
	<td>{{ $fishes->type }}</td>
	<td>{{ $fishes->category }}</td>
        <td>{{str_limit( $fishes->description) }}</td>

        <td>
            <a class="btn btn-info " href="{{ route('fish.show',$fishes->id) }}">Show Qtty</a>
            <a class="btn btn-primary" href="{{ route('fish.edit',$fishes->id) }}">Edit Fish</a>
            {!! Form::open(['method' => 'DELETE','route' => ['fish.destroy', $fishes->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>

    {!!$fish->render()!!}

@endsection