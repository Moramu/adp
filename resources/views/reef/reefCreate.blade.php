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
	    <th>Material Price</th>
	    <th>Retail Price</th>
	    <th>Wholesale Price</th>
	</tr>
	<tr>
	    <td>{!! Form::select('material',['Habitad Black']) !!}</td>
	    <td>{!! Form::number('mq',0,array('step'=>'any','class'=>'mq')) !!}</td>
	    <td>{!! Form::number('mp','497',array('class'=>'mpg','readonly' => 'true')) !!}</td>
	    <td>{!! Form::number('m_price_rtl',0,array('class'=>'m_sum_rtl','readonly' => 'true','step'=>'any')) !!}</td>
    	    <td>{!! Form::number('m_price_whl',0,array('class'=>'m_sum_whl','readonly'=>'true','step'=>'any')) !!}</td>
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
	@foreach($corals as $index => $coral)
    	<tr>
	    <td>{{$coral->item_number}}</td>
	    <td>{{$coral->name}}</td>
	    <td><img src="{{asset($coral->photo)}}"></td>
	    <td>{!! Form::number('c_price_rtl['.$index.']',$coral->retail_price,array('readonly' => 'true'))!!}</td>
	    <td>{!! Form::number('c_price_whl['.$index.']',$coral->wholesale_price,array('readonly' => 'true'))!!}</td>
	    <td>{!! Form::number('cq['.$index.']',0,array('class'=>'cq')) !!}</td>
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
	    <td>{!! Form::number('sum_rtl',null,array('class'=>'r_sum_rtl','readonly' => 'true'))!!}</td>
	    <td>{!! Form::number('sum_whl',null,array('class'=>'r_sum_whl','readonly' => 'true'))!!}</td>
    	</tr>
	</table>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary pull-left">Submit</button>
        </div>

    {!! Form::close() !!}


<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
$('.mq, .cq').on('input', function() {
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
function callback(response) {
    var c_sum_rtl = 0;
    var c_sum_whl = 0;
    var m_price_rtl = 0;
    var m_price_whl = 0;
    for($i=0;$i<response.c_price_rtl.length;$i++){
    c_sum_rtl+=parseFloat(response.c_price_rtl[$i])*parseInt(response.cq[$i]);
    c_sum_whl+=parseFloat(response.c_price_whl[$i])*parseInt(response.cq[$i]);
    }
    m_sum_rtl=parseFloat(response.mq)*parseFloat(response.mp)*2.5;	
    m_sum_whl=m_sum_rtl-(m_sum_rtl/100*30);
    console.log(m_sum_rtl + " r");
    console.log(m_sum_whl + " w");
    console.log(c_sum_whl + " cw");
    
    $('.m_sum_rtl').val(m_sum_rtl);
    $('.m_sum_whl').val(m_sum_whl);

    
    $('.r_sum_rtl').val(c_sum_rtl+m_sum_rtl);
    $('.r_sum_whl').val(c_sum_whl+m_sum_whl);

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