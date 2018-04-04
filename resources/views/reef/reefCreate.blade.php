@extends('layouts.admin')


@section('content')

                <h1 class="pageH1">Calculating Reef</h2>
                <a class="btn btn-primary createButton" href="{{route('reef.index') }}">Back</a>
        


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::open(array('method'=>'GET','files' => true)) !!}




	<table class="table table-bordered">
    	<tr>
	    <th>Material</th>
	    <th>Quantity</th>
	    <th>Retail Price</th>
	    <th>Wholesale Price</th>
	</tr>
	<tr>
	    <td>{!! Form::select('material',['Habitad Black']) !!}</td>
	    <td>{!! Form::number('mquantity',null,array('step'=>'any')) !!}</td>
	    <td></td>
	    <td></td>
    	</tr>
	</table>

	<table class="table table-bordered">
	<tr>
	    <th>Item Number</th>
	    <th>Name</th>
	    <th>Picture</th>
	    <th>Retail Price</th>
	    <th>Wholesale Price</th>
	    <th>Quantity</th>
	</tr>
	@foreach($corals as $coral)
    	<tr>
	    <td>{{$coral->item_number}}</td>
	    <td>{{$coral->name}}</td>
	    <td><img src="{{asset($coral->photo)}}"></td>
	    <td class="rtl_price">{{$coral->retail_price}}</td>
	    <td class="whl_price">{{$coral->wholesale_price}}</td>
	    <td>{!! Form::number('cq',null,array('class'=>'cq')) !!}</td>
	</tr>
	@endforeach
	</table>

	<table class="table table-bordered">
    	<tr>
	    <th colspan="2">Summary Price</th>
	</tr>
	<tr>
	    <td>Retail Price</td>
	    <td>Wholesale Price</td>
	</tr>
	<tr>
	    <td>{!! Form::number('sum_rtl',null,array('class'=>'sum_rtl', 'readonly' => 'true'))!!}</td>
	    <td>{!! Form::number('sum_whl',null,array('class'=>'sum_whl','readonly' => 'true'))!!}</td>
    	</tr>
	</table>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary pull-left">Submit</button>
        </div>

    {!! Form::close() !!}


<script>
$('.cq').on('input', function() {
	$.ajax(
	{
        url: "create/reefFormAjax",
        type: 'POST',
	data:$(this.form).serialize(),
	success:function(data){
            	 callback(data);
            }
	}
	)
	});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


function callback(response) {
    $('.sum_whl').val(response);
    $('.sum_rtl').val(response);
}

</script>









{{-- -------------------------- Work ------------------

<script>
$('.cq').on('input', function() {
	        cq=$.trim($("input[name='cq']").val());
		console.log(cq + " a");
	});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

$.ajax(
    {
        url: "create/reefFormAjax",
        type: 'POST',
	data: {
	cquantity: $('.cq').val(),
	    },
	success:function(data){
            	 callback(data);
            }
    })

function callback(response) {
    $('.sum_whl').val(response);
}

</script>

--}}


@endsection