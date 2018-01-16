@extends ('layouts.app')
<!--
<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('corals') }}">Nerd Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('corals') }}">View All Nerds</a></li>
        <li><a href="{{ URL::to('coral/create') }}">Create a Nerd</a>
    </ul>
</nav>
-->
@section('content')
<h1>Showing {{ $coral->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $coral->name }}</h2>
        <p>
            <strong>Blueridge:</strong> {{ $coral->blueridge }}<br>
            <strong>Blue:</strong> {{ $coral->blue }}
	    <strong>Brick:</strong> {{ $coral->brick }}<br>
            <strong>Yellow:</strong> {{ $coral->yellow }}
	    <strong>Dark Red:</strong> {{ $coral->dark_red }}<br>
            <strong>Orange:</strong> {{ $coral->orange }}
	    <strong>Green:</strong> {{ $coral->green }}<br>
            <strong>Turquoise:</strong> {{ $coral->turquoise }}
	    <strong>Purple:</strong> {{ $coral->purple }}<br>
            <strong>Pink:</strong> {{ $coral->pink }}
	    <strong>Mustard:</strong> {{ $coral->mustard }}<br>
            <strong>Summary:</strong> {{ $coral->summary }}
	    
        </p>
    </div>
@endsection
</div>
</body>
</html>