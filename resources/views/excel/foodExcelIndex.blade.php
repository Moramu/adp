@extends ('layouts.admin')
    {{ csrf_field() }}
@section('content')

	@if($message = Session::get('succes'))
	    <div class="alert alert-success">
	    <p>{{$message}}</p>
	@endif 
	
	<h1 class="pageH1">Import/Export Food</h1>
	<div class="pull-right">
		<a href="{{ URL::to('food/downloadExcel/xls') }}"><button class="btn btn-primary createButton">Download Excel xls</button></a>
		<a href="{{ URL::to('food/downloadExcel/xlsx') }}"><button class="btn btn-primary createButton" style="margin-right:5px;">Download Excel xlsx</button></a>
		<a href="{{ URL::to('food/downloadExcel/csv') }}"><button class="btn btn-primary createButton" style="margin-right:5px;">Download CSV</button></a>
    	</div>
	<div>
	<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ route('importFood') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
	    {{ csrf_field() }}
	
        <input class="attach" type="file" name="import_file"/>
	    <button class="btn btn-primary " style="margin-top:5px;">Import File</button>
	</form>
	</div>
@endsection