@extends('template')

@section('content')

{!! Form::open(['url' => 'knap/'.$id,'method' => 'PUT']) !!}

<legend> <span class="gradient"> 0/1 KnapSack </span> </legend>
<div class="form-group">
	{!! Form::text('id',null,array('placeholder' => 'ID','class' => 'form-control')) !!}
</div>

{!! Form::submit('Submit',array('class' => 'btn btn-success')) !!}
{!! Form::close() !!}
<br/>

	{!! Form::open(['url' => 'knap/','method' => 'get']) !!}
		{!! Form::submit('View History',array('class' => 'btn btn-info')) !!}
	{!! Form::close() !!}
				
</div>
@endsection