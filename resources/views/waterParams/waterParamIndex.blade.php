@extends('layouts.admin')

@section('content')

<h1 class="pageH1">Water Parameters</h1>
<a class="btn btn-info createButton" href="{{route('waterparam.create')}}">Add water parameters</a>

        <div class="water_graph">
            <center>
                {!! $fresh1->html() !!}
            </center>
	    <br>
	    <center>
                {!! $fresh2->html() !!}
            </center>
	    <br>
	    <center>
                {!! $fresh3->html() !!}
            </center>
	    <br>
	    <center>
                {!! $salt1->html() !!}
            </center>
	    <br>
	    <center>
                {!! $salt2->html() !!}
            </center>
	    <br>
	    <center>
                {!! $office->html() !!}
            </center>
	    
        
        </div>
        <!-- End Of Main Application -->
        {!! Charts::scripts() !!}
        {!! $fresh1->script() !!}
	{!! $fresh2->script() !!}
	{!! $fresh3->script() !!}
	{!! $salt1->script() !!}
	{!! $salt2->script() !!}
	{!! $office->script() !!}
	



@endsection