<!doctype html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>AquaDesignManagment</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset ('css/default.css')}}" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">
	<header>
	    <a href="/"><img class="top_logo" src="{{asset('storage/aqua_logo.png')}}" alt="logo"></a>
	    <div class="dropdown">
    	    <button class="btn btn-primary-my dropdown-toggle" type="button" data-toggle="dropdown">{{ Auth::user()->name }}
    		<span class="caret"></span></button>
    		    <ul class="dropdown-menu">
    			<li><a href="#">Profile</a></li>
    			<li>
			<a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
			</li>
    		    </ul>
	    </div>
	    <img class="avatar" src="{{asset('storage/no_ava.jpg')}}">	
	</header>
	<nav>
	    <ul class="top-menu">
		
		<li class='home'><a href="{{route('sadmin')}}">Home</li>
		<li id="roducts"><a href="{{route('products')}}">Products</li>
		<li class='services'><a href="{{route('services')}}">Services</a></li>
		<li class='settings'><a href="">Settings</a></li>
		<li>
		    <form name="search" action="#" method="get">
		    <input type="text" name="q" placeholder="Search"><button class='search' type="submit">GO</button>
		    </form>
		</li>
	    </ul>
	</nav>
    
	@if (Request::is('sadmin/products')) 
	    @include ('includes.productsSidebar')
    	@endif
	@if (Request::is('sadmin/services'))
	    @include ('includes.servicesSidebar')
	@endif
	@if (Request::is('sadmin/settings'))
	    @include ('includes.settingsSidebar')
	@endif

    	

	    <section>
	    @yield('content')
	    </section>
	
    
</body>
</html>