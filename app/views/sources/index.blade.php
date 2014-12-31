@extends('layout')
@section('content')
<div class="row" style="margin-top:100px">
<div class="col-md-4">

@foreach ($passSources as $source)
<p>source {{ $source['s_name'] }}
	@if(empty($source['s_name']))
		<strong>MUST NAME SOURCE!!!</strong>
	@endif
 {
<br />
	@foreach ($source as $key => $value)
	@if(!empty($value) AND $key != 'id' AND $key != 'created_at' AND $key != 'updated_at' AND $key != 's_name')
	{{ $key }} = {{ $value }} <br />
	@endif
	@endforeach
	} <br /></p>
@endforeach
</div>
</div>
@stop
