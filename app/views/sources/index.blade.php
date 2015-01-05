@extends('layout')
@section('content')
<div class="row" style="margin-top:100px">
<div class="col-md-12">
<h2>
	<div class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign redish" aria-hidden="true"></span><a href="/indices/create?type=plain">&nbsp;&nbsp;Create a plain index&nbsp;&nbsp;</a><span class="glyphicon glyphicon-exclamation-sign redish" aria-hidden="true"></span></div>
	<div class="btn btn-default"><a href="/sources/create?conf_id={{$conf_id}}&conf_title={{$conf_title}}">Create another source</a></div>
		<div class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign redish" aria-hidden="true"></span><a href="/">&nbsp;&nbsp;Or, create a different kind of index&nbsp;&nbsp;</a><span class="glyphicon glyphicon-exclamation-sign redish" aria-hidden="true"></span></div>
</h2>
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
