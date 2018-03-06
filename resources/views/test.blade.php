{{$fishSize}}
<tr>
{{$fishPrice}}
<tr>
@foreach ($fishSize as $key => $fz) 
{{$fz->fish_sizes->'js'}}
@endforeach