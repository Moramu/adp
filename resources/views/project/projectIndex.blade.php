@extends('layouts.admin')
 

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <h1 class="pageH1">Projects</h1>
        <a class="btn btn-info createButton" href="{{ route('project.create')}}">Add project</a>
        
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
    <tr>
        <td></td>
        <td></td>
    	<td></td>
        <td></td>
	<td></td>
	<td></td>
        <td></td>
        <td>
        </td>
    </tr>
    </table>

    {!!$project->render()!!}

@endsection