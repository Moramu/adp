@extends ('layouts.admin')

@section ('content')


@foreach ($fish->fishSizes as $fz)
    <p>This is user {{ $fz->js }}</p>
@endforeach




@endsection