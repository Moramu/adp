@extends ('layouts.admin')

@section ('content')

@foreach ($fish->fishPrices as $fishSize)
    <p>This is user {{ $fishSize->size_id }}</p>
@endforeach




@endsection