<div id="heading">
	    <h1>Services</h1>
</div>
<aside>
	    <nav>
		<ul class="aside-menu">
		    <li><a href="">Price Calculator</a></li>
		    <li id="project_calculator"><a href="{{route('projectcalc.index')}}">Project Calculator</a></li>
		    @if (Request::is('projectcalc')||Request::is('projectcalc/*'))
		    <script>
		    var c = document.getElementById('project_calculator');
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