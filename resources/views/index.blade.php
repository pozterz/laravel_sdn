@extends('template')

@section('content')
<form action="" method="POST" role="form">
					<legend> <span class="gradient"> 0/1 KnapSack w/ PHP </span> </legend>
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
				</form>
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

@endsection