@extends('template')

@section('content')

{!! Form::open(['url' => 'knap/'.$id,'method' => 'DELETE']) !!}
	<legend> <span class="gradient"> 0/1 KnapSack </span> </legend>
	{!! Form::submit('Delete ?',array('class' => 'btn btn-success')) !!}
{!! Form::close() !!}
<br/>

</div>
@endsection