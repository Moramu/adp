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


    {!! Form::model($reef, ['method' => 'PATCH','route' => ['reef.update', $reef],'files'=>'true']) !!}
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('class' => 'form-control')) !!}
            </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
    
	<table class="table table-bordered">
    	<tr>
	    <th>Material</th>
	    <th>Quantity</th>
	    <th>Material Price</th>
	    <th>Retail Price</th>
	    <th>Wholesale Price</th>
	</tr>
	<tr>
	    <td>{!! Form::select('material_id',['Habitad Black']) !!}</td>
	    <td>{!! Form::number('m_quantity',$reef->m_quantity,array('step'=>'any','class'=>'m_quantity','min'=>'0')) !!}</td>
	    <td>{!! Form::number('m_price','497',array('class'=>'m_price','readonly' => 'true')) !!}</td>
	    <td>{!! Form::number('m_price_rtl',$reef->m_sum_rtl,array('class'=>'m_sum_rtl','readonly' => 'true','step'=>'any')) !!}</td>
    	    <td>{!! Form::number('m_price_whl',$reef->m_sum_whl,array('class'=>'m_sum_whl','readonly'=>'true','step'=>'any')) !!}</td>
    	</tr>
	</table>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
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
	    {!! Form::hidden('coral_id['.$index.']',$coral->id)!!}
	    {!! Form::hidden('username',Auth::user()->name)!!}
	    {!! Form::hidden('c_sum_quantity',0,array('class'=>'c_sum_quantity'))!!}
	    {!! Form::hidden('c_sum_rtl',0,array('class'=>'c_sum_rtl'))!!}
	    {!! Form::hidden('c_sum_whl',0,array('class'=>'c_sum_whl'))!!}
	    
	    <td>{{$coral->item_number}}</td>
	    <td>{{$coral->name}}</td>
	    <td><img src="{{asset($coral->photo)}}"></td>
    	    <td>{!! Form::number('c_price_rtl['.$index.']',$coral->retail_price,array('readonly' => 'true'))!!}</td>
	    <td>{!! Form::number('c_price_whl['.$index.']',$coral->wholesale_price,array('readonly' => 'true'))!!}</td>
	    <td>{!! Form::number('c_quantity['.$index.']',$reef->c_quantity[$index],array('class'=>'c_quantity','min'=>'0')) !!}</td>
	</tr>
	@endforeach
	</table>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12">
	<table class="table table-bordered">
    	<tr>
	    <th colspan="2">Summary Price</th>
	</tr>
	<tr>
	    <td>Retail Price</td>
	    <td>Wholesale Price</td>
	</tr>
	<tr>
	    <td>{!! Form::number('reef_sum_rtl',$reef->reef_sum_rtl,array('class'=>'reef_sum_rtl','readonly' => 'true','style'=>'width:75px'))!!}</td>
	    <td>{!! Form::number('reef_sum_whl',$reef->reef_sum_whl,array('class'=>'reef_sum_whl','readonly' => 'true','style'=>'width:75px'))!!}</td>
    	</tr>
	</table>
	</div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary pull-left">Submit</button>
        </div>
        </div>

    {!! Form::close() !!}


<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
$('.m_quantity, .c_quantity').on('input', function() {
	$.ajax(
	{
        url: "edit/reefFormAjax",
        type: 'PATCH',
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
    var c_sum_quantity = 0;
    for($i=0;$i<response.c_price_rtl.length;$i++){
    if(response.c_quantity[$i] !=0){
    c_sum_quantity+=parseInt(response.c_quantity[$i]);
    console.log(c_sum_quantity);
    }
    c_sum_rtl+=parseFloat(response.c_price_rtl[$i])*parseInt(response.c_quantity[$i]);
    c_sum_whl+=parseFloat(response.c_price_whl[$i])*parseInt(response.c_quantity[$i]);
    }
    m_sum_rtl=parseFloat(response.m_quantity)*parseFloat(response.m_price)*2.5;	
    m_sum_whl=m_sum_rtl-(m_sum_rtl/100*30);

    $('.m_sum_rtl').val(m_sum_rtl);
    $('.m_sum_whl').val(m_sum_whl);
    $('.c_sum_quantity').val(c_sum_quantity);
    $('.c_sum_rtl').val(c_sum_rtl);
    $('.c_sum_whl').val(c_sum_whl);
    $('.reef_sum_rtl').val(c_sum_rtl+m_sum_rtl);
    $('.reef_sum_whl').val(c_sum_whl+m_sum_whl);
    }



</script>
@endsection