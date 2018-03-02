@extends('layouts.admin')
 
@section('content')
<div class="container">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                         This is Admin Dashboard. You must be super privileged to be here !
                </div>
</div>
@endsection