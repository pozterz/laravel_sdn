@section('result')
<h2><span class="label label-success">Max Weight : {{ $MW }} </span></h2>

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
@show