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
    <tr>
        <td></td>
        <td></td>
    	<td></td>
        <td></td>
	<td></td>
        <td>
        </td>
    </tr>
    </table>

    {!!$reef->render()!!}

@endsection