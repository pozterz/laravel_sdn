@extends('template')

@section('content')
	@foreach( $kk as $a )
		No : {{$a->id}} <br/>
		Max Weight : {{$a->MW}} <br/>
		Best Value : {{$a->Best}}<br/><br/>
	@endforeach
</div>

@endsection