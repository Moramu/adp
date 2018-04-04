<div id="heading">
	    <h1>Services</h1>
</div>
<aside>
	    <nav>
		<ul class="aside-menu">
		    <li><a href="">Price Calculator</a></li>
		    <li id="reef"><a href="{{route('reef.index')}}">Reef Calculator</a></li>
		    @if (Request::is('reef')||Request::is('reef/*'))
		    <script>
		    var c = document.getElementById('reef');
		    c.className +=" active";
		    </script>
		    @endif
		    <li id="project"><a href="{{route('project.index')}}">Project Calculator</a></li>
		    @if (Request::is('project')||Request::is('project/*'))
		    <script>
		    var c = document.getElementById('project');
		    c.className +=" active";
		    </script>
		    @endif
		    <li id="water_param"><a href="{{route('waterparam.index')}}">Water Parameters</a></li>
		    @if (Request::is('waterparam')||Request::is('waterparam/*'))
		    <script>
		    var c = document.getElementById('water_param');
		    c.className +=" active";
		    </script>
		    @endif

		</ul>
	    </nav>
</aside>