<div id="heading">
	    <h1>Products</h1>
</div>
<aside>
	    <nav>
		<ul class="aside-menu">
		    <li ><a href="">Additivities</a></li>
		    <li id="aquaria"><a href="{{route('aquaria.index')}}">Aquariums</a></li>
		    @if (Request::is('aquaria/*')||Request::is('aquaria'))
		    <script>
		    var c = document.getElementById('aquaria');
		    c.className +=" active";
		    </script>
		    @endif	
		    <li><a href="">Chillers</a></li>
		    <li id="corals"><a href="{{route('corals.index')}}">Corals</a></li>
		    @if (Request::is('corals/*')||Request::is('corals'))
		    <script>
		    var c = document.getElementById('corals');
		    c.className +=" active";
		    </script>
		    @endif
		    <li><a href=""></a>Filters</li>
		    <li id="fish"><a href="{{route('fish.index')}}">Fish</a></li>
		    @if (Request::is('fish')||Request::is('fish/*'))
		    <script>
		    var c = document.getElementById('fish');
		    c.className +=" active";
		    </script>
		    @endif
		    <li><a href=""></a>Food</li>
		    <li><a href="">Heaters</a></li>
		    <li><a href="">Light</a></li>
		    <li><a href="">Sterilizers</a></li>
		</ul>
	    </nav>
</aside>
