@extends('layouts.admin')
 

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <h1 class="pageH1">Calculated Reefs</h1>
        <a class="btn btn-info createButton" href="{{ route('reef.create')}}">Clculate Reef</a>
        
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Coral Quantity</th>
            <th>Retail Price</th>
	    <th>Wholesale Price</th>
            <th>User</th>
            <th width="280px">Action</th>
        </tr>
    @foreach($reefs as $reef)
    <tr>
        <td>{{$reef->name}}</td>
        <td>{{$reef->c_sum_quantity}}</td>
    	<td>{{$reef->reef_sum_rtl}}</td>
        <td>{{$reef->reef_sum_whl}}</td>
	<td>{{$reef->username}}</td>
        <td>
	<a class="btn btn-info " href="{{ route('reef.show',$reef->id) }}">Show Reef</a>
        <a class="btn btn-primary" href="{{ route('reef.edit',$reef->id) }}">Edit Reef</a>        
        {!! Form::open(['method' => 'DELETE','route' => ['reef.destroy', $reef->id],'style'=>'display:inline','class'=>'confirm']) !!}
        {!! Form::submit('Delete', ['class' => 'btn btn-danger delete']) !!}
        {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>

    {!!$reefs->render()!!}

@endsection