<div id="heading">
	    <h1>Products</h1>
</div>
<aside>
	    <nav>
		<ul class="aside-menu">
		    <li id="additives" ><a href="{{route('additives.index')}}">Additives</a></li>
		    @if (Request::is('additives/*')||Request::is('additives'))
		    <script>
		    var c = document.getElementById('additives');
		    c.className +=" active";
		    </script>
		    @endif
		    <li id="aquariums"><a href="{{route('aquariums.index')}}">Aquariums</a></li>
		    @if (Request::is('aquariums/*')||Request::is('aquariums'))
		    <script>
		    var c = document.getElementById('aquariums');
		    c.className +=" active";
		    </script>
		    @endif	
		    <li id="chillers"><a href="{{route('chillers.index')}}">Chillers</a></li>
		    @if (Request::is('chillers/*')||Request::is('chillers'))
		    <script>
		    var c = document.getElementById('chillers');
		    c.className +=" active";
		    </script>
		    @endif	
		    <li id="corals"><a href="{{route('corals.index')}}">Corals</a></li>
		    @if (Request::is('corals/*')||Request::is('corals'))
		    <script>
		    var c = document.getElementById('corals');
		    c.className +=" active";
		    </script>
		    @endif
		    <li id="filters"><a href="{{route('filters.index')}}">Filters</a></li>
		    @if (Request::is('filters/*')||Request::is('filters'))
		    <script>
		    var c = document.getElementById('filters');
		    c.className +=" active";
		    </script>
		    @endif
		    <li id="fish"><a href="{{route('fish.index')}}">Fish</a></li>
		    @if (Request::is('fish')||Request::is('fish/*'))
		    <script>
		    var c = document.getElementById('fish');
		    c.className +=" active";
		    </script>
		    @endif
		    <li id="food"><a href="{{route('food.index')}}">Food</a></li>
		    @if (Request::is('food')||Request::is('food/*'))
		    <script>
		    var c = document.getElementById('food');
		    c.className +=" active";
		    </script>
		    @endif
		    <li id="heaters"><a href="{{route('heaters.index')}}">Heaters</a></li>
		    @if (Request::is('heaters')||Request::is('heaters/*'))
		    <script>
		    var c = document.getElementById('heaters');
		    c.className +=" active";
		    </script>
		    @endif
		    <li id="lightings"><a href="{{route('lightings.index')}}">Light</a></li>
		    @if (Request::is('lightings')||Request::is('lightings/*'))
		    <script>
		    var c = document.getElementById('lightings');
		    c.className +=" active";
		    </script>
		    @endif
		    <li id="sterilizers"><a href="{{route('sterilizers.index')}}">Sterilizers</a></li>
		    @if (Request::is('sterilizers')||Request::is('sterilizers/*'))
		    <script>
		    var c = document.getElementById('sterilizers');
		    c.className +=" active";
		    </script>
		    @endif
		</ul>
	    </nav>
</aside>
