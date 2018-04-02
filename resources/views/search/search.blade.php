@extends('layouts.search')

@section('content')
<div class="container">
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Search results</h2>
    <table class="table table-striped">
        <thead>
            <tr>
		<th>Item Number</th>
                <th>Name</th>
		<th>Category</th>
            </tr>
	</thead>
	    @foreach($additives as $ad)
	    <tr>
	    <td><a href="{{route('additives.show',$ad->id)}}"</a>{{$ad->item_number}}</td>
	    <td><a href="{{route('additives.show',$ad->id)}}"</a>{{$ad->name}}</td>
	    <td>Additive</td>
	    </tr>
	    @endforeach

	    @foreach($aquariums as $aq)
	    <tr>
	    <td><a href="{{route('aquariums.show',$aq->id)}}"</a>{{$aq->item_number}}</td>
	    <td><a href="{{route('aquariums.show',$aq->id)}}"</a>{{$aq->name}}</td>
	    <td>Aquariums</td>
	    </tr>
	    @endforeach

	    @foreach($chillers as $ch)
	    <tr>
	    <td><a href="{{route('chillers.show',$ch->id)}}"</a>{{$ch->item_number}}</td>
	    <td><a href="{{route('chillers.show',$ch->id)}}"</a>{{$ch->name}}</td>
	    <td>Chillers</td>
	    </tr>
	    @endforeach

	    @foreach($corals as $co)
	    <tr>
	    <td><a href="{{route('corals.show',$co->id)}}"</a>{{$co->item_number}}</td>
	    <td><a href="{{route('corals.show',$co->id)}}"</a>{{$co->name}}</td>
	    <td>Corals</td>
	    </tr>
	    @endforeach

	    @foreach($filters as $fi)
	    <tr>
	    <td><a href="{{route('filters.show',$fi->id)}}"</a>{{$fi->item_number}}</td>
	    <td><a href="{{route('filters.show',$fi->id)}}"</a>{{$fi->name}}</td>
	    <td>Filters</td>
	    </tr>
	    @endforeach

	    @foreach($fish as $f)
	    <tr>
	    <td><a href="{{route('fish.show',$f->id)}}"</a>{{$f->item_number}}</td>
	    <td><a href="{{route('fish.show',$f->id)}}"</a>{{$f->name}}</td>
	    <td>Fish</td>
	    </tr>
	    @endforeach

	    @foreach($foods as $fo)
	    <tr>
	    <td><a href="{{route('food.show',$fo->id)}}"</a>{{$fo->item_number}}</td>
	    <td><a href="{{route('food.show',$fo->id)}}"</a>{{$fo->name}}</td>
	    <td>Food</td>
	    </tr>
	    @endforeach

	    @foreach($heaters as $he)
	    <tr>
	    <td><a href="{{route('heaters.show',$he->id)}}"</a>{{$he->item_number}}</td>
	    <td><a href="{{route('heaters.show',$he->id)}}"</a>{{$he->name}}</td>
	    <td>Heaters</td>
	    </tr>
	    @endforeach

	    @foreach($lights as $li)
	    <tr>
	    <td><a href="{{route('lightings.show',$li->id)}}"</a>{{$li->item_number}}</td>
	    <td><a href="{{route('lightings.show',$li->id)}}"</a>{{$li->name}}</td>
	    <td>Light</td>
	    </tr>
	    @endforeach

	    @foreach($sterilizers as $st)
	    <tr>
	    <td><a href="{{route('sterilizers.show',$st->id)}}"</a>{{$st->item_number}}</td>
	    <td><a href="{{route('sterilizers.show',$st->id)}}"</a>{{$st->name}}</td>
	    <td>Sterilizers</td>
	    </tr>
	    @endforeach

        </tbody>
    </table>

</div>

@endsection