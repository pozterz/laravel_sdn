@extends('template')

@section('content')

{!! Form::open(['url' => 'knap']) !!}
<legend> <span class="gradient"> 0/1 KnapSack </span> </legend>
<div class="form-group">
	{!! Form::text('MW',$MW,array('placeholder' => 'Max Weight','class' => 'form-control')) !!}
</div>

	
@for ($x = 0; $x < 5; $x++)
	<div class="form-group">
		<div class="col-md-6">
			{!! Form::text('w'.$x,$arrw[$x],array('placeholder' => 'Weight '.$x,'class' => 'form-control')) !!}
		</div>
		<div class="col-md-6">
			{!! Form::text('v'.$x,$arrv[$x],array('placeholder' => 'Value '.$x,'class' => 'form-control')) !!}
		</div>
		<div class="clearfix"></div>
	</div>
@endfor

{!! Form::submit('Submit',array('class' => 'btn btn-success')) !!}
{!! Form::close() !!}

				<br/>
				{!! Form::open(['url' => 'knap/','method' => 'get']) !!}
					<button type="submit" class="btn btn-info">View History</button>
				{!! Form::close() !!}
				
				@if (count($errors) > 0)
				<br/>
				
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
		<div class="col-md-6">
					<h2 class="grow"><span class="label label-success">Max Weight : {{ $MW }} </span></h2>

					<h2><span class="label label-danger">Best Max Weight : {{$res}} </span></h2>
					 <br/>
					<h4><span class="label label-warning"> Choose : </span></h4> 
					<table class="table table-hover">
					<tr>
						<td>Weight</td>
						<td>Value</td>
					</tr>
					@foreach($ans as $aaa)
						<tr>
							<td> {{ $arrw[$aaa] }} </td>
							<td> {{ $arrv[$aaa] }} </td>
						</tr>
					@endforeach
					</table>
				</div>
@endsection