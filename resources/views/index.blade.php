@extends('template')

@section('content')
<form action="knap" method="POST" role="form">
					<legend> <span class="gradient"> 0/1 KnapSack </span> </legend>
					<div class="form-group">
						<input type="text" class="form-control" name="MW" value="{{$MW}}" placeholder="Max Weight">
					</div>
					@for ($x = 0; $x < 5; $x++)
					
					<div class="form-group">
						<div class="col-md-6"><input type="text" class="form-control" name="w{{$x}}" value="{{ $arrw[$x] }}" placeholder="Weight {{$x}}"></div>
						<div class="col-md-6"><input type="text" class="form-control" name="v{{$x}}" value="{{ $arrv[$x]}}" placeholder="Value {{$x}}"></div>
						<div class="clearfix"></div>
					</div>

					@endfor

					 <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
					<button type="submit" class="btn btn-success">Submit</button>
				</form><br/>
				<a href="show"><button type="submit" class="btn btn-info">View History</button></a>
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